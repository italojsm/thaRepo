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
<link href="css/my.css" rel="stylesheet"> 
<link href="css/pages/dashboard.css" rel="stylesheet">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  
<?php
   
   include ('conexao.php');
   
   
   
   $con = Conexao::getInstance();
   
   $stmt = $con->prepare("SELECT * FROM tarefa");
   $stmt->execute();
   
   
?>
  
  
     
<script src="js/jquery-1.7.2.min.js"></script> 
<!--<script src="js/jquery.redirect.js"></script>-->
<script src="js/jquery.redirect.min.js"></script>

<script>
        

 $(document).ready(function(){
 
 $.noConflict();
 
     $("body").hide().fadeIn('500');
 
 	//Ação para levar até a paginda de cadastro do cliente
    $("#bt").click(function(){
        
        $("body").fadeOut(300, function(){
                           
            $(window.document.location).attr('href','Cadastro/CadastrarTarefa.php');
                           
        });
        
    
    });
 
 	//ação para levar até a pagina de edição
    $('a.edit').click(function(){
        
            var txt = $(this).attr('rel');
            
            //alert(txt);
            
            $.ajax({
                 url: "Edicao/EditarTarefa.php",
                 //data: {pagina: 'editar', id: txt},
                 data: { pagina: 'editar', id:txt },
                 //context: document.body,
                 type: "POST",
                 success: function(){
                        
                            $("body").fadeOut(500, function(){
                          //  alert("alohaaaa");
                            
                              $(window).redirect('Edicao/EditarTarefa.php', { pagina: 'editar', id:txt });
                            
                            });
                 }
            });        
    });
    
     	//ação para inativar um item
    $('a.excluir').click(function(){
        
            var txt = $(this).attr('rel');
            
           // alert(txt);
            
            var r = confirm("Você realmente deseja excluir este cliente?");
            
            if( r == true){  
	            $.ajax({
	                 url: "controle/EditaTarefa.php",
	                 //data: {pagina: 'editar', id: txt},
	                 data: { pagina: 'editar', id:txt},
	                 //context: document.body,
	                 type: "POST",
	                 success: function(){
	                 		alert('ALOHAAA');
	                            $("body").fadeOut(500, function(){
	                            
	                             $(window.document.location).attr('href','Tarefa.php');
	                            
	                            });
	                 }
	            });  
            }   
    });
    
});
 </script>

</head>
<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="index.html"> <img src="img/logo-falqon1.png" /> </a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-cog"></i> Conta <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="javascript:;">Configurações</a></li>
              <li><a href="javascript:;">Ajuda</a></li>
            </ul>
          </li>
        </ul>
        <form class="navbar-search pull-right">
          <input type="text" class="search-query" placeholder="Buscar">	
        </form>
      </div>
      <!--/.nav-collapse --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<!-- /navbar -->
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
      	<li class="active"><a href="index.php"><i class="icon-home"></i><span>Inicio</span></a></li>
      	<li><a href="Contrato.php"><i class="icon-list-alt"></i><span>Contrato</span></a></li>
      	<li><a href="Cliente.php"><i class="icon-user"></i><span>Cliente</span></a></li>
      	<li><a href="Projeto.php"><i class="icon-pencil"></i><span>Projeto</span></a></li>
      	<li><a href="ControleHoras.php"><i class="icon-time"></i><span>Controle de Horas</span> </a></li>
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>
<!-- /subnavbar -->

<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        
        <div class="span12">
        
            <div class="widget-content" >
          
          <div class="widget">
            <span class="btn" id="bt"> Inserir novo cliente </span>
          </div>


<table class="table table-bordered table-striped">
  <tbody>
  <tr class="HeaderTable">
      <th>Cliente</th>
      <th colspan = "2">Ações</th>
  </tr>
  </tbody>
  
 
 <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ if($row['fl_inativo'] != 1){ ?>
 
 
  <tr>
    <td> <?php echo $row['observacao'] ?></td>    
    <td> <a class="edit" onclick="return false"  href="Tarefa.php" rel="<?php echo $row['id_atividade']; ?>">Editar</a> </td>
    <td> <a class="excluir" onclick="return false"  href="Tarefa.php" rel="<?php echo $row['id_atividade']; ?>"> Excluir </a> </td>
  </tr>
 
 <?php	} } ?>
 
</table>
</div>
                       

            </div>
        
        </div>
        
        
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main -->
<div class="extra"> <!-- está div é o menu do rodapé -->
  <div class="extra-inner">
    <div class="container"> <!-- container do rodapé-->
      <div class="row"> <!--está a div que contem o menu-->
                    <div class="span3"> <!-- a div com a class span 3 contem um menu em lista -->
                        <h4>
                            Cadastrar
                        </h4>
                        <ul>
                            <li><a href="javascript:;">Clientes</a></li>
                            <li><a href="javascript:;">Contratos</a></li>
                            <li><a href="javascript:;">Projetos</a></li>
                        </ul>
                    </div> <!-- fim span3 -->
                    <!-- /span3 -->
                    <div class="span3"><!-- a div com a class span 3 contem um menu em lista -->
                        <h4>
                            Gerenciar</h4>
                        <ul>
                            <li><a href="javascript:;">Clientes</a></li>
                            <li><a href="javascript:;">Contratos</a></li>
                            <li><a href="javascript:;">Projetos</a></li>
                        </ul>
                    </div><!-- fim span3 -->
                </div><!-- fim row -->
      <!-- /row --> 
    </div> <!-- fim container -->
    <!-- /container --> 
  </div>
  <!-- /extra-inner --> 
</div>
<!-- /extra -->
<div class="footer">
  <div class="footer-inner">
    <div class="container">
      <div class="row">
        <div class="span12"> &copy; 2014 <a href="http://www.falqon.com.br">Falqon Inteligencia Empresarial</a>. </div>
        <!-- /span12 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /footer-inner --> 
</div>
<!-- /footer --> 
<!-- Le javascript
================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="js/jquery-1.7.2.min.js"></script> 
<script src="js/excanvas.min.js"></script> 
<script src="js/chart.min.js" type="text/javascript"></script> 
<script src="js/bootstrap.js"></script>
<script language="javascript" type="text/javascript" src="js/full-calendar/fullcalendar.min.js"></script>
 
 
<script src="js/base.js"></script> 
</body>
</html>
