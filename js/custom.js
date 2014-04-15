$(function() {
    
    $(document).on("click", "#user_list", function(){ getUserList(this); });
    $(document).on("click", "#create_user_form", function(){ getCreateForm(this); });
    $(document).on("click", "button#add_user", function(){ addUser(this); });
    
});



function getUserList(element) {
 
    $('#indicator').show();
 
    $.post('../controle/controller.php',
        {
            action: 'get_users'
        },
        function(data, textStatus) {
        renderUserList(data);
        $('#indicator').hide();
        //alert('alohaaa');
        },
        "json"
    );
}


 
function renderUserList(jsonData) {
 
    var table = '<table width="600" cellpadding="5" class="table bordered striped hovered"><thead><tr><th scope="col">Name</th><th scope="col">Sobre Nome</th><th scope="col">Login</th><th scope="col">Senha</th><th scope="col"></th></tr></thead><tbody>';
 
    $.each( jsonData, function( index, user){
    table += '<tr>';
    table += '<td class="edit" field="name" user_id="'+user.id+'">'+user.nome+'</td>';
    table += '<td class="edit" field="email" user_id="'+user.id+'">'+user.sobre_nome+'</td>';
    table += '<td class="edit" field="mobile" user_id="'+user.id+'">'+user.login+'</td>';
    table += '<td class="edit" field="address" user_id="'+user.id+'">'+user.senha+'</td>';
    table += '<td><a href="javascript:void(0);" user_id="'+user.id+'" class="delete_confirm btn btn-danger"><i class="icon-remove icon-white"></i></a></td>';
    table += '</tr>';
    });
 
    table += '</tbody></table>';
 
    $('div#content').html(table);
}
/*
function addUser(element) {
 
    $('#indicator').show();
 
    var User = new Object();
    User.name = $('input#name').val();
    User.email = $('input#email').val();
    User.mobile = $('input#mobile').val();
    User.address = $('textarea#address').val();
 
    var userJson = JSON.stringify(User);
 
    $.post('controller.php',
        {
        action: 'add_user',
        user: userJson
    },
    function(data, textStatus) {
        getUserList(element);
        $('#indicator').hide();
    },
    "json"
    );
}
 
function getCreateForm(element) {
    var form = '<div class="input-prepend">';
    form += '<span class="add-on"><i class="icon-user icon-black"></i> Name</span>';
    form += '<input type="text" id="name" name="name" value="" class="input-xlarge" />';
    form += '</div><br/><br/>';
 
        form += '<div class="input-prepend">';
    form += '<span class="add-on"><i class="icon-envelope icon-black"></i> Email</span>';
    form += '<input type="text" id="email" name="email" value="" class="input-xlarge" >';
    form += '</div><br/><br/>';
 
    form += '<div class="input-prepend">';
    form += '<span class="add-on"><i class="icon-headphones icon-black"></i> Mobile</span>';
    form += '<input type="text" id="mobile" name="mobile" value="" class="input-xlarge" />';
    form += '</div><br/><br/>';
 
    form += '<div class="input-prepend">';
    form += '<span class="add-on add-on-area "><i class="icon-home icon-black"></i> Address</span>';
    form += '<textarea row="5" id="address" name="address" class="input-xlarge"></textarea>';
    form += '</div><br/><br/>';
 
    form += '<div class="control-group">';
    form += '<div class="">';
    form += '<button type="button" id="add_user" class="btn btn-primary"><i class="icon-ok icon-white"></i> Add User</buttonv';
    form += '</div>';
    form += '</div>';
 
    $('div#content').html(form);
}*/