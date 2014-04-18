<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6 ielt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7 ielt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<title>Inicial Admin Falqontrol</title>

<?php
    include("login/seguranca.php"); //Inclui o arquivo com o sistema de segurança
    protegePagina(); // Chama a função que protege a página
?>

    <link href="metro/css/metro-bootstrap.css" rel="stylesheet">
    <link href="metro/css/metro-bootstrap-responsive.css" rel="stylesheet">
    <link href="metro/css/iconFont.css" rel="stylesheet">
    <link href="metro/css/docs.css" rel="stylesheet">
    <!--<link href="../metro/css/myStyle.css" rel="stylesheet">-->
    <link href="metro/js/prettify/prettify.css" rel="stylesheet">

    <!-- Load JavaScript Libraries -->
    <script src="metro/js/jquery/jquery.min.js"></script>
    <script src="metro/js/jquery/jquery.widget.min.js"></script>
    <script src="metro/js/jquery/jquery.mousewheel.js"></script>
    <script src="metro/js/prettify/prettify.js"></script>
    <script src="metro/js/metro.min.js"></script>

    <!-- Metro UI CSS JavaScript plugins -->
    <script src="metro/js/load-metro.js"></script>

    <!-- Local JavaScript -->
    <script src="metro/js/docs.js"></script>
    <script src="metro/js/github.info.js"></script>


<script>

$(document).ready(function(){
    
    //alert('alohaaa');
    
});
</script>

</head>

<body class="metro">


    <div class="tile-area tile-area-lightOlive "> <!--talvez usar a cor: darkEmerald -->
    
    
        <h1 class="tile-area-title fg-white">Inicio</h1>
        
        
        <!--Icone do usuario -->
        <div class="user-id">
                
                <div class="user-id-image">
                    <span class="icon-user no-display1"></span>
                    <img src="images/Battlefield_4_Icon.png" class="no-display">
                </div>
                <div class="user-id-name">
                    <span class="first-name"><?php echo $_SESSION['usuarioNome'];?></span>
                    <span class="last-name"><?php echo $_SESSION['usuarioSobreNome'];?></span> 
                    <span><a href="login/logout.php"> Logout </a></span> 
                    
                </div>
                
        </div><!--user-id-->


        <div class="container">

      <!--tiles grupo 1-->
        <div class="tile-group offset2">
        
              <!--tile Dashboard-->   
              <a href="ClienteMetro.php" class="tile triple double-vertical bg-darkEmerald live" data-role="live-tile" data-effect="slideUp" data-click="transform">
              <div class="tile-content email " style="background: url(http://www.artistsvalley.com/images/icons/Database%20Application%20Icons/Grant%20Reports%20Column%20Chart/256x256/Grant%20Reports%20Column%20Chart.jpg)">
                    <div class="email-data">
                        <span class="email-data-title fg-violet">Clientes</span>
                        <span class="email-data-subtitle fg-violet">You're invited</span>
                        <span class="email-data-text fg-violet">I hope that you can make and make</span>
                    </div>
                </div>
            </a> <!-- end tile -->
            
             <!--tile clientes-->
            <a class="tile triple double-vertical bg-darkEmerald live" data-role="live-tile" data-effect="slideUp" data-click="transform">
              <div class="tile-content email">
                    <div class="email-image">
                        <img src="images/obama.jpg">
                    </div>
                    <div class="email-data">
                        <span class="email-data-title">Obama</span>
                        <span class="email-data-subtitle">You're </span>
                        <span class="email-data-text">I hope can make and make</span>
                    </div>
                </div>
            </a> <!-- end tile -->
        
        </div><!--tiles grupo 1-->
        
        
        <!--tiles grupo 2-->
        <div class="tile-group offset2">
             <!--tile contratos-->
            <a class="tile triple double-vertical bg-darkEmerald live" data-role="live-tile" data-effect="slideUp" data-click="transform">
              <div class="tile-content email">
                    <div class="email-image">
                        <img src="images/obama.jpg">
                    </div>
                    <div class="email-data">
                        <span class="email-data-title">Barak Obama</span>
                        <span class="email-data-subtitle">You're invited</span>
                        <span class="email-data-text">I hope that you can make and make</span>
                    </div>
                </div>
            </a> <!-- end tile -->
            
            <!--tile projetos-->
            <a class="tile triple double-vertical bg-steel" data-role="live-tile" data-effect="slideUp" data-click="transform">
                
                <!--Conteudo do Tile projetos-->
                <div class="tile-content" style="background: url(http://ideas.scup.com/pt/files/2013/09/im.-dest.-projeto.jpg)">
                   
                   <div class="padding10">
                        <h1 class="fg-brown ntm">57&deg;</h1>
                        <h2 class="fg-brown no-margin">San Francisco</h2>
                        <h5 class="fg-brown no-margin">Party Cloudy</h5>
                        <p class="tertiary-text text-bold fg-brown no-margin">Today</p>
                        <p class="tertiary-text text-bold fg-brown">63&deg;/55&deg; Mostly Clear</p>
                        <p class="tertiary-text text-bold fg-brown no-margin">Tomorrow</p>
                        <p class="tertiary-text text-bold fg-brown">64&deg;/54&deg; Mostly Clear</p>
                    </div>

                </div><!--Conteudo do Tile projetos-->
                
                <!--Conteudo do Tile projetos-->
                <div class="tile-content" style="background: url(http://www.ideiajovem.com/wp-content/uploads/2013/01/partes-gest%C3%A3o-de-projetos.jpg)">
                   
                   <div class="padding10">
                        <h1 class="fg-violet ntm">57&deg;</h1>
                        <h2 class="fg-violet no-margin">San </h2>
                        <h5 class="fg-violet no-margin"> Cloudy</h5>
                        <p class="tertiary-text text-bold fg-violet no-margin">Today</p>
                        <p class="tertiary-text text-bold fg-violet">63&deg;/55&deg; Mostly </p>
                        <p class="tertiary-text text-bold fg-violet no-margin">Tomorrow</p>
                        <p class="tertiary-text text-bold fg-violet">64&deg;/54&deg;  Clear</p>
                    </div>
              
         
                </div><!--Conteudo do Tile projetos-->
  
            <!--Status do Tile-->    
              <div class="tile-status">
                    <div class="header fg-darkGreen"> Projetos</div>
                </div><!--Status do Tile-->
            
            
            
            </a><!--tile projetos-->


         </div><!--tiles grupo 2-->
        
        
        </div>
        
    </div><!--tile main-->

</body>
</html>