$(function(){
    $('input').addClass('form-control');
    $('select').addClass('form-control');
});

//cập nhật chỉ tiêu doanh thu
$(document).on('click','.update_sales_criteria',function(){
    updateCriterial($(this).data('id'),converMoneyToDouble($('#num_sales_criteria').val()));
})

//cập nhật chỉ tiêu đơn hàng
$(document).on('click','.update_order_criteria',function(){
    updateCriterial($(this).data('id'),$('#num_order_criteria').val());
})

//cập nhật chỉ tiêu đơn hàng
$(document).on('click','.update_sold_criteria',function(){
    updateCriterial($(this).data('id'),$('#num_sold_criteria').val());
})

function updateCriterial(name,value){
    $.ajax({
        url: 'update-criteria',
        type: 'get',
        dataType: 'html',
        data: {
            name: name,
            value: value
        },
        success: function(data){
            window.location.reload();
        }
    })
}

$(document).on('click','.tag-results li',function(){
    var elm = $(this);
    $.ajax({
         url: 'addTagToPost',
         type: 'post',
         dataType: 'json',
         data:{
             'tag_id': elm.data('id'),
             'post_id': $('#id').val(),
             'product_id': $('#id').val()
         },
         success: function(data){
             if(data) {
                 $('.list-tag').show();
                 $('.chzn-choices').append('<li class="search-choice" id="post-tag-' + data + '"><span>' + elm.data('tag') + '</span><i class="fa fa-times" data-id="' + data + '"></i></li>');
                 $('.tag-drop').hide();
             }else
                alert('Thẻ tag mà bạn muốn chèn đã tồn tại. Xin vui lòng chọn thẻ tag khác!');
         }
     })
})

//xoá thẻ tag cho sản phẩm
$(document).on('click','.search-choice i',function(){
    var id = $(this).data('id');
    $.ajax({
        url: 'deleteTagFromPost',
        type: 'post',
        dataType: 'html',
        data:{
            id: id
        },
        success: function(data){
            $('.chzn-choices #post-tag-' + id).remove();
            if(!$('.chzn-choices').length)
                $('.chzn-choices').hide();
        }
    })
})


$(document).on('click','#group-table tbody .status',function(){
       var status = $(this).children().data('status');
       var id = $(this).data('id');
       $.ajax({
          url: 'status',
          type: 'post',
          dataType: 'json',
          data: {
              id: id,
              status: status
          },
          success: function(data){
              if(data == 1){
                  $('.status[data-id="'+ id +'"]').html('<i class="fa fa-check-circle" data-status="1"></i>');
              }
              else
                  $('.status[data-id="'+ id +'"]').html('<i class="fa fa-minus-circle" data-status="0"></i>');
          }
       });
   });

$("#file").fileinput({
    uploadUrl: 'upload-img', // you must set a valid URL here else you will get an error
    allowedFileExtensions : ['jpg', 'png','gif'],
    overwriteInitial: false,
    maxFileSize: 2000,
    maxFilesNum: 10,
    allowedFileTypes: ['image'],
    slugCallback: function(filename) {
        return filename.replace('(', '_').replace(']', '_');
    },
    uploadExtraData: function() {
        var id = $('#file').data('id');
        var strPicture = '';
        if($('#picture-' + id).length != 0){
            strPicture = $('#picture-' + id).val();
        }else{
            strPicture = '';
        }
        return {
            strPicture: strPicture,
            id: id
        };
    }
});

$("#zoom-image").fileinput({
    uploadUrl: 'upload-zoom-img', // you must set a valid URL here else you will get an error
    allowedFileExtensions : ['jpg', 'png','gif'],
    overwriteInitial: false,
    maxFileSize: 2000,
    maxFilesNum: 10,
    allowedFileTypes: ['image'],
    slugCallback: function(filename) {
        return filename.replace('(', '_').replace(']', '_');
    },
    uploadExtraData: function() {
        var id = $('#zoom-image').data('id');
        var strPicture = '';
        if($('#zoom-img-' + id).length != 0){
            strPicture = $('#zoom-img-' + id).val();
        }else{
            strPicture = '';
        }
        return {
            strPicture: strPicture,
            id: id
        };
    }
});

var imgUrl = ''+ basePath +'/zend/public/template/backend/img/';

//cập nhật tên nhóm cho bảng group
function updateGroupName(id){
    var group_name = $('#name-' + id).val();
    if(!group_name)
        alert('Xin vui lòng nhập tên nhóm vào!');
    else{
        $.ajax({
           url: 'update',
           type: 'post',
           dataType: 'json',
           data: {
               id: id,
               group_name: $('#name-' + id).val()
           },
            beforeSend: function(){
                $('#row-' + id + ' .img-load').attr('src', imgUrl + 'ajax-load.gif');
            },
           success: function(data){
               $('#row-' + id + ' .data-name').attr('data-content',function(){
                   return "<input type='text' name='name' id='name-"+ id +"' class='form-control' placeholder='"+ data +"'><button type='button' class='btn btn-default' onclick='closePopover()'>Đóng</button><img class='img-load'/><button type='button' class='btn btn-warning update-group-name' onclick='updateGroupName("+ id +")'>Cập nhật</button>";
               });
               $('#row-' + id + ' .data-name').text(data);
           },
           complete: function () {
                closePopover();
           }
        });
    }
}

//cập nhật nhóm cho bảng user
function updateGroup(id){
    var group_id = $('#group-name-'+ id).val();
    if(group_id == 0)
        alert('Bạn phải lựa chọn tên nhóm khác với tên nhóm hiện tại!');
    else{
        $.ajax({
           url: 'update-group',
           type: 'post',
           data: {
               id: id,
               group_id: group_id
           },
            beforeSend: function(){
                $('#row-' + id + ' .img-load').attr('src', imgUrl + 'ajax-load.gif');
            },
            success: function (data) {
                $('#span-group-name-' + id).text($('#group-name-'+ id + ' option:selected').text());
                
            },
            complete: function () {
                closePopover();
           }
        });
    }
}

//cập nhật trạng thái cho user
function changeStatusUser(id){
    var status = $('#status-' + id).children().data('status');
       $.ajax({
          url: 'status',
          type: 'post',
          dataType: 'json',
          data: {
              id: id,
              status: status
          },
          success: function(data){
              if(data == 1){
                  $('#status-' + id).html('<i class="fa fa-check-circle" data-status="1"></i>');
              }
              else
                  $('#status-' + id).html('<i class="fa fa-minus-circle" data-status="0"></i>');
          }
       });
}

//lấy dữ liệu của 1 category theo id
function getCategory(id){
    $('#category-image img').remove();
    $('.data-modal').modal('show');
    $('#upload').hide();
    //$('#up-img').show();
    $('#action').val('edit');
    $.ajax({
       url: 'get-category',
        type: 'post',
        dataType: 'json',
        data: {
            id: id
        },
        success: function(data){
            CKEDITOR.instances.description.setData(data.description);
            $('#name').val(data.name);
            $('#alias').val(data.alias);
            $('#created-date').val(data.created_date);
            $('#created-by').val(data.created_by);
            $('#modified-date').val(data.modified_date);
            $('#modified-by').val(data.modified_by);
            $('#hits').val(data.hits);
            $('#id').val(data.id);
            $('#parent option[value = '+ data.parent +']').attr('selected','selected');
            if(data.image)
            if($('#controller').val() == 'category')
                $('#category-image').append('<img src="'+ basePath +'/public/files/category/215x230/' + data.image + '">');
            else
                $('#category-image').append('<img src="'+ basePath +'/public/files/posts-category/176x98/' + data.image + '">');
            $('#status option[value = '+ data.status +']').attr('selected','selected');
            $('#meta_description').val(data.meta_description);
            $('#meta_keyword').val(data.meta_keyword);
            $('#save-item').attr('onclick','edit('+ id +')');
        }
    });
}

//lấy ra một bài viết theo id
function getPosts(id){
    $('.data-modal').modal('show');
    $('#up-img').show();
    $('#upload').hide();
    $('#action').val('edit');
    $('#posts-image img').remove();
    $.ajax({
        url: 'get-posts',
        type: 'post',
        dataType: 'json',
        data: {
            id: id
        },
        success: function(data){
            CKEDITOR.instances.description.setData(data.post.description);
            $('#name').val(data.post.name);
            $('#alias').val(data.post.alias);
            $('#created-date').val(data.post.created_date);
            $('#created-by').val(data.post.created_by);
            $('#modified-date').val(data.post.modified_date);
            $('#modified-by').val(data.post.modified_by);
            $('#hits').val(data.post.hits);
            $('#id').val(data.post.id);
            $('#parent option[value = '+ data.post.category_id +']').attr('selected','selected');
            $('#status option[value = '+ data.post.status +']').attr('selected','selected');
            $('#meta_description').val(data.post.meta_description);
            $('#meta_keyword').val(data.post.meta_keyword);
            $('#save-item').attr('onclick','edit('+ id +')');
            if(data.post.image)
                $('#posts-image').append('<img src="'+ basePath +'/public/files/posts/176x98/' + data.post.image + '">');
            var html = '';
            if(!$.isEmptyObject(data.tags)){
                $('.list-tag').show();
                $.each(data.tags,function(key,val){
                    html += '<li class="search-choice" id="post-tag-'+ val.pt_id +'"><span>'+ val.tag_name +'</span><i class="fa fa-times" data-id="'+ val.pt_id +'"></i></li>';
                })
                $('.chzn-choices').html(html);
            }
        }
    });
}

function getGroup(id){
    $('.data-modal').modal('show');
    $('#action').val('edit');
    $.ajax({
        url: 'get-item',
        type: 'post',
        dataType: 'json',
        data: {
            id: id
        },
        success: function(data){
            $('#name').val(data.name);
            $.each(data.permission,function(key,val){
                $('#no-' + val).removeClass('active');
                $('#yes-' + val).addClass('active');
                $('#permission-'+ val).prop('checked', true);
            })
            $('#save-item').attr('onclick','edit('+ id +')');
        }
    })
}

//lấy ra một bài viết theo id
function getItem(id){
    $('.data-modal').modal('show');
    $('#up-img').show();
    $('#upload').hide();
    $('#action').val('edit');
    $('#posts-image img').remove();
    $.ajax({
        url: 'get-item',
        type: 'post',
        dataType: 'json',
        data: {
            id: id
        },
        success: function(data){
            CKEDITOR.instances.description.setData(data.description);
            $('#name').val(data.name);
            $('#alias').val(data.alias);
            if(data.created_date)
                $('#created-date').val(data.created_date);
            if(data.created_by)
                $('#created-by').val(data.created_by);
            if(data.modified_date)
                $('#modified-date').val(data.modified_date);
            if(data.modified_by)
                $('#modified-by').val(data.modified_by);
            if(data.hits)
                $('#hits').val(data.hits);
            $('#id').val(data.id);
            $('#meta_description').val(data.meta_description);
            $('#meta_keyword').val(data.meta_keyword);
            $('#save-item').attr('onclick','edit('+ id +')');
            if(data.image)
                $('#posts-image').append('<img src="'+ basePath +'/public/files/posts/176x98/' + data.image + '">');
        }
    });
}
//lấy ra sản phẩm theo id
function getProduct(id){
    $('.data-modal').modal('show');
    $('#action').val('edit');
    $('#upload').hide();
    $('#file , #zoom-image').attr('data-id',id);
    $("#file, #zoom-image").fileinput('clear');
    $('#product-image img').remove();
    $.ajax({
        url: 'get-product',
        type: 'post',
        dataType: 'json',
        data: {
            id: id
        },
        success: function(data){
            console.log(data.categories);
            $.each(data.categories,function(key,category){
                console.log(category);
            })
            CKEDITOR.instances.description.setData(data.product.description);
            $('#name').val(data.product.name);
            $('#alias').val(data.product.alias);
            $('#trademark').val(data.product.trademark);
            $('#code').val(data.product.code);
            $('#price').val(data.product.price.replace(/\B(?=(\d{3})+(?!\d))/g, "."));
            $('#sale-off').val(data.product.sale_off.replace(/\B(?=(\d{3})+(?!\d))/g, "."));
            $('#percent-discount').val(data.product.percent_discount);
            $('#created-date').val(data.product.created);
            $('#created-by').val(data.product.created_by);
            $('#modified-date').val(data.product.modified);
            $('#modified-by').val(data.product.modified_by);
            $('#hits').val(data.product.hits);
            $('#id').val(data.product.id);
            $('#deal_time').val(data.product.deal_time);
            $('#quantity').val(data.product.quantity);
            $('#parent option[value = '+ data.product.category_id +']').attr('selected','selected');
            $('#status option[value = '+ data.product.status +']').attr('selected','selected');
            if(data.product.image)
                $('#product-image').append('<img src="'+ basePath +'/public/files/product/203x235/' + data.product.image + '">');
            $('#meta_description').val(data.product.meta_description);
            $('#meta_keyword').val(data.product.meta_keyword);
            $('#save-item').attr('onclick','edit('+ id +')');
            $('#show-img, #show-zoom-img').html('');
            var html = '';
            if(data.product.picture) {
                var picture = data.product.picture.split(',');
                html = '';
                $.each(picture, function (key, val) {
                    html += '<div class="file-preview-frame" id="'+ val.substring(0,val.indexOf('.')) +'"><i class="icon-delete" onclick="removeImg('+ id + ',\'' + val +'\')"></i><img src="' + basePath + 'public/files/product/98x105/' + val + '" /></div>';
                });
                html += '<input type="hidden" value="'+data.product.picture+'" name="picture" id="picture-'+ id +'">';
                $('#show-img').html(html);
            }
            if(data.product.zoom_image) {
                var picture = data.product.zoom_image.split(',');
                html = '';
                $.each(picture, function (key, val) {
                    html += '<div class="file-preview-frame" id="'+ val.substring(0,val.indexOf('.')) +'"><i class="icon-delete" onclick="removeZoomImg('+ id + ',\'' + val +'\')"></i><img src="' + basePath + '/public/files/product/100x100/' + val + '" /></div>';
                });
                html += '<input type="hidden" value="'+data.product.zoom_image+'" name="picture" id="zoom-img-'+ id +'">';
                $('#show-zoom-img').html(html);
            }
            if(data.product.productSize && data.product.productSize.length > 0){
                html = '<li>' +
                    '<div class="stt">Stt</div>' +
                    '<div class="size-name">Kích Thước</div>' +
                    '<div class="price">Giá</div>' +
                    '<div class="status">Hiện</div>' +
                    '<div class="function">Xóa</div>' +
                    '</li>';
                var stt, sclass, status;
                $.each(data.product.productSize,function(key,val){
                    stt = key + 2;
                    sclass = stt % 2 ? 'odd' : 'even';
                    if(val.status == 1)
                        status = '<i class="fa fa-check"></i>';
                    else
                        status = '<i class="fa fa-times"></i>';
                    html += '<li class="'+ sclass +'">' +
                                '<div class="stt">'+ (key + 1) +'</div>' +
                                '<div class="size-name">'+ val.sizeName +'</div>' +
                                '<div class="price">'+ val.price.replace(/\B(?=(\d{3})+(?!\d))/g, ".") + 'đ</div>' +
                                '<div class="status" data-id="'+ val.id +'" data-status="'+ val.status +'" data-stt="'+ stt +'">'+ status +'</div>' +
                                '<div class="function" data-id="'+ val.id +'"><i class="fa fa-trash-o"></i></div>' +
                            '</li>';
                })
                $('.list-size ul').html(html);
                $('.list-size').show();
            }else{
                $('.list-size').hide();
                $('.list-size ul .odd, .list-size ul .even').remove();
            }
            if(data.product.productAttributes && data.product.productAttributes.length > 0){
                html = '<li>' +
                    '<div class="stt">Stt</div>' +
                    '<div class="attributes-name">Thuộc Tính</div>' +
                    '<div class="value">Giá trị</div>' +
                    '<div class="status">Hiện</div>' +
                    '<div class="function">Xóa</div>' +
                    '</li>';
                var stt, sclass, status;
                $.each(data.product.productAttributes,function(key,val){
                    stt = key + 2;
                    sclass = stt % 2 ? 'odd' : 'even';
                    if(val.status == 1)
                        status = '<i class="fa fa-check"></i>';
                    else
                        status = '<i class="fa fa-times"></i>';
                    html += '<li class="'+ sclass +'">' +
                                '<div class="stt">'+ (key + 1) +'</div>' +
                                '<div class="attributes-name">'+ val.attributesName +'</div>' +
                                '<div class="value">'+ val.value + '</div>' +
                                '<div class="status" data-id="'+ val.id +'" data-status="'+ val.status +'" data-stt="'+ stt +'">'+ status +'</div>' +
                                '<div class="function" data-id="'+ val.id +'"><i class="fa fa-trash-o"></i></div>' +
                            '</li>';
                })
                $('.list-attributes ul').html(html);
                $('.list-attributes').show();
            }else{
                $('.list-attributes').hide();
                $('.list-attributes ul .odd, .list-attributes ul .even').remove();
            }
            var html = '';
            if(!$.isEmptyObject(data.tags)){
                $('.list-tag').show();
                $.each(data.tags,function(key,val){
                    html += '<li class="search-choice" id="post-tag-'+ val.pt_id +'"><span>'+ val.tag_name +'</span><i class="fa fa-times" data-id="'+ val.pt_id +'"></i></li>';
                })
                $('.chzn-choices').html(html);
            }
        }
    });
}

//xóa hình ảnh
function removeImg(id,fileName){
    var strPicture = $('#picture-' +id).val();
    if(strPicture.search(fileName + ',') == 0 || strPicture.search(fileName + ',') > 0){
        strPicture = strPicture.replace(fileName + ',','');
    }
    if(strPicture.search(',' + fileName) > 0){
        strPicture = strPicture.replace(',' +fileName, '');
    }
    if(strPicture.search(fileName) == 0){
        strPicture = strPicture.replace(fileName, '');
    }
    $('#picture-' +id).val(strPicture);
    $.ajax({
        url: 'remove-img',
        type: 'post',
        dataType: 'html',
        data:{
            id: id,
            fileName: fileName,
            strPicture: strPicture
        },
        success: function(data){
            $('#' + fileName.substring(0,fileName.indexOf('.'))).hide('500');
        }
    });
}

//xóa zoom_image
function removeZoomImg(id,fileName){
    var strPicture = $('#zoom-img-' +id).val();
    if(strPicture.search(fileName + ',') == 0 || strPicture.search(fileName + ',') > 0){
        strPicture = strPicture.replace(fileName + ',','');
    }
    if(strPicture.search(',' + fileName) > 0){
        strPicture = strPicture.replace(',' +fileName, '');
    }
    if(strPicture.search(fileName) == 0){
        strPicture = strPicture.replace(fileName, '');
    }
    $('#zoom-img-' +id).val(strPicture);
    $.ajax({
        url: 'remove-zoom-img',
        type: 'post',
        dataType: 'html',
        data:{
            id: id,
            fileName: fileName,
            strPicture: strPicture
        },
        success: function(data){
            $('#' + fileName.substring(0,fileName.indexOf('.'))).hide('500');
        }
    });
}

//Thêm mới dữ liệu cho các thành phần như: product, category, manufacture, post, category_post...
$(document).on('submit','#data-form',function(){
    if($('#action').val() == 'add') {
        var data = new FormData(this);
        if(typeof (CKEDITOR.instances['description']) != 'undefined')
            data.append('description', CKEDITOR.instances['description'].getData());
        $.ajax({
            url: 'add',
            type: 'post',
            dataType: 'html',
            contentType: false,
            cache: false,
            processData: false,
            data: data,
            success: function (data) {
                $('.data-modal').modal('hide');
                $('.content').load('reload');
                location.reload();
            }
        });
    }
    return false;
});
function edit(id){
    if(typeof (CKEDITOR.instances['description']) != 'undefined')
        var description = CKEDITOR.instances['description'].getData();
    else
        var description = '';
    $.ajax({
        url: 'edit?' + $('#data-form').serialize() + '&id=' +id,
        type: 'post',
        dataType: 'html',
        data:{
            description: description
        },
        success: function(data){
            $('.data-modal').modal('hide');
            $('.content').load('reload');
            location.reload();
        }
    });
}

//cập dữ liệu cho các thành phần như: product, category, manufacture, post, category_post...
$(document).on('submit','#data-form',function(){
    if($('#action').val() == 'edit') {
        $.ajax({
            url: 'upload',
            type: 'post',
            dataType: 'json',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                var controller = $('#controller').val();
                switch(controller){
                    case 'manufacturer':
                        $('#manufacturer-image img').remove();
                        $('#manufacturer-image').append('<img src="'+ basePath +'/public/files/manufacturer/120x60/' + data + '">');
                        break;
                    case 'product':
                        $('#product-image img').remove();
                        $('#product-image').append('<img src="'+ basePath +'/public/files/product/203x235/' + data + '">');
                        break;
                    case 'category':
                        $('#category-image img').remove();
                        $('#category-image').append('<img src="'+ basePath +'/public/files/category/215x230/' + data + '">');
                        break;
                    case 'posts-category':
                        $('#category-image img').remove();
                        $('#category-image').append('<img src="'+ basePath +'/public/files/posts-category/176x98/' + data + '">');
                        break;
                    case 'posts':
                        $('#posts-image img').remove();
                        $('#posts-image').append('<img src="'+ basePath +'/public/files/posts/176x98/' + data + '">');
                        break;
                }
                $('#upload').hide();
            }
        });
    }
    return false;
})

//thực hiện việc xóa nhiều
function deleteMulti() {
    var arr = [];
    $('input:checkbox[type=checkbox]:checked').each(function (i, val) {
        arr[i] = $(this).val();
    });
    $.ajax({
        url: 'delete',
        type: 'post',
        dataType: 'html',
        data:{
            cid: arr,
            task: 'multi-delete'
        },
        success: function(data){
            console.log(data);
            $.each(arr, function(i, val){
               $('#row-' + val).hide(500);
            });
        }
    });
}

//thực hiện việc xóa nhiều kích thước sản phẩm
function deleteMultiSize() {
    var arr = [];
    $('input:checkbox[type=checkbox]:checked').each(function (i, val) {
        arr[i] = $(this).val();
    });
    $.ajax({
        url: 'delete-size',
        type: 'get',
        dataType: 'html',
        data:{
            cid: arr,
            task: 'multi-delete'
        },
        success: function(data){
            $.each(arr, function(i, val){
                $('#row-' + val).hide(500);
            });
        }
    });
}
//thực hiện việc xóa nhiều kích thước sản phẩm
function deleteSize(id) {
    $.ajax({
        url: 'delete-size',
        type: 'get',
        dataType: 'html',
        data:{
            id: id,
            task: 'delete-item'
        },
        success: function(data){
            $('#row-' + id).hide(500);
        }
    });
}

//xóa 1 item nào đó theo id
function deleteOne(id){
    $.ajax({
        url: 'delete',
        type: 'post',
        dataType: 'html',
        data:{
            id: id,
            task: 'delete-item'
        },
        success: function(data){
            $('#row-' + id).hide(500);
        }
    });
}

//sắp xếp các chuyên mục cha và chuyên mục con trong category và category_post
function moveItem(id,type){
    $.ajax({
        url: 'move',
        type: 'post',
        data:{ id: id, type: type },
        success: function(){
            $('.content').load('reload');
        }
    });
}

//thay đổi status
function changeStatus(id, status){
    $.ajax({
        url: 'status',
        type: 'get',
        data:{ id: id, status: status },
        success: function(data){
            if(status == 1){
                $('#row-' + id + ' .status').html('<i class="icon public" onclick="changeStatus('+ id +',0)"></i>');
            }else{
                $('#row-' + id + ' .status').html('<i class="icon un-public" onclick="changeStatus('+ id +',1)"></i>');
            }
        }
    });
}

//thay đổi trạng thái sản phẩm đặc biệt
function changeSpecialStatus(id,special){
    $.ajax({
        url: 'special',
        type: 'get',
        dataType:'html',
        data:{ id: id, special: special },
        success: function(){
            if(special == 1){
                $('#row-' + id + ' .special').html('<i class="icon icon-special" onclick="changeSpecialStatus('+ id +',0)"></i>');
            }else{
                $('#row-' + id + ' .special').html('<i class="icon icon-un-special" onclick="changeSpecialStatus('+ id +',1)"></i>');
            }

        }
    });
}

//thay đổi trạng thái sản phẩm hot
function changeHot(id,hot){
    $.ajax({
        url: 'hot',
        type: 'get',
        dataType:'html',
        data:{ id: id, hot: hot },
        success: function(){
            if(hot == 1){
                $('#row-' + id + ' .hot').html('<i class="icon icon-hot" onclick="changeHot('+ id +',0)"></i>');
            }else{
                $('#row-' + id + ' .hot').html('<i class="icon icon-un-special" onclick="changeHot('+ id +',1)"></i>');
            }

        }
    });
}

//thay đổi 1 lúc trạng thái cho nhiều item
function changeMultiStatus(status) {
    var arr = [];
    if($('#checkall:checked').prop("checked"))
        $('input:checkbox[type=checkbox]:checked').each(function (i, val) {
            if(i > 0)
                arr[i-1] = $(this).val();
        });
    else
        $('input:checkbox[type=checkbox]:checked').each(function (i, val) {
            arr[i] = $(this).val();
        });
    $.ajax({
        url: 'multi-status',
        type: 'get',
        dataType: 'html',
        data: { cid: arr, status: status},
        success: function(data){
            console.log(data);
            $.each(arr, function(i, val){
                if(status == 1)
                    $('#row-' + val + ' .status').html('<i class="icon public" onclick="changeStatus('+ val +',0)"></i>');
                else
                    $('#row-' + val + ' .status').html('<i class="icon un-public" onclick="changeStatus('+ val +',1)"></i>');
            });
        }
    });
}

//lấy ra thương hiệu theo id
function getManufacturer(id){
    $('.data-modal').modal('show');
    $('#upload').hide();
    $('#action').val('edit');
    $.ajax({
        url: 'get-manufacturer',
        type: 'post',
        dataType: 'json',
        data: {
            id: id
        },
        success: function(data){
            $('#manufacturer-image img').remove();
            CKEDITOR.instances.description.setData(data.description);
            $('#name').val(data.name);
            $('#alias').val(data.alias);
            $('#created-date').val(data.created_date);
            $('#created-by').val(data.created_by);
            $('#modified-date').val(data.modified_date);
            $('#modified-by').val(data.modified_by);
            $('#id').val(data.id);
            if(data.picture)
                $('#manufacturer-image').append('<img src="'+ basePath +'/public/files/manufacturer/120x60/'+ data.picture +'">');
            $('#status option[value = '+ data.status +']').attr('selected','selected');
            $('#trademark option[value = '+ data.trademark +']').attr('selected','selected');
            $('#meta_description').val(data.meta_description);
            $('#meta_keyword').val(data.meta_keyword);
            $('#save-item').attr('onclick','edit('+ id +')');
        }
    });
}

//search kích thước sản phẩm bằng ajax
$('body').on('keyup','#size',function(){
    if($(this).val()) {
        $.ajax({
            url: 'search-size',
            type: 'post',
            dataType: 'json',
            data: {
                value: $(this).val()
            },
            success: function (data) {
                $('.choose-size .fa-plus').hide();
                var html = '';
                if (data) {
                    $.each(data, function (key, val) {
                        html += '<li data-id="'+ val.id +'" data-size="'+ val.size +'">' + val.size + '</li>';
                    })
                    $('.size-results').html(html);
                    $('.size-drop').show();
                    $('.choose-size .fa-plus').show();
                }
                if (data.length == 0) {
                    $('.size-results').html('<li>Dữ liệu không có</li>');
                }
            }
        });
    }else{
        $('.choose-size .fa-plus, .size-drop').hide();
    }
});

//search kích thước sản phẩm bằng ajax
$('body').on('keyup','#attributes',function(){
    if($(this).val()) {
        $.ajax({
            url: 'search-attributes',
            type: 'post',
            dataType: 'json',
            data: {
                value: $(this).val()
            },
            success: function (data) {
                $('.choose-attributes .fa-plus').hide();
                var html = '';
                if (data) {
                    $.each(data, function (key, val) {
                        html += '<li data-id="'+ val.id +'" data-attributes="'+ val.attributes +'">' + val.attributes + '</li>';
                    })
                    $('.attributes-results').html(html);
                    $('.attributes-drop').show();
                    $('.choose-attributes .fa-plus').show();
                }
                if (data.length == 0) {
                    $('.attributes-results').html('<li>Dữ liệu không có</li>');
                }
            }
        });
    }else{
        $('.choose-attributes .fa-plus, .attributes-drop').hide();
    }
});

//tìm kiếm tags bằng ajax
$('body').on('keyup','#tag',function(){
    if($(this).val()) {
        $.ajax({
            url: 'search-tag',
            type: 'post',
            dataType: 'json',
            data: {
                value: $(this).val()
            },
            success: function (data) {
                $('.add-tag .fa-plus').hide();
                var html = '';
                if (data) {
                    $.each(data, function (key, val) {
                        html += '<li data-id="'+ val.id +'" data-tag="'+ val.name +'">' + val.name + '</li>';
                    })
                    $('.tag-results').html(html);
                    $('.tag-drop').show();
                    $('.add-tag .fa-plus').show();
                }
                if (data.length == 0) {
                    $('.tag-results').html('<li>Dữ liệu không có</li>');
                }
            }
        });
    }else{
        $('.span6 .fa-plus, .tag-drop').hide();
    }
});

$(document).on('click','#save-data',function(){
    var elm = $(this);
    $.ajax({
        url: 'addSizeToProduct',
        type: 'post',
        dataType: 'html',
        data: {
            sizeId: $(this).data('size-id'),
            productId: $(this).data('product-id'),
            price: $('#price-by-size').val().replace(/\./g,'')
        },
        success: function(data){
            $('#price-by-size').hide();
            elm.prev('.price').html($('#price-by-size').val() + 'đ');
            elm.parent().append('<div class="status"><i class="fa fa-check"></i></div>');
            elm.parent().append('<div class="function" data-id="'+ data +'"><i class="fa fa-trash-o"></i></div>');
            elm.remove();
        }
    })
})

$(document).on('click','#save-attributes',function(){
    var elm = $(this);
    $.ajax({
        url: 'addAttributesToProduct',
        type: 'post',
        dataType: 'html',
        data: {
            attributesId: $(this).data('attributes-id'),
            productId: $(this).data('product-id'),
            value: $('#value-by-attributes').val().replace(/\./g,'')
        },
        success: function(data){
            $('#value-by-attributes').hide();
            elm.prev('.value').html($('#value-by-attributes').val());
            elm.parent().append('<div class="status"><i class="fa fa-check"></i></div>');
            elm.parent().append('<div class="function" data-id="'+ data +'"><i class="fa fa-trash-o"></i></div>');
            elm.remove();
        }
    })
})

//xóa kích thước cho sản phẩm
$(document).on('click', '.list-size .function',function(){
    var elm = $(this);
    $.ajax({
        url: 'delete-size',
        type: 'post',
        dataType: 'html',
        data:{ id: $(this).data('id') },
        success: function(data){
            elm.parent().remove();
        }
    });
})

//xóa kích thước cho sản phẩm
$(document).on('click', '.list-attributes .function',function(){
    var elm = $(this);
    $.ajax({
        url: 'delete-attributes',
        type: 'post',
        dataType: 'html',
        data:{ id: $(this).data('id') },
        success: function(data){
            elm.parent().remove();
        }
    });
})

//thêm kích thước cho sản phẩm
function addSize(){
    $.ajax({
        url: 'add-size',
        type: 'post',
        dataType: 'html',
        data:{ value: $('#size').val()},
        success: function(data){
            if(data) {
                $('.list-size').show();
                var stt = $('.list-size ul li').length + 1;
                var sclass = stt % 2 ? 'odd' : 'even';
                var sizeId = $(this).data('id');
                var productId = $('#id').val();
                var html = '<li class="' + sclass + '">' +
                    '<div class="stt">' + $('.list-size ul li').length + '</div>' +
                    '<div class="size-name">' + $('#size').val() + '</div>' +
                    '<div class="price"><input type="text" name="price" id="price-by-size" placeholder="Giá tiền" class="form-control"></div>' +
                    '<div style="float: right" id="save-data" data-product-id="' + productId + '" data-size-id="' + data + '"><i class="fa fa-floppy-o"></i></div>' +
                    '</li>';
                $('.list-size ul').append(html);
            }else{
                alert('Kích thước đã tồn tại trong cơ sở dữ liệu! Vui lòng chọn tên khác');
            }
        }
    });
}

//thêm thuộc tính cho sản phẩm
function addAttributes(){
    $.ajax({
        url: 'add-attributes',
        type: 'post',
        dataType: 'html',
        data:{ value: $('#attributes').val()},
        success: function(data){
            if(data) {
                $('.list-attributes').show();
                $('.attributes-drop').hide();
                var stt = $('.list-attributes ul li').length + 1;
                var sclass = stt % 2 ? 'odd' : 'even';
                var attributesId = $(this).data('id');
                var productId = $('#id').val();
                var html = '<li class="' + sclass + '">' +
                    '<div class="stt">' + $('.list-attributes ul li').length + '</div>' +
                    '<div class="attributes-name">' + $('#attributes').val() + '</div>' +
                    '<div class="value"><input type="text" name="value" id="value-by-attributes" placeholder="giá trị" class="form-control"></div>' +
                    '<div style="float: right" id="save-attributes" data-product-id="' + productId + '" data-attributes-id="' + data + '"><i class="fa fa-floppy-o"></i></div>' +
                    '</li>';
                $('.list-attributes ul').append(html);
            }else{
                alert('Thuộc tính đã tồn tại trong cơ sở dữ liệu! Vui lòng chọn tên khác');
            }
        }
    });
}


//thêm tag cho bài viết
function addTag(){
    $.ajax({
        url: 'add-tag',
        type: 'post',
        dataType: 'json',
        data:{
            name: $('#tag').val(),
            alias: toAlias($('#tag').val()),
            create_by: $('#username').val(),
            status: 1,
            id: $('#id').val()
        },
        success: function(data){
            var html = '';
            if(!$.isEmptyObject(data)){
                $('.list-tag').show();
                $.each(data,function(key,val){
                    html += '<li class="search-choice" id="post-tag-'+ val.pt_id +'"><span>'+ val.tag_name +'</span><i class="fa fa-times" data-id="'+ val.pt_id +'"></i></li>';
                })
                $('.chzn-choices').html(html);
                $('.tag-drop').hide();
            }
        }
    });
}

//cập nhật trạng thái kích thước cho sản phẩm
$(document).on('click','.list-size li .status',function(){
    var elm = $(this);
    $.ajax({
        url: 'changeStatusProductSize',
        type: 'post',
        dataType: 'html',
        data: {
            id: elm.data('id'),
            status: elm.data('status')
        },
        success: function(){

            if(elm.data('status') == 1){
                elm.html('<i class="fa fa-times"></i>').attr('data-status',0);
                elm.attr('data-status',0);
            }
            else{
                elm.html('<i class="fa fa-check"></i>').attr('data-status',1);
                elm.attr('data-status',1);
            }
        }
    });
})

//cập nhật trạng thái thuộc tính cho sản phẩm
$(document).on('click','.list-attributes li .status',function(){
    var elm = $(this);
    $.ajax({
        url: 'changeStatusProductAttributes',
        type: 'post',
        dataType: 'html',
        data: {
            id: elm.data('id'),
            status: elm.data('status')
        },
        success: function(){

            if(elm.data('status') == 1){
                elm.html('<i class="fa fa-times"></i>').attr('data-status',0);
                elm.attr('data-status',0);
            }
            else{
                elm.html('<i class="fa fa-check"></i>').attr('data-status',1);
                elm.attr('data-status',1);
            }
        }
    });
})

//xem đơn hàng
function viewOrder(id){
    $.ajax({
        url: 'view-cart',
        type: 'post',
        dataType: 'json',
        data: {
            id: id
        },
        success: function(data){
            var customer = data['customer'];
            var html = '';
            if($.type(data['product']) == 'array'){
                $.each(data['product'],function(i,val){
                    if(val.size == '' || val.size =='default')
                        val.size = 'mặc định';
                    html +='<li>' +
                                '<a href="'+ basePath + val.alias + '-'+ val.id + '.html' +'" title="'+ val.name +'">' +
                                    '<img src="'+ basePath  +'/public/files/product/100x100/'+ val.image +'" class="cart-img">' +
                                '</a>' +
                                '<h3>' +
                                    '<a href="'+ basePath  + val.alias + '-'+ val.id + '.html' +'" title="'+ val.name +'">'+ val.name +'</a>' +
                                '</h3>' +
                                '<h2>'+ moneyFormat(val.price) +'đ</h2>' +
                                '<p>(Size: '+ val.size +')</p>' +
                                '<span class="quantity">x'+ val.quantity +'</span>' +
                            '</li>';
                })
            }else{
                html +='<li>' +
                    '<a href="'+ basePath + data['product'].alias + '-'+ data['product'].id + '.html' +'" title="'+ data['product'].name +'">' +
                    '<img src="'+ basePath  +'public/files/product/100x100/'+ data['product'].image +'" class="cart-img">' +
                    '</a>' +
                    '<h3>' +
                    '<a href="'+ basePath  + data['product'].alias + '-'+ data['product'].id + '.html' +'" title="'+ data['product'].name +'">'+ data['product'].name +'</a>' +
                    '</h3>' +
                    '<h2>'+ moneyFormat(data['product'].price) +'đ</h2>' +
                    '<p>(Size: '+ data['product'].size +')</p>' +
                    '<span class="quantity">x'+ data['product'].quantity +'</span>' +
                    '</li>';
            }
            $('#username').html(customer.customer_name);
            $('#phone').html(customer.phone);
            $('#email').html(customer.email);
            $('#shipping_address').html(customer.shipping_address);
            $('#time_order').html(customer.time_order);
            $('#totalMoney').html(customer.total_money.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + 'đ');
            $('.order-info').html(html);
            $('#order').modal('show');
            $('#order-canceled').attr('onclick','orderCanceled('+ customer.id +')');
            $('#order-shipping').attr('onclick','orderShipping('+ customer.id +')');
            $('#order-complete').attr('onclick','orderComplete('+ customer.id +')');
        }
    })
}
function orderCanceled(id){
    $.ajax({
        url: 'order-canceled',
        type: 'post',
        dataType: 'html',
        data: {id: id},
        success: function(data){
            location.reload();
        }
    })
}
function orderShipping(id){
    $.ajax({
        url: 'order-shipping',
        type: 'post',
        dataType: 'html',
        data: {id: id},
        success: function(data){
            location.reload();
        }
    })
}
function orderComplete(id){
    $.ajax({
        url: 'order-complete',
        type: 'post',
        dataType: 'html',
        data: {id: id},
        success: function(data){
            location.reload();
        }
    })
}