$(document).ready(function(){
    $('#category-table').dataTable({
        "processing": false,
        "serverSide": true,
        "ajax": {
            url: "load-config-dataTables",
            dataType: "json"
        },
        "columns": [
            {
                data: null,
                width: '5%',
                class: 'select',
                render: function(data){
                    return '<div><input type="checkbox" name="cid[]" value="'+ data.id +'"/></div>';
                },
                bSortable : false
            },
            {
                data: null,
                class: 'category-name',
                width: '20%',
                render: function(data){
                    var str = '&nbsp&nbsp&nbsp&nbsp'.repeat(data.level - 1);
                    if(data.level > 1){
                        str += '<sup>|</sup>----';
                        return str + data.name;
                    }else{
                        return str + '<b>' + data.name + '</b>';
                    }

                }
            },
            {
                data: null,
                class: 'image',
                width: '6%',
                render: function(data){
                    if(data.image)
                        return '<img src="'+ basePath +'/public/files/category/100x100/' + data.image + '">';
                    else
                        return '';
                }
            },
            {
                data: null,
                class: 'category-description',
                render: function(data){
                    var str = data.description;
                    var sub = str.slice(0,56);
                    var pos = sub.lastIndexOf(' ');
                    if(sub.slice(0,pos).length > 0)
                        return sub.slice(0,pos)+ '...';
                    return '';
                }
            },
            {
                data: null,
                width: '7%',
                class: 'status',
                render: function (data) {
                    if (data.status == 1)
                        return '<i class="icon public" onclick="changeStatus('+ data.id +',0)"></i>';
                    else
                        return '<i class="icon un-public" onclick="changeStatus('+ data.id +',1)"></i>';
                }
            },
            {
                data: null,
                class: 'special',
                width: '7%',
                render: function(data){
                    if(data.special == 1)
                        return '<i class="icon icon-special" onclick="changeSpecialStatus('+ data.id +',0)"></i>';
                    else
                        return '<i class="icon icon-un-special" onclick="changeSpecialStatus('+ data.id +',1)"></i>';
                }
            },
            {
                data: null,
                width: '10%',
                class: 'order-category',
                render: function(data){
                    if(data.left == parseInt(data.pleft) + 1){
                        return '<i class="fa fa-arrow-circle-down" onclick="moveItem('+ data.id + ',\'down\'' + ')"></i>';
                    }
                    if(parseInt(data.right) + 1 == data.pright){
                        return '<i class="fa fa-arrow-circle-up"  onclick="moveItem('+ data.id + ',\'up\'' + ')"></i>';
                    }
                    return '<i class="fa fa-arrow-circle-up" style="margin-right: 3px" onclick="moveItem('+ data.id + ',\'up\'' + ')"></i><i class="fa fa-arrow-circle-down" onclick="moveItem('+ data.id + ',\'down\'' + ')"></i>';
                }
            },
            {
                data: null,
                ordertable: false,
                width: '10%',
                render: function(data, type , row){
                    return '<div class="function">' +
                                '<a onclick="getCategory('+ data.id +')">' +
                                    '<i class="fa fa-pencil-square-o"></i>' +
                                '</a>' +
                                '<a onclick="deleteOne('+ data.id +')">' +
                                    '<i class="fa fa-trash-o"></i>' +
                                '</a>' +
                                '<a href="http://'+ window.location.host +'/'+ data.alias + '-' + data.id + '" target="_blank">' +
                                    '<i class="fa fa-eye"></i>' +
                                '</a>' +
                            '</div>';
                }
            },
            { data: 'id', width: '5%'},
            { data: 'left',visible: false},
            { data: 'name', visible: false},
            { data: 'description', visible: false}
        ],
        fnCreatedRow: function (nRow, aData, iDataIndex) {
            $(nRow).attr('id', 'row-' + aData.id);
        },
        "bStateSave": true,
        "order": [ 9, 'asc' ],
        "dom": '<"top"lf>rt<"bottom"ip><"clear">',
        "lengthMenu": [[10, 25, 50, 100, 200, -1], [10, 25, 50, 100, 200, "All"]]
    });

    $('#product-table').dataTable({
        "processing": false,
        "serverSide": true,
        "ajax": {
            url: "load-config-dataTables",
            dataType: "json"
        },
        "columns": [
            {
                data: null,
                width: '3%',
                class: 'select',
                render: function(data){
                    return '<div><input type="checkbox" name="cid[]" value="'+ data.id +'"/></div>';
                },
                bSortable : false
            },
            { data: 'name', class: 'name', width: '20%' },
            {
                data: null,
                class: 'image',
                width: '6%',
                render: function(data){
                    if(data.image)
                        return '<img src="'+ basePath +'/public/files/product/100x100/' + data.image + '">';
                    else
                        return '';
                }
            },
            { data: 'code', class: 'code'},
            { data: 'mname', class: 'trademark'},
            {
                data: null,
                width: '4%',
                class: 'status',
                render: function (data) {
                    if (data.status == 1)
                        return '<i class="icon public" onclick="changeStatus('+ data.id +',0)"></i>';
                    else
                        return '<i class="icon un-public" onclick="changeStatus('+ data.id +',1)"></i>';
                }
            },
            {
                data: null,
                class: 'deal',
                width: '4%',
                render: function(data){
                    if(data.deal == 1)
                        return '<i class="icon icon-special"></i>';
                    else
                        return '<i class="icon icon-un-special"></i>';
                }
            },
            {
                data: null,
                class: 'hot',
                width: '4%',
                render: function(data){
                    if(data.hot == 1)
                        return '<i class="icon icon-hot" onclick="changeHot('+ data.id +',0)"></i>';
                    else
                        return '<i class="icon icon-un-special" onclick="changeHot('+ data.id +',1)"></i>';
                }
            },
            { data: 'cname', class: 'cname', width: '9%'},
            {
                data: null,
                class: 'price',
                width: '4%',
                render: function(data){
                    return data.price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                }
            },
            {
                data: null,
                class: 'sale-off',
                width: '4%',
                render: function(data){
                    return data.sale_off.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                }
            },
            { data: 'hits', class: 'hits', width: '2%'},
            {
                data: null,
                ordertable: false,
                width: '8%',
                render: function(data, type , row){
                    return '<div class="function"><a onclick="getProduct('+ data.id +')"><i class="fa fa-pencil-square-o"></i></a><a onclick="deleteOne('+ data.id +')"><i class="fa fa-trash-o"></i></a><a href="http://'+ window.location.host +'/'+ data.alias + '-' + data.id + '.html'+ '" target="_blank"><i class="fa fa-eye"></i></a></div>';
                }
            },
            { data: 'id', width: '2%'},
        ],
        fnCreatedRow: function (nRow, aData, iDataIndex) {
            $(nRow).attr('id', 'row-' + aData.id);
        },
        "order": [ 12, 'desc' ],
        "dom": '<"top"lf>rt<"bottom"ip><"clear">',
        "bStateSave": true,
    });

    $('#group-table').dataTable({
        "processing": false,
        "serverSide": true,
        "ajax": {
            url: "load-config-dataTables",
            dataType: "json"
        },
        "columns": [
            {
                data: null,
                width: '5%',
                class: 'select',
                render: function(data){
                    if(data.id > 1  && data.id != 4)
                        return '<div><input type="checkbox" name="cid[]" value="'+ data.id +'"/></div>';
                    else
                        return '';
                },
                bSortable : false
            },
            {
                data: null,
                render: function (data) {
                    return '<div class="data-name" data-toggle="popover" data-placement="top" data-html="true" data-content="<input type=\'text\' name=\'name\' id=\'name-' + data.id + '\' class=\'form-control\' placeholder=\'' + data.name + '\'><button type=\'button\' class=\'btn btn-default\' onclick=\'closePopover()\'>Đóng</button><img class=\'img-load\'/><button type=\'button\' class=\'btn btn-warning update-group-name\' onclick=\'updateGroupName(' + data.id + ')\'>Cập nhật</button>" title="Cập nhật tên nhóm">' + data.name + '</div>';
                }
            },
            {
                data: 'created',
                class: 'center'
            },
            {
                data: 'created_by',
                class: 'center'
            },
            {
                data: 'modified',
                class: 'center'},
            {
                data: 'modified_by',
                class: 'center'},
            {
                data: null,
                width: '5%',
                class: 'status',
                render: function (data) {
                    if (data.status == 1)
                        return '<i class="icon public" onclick="changeStatus('+ data.id +',0)"></i>';
                    else
                        return '<i class="icon un-public" onclick="changeStatus('+ data.id +',1)"></i>';
                }
            },
            {
                data: null,
                ordertable: false,
                width: '8%',
                render: function(data, type , row){
                    if(data.id > 1 && data.id != 4) {
                        return '<div class="function">' +
                            '<a onclick="getGroup(' + data.id + ')">' +
                            '<i class="fa fa-pencil-square-o"></i>' +
                            '</a>' +
                            '<a onclick="deleteOne(' + data.id + ')">' +
                            '<i class="fa fa-trash-o"></i>' +
                            '</div>';
                    }else
                        return '';
                }
            },
            {data: 'id'},
            {data: 'name', visible: false}
        ],
        "order": [1, 'asc'],
        fnCreatedRow: function (nRow, aData, iDataIndex) {
            $(nRow).attr('id', 'row-' + aData.id);
        },
        "dom": '<"top"lf>rt<"bottom"ip><"clear">'
    });

    $('#posts-category-table').dataTable({
        "processing": false,
        "serverSide": true,
        "ajax": {
            url: "load-config-dataTables",
            dataType: "json"
        },
        "columns": [
            {
                data: null,
                width: '5%',
                class: 'select',
                render: function(data){
                    return '<div><input type="checkbox" name="cid[]" value="'+ data.id +'"/></div>';
                },
                bSortable : false
            },
            {
                data: null,
                class: 'category-name',
                width: '20%',
                render: function(data){
                    var str = '&nbsp&nbsp&nbsp&nbsp'.repeat(data.level - 1);
                    if(data.level > 1){
                        str += '<sup>|</sup>----';
                        return str + data.name;
                    }else{
                        return str + '<b>' + data.name + '</b>';
                    }

                }
            },
            {
                data: null,
                class: 'image',
                width: '6%',
                render: function(data){
                    if(data.image)
                        return '<img src="'+ basePath +'/public/files/posts-category/42x42/' + data.image + '">';
                    else
                        return '';
                }
            },
            {
                data: null,
                class: 'category-description',
                render: function(data){
                    var str = data.description;
                    var sub = str.slice(0,112);
                    var pos = sub.lastIndexOf(' ');
                    if(sub.slice(0,pos).length > 0)
                        return sub.slice(0,pos)+ '...';
                    return '';
                }
            },
            {
                data: 'hits',
                width: '5%',
                class: 'hits'
            },
            {
                data: null,
                width: '5%',
                class: 'status',
                render: function (data) {
                    if (data.status == 1)
                        return '<i class="icon public" onclick="changeStatus('+ data.id +',0)"></i>';
                    else
                        return '<i class="icon un-public" onclick="changeStatus('+ data.id +',1)"></i>';
                }
            },
            {
                data: null,
                width: '10%',
                class: 'order-category',
                render: function(data){
                    if(data.left == parseInt(data.pleft) + 1){
                        return '<i class="fa fa-arrow-circle-down" onclick="moveItem('+ data.id + ',\'down\'' + ')"></i>';
                    }
                    if(parseInt(data.right) + 1 == data.pright){
                        return '<i class="fa fa-arrow-circle-up"  onclick="moveItem('+ data.id + ',\'up\'' + ')"></i>';
                    }
                    return '<i class="fa fa-arrow-circle-up" style="margin-right: 3px" onclick="moveItem('+ data.id + ',\'up\'' + ')"></i><i class="fa fa-arrow-circle-down" onclick="moveItem('+ data.id + ',\'down\'' + ')"></i>';
                }
            },
            {
                data: null,
                ordertable: false,
                width: '10%',
                render: function(data, type , row){
                    return '<div class="function"><a onclick="getCategory('+ data.id +')"><i class="fa fa-pencil-square-o"></i></a><a onclick="deleteOne('+ data.id +')"><i class="fa fa-trash-o"></i><i class="fa fa-eye"></i></a></div>';
                }
            },
            { data: 'id', width: '5%'},
            { data: 'left',visible: false},
            { data: 'name', visible: false},
            { data: 'description', visible: false}
        ],
        fnCreatedRow: function (nRow, aData, iDataIndex) {
            $(nRow).attr('id', 'row-' + aData.id);
        },
        "bStateSave": true,
        "order": [ 9, 'asc' ],
        "dom": '<"top"lf>rt<"bottom"ip><"clear">',
        "lengthMenu": [[10, 25, 50, 100, 200, -1], [10, 25, 50, 100, 200, "All"]]
    });

    $('#posts-table').dataTable({
        "processing": false,
        "serverSide": true,
        "ajax": {
            url: "load-config-dataTables",
            dataType: "json"
        },
        "columns": [
            {
                data: null,
                width: '5%',
                class: 'select',
                render: function(data){
                    return '<div><input type="checkbox" name="cid[]" value="'+ data.id +'"/></div>';
                },
                bSortable : false
            },
            {
                data: 'name',
                class: 'name',
                width: '20%'
            },
            {
                data: null,
                class: 'image',
                width: '6%',
                render: function(data){
                    if(data.postsImage)
                        return '<img src="'+ basePath +'/public/files/posts/42x42/' + data.postsImage + '">';
                    else
                        return '';
                }
            },
            {
                data: null,
                class: 'description',
                render: function(data){
                    var str = data.description;
                    var sub = str.slice(0,120);
                    var pos = sub.lastIndexOf(' ');
                    if(sub.slice(0,pos).length > 0)
                        return sub.slice(0,pos)+ '...';
                    return '';
                }
            },
            { data: 'cname', width: '12%', class: 'cname'},
            { data: 'phits', width: '5%', class: 'phits'},
            {
                data: null,
                width: '5%',
                class: 'status',
                render: function (data) {
                    if (data.status == 1)
                        return '<i class="icon public" onclick="changeStatus('+ data.id +',0)"></i>';
                    else
                        return '<i class="icon un-public" onclick="changeStatus('+ data.id +',1)"></i>';
                }
            },
            {
                data: null,
                ordertable: false,
                width: '10%',
                render: function(data, type , row){
                    return '<div class="function"><a onclick="getPosts('+ data.id +')"><i class="fa fa-pencil-square-o"></i></a><a onclick="deleteOne('+ data.id +')"><i class="fa fa-trash-o"></i><i class="fa fa-eye"></i></a></div>';
                }
            },
            { data: 'id', width: '5%'},
            { data: 'name', visible: false},
            { data: 'description', visible: false}
        ],
        fnCreatedRow: function (nRow, aData, iDataIndex) {
            $(nRow).attr('id', 'row-' + aData.id);
        },
        "order": [ 6, 'desc' ],
        "dom": '<"top"lf>rt<"bottom"ip><"clear">'
    });

    $('#manufacturer-table').dataTable({
        "processing": false,
        "serverSide": true,
        "ajax": {
            url: "load-config-dataTables",
            dataType: "json"
        },
        "columns": [
            {
                data: null,
                width: '5%',
                class: 'select',
                render: function(data){
                    return '<div><input type="checkbox" name="cid[]" value="'+ data.id +'"/></div>';
                },
                bSortable : false
            },
            {
                data: 'name',
                class: 'name',
                width: '30%'
            },
            {
                data: null,
                class: 'picture',
                width: '10%',
                render: function(data){
                    if(data.picture)
                        return '<img src="'+ basePath +'/public/files/manufacturer/120x60/' + data.picture + '">';
                    else
                        return '';
                }
            },
            {
                data: null,
                class: 'description',
                render: function(data){
                    var str = data.description;
                    if(str.length > 70) {
                        var sub = str.slice(0, 70);
                        var pos = sub.lastIndexOf(' ');
                        if (sub.slice(0, pos).length > 0)
                            return sub.slice(0, pos) + '...';
                    }else{
                        return str;
                    }
                }
            },
            {
                data: null,
                width: '5%',
                class: 'status',
                render: function (data) {
                    if (data.status == 1)
                        return '<i class="icon public" onclick="changeStatus('+ data.id +',0)"></i>';
                    else
                        return '<i class="icon un-public" onclick="changeStatus('+ data.id +',1)"></i>';
                }
            },
            {
                data: null,
                ordertable: false,
                width: '10%',
                render: function(data, type , row){
                    return '<div class="function"><a onclick="getManufacturer('+ data.id +')"><i class="fa fa-pencil-square-o"></i></a><a onclick="deleteOne('+ data.id +')"><i class="fa fa-trash-o"></i></a></div>';
                }
            },
            { data: 'id', width: '5%'},
            { data: 'name', visible: false},
            { data: 'description', visible: false}
        ],
        fnCreatedRow: function (nRow, aData, iDataIndex) {
            $(nRow).attr('id', 'row-' + aData.id);
        },
        "order": [ 7, 'asc' ],
        "dom": '<"top"lf>rt<"bottom"ip><"clear">',
        "bStateSave": true,
    });

    $('#size-table').dataTable({
        "processing": false,
        "serverSide": true,
        "ajax": {
            url: "load-size-data-tables",
            dataType: "json"
        },
        "columns": [
            {
                data: null,
                width: '5%',
                class: 'select',
                ordertable: false,
                render: function(data){
                    return '<div><input type="checkbox" name="cid[]" value="'+ data.id +'"/></div>';
                },
            },
            {data: 'size'},
            {
                data: null,
                render: function (data) {
                    if (data.status == 1)
                        return '<div class="status" data-id="' + data.id + '"><i class="fa fa-check" data-status="' + data.status + '"></i></div>';
                    else
                        return '<div class="status" data-id="' + data.id + '"><i class="fa fa-times" data-status="' + data.status + '"></i></div>';
                }
            },
            {
                data: null,
                ordertable: false,
                width: '20%',
                render: function(data, type , row){
                    return '<div class="function"><a onclick="getManufacturer('+ data.id +')"><i class="fa fa-pencil-square-o"></i></a><a onclick="deleteOne('+ data.id +')"><i class="fa fa-trash-o"></i></a></div>';
                }
            },
            {data: 'id'},
        ],
        "order": [0, 'asc'],
        fnCreatedRow: function (nRow, aData, iDataIndex) {
            $(nRow).attr('id', 'row-' + (iDataIndex + 1));
        },
        "dom": '<"top"lf>rt<"bottom"ip><"clear">',
        "bStateSave": true,
    });

    $('#cart-table').dataTable({
        "processing": false,
        "serverSide": true,
        "ajax": {
            url: "load-config-dataTables",
            dataType: "json"
        },
        "columns": [
            {
                data: null,
                width: '5%',
                class: 'select',
                render: function(data){
                    return '<div><input type="checkbox" name="cid[]" value=""/></div>';
                },
                bSortable : false
            },
            { data: 'code'},
            { data: 'customer_name'},
            { data: 'phone'},
            {
                data: null,
                width: '4%',
                class: 'tt',
                render: function (data) {
                    switch (parseInt(data.status)){
                        case 1:
                            return '<img src="'+ basePath +'/public/template/backend/img/new.png" alt="new">';
                            break;
                        case 2:
                            return '<img src="'+ basePath +'/public/template/backend/img/pending.png" alt="pending">';
                            break;
                        case 3:
                            return '<img src="'+ basePath +'/public/template/backend/img/pending.png" alt="process">';
                            break;
                        case 4:
                            return '<img src="'+ basePath +'/public/template/backend/img/shipping.png" alt="shipping">';
                            break;
                        case 5:
                            return '<img src="'+ basePath +'/public/template/backend/img/complete.png" alt="complete">';
                            break;
                        case 6:
                            return '<img src="'+ basePath +'/public/template/backend/img/cancel.png" alt="canceled">';
                            break;
                    }
                }
            },
            {
                data: null,
                render: function(data){
                    return moneyFormat(data.total_money);
                }
            },
            { data: 'time_order'},
            {
                data: null,
                class: 'status',
                render: function (data) {
                    switch (parseInt(data.status)){
                        case 1:
                            return '<span style="color:#f34541">Mới</span>';
                            break;
                        case 2:
                            return '<span style="color:#f8a326">Chờ duyệt</span>';
                            break;
                        case 3:
                            return '<span style="color:#9564e2">Đang xử lý</span>';
                            break;
                        case 4:
                            return '<span style="color:#00acec">Chuyển giao</span>';
                            break;
                        case 5:
                            return '<span style="color:#49bf67">Hoàn tất</span>';
                            break;
                        case 6:
                            return '<span style="color:#999999">Hủy</span>';
                            break;
                    }
                }
            },
            {
                data: null,
                ordertable: false,
                width: '8%',
                render: function(data, type , row){
                    return '<div class="function"><a onclick="deleteOne('+ data.id +')"><i class="fa fa-trash-o"></i></a><a onclick="viewOrder('+ data.id +')"><i class="fa fa-eye"></i></a></div>';
                }
            },
            { data: 'id'},
            { data: 'status', visible: false, ordertable: true }
        ],
        fnCreatedRow: function (nRow, aData, iDataIndex) {
            $(nRow).attr('id', 'row-' + aData.id);
        },
        "order": [ 10, 'asc' ],
        "dom": '<"top"lf>rt<"bottom"ip><"clear">',
        "bStateSave": true,
    });

    $('#comment-table').dataTable({
        "processing": false,
        "serverSide": true,
        "ajax": {
            url: "load-config-dataTables",
            dataType: "json"
        },
        "columns": [
            {
                data: null,
                width: '3%',
                class: 'select',
                render: function(data){
                    return '<div><input type="checkbox" name="cid[]" value="'+ data.id +'"/></div>';
                }
            },
            {
                data: null,
                class: 'username',
                width: '15%',
                render: function (data) {
                    if(data.username)
                        return data.username;
                    else
                        return data.uusername;
                }
            },
            {
                data: 'pname',
                class: 'product-name',
                width: '20%'
            },
            { data: 'content', class: 'content', width: '35%' },
            { data: 'date', class: 'date'},
            {
                data: null,
                width: '8%',
                class: 'status',
                render: function (data) {
                    if (data.status == 1)
                        return '<i class="icon public" onclick="changeStatus('+ data.id +',0)"></i>';
                    else
                        return '<i class="icon un-public" onclick="changeStatus('+ data.id +',1)"></i>';
                }
            },
            { data: 'id', width: '2%'},
        ],
        fnCreatedRow: function (nRow, aData, iDataIndex) {
            $(nRow).attr('id', 'row-' + aData.id);
        },
        "order": [ 6, 'desc' ],
        "dom": '<"top"lf>rt<"bottom"ip><"clear">',
        "bStateSave": true,
    });

    $('#tags-table').dataTable({
        "processing": false,
        "serverSide": true,
        "ajax": {
            url: "load-config-dataTables",
            dataType: "json"
        },
        "columns": [
            {
                data: null,
                width: '3%',
                class: 'select',
                render: function(data){
                    return '<div><input type="checkbox" name="cid[]" value="'+ data.id +'"/></div>';
                }
            },
            {
                data: 'tname',
                class: 'name',
                width: '20%'
            },
            {
                data: 'description',
                class: 'description',
                width: '25%'
            },
            { data: 'alias', class: 'alias', width: '20%' },
            { data: 'create_by', class: 'create-by', width: '12%' },
            { data: 'hits', class: 'hits'},
            {
                data: null,
                width: '5%',
                class: 'status',
                render: function (data) {
                    if (data.status == 1)
                        return '<i class="icon public" onclick="changeStatus('+ data.id +',0)"></i>';
                    else
                        return '<i class="icon un-public" onclick="changeStatus('+ data.id +',1)"></i>';
                }
            },
            {
                data: null,
                ordertable: false,
                width: '8%',
                render: function(data, type , row){
                    return '<div class="function">' +
                        '<a onclick="getItem('+ data.id +')">' +
                        '<i class="fa fa-pencil-square-o"></i>' +
                        '</a>' +
                        '<a onclick="deleteOne('+ data.id +')">' +
                        '<i class="fa fa-trash-o"></i>' +
                        '</a>' +
                        '<a href="http://'+ window.location.host +'/'+ data.alias + '-' + data.id + '" target="_blank">' +
                        '<i class="fa fa-eye"></i>' +
                        '</a>' +
                        '</div>';
                }
            },
            { data: 'id', width: '2%'},
        ],
        fnCreatedRow: function (nRow, aData, iDataIndex) {
            $(nRow).attr('id', 'row-' + aData.id);
        },
        "order": [ 6, 'desc' ],
        "dom": '<"top"lf>rt<"bottom"ip><"clear">',
        "bStateSave": true,
    });

    $('#pages-table').dataTable({
        "processing": false,
        "serverSide": true,
        "ajax": {
            url: "load-config-dataTables",
            dataType: "json"
        },
        "columns": [
            {
                data: null,
                width: '3%',
                class: 'select',
                render: function(data){
                    return '<div><input type="checkbox" name="cid[]" value="'+ data.id +'"/></div>';
                }
            },
            {
                data: 'name',
                class: 'name',
                width: '20%'
            },
            {
                data: 'description',
                class: 'description',
                width: '25%'
            },
            { data: 'alias', class: 'alias', width: '20%' },
            { data: 'create_by', class: 'create-by', width: '12%' },
            { data: 'hits', class: 'hits'},
            {
                data: null,
                width: '5%',
                class: 'status',
                render: function (data) {
                    if (data.status == 1)
                        return '<i class="icon public" onclick="changeStatus('+ data.id +',0)"></i>';
                    else
                        return '<i class="icon un-public" onclick="changeStatus('+ data.id +',1)"></i>';
                }
            },
            {
                data: null,
                ordertable: false,
                width: '8%',
                render: function(data, type , row){
                    return '<div class="function">' +
                        '<a onclick="getItem('+ data.id +')">' +
                        '<i class="fa fa-pencil-square-o"></i>' +
                        '</a>' +
                        '<a onclick="deleteOne('+ data.id +')">' +
                        '<i class="fa fa-trash-o"></i>' +
                        '</a>' +
                        '<a href="http://'+ window.location.host +'/'+ data.alias + '-' + data.id + '" target="_blank">' +
                        '<i class="fa fa-eye"></i>' +
                        '</a>' +
                        '</div>';
                }
            },
            { data: 'id', width: '2%'},
        ],
        fnCreatedRow: function (nRow, aData, iDataIndex) {
            $(nRow).attr('id', 'row-' + aData.id);
        },
        "order": [ 7, 'desc' ],
        "dom": '<"top"lf>rt<"bottom"ip><"clear">',
        "bStateSave": true,
    });
});
