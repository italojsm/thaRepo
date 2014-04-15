<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Falqontrol</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
<link href="css/font-awesome.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/pages/dashboard.css" rel="stylesheet">
<link href="css/my.css" rel="stylesheet">

<?php
    include("login/seguranca.php"); //Inclui o arquivo com o sistema de segurança
    protegePagina(); // Chama a função que protege a página
?>

<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
    <!--css-->
  <link rel="stylesheet" href="css/demo-styles.css" />
  <!--<script src="js/modernizr-1.5.min.js"></script>-->
</head>
<body>

<div id="corpo">
	
 <header>
   <h6 class="ola"> <img class="img-circle" src="http://www.eurobricks.com/forum/uploads/av-18793.jpeg?_r=0" /> Olá <?php echo $_SESSION['usuarioNome'];?>!!</h6>
   <a href="login/logout.php"> Logout </a>
 </header>

<!--    <h6 class="ola"> <img class="img-circle" src="http://www.eurobricks.com/forum/uploads/av-18793.jpeg?_r=0"> Olá Querido User!!</h6> -->

<!--each tile should specify what page type it opens (to determine which animation) and the corresponding page name it should open-->
  <div class="dashboard clearfix">

    <ul class="tiles">
    
      <div class="col1 clearfix">
        <li class="tile tile-big tile-1 slideTextUp" data-page-type="r-page" data-page-name="random-r-page">
          <div><p>Controle de Horas</p></div>
          <div><p>Tenha uma visão geral sobre o controle de horas.</p></div> 
        </li>
        
        <!--Cliente-->
        <a href="Cliente.php">
        <li class="tile tile-small tile tile-2 slideTextRight" data-page-type="s-page" data-page-name ="random-restored-page">
          <div><img src="http://farm3.staticflickr.com/2812/9049442146_5145e73152_o.jpg"></div>
          <div><p>Clientes</p></div>
        </li>
        </a>
        
         <!--Contrato-->
        <a href="Contrato.php">
        <li class="tile tile-small tile tile-3 last slideTextRight" data-page-type="s-page" data-page-name ="random-restored-page">
          <div><img src="http://thumbs.dreamstime.com/z/business-man-shake-hands-signing-contract-502856.jpg"></div>
          <div><p>Contrato</p></div>
        </li>
        </a>
        
        <!--Projeto-->
        <a href="Projeto.php">
        <li class="tile tile-big tile-4 fig-tile" data-page-type="r-page" data-page-name="random-r-page">
          <figure>
            <img src="http://tableless.com.br/wp-content/uploads/2011/12/lego.jpg" />
            <figcaption class="tile-caption caption-left">Visão Geral de Projetos</figcaption>
          </figure>
        </li>
        </a>
      
      </div>

      <div class="col2 clearfix">
        <li class="tile tile-big tile-5" data-page-type="r-page" data-page-name="random-r-page">
          <div><p><span class="icon-user"></span>Funcionarios</p></div>
        </li>
        
        <!--Atividades-->
        <a href="Atividades.php">
        <li class="tile tile-big tile-6 slideTextLeft" data-page-type="r-page" data-page-name="random-r-page">
          <div><p><span class="icon-table"></span>Ativades</p></div>
          <div><p>Visão Geral de Atividades</p></div>
        </li>
        </a>
        
        
        <!--Tiles with a 3D effect should have the following structure:
            1) a container inside the tile with class of .faces
            2) 2 figure elements, one with class .front and the other with class .back-->
        <li class="tile tile-big tile-7 rotate3d rotate3dX" data-page-type="r-page" data-page-name="random-r-page">
          <div class="faces">
            <div class="front"><span class="icon-table"></span></div>
            <div class="back"><p>Apontamento de Atividades</p></div>
          </div>
        </li>
        <!--
        <li class="tile tile-small last tile-8 rotate3d rotate3dY" data-page-type="r-page" data-page-name="random-r-page">
          <div class="faces">
            <div class="front"><span class="icon-home"></span></div>
            <div class="back"><p>Launch Instagram</p></div>
          </div>
        </li>
        -->
      </div>

    <!--
      <div class="col3 clearfix">      
      </div>
     -->
    </ul>
  </div><!--end dashboard-->
  
</div>

  <script src="js/jquery-1.8.2.min.js"></script>
  <script src="js/scripts.js"></script>

</body>
</html>
