<?php
include("login/seguranca.php"); //Inclui o arquivo com o sistema de segurança
    protegePagina(); // Chama a função que protege a página
?>
<!DOCTYPE html>

<!--[if lt IE 7 ]> <html lang="en" class="ie6 ielt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7 ielt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
<head>
    
<meta charset="utf-8">
<title>Projeto</title>


    <link href="metro/css/metro-bootstrap.css" rel="stylesheet">
    <link href="metro/css/metro-bootstrap-responsive.css" rel="stylesheet">
    <link href="metro/css/iconFont.css" rel="stylesheet">
    <link href="metro/css/docs.css" rel="stylesheet">
    <!--<link href="../metro/css/myStyle.css" rel="stylesheet">-->
    <link href="metro/js/prettify/prettify.css" rel="stylesheet">
    <link rel="stylesheet" href="css/jquery.treegrid.css">
    <link rel="stylesheet" type="text/css" href="css/datepickr.css" /> 
   <!-- <link href="css/bootstrap3.css" rel="stylesheet">-->

    <!-- Load JavaScript Libraries -->
    <script src="metro/js/jquery/jquery.min.js"></script>
    <script src="metro/js/jquery/jquery.widget.min.js"></script>
    <script src="metro/js/jquery/jquery.mousewheel.js"></script>
    <script src="metro/js/prettify/prettify.js"></script>
    <script src="metro/js/metro.min.js"></script>
    <script src="js/jquery.lightbox_me.js"></script>
    

    <!-- Metro UI CSS JavaScript plugins -->
    <script src="metro/js/load-metro.js"></script>

    <!-- Local JavaScript -->
    <script src="metro/js/docs.js"></script>
    <script src="metro/js/github.info.js"></script>
    
    
    <script>    
    
        
        $(document).ready(function(){
            
		$('#formAtt').hide();
                $('#formInsert').hide();
                
                //INSERIR CONTRATO
                $("#inserir").click(function(){

                    $('#formInsert').lightbox_me({                            
                            closeClick: false,
                            onLoad: function(){

                                $('#formInsert').submit(function(e){
                                     var Projeto = new Object();
             

                                     Projeto.nome_projeto =         $(this).find('input[name="nome_projeto"]').val();
                                     Projeto.desc_projeto =         $(this).find('input[name="desc_projeto"]').val();
                                     Projeto.id_contrato =          $(this).find('select[name="id_contrato"]').val();   
                                     Projeto.id_base_operacoes =    $(this).find('select[name="id_base_operacoes"]').val();   
                                     Projeto.id_base_comercial =    $(this).find('select[name="id_base_comercial"]').val();   
                                     Projeto.id_entrega =           $(this).find('select[name="id_entrega"]').val();   
                                     Projeto.id_tipo_inteligencia = $(this).find('select[name="id_tipo_inteligencia"]').val();   
                                     Projeto.id_etapa =             $(this).find('select[name="id_etapa"]').val();   
                
                                     
                                     
                                     var projetoJson = JSON.stringify(Projeto);
                                    
                                    // alert(projetoJson);
                                     
                                    // return false;
                                         //console.log(clienteJson);
                                      $.post('controle/requestsProjeto.php',
                                          {
                                                  action: 'insereProjeto',			
                                                  proj: projetoJson
                                          },
                                          function(data, textStatus){
                                             // alert(data.nome_cliente);
                                              
                                             $("#formInsert").trigger('close');
                                             
                                             $.Dialog({
                                                shadow: true,
                                                overlay: true,
                                                flat: true,
                                                icon: '<span class="icon-download"></span>',
                                                title: 'Projeto',
                                                width: 500,
                                                padding: 10,
                                                onShow: function(){                        
                                                        $('.window-overlay').click(function(){
                                                               location.reload();
                                                         });
                                                        $('div.caption').find('button.btn-close').click(function(){
                                                            location.reload();
                                                        });                                
                                                },
                                                content: 'Projeto inserido com Sucesso!! xD'
                                            });
                                              
                                          }, 
                                          "json"		
                                      );
                                    
                                    e.preventDefault();
                                });
                          	
                            }
                        });
                    
                });//FIIM INSERIR PROJETO
                
                
                    //Editar Contrrato
	           $("a.edit").click(function(e){
                       
                       var txt = $(this).attr('rel');
                       
                       //alert(txt);
                       
                        $("#formAtt").lightbox_me({                            
                            closeClick: false,
                            onLoad: function(){
                              
                                //alert(txt);
                                $.post('controle/requestsProjeto.php',
                                    {
                                            action: 'getProjeto',			
                                            id: txt
                                    },
                                    function(data, textStatus){    
                                        
                                    $("#form").find('input[name="nome_projeto"]').val(data[0].nome_projeto);
                                    $("#form").find('input[name="desc_projeto"]').val(data[0].desc_projeto);
                                    $("#form").find('select[name="id_contrato"] option').filter(function(){
                                            
                                         return $(this).val() ==  data[0].id_contrato;
                                            
                                        }).prop('selected', true);                         
                                            
                                    $("#form").find('select[name="id_base_operacoes"]').filter(function(){
                                            
                                         return $(this).val() ==  data[0].id_base_operacoes;
                                            
                                        }).prop('selected', true);                        
                                    
                                    $("#form").find('select[name="id_base_comercial"]').filter(function(){
                                            
                                         return $(this).val() ==  data[0].id_base_comercial;
                                            
                                        }).prop('selected', true);                        
                                                                        
                                    
                                    $("#form").find('select[name="id_entrega"]').filter(function(){
                                            
                                         return $(this).val() ==  data[0].id_entrega;
                                            
                                        }).prop('selected', true);                 
                                        
                                    $("#form").find('select[name="id_tipo_inteligencia"]').filter(function(){
                                            
                                         return $(this).val() ==  data[0].id_tipo_inteligencia;
                                            
                                        }).prop('selected', true);              
                                        
                                        
                                    $("#form").find('select[name="id_etapa"]').filter(function(){
                                            
                                         return $(this).val() ==  data[0].id_etapa;
                                            
                                        }).prop('selected', true);              

                                        //Atualiza Cliente
                                        $("#form").submit(function(e){

                                            var Projeto = new Object();
                                                    //alert(txt);
                                             Projeto.id = txt;
                                             Projeto.nome_projeto =         $(this).find('input[name="nome_projeto"]').val();
                                             Projeto.desc_projeto =         $(this).find('input[name="desc_projeto"]').val();
                                             Projeto.id_contrato =          $(this).find('select[name="id_contrato"]').val();   
                                             Projeto.id_base_operacoes =    $(this).find('select[name="id_base_operacoes"]').val();   
                                             Projeto.id_base_comercial =    $(this).find('select[name="id_base_comercial"]').val();   
                                             Projeto.id_entrega =           $(this).find('select[name="id_entrega"]').val();   
                                             Projeto.id_tipo_inteligencia = $(this).find('select[name="id_tipo_inteligencia"]').val();   
                                             Projeto.id_etapa =             $(this).find('select[name="id_etapa"]').val();   



                                             var projetoJson = JSON.stringify(Projeto);

                                           // alert(projetoJson);

                                        //  return false;
                                            $.post('controle/requestsProjeto.php',
                                                {
                                                        action: 'atualizaProjeto',			
                                                        proj: projetoJson
                                                },
                                                function(data, textStatus) {
//alert('traaa');

                                                    $("#form").trigger('close');

                                                     $.Dialog({
                                                        shadow: true,
                                                        overlay: true,
                                                        flat: true,
                                                        icon: '<span class="icon-cycle"></span>',
                                                        title: 'Projeto',
                                                        width: 500,
                                                        padding: 10,
                                                        onShow: function(){                        
                                                                $('.window-overlay').click(function(){
                                                                       location.reload();
                                                                 });
                                                                $('div.caption').find('button.btn-close').click(function(){
                                                                    location.reload();
                                                                });                                
                                                        },
                                                        content: 'Projeto Atualizado com Sucesso!! xD'
                                                    });


                                                }, 
                                                "json"		
                                           );	

                                              e.preventDefault();
                                            return false;
                                        });//final Atualiza Cliente
                                        
                                    }, 
                                    "json"		
                                );	
                            }
                        });				
                e.preventDefault();
                });//Final Edita Cliente
            
         
            
            //Remove Contrato
            $("a.excluir").click(function(){
                
                
                if(confirm("Deseja realmente excluir este contrato?")){
                   
               
                
                var idCont = $(this).attr('rel');
                
                //alert(idCli);
                
                   $.post('controle/requestsContrato.php',
                    {
                            action: 'deletaContrato',			
                            id: idCont
                    },
                    function(data, textStatus) {
                        $("#form").trigger('close');
                        
                    
                           $.Dialog({
                            shadow: true,
                            overlay: true,
                            flat: true,
                            icon: '<span class="icon-remove"></span>',
                            title: 'Cliente',
                            width: 500,
                            padding: 10,
                            onShow: function(){                        
                                    $('.window-overlay').click(function(){
                                           location.reload();
                                     });
                                    $('div.caption').find('button.btn-close').click(function(){
                                        location.reload();
                                    });                                
                            },
                            content: 'Contrato deletato com Sucesso!! xD'
                        });
                        
                    }, 
                    "json"		
                  );
                }//final if deseja remover Contrato
            });//final Remove Contrato

            
	});//final ready()
        
    </script>
  
<?php

   include ('conexao.php');
   
   
   
   $con = Conexao::getInstance();
   
   $stmt = $con->prepare("SELECT * FROM projeto");
   $stmt->execute();
   
   
?>
  
<script src="js/jquery.redirect.min.js"></script>

</head>
<body class="metro">
    
    <!--MENU-->
<nav class="navigation-bar dark"> <!-- maybe color: lightOlive-->
    
    <nav class="navigation-bar-content container">
        
        
        <!--Dashboard-->
            <a class="element" href="#">
               <i class="icon-home"></i> Dashboard
            </a><!--Dashboard-->
        <span class="element-divider"></span>
        
        <!--Cliente-->
        <div class="element">
            <a class="dropdown-toggle" href="#"><i class="icon-user"></i> Cliente</a>
            <ul class="dropdown-menu" data-role="dropdown">
                <li><a href="#">Gerenciar</a></li>
                <li class="divider"></li>
                <li><a href="#">Adicionar Contrato</a></li>
                <li class="divider"></li>
                <li><a href="#">Remover</a></li>
            </ul>
        </div><!--Cliente-->
        <!--Contrato-->
        <div class="element">
            <a class="dropdown-toggle" href="#"><i class="icon-book"></i> Contrato</a>
            <ul class="dropdown-menu" data-role="dropdown">
                <li><a href="#">Gerenciar</a></li>
                <li class="divider"></li>
                <li><a href="#">Adicionar Projeto</a></li>
                <li class="divider"></li>
                <li><a href="#">Remover</a></li>
            </ul>
        </div><!--Contrato-->
        <!--Projeto-->
        <div class="element">
            <a class="dropdown-toggle" href="#"><i class="icon-fire"></i> Projeto</a>
            <ul class="dropdown-menu" data-role="dropdown">
                <li><a href="#">Gerenciar</a></li>
                <li class="divider"></li>
                <li><a href="#">Remover</a></li>
            </ul>
        </div><!--Projeto-->
 
 
        <!--
        <span class="element-divider"></span>
        <a class="element brand" href="#"><span class="icon-spin"></span></a>
        <a class="element brand" href="#"><span class="icon-printer"></span></a>
        -->
        <span class="element-divider"></span>
 
        <!--buscar-->
        <div class="element input-element">
            <form>
                <div class="input-control text">
                    <input type="text" placeholder="Buscar...">
                    <button class="btn-search"></button>
                </div>
            </form>
        </div><!--buscar-->
 
    
        <div class="element place-right">
            <a class="dropdown-toggle" href="#">
                <span class="icon-cog"></span>
            </a>
            <ul class="dropdown-menu place-right" data-role="dropdown">
                <li><a href="#">Conta</a></li>
                <li><a href="href=login/logout.php">Logout</a></li>
            </ul>
        </div>
        <span class="element-divider place-right"></span>
        <span class="element-divider place-right"></span>
        <button class="element image-button image-left place-right">
            <?php echo $_SESSION['usuarioNome'] ." ". $_SESSION['usuarioSobreNome'];?> 
            <img src="http://www.insoonia.com/wp-content/uploads/2013/11/meme.jpg"/>
        </button>
    </nav>
</nav><!--MENU-->
    


<div class="container espaco">

    <div class="grid fluid">
        <div class="row">
            
            <button id="inserir" class="bg-green fg-white">
               <i class="icon-user-2 on-left-more"></i>
               Cadastrar Projeto
             </button>
            <table class="table bordered hovered espaco">
  <tbody>
  <tr>
      <th>Projeto</th>
      <th colspan = "2">Ações</th>
  </tr>
  </tbody>
  
 
 <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ if($row['fl_inativo'] != 1){ ?>
 
 
  <tr>
    <td> <?php echo $row['nome_projeto'] ?></td>    
    <td> <a class="edit" onclick="return false" name="nome" href="Cliente.php" rel="<?php echo $row['id_projeto']; ?>">Editar</a> </td>
    <td> <a class="excluir" onclick="return false"  href="Cliente.php" rel="<?php echo $row['id_projeto']; ?>"> Excluir </a> </td>
  </tr>
 
 <?php	} } ?>
</table>
            
            
        </div><!--final row-->
    </div><!--final grid-->
</div><!--final container-->

<!--FORMULARIO DE ATUALIZAÇÂO-->
<div id="formAtt" class="span9">
                <div class="example">
                    	<section id="content">
                    		
                                <form id="form" method="POST" action="">
                                   <legend>Você está inserindo um projeto</legend>    

                                    <label>Projeto</label>
                                    <div class="input-control text">
                                        <input type="text" value="" placeholder="Nome do projeto" name="nome_projeto"/>
                                        <button class="btn-clear"></button>
                                    </div>
                                    <label>Descrição</label>
                                    <div class="input-control text">
                                        <input type="text" value="" placeholder="Descriçao do projeto" name="desc_projeto"/>
                                       <button class="btn-clear"></button>
                                    </div>
                                    <label>Contrato</label>
                                    <div class="input-control select">
                                        <select name="id_contrato">
                                           <?php
                                                $stmt = $con->prepare("SELECT id_contrato, nome_contrato FROM contrato;");
                                                $stmt->execute();
                                                while($tes = $stmt->fetch(PDO::FETCH_ASSOC)){
                                           ?>
                                                         <option value="<?php echo $tes['id_contrato']; ?>"><?php echo $tes['nome_contrato']; ?></option>

                                          <?php } ?>
                                        </select>
                                    </div>
                                    <label>Base Operacional</label>
                                    <div class="input-control select">
                                        <select name="id_base_operacoes">
                                           <?php
                                                $stmt = $con->prepare("SELECT id_base_operacoes, nome_base_operacoes FROM base_operacoes;");
                                                $stmt->execute();
                                                while($tes = $stmt->fetch(PDO::FETCH_ASSOC)){
                                           ?>
                                                         <option value="<?php echo $tes['id_base_operacoes']; ?>"><?php echo $tes['nome_base_operacoes']; ?></option>

                                          <?php } ?>
                                        </select>
                                    </div>  
                                    <label>Base Comercial</label>
                                    <div class="input-control select">
                                        <select name="id_base_comercial">
                                           <?php
                                                $stmt = $con->prepare("SELECT id_base_comercial, nome_base_comercial FROM base_comercial;");
                                                $stmt->execute();
                                                while($tes = $stmt->fetch(PDO::FETCH_ASSOC)){
                                           ?>
                                                         <option value="<?php echo $tes['id_base_comercial']; ?>"><?php echo $tes['nome_base_comercial']; ?></option>

                                          <?php } ?>
                                        </select>
                                    </div>
                                    <label>Entrega</label>
                                    <div class="input-control select">
                                        <select name="id_entrega">
                                           <?php
                                                $stmt = $con->prepare("SELECT id_entrega, nome_entrega FROM entrega;");
                                                $stmt->execute();
                                                while($tes = $stmt->fetch(PDO::FETCH_ASSOC)){
                                           ?>
                                                         <option value="<?php echo $tes['id_entrega']; ?>"><?php echo $tes['nome_entrega']; ?></option>

                                          <?php } ?>
                                        </select>
                                    </div>
                                    <label>Tipo Inteligencia</label>
                                    <div class="input-control select">
                                        <select name="id_tipo_inteligencia">
                                           <?php
                                                $stmt = $con->prepare("SELECT id_tipo_inteligencia, nome_tipo_inteligencia FROM tipo_inteligencia;");
                                                $stmt->execute();
                                                while($tes = $stmt->fetch(PDO::FETCH_ASSOC)){
                                           ?>
                                                         <option value="<?php echo $tes['id_tipo_inteligencia']; ?>"><?php echo $tes['nome_tipo_inteligencia']; ?></option>

                                          <?php } ?>
                                        </select>
                                    </div>
                                    <label>Etapa</label>
                                    <div class="input-control select">
                                        <select name="id_etapa">
                                           <?php
                                                $stmt = $con->prepare("SELECT id_etapa, nome_etapa FROM etapa;");
                                                $stmt->execute();
                                                while($tes = $stmt->fetch(PDO::FETCH_ASSOC)){
                                           ?>
                                                         <option value="<?php echo $tes['id_etapa']; ?>"><?php echo $tes['nome_etapa']; ?></option>

                                          <?php } ?>
                                        </select>
                                    </div>         

                                    <input type="submit" value="Atualizar"/>
                                    <input type="reset" value="Cancelar" class="close"/>
                    	       </form><!-- form -->
                    	</section><!-- content -->
                </div><!-- container -->
          
             
            </div><!--span9--><!--FORMULARIO DE ATUALIZAÇÂO-->
            
            <!--FORMULARIO DE INSERÇÃO-->
            <div id="formInsert" class="span9">
              
                 <div class="example">
                    	<section id="content">
                    		
                                <form method="POST" action="valida.php">
                                    <legend>Você está inserindo um projeto</legend>    

                                    <label>Projeto</label>
                                    <div class="input-control text">
                                        <input type="text" value="" placeholder="Nome do projeto" name="nome_projeto"/>
                                        <button class="btn-clear"></button>
                                    </div>
                                    <label>Descrição</label>
                                    <div class="input-control text">
                                        <input type="text" value="" placeholder="Descriçao do projeto" name="desc_projeto"/>
                                       <button class="btn-clear"></button>
                                    </div>
                                    <label>Contrato</label>
                                    <div class="input-control select">
                                        <select name="id_contrato">
                                           <?php
                                                $stmt = $con->prepare("SELECT id_contrato, nome_contrato FROM contrato;");
                                                $stmt->execute();
                                                while($tes = $stmt->fetch(PDO::FETCH_ASSOC)){
                                           ?>
                                                         <option value="<?php echo $tes['id_contrato']; ?>"><?php echo $tes['nome_contrato']; ?></option>

                                          <?php } ?>
                                        </select>
                                    </div>
                                    <label>Base Operacional</label>
                                    <div class="input-control select">
                                        <select name="id_base_operacoes">
                                           <?php
                                                $stmt = $con->prepare("SELECT id_base_operacoes, nome_base_operacoes FROM base_operacoes;");
                                                $stmt->execute();
                                                while($tes = $stmt->fetch(PDO::FETCH_ASSOC)){
                                           ?>
                                                         <option value="<?php echo $tes['id_base_operacoes']; ?>"><?php echo $tes['nome_base_operacoes']; ?></option>

                                          <?php } ?>
                                        </select>
                                    </div>  
                                    <label>Base Comercial</label>
                                    <div class="input-control select">
                                        <select name="id_base_comercial">
                                           <?php
                                                $stmt = $con->prepare("SELECT id_base_comercial, nome_base_comercial FROM base_comercial;");
                                                $stmt->execute();
                                                while($tes = $stmt->fetch(PDO::FETCH_ASSOC)){
                                           ?>
                                                         <option value="<?php echo $tes['id_base_comercial']; ?>"><?php echo $tes['nome_base_comercial']; ?></option>

                                          <?php } ?>
                                        </select>
                                    </div>
                                    <label>Entrega</label>
                                    <div class="input-control select">
                                        <select name="id_entrega">
                                           <?php
                                                $stmt = $con->prepare("SELECT id_entrega, nome_entrega FROM entrega;");
                                                $stmt->execute();
                                                while($tes = $stmt->fetch(PDO::FETCH_ASSOC)){
                                           ?>
                                                         <option value="<?php echo $tes['id_entrega']; ?>"><?php echo $tes['nome_entrega']; ?></option>

                                          <?php } ?>
                                        </select>
                                    </div>
                                    <label>Tipo Inteligencia</label>
                                    <div class="input-control select">
                                        <select name="id_tipo_inteligencia">
                                           <?php
                                                $stmt = $con->prepare("SELECT id_tipo_inteligencia, nome_tipo_inteligencia FROM tipo_inteligencia;");
                                                $stmt->execute();
                                                while($tes = $stmt->fetch(PDO::FETCH_ASSOC)){
                                           ?>
                                                         <option value="<?php echo $tes['id_tipo_inteligencia']; ?>"><?php echo $tes['nome_tipo_inteligencia']; ?></option>

                                          <?php } ?>
                                        </select>
                                    </div>
                                    <label>Etapa</label>
                                    <div class="input-control select">
                                        <select name="id_etapa">
                                           <?php
                                                $stmt = $con->prepare("SELECT id_etapa, nome_etapa FROM etapa;");
                                                $stmt->execute();
                                                while($tes = $stmt->fetch(PDO::FETCH_ASSOC)){
                                           ?>
                                                         <option value="<?php echo $tes['id_etapa']; ?>"><?php echo $tes['nome_etapa']; ?></option>

                                          <?php } ?>
                                        </select>
                                    </div>                                       
                                    <input type="submit" value="Inserir"/>
                                    <input type="reset" value="Cancelar" class="close"/>
                    	       </form><!-- form -->
                    	</section><!-- content -->
                </div><!-- container -->
          
                
            </div><!--span9--><!--FIM FORMULARIO DE INSERÇÂO-->
            
                      

            <script type="text/javascript" src="js/jquery.mask.min.js"></script>


</html>
