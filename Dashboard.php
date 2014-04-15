<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Dashboard - Bootstrap Admin Template</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
<link href="css/font-awesome.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/pages/dashboard.css" rel="stylesheet">
<link href="css/my.css" rel="stylesheet">
<link href="css/Dashboard.css" rel="stylesheet"> 
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
    
<?php
   
   include ('conexao.php');
   
   $con = Conexao::getInstance();
   
   
   
?>    
    
  
  <script src="js/jquery-1.7.2.min.js"></script> 
    
    <script>
    
    
    $(document).ready(function(){
        //	alert('ALOHAAA');
        
        	// Evento de clique do elemento: ul#menu li.parent > a
	$('ul#menuLateral li.parent > a').click(function() {
    
        $('ul.sub-menu').slideUp('fast');
    
		// Expande ou retrai o elemento ul.sub-menu dentro do elemento pai (ul#menu li.parent)
		$('ul.sub-menu', $(this).parent()).slideToggle('fast', function() {
			// Depois de expandir ou retrair, troca a classe 'aberto' do <a> clicado
			$(this).parent().toggleClass('aberto');
			
		});
		return false;
    	});
    	
    	
    	//ação para quando um dos itens (Projeto, Cliente, Contrato) é clicado
    	$('ul#menuLateral li.parent > a').click(function(){
    	    
    	    var titulo = $(this).attr("title");
    	    
    	   $('#DashTitulo').html(titulo);
    	   $('#DashChart').load("DashboardChart.php", { titulo: titulo });
    	    
    	});
    	
    	$('ul.sub-menu li a').click(function(){
    	    
    	    id = $(this).attr('rel');
    	    tipo = $(this).attr('title');
    	    //string = id + "  " + tipo;
    	    //alert(string);
    	    
    	    $('#DashTable').load("DashboardTable.php", { id: id, tipo: tipo });
    	    
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
      	

      	
      	
      	<!--COLUNA ESQUERDA-->
        
        <!--MENU-->
        <div class="span3">
		
		<div class="widget widget-nopad">
			
			<div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Menu</h3>
            </div>
                          
              	<ul id="menuLateral" >
                 <li  class="parent"><a href="#" title="Projeto">Projeto</a>
                     
                      <ul class="sub-menu">
                         <?php 
                         $stmt = $con->prepare("SELECT id_projeto, desc_projeto FROM projeto;");
                         $stmt->execute();    
                         
                         while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>
                    
                             <li><a href="#" title="projeto" rel="<?php echo $row['id_projeto']; ?>"> <?php echo $row['desc_projeto'] ?></a></li>
                        <?php } ?>
                     </ul>
                 
                 </li>
                
                 <li class="parent" ><a href="#" title="Contrato">Contrato</a>
                 
                     <ul class="sub-menu">
                         <?php 
                         $stmt = $con->prepare("SELECT id_contrato, desc_contrato FROM contrato;");
                         $stmt->execute();    
                         
                         while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>
                    
                             <li><a href="#" title="contrato" rel="<?php echo $row['id_contrato']; ?>"> <?php echo $row['desc_contrato'] ?></a></li>
                        <?php } ?>
                     </ul>
                 
                 </li>
                
                 <li class="parent"><a href="#" title="Cliente">Cliente</a>
                
                     <ul class="sub-menu">
                
                
                     <?php 
                     $stmt = $con->prepare("SELECT id_cliente, nome_cliente FROM cliente;");
                     $stmt->execute();    
                     
                     while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>
                
                         <li><a href="#" title="cliente" rel="<?php echo $row['id_cliente']; ?>"> <?php echo $row['nome_cliente'] ?></a></li>
                    <?php } ?>
                     </ul>
                
                 </li>
                
                
</ul>
			
		</div>

        </div>
        <!-- /span3 --> <!--MENU-->
        
        <!--Coluna do Meio-->
        <div class="span9">


			<!--GRAFICO-->
          <div class="widget">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3 id="DashTitulo"> Chart </h3> <h5 class="data"><?php echo date('d-m-Y')?> </h5>
            </div>
            <!-- /widget-header -->
            <div class="widget-content" id="DashChart">
                        
                      
                        
            </div>
            <!-- /widget-content --> 
          </div>
          <!-- /widget --><!--GRAFICO-->
          
          
          
			<!--GRAFICO-->
          <div class="widget">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3 id="DashTitulo"> Chart </h3> <h5 class="data"><?php echo date('d-m-Y')?> </h5>
            </div>
            <!-- /widget-header -->
            <div class="widget-content" id="DashTable">
                        
                      
                        
            </div>
            <!-- /widget-content --> 
          </div>
          <!-- /widget --><!--GRAFICO-->
        </div>
        <!-- /span6 --> <!--Coluna do Meio-->
        

        
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
<!-- Le javascript
================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="js/jquery-1.7.2.min.js"></script> 
<script src="js/excanvas.min.js"></script> 
<script src="js/chart.min.js" type="text/javascript"></script> 
<script src="js/bootstrap.js"></script>
<script language="javascript" type="text/javascript" src="js/full-calendar/fullcalendar.min.js"></script>
 
<script src="js/base.js"></script> 
<script>     

        var lineChartData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
				{
				    fillColor: "rgba(220,220,220,0.5)",
				    strokeColor: "rgba(220,220,220,1)",
				    pointColor: "rgba(220,220,220,1)",
				    pointStrokeColor: "#fff",
				    data: [65, 59, 90, 81, 56, 55, 40]
				},
				{
				    fillColor: "rgba(151,187,205,0.5)",
				    strokeColor: "rgba(151,187,205,1)",
				    pointColor: "rgba(151,187,205,1)",
				    pointStrokeColor: "#fff",
				    data: [28, 48, 40, 19, 96, 27, 100]
				}
			]

        }

        var myLine = new Chart(document.getElementById("area-chart").getContext("2d")).Line(lineChartData);


        var barChartData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
				{
				    fillColor: "rgba(220,220,220,0.5)",
				    strokeColor: "rgba(220,220,220,1)",
				    data: [65, 59, 90, 81, 56, 55, 40]
				},
				{
				    fillColor: "rgba(151,187,205,0.5)",
				    strokeColor: "rgba(151,187,205,1)",
				    data: [28, 48, 40, 19, 96, 27, 100]
				}
			]

        }    

        $(document).ready(function() {
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        var calendar = $('#calendar').fullCalendar({
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
          },
          selectable: true,
          selectHelper: true,
          select: function(start, end, allDay) {
            var title = prompt('Event Title:');
            if (title) {
              calendar.fullCalendar('renderEvent',
                {
                  title: title,
                  start: start,
                  end: end,
                  allDay: allDay
                },
                true // make the event "stick"
              );
            }
            calendar.fullCalendar('unselect');
          },
          editable: true,
          events: [
            {
              title: 'All Day Event',
              start: new Date(y, m, 1)
            },
            {
              title: 'Long Event',
              start: new Date(y, m, d+5),
              end: new Date(y, m, d+7)
            },
            {
              id: 999,
              title: 'Repeating Event',
              start: new Date(y, m, d-3, 16, 0),
              allDay: false
            },
            {
              id: 999,
              title: 'Repeating Event',
              start: new Date(y, m, d+4, 16, 0),
              allDay: false
            },
            {
              title: 'Meeting',
              start: new Date(y, m, d, 10, 30),
              allDay: false
            },
            {
              title: 'Lunch',
              start: new Date(y, m, d, 12, 0),
              end: new Date(y, m, d, 14, 0),
              allDay: false
            },
            {
              title: 'Birthday Party',
              start: new Date(y, m, d+1, 19, 0),
              end: new Date(y, m, d+1, 22, 30),
              allDay: false
            },
            {
              title: 'EGrappler.com',
              start: new Date(y, m, 28),
              end: new Date(y, m, 29),
              url: 'http://EGrappler.com/'
            }
          ]
        });
      });
    </script><!-- /Calendar -->
</body>
</html>
