function showInput(class1, class2){
    $(class1).add(class2).toggle();
}

function subdomain(subdomain){
    var action;
    if(!subdomain){
        subdomain = $('input[name=subdomain-name]').val();
        action = 'create';
    }else{
        action = 'delete';
    }
    if(subdomain) {
        $.ajax({
            url: 'subdomain',
            type: 'post',
            dataType: 'json',
            data: {
                action: action,
                subdomain: subdomain,
                domain: $('input[name = domain]').val()
            },
            success: function (data) {
                if(data.success) {
                    if(action == 'create') {
                        $('.subdomain-list').append('<li class="'+ subdomain +'">' + subdomain + '.' + $('input[name = domain]').val() + '<i class="fa fa-trash-o" onclick="subdomain(\'' + subdomain + '\')"></i></li>');
                        $('.subdomain .bg-success').html('Đã thêm thành công');
                    }else{
                        $('.subdomain .bg-success').html('Đã xóa thành công');
                        $('.' + subdomain).hide(500);
                    }
                    $('.subdomain .bg-success').show();
                    $('input[name = subdomain-name]').val('');
                    setTimeout(function(){
                        $('.subdomain .bg-success').html();
                        $('.subdomain .bg-success').hide();
                    },4000);
                }else{
                    $('.subdomain .bg-danger').html(data);
                    setTimeout(function(){
                        $('.subdomain .bg-danger').html();
                        $('.subdomain .bg-danger').hide();
                    },4000);
                }
            }
        });
    }else{
        alert('Vui lòng nhập tên subdoamin!');
    }
}

function database(databaseName){
    var action;
    if(!databaseName){
        databaseName = $('.input-info-database input[name=name]').val();
        action = 'create';
    }else{
        action = 'delete';
    }
    if(databaseName) {
        $.ajax({
            url: 'database',
            type: 'post',
            dataType: 'html',
            data: {
                action: action,
                name: databaseName,
                user: $('.input-info-database input[name=user]').val(),
                passwd: $('.input-info-database input[name=passwd]').val(),
                passwd2: $('.input-info-database input[name=passwd2]').val(),
                account: $('input[name=account]').val(),
            },
            success: function (data) {
                console.log(data);
                if(action == 'create') {
                    $('.database-list').append('<li class="'+ databaseName +'">'+ $('input[name=account]').val() + '_' + databaseName + '<i class="fa fa-trash-o" onclick="database(\'' + databaseName + '\')"></i></li>');
                    $('.database .bg-success').html('Đã thêm thành công');
                }else{
                    $('.database .bg-success').html('Đã xóa thành công');
                    $('.' + databaseName).hide(500);
                }
                $('.database .bg-success').show();
                $('.input-info-database input').val('');
                setTimeout(function(){
                    $('.database .bg-success').html();
                    $('.database .bg-success').hide();
                },4000);
            }
        });
    }else{
        alert('Vui lòng nhập tên database!');
    }
}

function email(emailName){
    var action;
    if(!emailName){
        emailName = $('.input-info-email input[name=name]').val();
        action = 'create';
    }else{
        action = 'delete';
    }
    if(emailName) {
        $.ajax({
            url: 'email',
            type: 'post',
            dataType: 'html',
            data: {
                action: action,
                name: emailName,
                passwd: $('.input-info-email input[name=passwd]').val(),
                passwd2: $('.input-info-email input[name=passwd2]').val(),
                domain: $('input[name=domain]').val(),
            },
            success: function (data) {
                console.log(data);
                if(action == 'create') {
                    $('.email-list').append('<li class="'+ emailName +'">' + emailName + '@'+ $('input[name=domain]').val() + '<i class="fa fa-trash-o" onclick="email(\'' + emailName + '\')"></i></li>');
                    $('.email .bg-success').html('Đã thêm thành công');
                }else{
                    $('.email .bg-success').html('Đã xóa thành công');
                    $('.' + emailName).hide(500);
                }
                $('.email .bg-success').show();
                $('.input-info-email input').val('');
                setTimeout(function(){
                    $('.email .bg-success').html();
                    $('.email .bg-success').hide();
                },4000);
            }
        });
    }else{
        alert('Vui lòng nhập tên email!');
    }
}

function user(username,stt){
    var action;
    if(!username){
        username = $('.input-info-user input[name=username]').val();
        action = 'create';
    }else{
        action = 'delete';
    }
    if(username) {
        $.ajax({
            url: 'user',
            type: 'post',
            dataType: 'html',
            data: {
                action: action,
                username: username,
                email: $('.input-info-user input[name=email]').val(),
                passwd: $('.input-info-user input[name=passwd]').val(),
                passwd2: $('.input-info-user input[name=passwd2]').val(),
                userDomain: $('.input-info-user input[name=user-domain]').val(),
                userPackage: $('#package').val()
            },
            success: function (data) {
                console.log(data);
                if(action == 'create') {
                    $('#user-list tbody').append('<tr><td style="padding-left:10px">' + parseInt($('#user-list tbody tr').length + 1) + '</td><td>'+ username +'</td><td><i class="fa fa-trash-o" onclick="user(\'' + username + '\')"></i></td></tr>');
                    $('.user .bg-success').html('Đã thêm thành công');
                }else{
                    $('.user .bg-success').html('Đã xóa thành công');
                    $('#user-list tbody tr:nth-child('+ stt+ ')').remove();

                }
                $('.user .bg-success').show();
                $('.input-info-user, .add-user').hide();
                setTimeout(function(){
                    $('.user .bg-success').html();
                    $('.user .bg-success').hide();
                },4000);
            }
        });
    }else{
        alert('Vui lòng nhập tên thành viên!');
    }
}

function userAdmin(username,stt){
    var action;
    if(!username){
        username = $('.input-info-admin input[name=username]').val();
        action = 'create';
    }else{
        action = 'delete';
    }
    if(username) {
        $.ajax({
            url: 'user-admin',
            type: 'post',
            dataType: 'html',
            data: {
                action: action,
                username: username,
                email: $('.input-info-admin input[name=email]').val(),
                passwd: $('.input-info-admin input[name=passwd]').val(),
                passwd2: $('.input-info-admin input[name=passwd2]').val()
            },
            success: function (data) {
                console.log(data);
                if(action == 'create') {
                    $('#admin-list tbody').append('<tr><td style="padding-left:10px">' + parseInt($('#admin-list tbody tr').length + 1) + '</td><td>'+ username +'</td><td><i class="fa fa-trash-o" onclick="user(\'' + username + '\')"></i></td></tr>');
                    $('.admin .bg-success').html('Đã thêm thành công');
                }else{
                    $('.admin .bg-success').html('Đã xóa thành công');
                    $('#admin-list tbody tr:nth-child('+ stt+ ')').remove();

                }
                $('.admin .bg-success').show();
                $('.input-info-admin, .add-admin').hide();
                setTimeout(function(){
                    $('.admin .bg-success').html();
                    $('.admin .bg-success').hide();
                },4000);
            }
        });
    }else{
        alert('Vui lòng nhập tên thành viên!');
    }
}
/*

if($('#meta_fieldset_user_admin').height() < $('#meta_fieldset_user').height()){
    $('#meta_fieldset_user_admin').height($('#meta_fieldset_user').height());
}else{
    $('#meta_fieldset_user').height($('#meta_fieldset_user_admin').height());
}*/
