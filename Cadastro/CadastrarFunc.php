<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Falqontrol</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    <link href="../metro/css/metro-bootstrap.css" rel="stylesheet">
    <link href="../metro/css/metro-bootstrap-responsive.css" rel="stylesheet">
    <link href="../metro/css/iconFont.css" rel="stylesheet">
    <link href="../metro/css/docs.css" rel="stylesheet">
    <!--<link href="../metro/css/myStyle.css" rel="stylesheet">-->
    <link href="../metro/js/prettify/prettify.css" rel="stylesheet">

    <!-- Load JavaScript Libraries -->
    <script src="../metro/js/jquery/jquery.min.js"></script>
    <script src="../metro/js/jquery/jquery.widget.min.js"></script>
    <script src="../metro/js/jquery/jquery.mousewheel.js"></script>
    <script src="../metro/js/prettify/prettify.js"></script>

    <!-- Metro UI CSS JavaScript plugins -->
    <script src="../metro/js/load-metro.js"></script>

    <!-- Local JavaScript -->
    <script src="../metro/js/docs.js"></script>
    <script src="../metro/js/github.info.js"></script>
        
    </head>
 
    <body class="metro">
        <div class="container">
 
            <div class="jumbotron">
                <h1>Falqontrol 2.0 ?</h1>
            </div>
            
            

            
        <button class="command-button primary" id="user_list">
            <i class="icon-share-2 on-left"></i>
             Lista os cara ai mano
            <a href="javascript:void(0);"><small>Read</small><a/>
        </button>
        <button class="command-button secondary" id="create_user_form">
            <i class="icon-share-3 on-left"></i>
             Cadastra um cara ai mano
            <a href="javascript:void(0);" ><small>Create</small><a/>
        </button>     
 
 
<div id="indicator" style="display: none; text-align: center;" class="loading_img">
    <img src="http://www.caruaru360graus.com.br/portal/lofslidernews/load.gif"/>
</div>
            <div id="content"></div>
            
            <div id="delete_confirm_modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">        
    <h3 id="myModalLabel">Delete User</h3>
    </div>
     
    <div class="modal-body">
    <p>Are you sure to delete this user?</p>
    </div>
    <div class="modal-footer">
    <input type="hidden" id="user_id" value="" />
    <button class="btn" data-dismiss="modal" aria-hidden="true">No</button>
    <button class="btn btn-primary delete">Yes</button>
    </div>
</div>
                 </div>
 
        <script src="../js/custom.js"></script>
    </body>
</html>