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
<title>Contrato</title>


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
    
    
    <script>                jQuery.fn.center = function () {
    this.css("position","absolute");
    this.css("top", Math.max(0, (($(window).height() - $(this).outerHeight()) / 2) + 
                                                $(window).scrollTop()) + "px");
    this.css("left", Math.max(0, (($(window).width() - $(this).outerWidth()) / 2) + 
                                                $(window).scrollLeft()) + "px");
    return this;
};
    
        
        $(document).ready(function(){
            
		$('#formAtt').hide();
                $('#formInsert').hide();
                
                //INSERIR CLIENTE
                $("#inserir").click(function(){

                    $('#formInsert').lightbox_me({                            
                            closeClick: false,
                            onLoad: function(){

                                $('#formInsert').submit(function(e){
                                     var Cliente = new Object();
             
/*
                                     Cliente.nome_cliente =         $(this).find('input[name="nome_cliente"]').val();
                                     Cliente.cnpj =                 $(this).find('input[name="cnpj"]').val();
                                     Cliente.razao_social =         $(this).find('input[name="razao_social"]').val();
                                     Cliente.nome_fantasia =        $(this).find('input[name="nome_fantasia"]').val();
                                     Cliente.nome_repr_legal =      $(this).find('input[name="nome_repr_legal"]').val();
                                     Cliente.id_resp_cliente =      $(this).find('select[name="id_resp_cliente"]').val();
                                     Cliente.nome_cont_financeiro = $(this).find('input[name="nome_cont_financeiro"]').val();
                                     Cliente.tel_cont_financeiro =  $(this).find('input[name="tel_cont_financeiro"]').val();
                                     Cliente.email_boleto =         $(this).find('input[name="email_boleto"]').val();     
                
                                     
        
                                     var clienteJson = JSON.stringify(Cliente);
                                    
                                    //alert(clienteJso);
                                         //console.log(clienteJson);
                                      $.post('controle/requests.php',
                                          {
                                                  action: 'insereCliente',			
                                                  clie: clienteJson
                                          },
                                          function(data, textStatus){
                                             // alert(data.nome_cliente);
                                              
                                             $("#formInsert").trigger('close');
                                             
                                             $.Dialog({
                                                shadow: true,
                                                overlay: true,
                                                flat: true,
                                                icon: '<span class="icon-download"></span>',
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
                                                content: 'Cliente inserido com Sucesso!! xD'
                                            });
                                              
                                          }, 
                                          "json"		
                                      );
                                    */
                                    e.preventDefault();
                                });
                          	
                            }
                        });
                    
                });//FINAL INSERIR CLIENTE
                
                
                    //Editar Cliente
	           $("a.edit").click(function(e){
                       
                       var txt = $(this).attr('rel');
                       
                       //alert(txt);
                       
                        $("#formAtt").lightbox_me({                            
                            closeClick: false,
                            onLoad: function(){
                 /*               
                                //alert(txt);
                                $.post('controle/requests.php',
                                    {
                                            action: 'getCliente',			
                                            id: txt
                                    },
                                    function(data, textStatus){           
                                        $("#form").find('input[name="nome_cliente"]').val(data[0].nome_cliente);
                                        $("#form").find('input[name="cnpj"]').val(data[0].cnpj);
                                        $("#form").find('input[name="razao_social"]').val(data[0].razao_social);
                                        $("#form").find('input[name="nome_fantasia"]').val(data[0].nome_fantasia);
                                        $("#form").find('input[name="nome_repr_legal"]').val(data[0].nome_repr_legal);
                                        $("#form").find('select[name="id_resp_cliente"] option').filter(function(){
                                            
                                            //alert(this).text();
                                            //return $(this).text() ==  data[0].id_resp_cliente;
                                           return $(this).val() ==  data[0].id_resp_cliente;
                                            
                                        }).prop('selected', true);
                                        $("#form").find('input[name="nome_cont_financeiro"]').val(data[0].nome_cont_financeiro);
                                        $("#form").find('input[name="tel_cont_financeiro"]').val(data[0].tel_cont_financeiro);
                                        $("#form").find('input[name="email_boleto"]').val(data[0].email_boleto);     
                                        

                                                                       //Atualiza Cliente
                                        $("#form").submit(function(e){

                                            //alert('alohaaa');
                                            var Cliente = new Object();

                                            //AQUI ESTA DANDO UMA TRETA PORQUE ESTA PEGANDO O PRIMEIRO A.EDIT E NAO O A.EDIT CLICADO.. VERIFICAR SAPORRA
                                            //var txt = $('a.edit').attr('rel');
                                            
                                             Cliente.id =                   txt;
                                             Cliente.nome_cliente =         $(this).find('input[name="nome_cliente"]').val();
                                             Cliente.cnpj =                 $(this).find('input[name="cnpj"]').val();
                                             Cliente.razao_social =         $(this).find('input[name="razao_social"]').val();
                                             Cliente.nome_fantasia =        $(this).find('input[name="nome_fantasia"]').val();
                                             Cliente.nome_repr_legal =      $(this).find('input[name="nome_repr_legal"]').val();
                                             Cliente.id_resp_cliente =      $(this).find('select[name="id_resp_cliente"]').val();
                                             Cliente.nome_cont_financeiro = $(this).find('input[name="nome_cont_financeiro"]').val();
                                             Cliente.tel_cont_financeiro =  $(this).find('input[name="tel_cont_financeiro"]').val();
                                             Cliente.email_boleto =         $(this).find('input[name="email_boleto"]').val();     

                                            var clienteJson = JSON.stringify(Cliente);

                                           // alert(clienteJson);

                                           // return false;
                                            $.post('controle/requests.php',
                                                {
                                                        action: 'atualizaCliente',			
                                                        clien: clienteJson
                                                },
                                                function(data, textStatus) {


                                                    $("#form").trigger('close');

                                                     $.Dialog({
                                                        shadow: true,
                                                        overlay: true,
                                                        flat: true,
                                                        icon: '<span class="icon-cycle"></span>',
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
                                                        content: 'Cliente Atualizado com Sucesso!! xD'
                                                    });


                                                }, 
                                                "json"		
                                           );	

                                              e.preventDefault();
                                            return false;
                                        });//final Atualiza Cliente
                                        
                                    }, 
                                    "json"		
                                );	*/
                            }
                        });				
                e.preventDefault();
                });//Final Edita Cliente
            
         
            
            //Remove Cliente
            $("a.excluir").click(function(){
                
                
                if(confirm("Deseja realmente excluir este contrato?")){
                   
               
                
                var idCli = $(this).attr('rel');
                
                //alert(idCli);
    /*            
                   $.post('controle/requests.php',
                    {
                            action: 'deletaCliente',			
                            id: idCli
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
                            content: 'Cliente deletato com Sucesso!! xD'
                        });
                        
                    }, 
                    "json"		
                  );*/
                }//final if deseja remover cliente
            });//final Remove Cliente

            
	});//final ready()
        
    </script>
  
<?php

   include ('conexao.php');
   
   
   
   $con = Conexao::getInstance();
   
   $stmt = $con->prepare("SELECT * FROM contrato");
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
               Cadastrar Contrato
             </button>
            <table class="table bordered hovered espaco">
  <tbody>
  <tr>
      <th>Cliente</th>
      <th colspan = "2">Ações</th>
  </tr>
  </tbody>
  
 
 <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ if($row['fl_inativo'] != 1){ ?>
 
 
  <tr>
    <td> <?php echo $row['nome_contrato'] ?></td>    
    <td> <a class="edit" onclick="return false" name="nome" href="Cliente.php" rel="<?php echo $row['id_cotnrato']; ?>">Editar</a> </td>
    <td> <a class="excluir" onclick="return false"  href="Cliente.php" rel="<?php echo $row['id_cotnrato']; ?>"> Excluir </a> </td>
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
                                    <legend>Você está editando um contrato</legend>    
                                    
                                    <label>Contrato</label>
                                    <div class="input-control text">
                                        <input type="text" value="" placeholder="Nome do contrato" name="nome_contrato"/>
                                        <button class="btn-clear"></button>
                                    </div>
                                    <label>Descrição</label>
                                    <div class="input-control number">
                                        <input type="text" value="" placeholder="Descriçao do contrato" name="desc_contrato"/>
                                       <button class="btn-clear"></button>
                                    </div>
                                          <label>Responsavel Contrato</label>
                                    <div class="input-control select">
                                        <select name="id_resp_vigencia">
                                           <?php
                                                $stmt = $con->prepare("SELECT id_funcionario, nome FROM funcionario;");
                                                $stmt->execute();
                                                while($tes = $stmt->fetch(PDO::FETCH_ASSOC)){
                                           ?>
                                                         <option value="<?php echo $tes['id_funcionario']; ?>"><?php echo $tes['nome']; ?></option>

                                          <?php } ?>
                                        </select>
                                    </div>
                                    <label>Inicio Vigencia</label>
                                    <div class="input-control text" data-role="datepicker" data-format="dd/mm/yyyy"  data-effect="slide" data-week-start="1" >
                                        <input type="text" placeholder="Data de fim da vigencia" name="dt_inicio_vigencia"/>
                                    <button class="btn-date"></button>
                                </div>
                                      <label>Final Vigencia</label>
                                    <div class="input-control text" data-role="datepicker" data-format="dd/mm/yyyy" data-effect="slide" data-week-start="1" >
                                        <input type="text" value="" placeholder="Data de fim da vigencia" name="dt_fim_vigencia"/>
                                        <button class="btn-date"></button>
                                    </div>
                                       <label>Cliente</label>
                                    <div class="input-control select">
                                        <select name="id_cliente">
                                           <?php
                                                $stmt = $con->prepare("SELECT id_cliente, nome_cliente FROM cliente;");
                                                $stmt->execute();
                                                while($tes = $stmt->fetch(PDO::FETCH_ASSOC)){
                                           ?>
                                                         <option value="<?php echo $tes['id_cliente']; ?>"><?php echo $tes['nome_cliente']; ?></option>

                                          <?php } ?>
                                        </select>
                                    </div>

                                    <input type="submit" value="Inserir"/>
                                    <input type="reset" value="Cancelar" class="close"/>
                    	       </form><!-- form -->
                    	</section><!-- content -->
                </div><!-- container -->
          
             
            </div><!--span9--><!--FORMULARIO DE ATUALIZAÇÂO-->
            
            <!--FORMULARIO DE INSERÇÂO-->
            <div id="formInsert" class="span9">
              
                 <div class="example">
                    	<section id="content">
                    		
                                <form method="POST" action="valida.php">
                                    <legend>Você está inserindo um contrato</legend>    

                                    <label>Contrato</label>
                                    <div class="input-control text">
                                        <input type="text" value="" placeholder="Nome do contrato" name="nome_contrato"/>
                                        <button class="btn-clear"></button>
                                    </div>
                                    <label>Descrição</label>
                                    <div class="input-control number">
                                        <input type="text" value="" placeholder="Descriçao do contrato" name="desc_contrato"/>
                                       <button class="btn-clear"></button>
                                    </div>
                                          <label>Responsavel Contrato</label>
                                    <div class="input-control select">
                                        <select name="id_resp_vigencia">
                                           <?php
                                                $stmt = $con->prepare("SELECT id_funcionario, nome FROM funcionario;");
                                                $stmt->execute();
                                                while($tes = $stmt->fetch(PDO::FETCH_ASSOC)){
                                           ?>
                                                         <option value="<?php echo $tes['id_funcionario']; ?>"><?php echo $tes['nome']; ?></option>

                                          <?php } ?>
                                        </select>
                                    </div>
                                    <label>Inicio Vigencia</label>
                                    <div class="input-control text" data-role="datepicker" data-format="dd/mm/yyyy"  data-effect="slide" data-week-start="1" >
                                        <input type="text" placeholder="Data de fim da vigencia" name="dt_inicio_vigencia"/>
                                    <button class="btn-date"></button>
                                </div>
                                      <label>Final Vigencia</label>
                                    <div class="input-control text" data-role="datepicker" data-format="dd/mm/yyyy" data-effect="slide" data-week-start="1" >
                                        <input type="text" value="" placeholder="Data de fim da vigencia" name="dt_fim_vigencia"/>
                                        <button class="btn-date"></button>
                                    </div>
                                       <label>Cliente</label>
                                    <div class="input-control select">
                                        <select name="id_cliente">
                                           <?php
                                                $stmt = $con->prepare("SELECT id_cliente, nome_cliente FROM cliente;");
                                                $stmt->execute();
                                                while($tes = $stmt->fetch(PDO::FETCH_ASSOC)){
                                           ?>
                                                         <option value="<?php echo $tes['id_cliente']; ?>"><?php echo $tes['nome_cliente']; ?></option>

                                          <?php } ?>
                                        </select>
                                    </div>

                                    <input type="submit" value="Inserir"/>
                                    <input type="reset" value="Cancelar" class="close"/>
                    	       </form><!-- form -->
                    	</section><!-- content -->
                </div><!-- container -->
          
                
            </div><!--span9--><!--FORMULARIO DE INSERÇÂO-->
            
                      <!--FORMULARIO DE INSERÇÂO-->

            <script type="text/javascript" src="js/jquery.mask.min.js"></script>


</html>
