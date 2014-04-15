<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Falqontrol</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
<link href="../css/font-awesome.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">
<link href="../css/pages/dashboard.css" rel="stylesheet">
<link href="../css/datepicker.css" rel="stylesheet">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
    

<?php
   
   include ('../conexao.php');
   
   $con = Conexao::getInstance();
   
   
?>
  

    
    
<script src="../js/jquery-1.7.2.min.js"></script> 
<script src="../js/datepicker.js"></script> 

<script>
        
        

 $(document).ready(function($){ 
 
 
 var d = new Date();

var month = d.getMonth()+1;
var day = d.getDate();

var output = ((''+day).length<2 ? '0' : '') + day  + '-' +
    ((''+month).length<2 ? '0' : '') + month + '-' +
    d.getFullYear();
    
    $('input.date').val(output);
 
 $.noConflict();
 
    $("body").hide().fadeIn('500');
    
    
    $('#dt_hr_inicio').DatePicker({
						format:'d-m-Y',
						date: $(this).val(),
						current: $(this).val(),
						starts: 1,
						position: 'r',
						onBeforeShow: function(){
							$(this).DatePickerSetDate($(this).val(), true);
						},
						onChange: function(formated, dates){
							$('#dt_hr_inicio').val(formated);
							$('#dt_hr_inicio').DatePickerHide();
						}
					});

    $('#dt_hr_fim').DatePicker({
						format:'d-m-Y',
						date: $(this).val(),
						current: $(this).val(),
						starts: 1,
						position: 'r',
						onBeforeShow: function(){
							$(this).DatePickerSetDate($(this).val(), true);
						},
						onChange: function(formated, dates){
							$('#dt_hr_fim').val(formated);
							$('#dt_hr_fim').DatePickerHide();
						}
					});	
    
    
    
    
    $("form").submit(function(){
    
    
       // $('#nomeFantasia').attr('name');
    
        //alert($('#nomeFantasia').attr('name'));
        
        var dados = $( this ).serialize();
        
        //alert(dados);
        

        
            $.ajax({
                 url: "../controle/InsereTarefa.php",
                 data: dados, 
                 type: "POST",
                 success: function(){
                        
                            $("body").fadeOut(500, function(){
                            //alert('oopa');
                            $(window.document.location).attr('href','Tarefa.php');
                            
                            });
                 }
            });
          
        
            
    return false;
    });
    

    
});

 </script>
    
    
    
    
    
    
    
    
    
</head>
<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="index.html"> <img src="../img/logo-falqon1.png" /> </a>
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
      	<li><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-home"></i><span>Inicio</span></a></li>
        <li class="dropdown active"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-pencil"></i><span>Cadastrar</span> </a>        
	        <ul class="dropdown-menu">
	            <li><a href="Cliente.php">Cliente</a></li>
	            <li><a href="contrato.html">Contrato</a></li>
	            <li><a href="projeto.html">Projeto</a></li>
	            <li><a href="projeto.html">UF</a></li>
	          </ul>	        
        </li>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-list"></i><span>Gerenciar</span> </a>        
	        <ul class="dropdown-menu">
	            <li><a href="cliente.html">Cliente</a></li>
	            <li><a href="contrato.html">Contrato</a></li>
	            <li><a href="projeto.html">Projeto</a></li>
	          </ul>	        
        </li>
        <li><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-time"></i><span>Controle de Horas</span> </a></li>

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
        <form class="form-horizontal widget-content" method="post">
      <legend>Cadastro de tarefa</legend>
   
<fieldset>
          <div class="row-fluid">
            <div class="span6 bgcolor">
              <div class="control-group">
                <label class="control-label" for="street">Atividade</label>
                <div class="controls">
                <select id="id_atividade" name="id_atividade">
                  <?php
                       $stmt = $con->prepare("SELECT id_atividade, desc_atividade FROM atividade;");
                       $stmt->execute();
                       while($aux = $stmt->fetch(PDO::FETCH_ASSOC)){?>
                  	        <option value="<?php echo $aux['id_atividade']; ?>"><?php echo $aux['desc_atividade']; ?></option>
                  
                 <?php } ?>
 
                  </select>
                </div>
              </div>             
            </div><!--/span-->
            <div class="span6 bgcolor">
              <div class="control-group">
                <label class="control-label" for="city">funcionario</label>
                <div class="controls">
                <select id="id_funcionario" name="id_funcionario">
                  <?php
                       $stmt = $con->prepare("SELECT id_funcionario, nome FROM funcionario;");
                       $stmt->execute();
                       while($aux = $stmt->fetch(PDO::FETCH_ASSOC)){?>
                  	        <option value="<?php echo $aux['id_funcionario']; ?>"><?php echo $aux['nome']; ?></option>
                  
                 <?php } ?>
 
                  </select>
                </div>
              </div>
            </div><!--/span-->
          </div>
          
          <div class="row-fluid">

            <div class="span6 bgcolor">
              <div class="control-group">
                <label class="control-label" for="state">Data Inicio</label>
                <div class="controls">
                  <input type="text" id="dt_hr_inicio" name="dt_hr_inicio" class="date"> 
                </div>
              </div>
            </div><!--/span-->
                      <div class="span6 bgcolor">
              <div class="control-group">
                <label class="control-label" for="postCode">Data fim</label>
                <div class="controls">
                  <input type="text" id="dt_hr_fim" name="dt_hr_fim" class="date"> 
                </div>
              </div>
            </div><!--/span-->
          </div><!--/row-->           
          <div class="row-fluid">
  			
      
            <div class="span6 bgcolor">
              <div class="control-group">
                <label class="control-label" for="reponsavel">Bloqueada</label>
                <div class="controls">
                  <select id="reponsavel" name="fl_tarefa_bloqueada">
                  	<option value="1">Sim</option>
                  	<option value="0">Não</option>                  	
                  </select>
                </div>
              </div>         
            </div>  
                        <div class="span6 bgcolor">
              <div class="control-group">
                <label class="control-label" for="reponsavel">Observação</label>
                <div class="controls">
                  <textarea name="observacao"></textarea>
                </div>
              </div>      
              </div>
                
          </div><!--/row-->
          
         
          </fieldset> 
          <div class="span2 botoes" >
          <input type="submit" class="btn" value="Cadastrar">
          <input type="reset" class="btn" value="Limpar">
          </div>
          </form>  
          </div>                     
        </div><!--/span-->
        
        <div class="span4">

        </div><!--/span-->       
      </div><!--/row-->
        <!-- /span6 -->

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
                            Cadastrar</h4>
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
</body>
</html>
