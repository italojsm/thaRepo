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
<title>Cliente</title>


    <link href="metro/css/metro-bootstrap.css" rel="stylesheet">
    <link href="metro/css/metro-bootstrap-responsive.css" rel="stylesheet">
    <link href="metro/css/iconFont.css" rel="stylesheet">
    <link href="metro/css/docs.css" rel="stylesheet">
    <!--<link href="../metro/css/myStyle.css" rel="stylesheet">-->
    <link href="metro/js/prettify/prettify.css" rel="stylesheet">
    <link rel="stylesheet" href="css/jquery.treegrid.css">
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
	
		$('#form').hide();
                
                
                $("#teste").click(function(){
                            $.Dialog({
                        shadow: true,
                        overlay: false,
                        icon: '<span class="icon-rocket"></span>',
                        title: 'Cliente',
                        width: 500,
                        padding: 10,
                        content: 'Cliente Atualizado com Sucesso!! xD'
                    });
                    
                });
                
	
	           $("a.edit").click(function(e){
                       
                       var txt = $(this).attr('rel');
                       
                        $("#form").lightbox_me({                            
                            closeClick: false,
                            onLoad: function(){
                                
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
                                        $("#form").find('input[name="nome_cont_financeiro"]').val(data[0].nome_cont_financeiro);
                                        $("#form").find('input[name="tel_cont_financeiro"]').val(data[0].tel_cont_financeiro);
                                        $("#form").find('input[name="email_boleto"]').val(data[0].email_boleto);                                       
                                    }, 
                                    "json"		
                                );	
                            }
                        });				
                e.preventDefault();
                });
            
            $("#form").submit(function(){
                
                //alert('alohaaa');
                var Cliente = new Object();
                
                var txt = $('a.edit').attr('rel');
                
                
                 Cliente.id =                   txt;
                 Cliente.nome_cliente =         $(this).find('input[name="nome_cliente"]').val();
                 Cliente.cnpj =                 $(this).find('input[name="cnpj"]').val();
                 Cliente.razao_social =         $(this).find('input[name="razao_social"]').val();
                 Cliente.nome_fantasia =        $(this).find('input[name="nome_fantasia"]').val();
                 Cliente.nome_repr_legal =      $(this).find('input[name="nome_repr_legal"]').val();
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
                            overlay: false,
                            icon: '<span class="icon-rocket"></span>',
                            title: 'Cliente',
                            width: 500,
                            padding: 10,
                            content: 'Cliente Atualizado com Sucesso!! xD'
                        });

                    }, 
                    "json"		
               );	
                
                 location.reload();
                return false;
            });//final submit form
            
            
	});
        
    </script>
  
<?php

   include ('conexao.php');
   
   
   
   $con = Conexao::getInstance();
   
   $stmt = $con->prepare("SELECT * FROM cliente");
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
            
            <table class="table bordered hovered">
  <tbody>
  <tr>
      <th>Cliente</th>
      <th colspan = "2">Ações</th>
  </tr>
  </tbody>
  
 
 <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ if($row['fl_inativo'] != 1){ ?>
 
 
  <tr>
    <td> <?php echo $row['nome_cliente'] ?></td>    
    <td> <a class="edit" onclick="return false" name="nome" href="Cliente.php" rel="<?php echo $row['id_cliente']; ?>">Editar</a> </td>
    <td> <a class="excluir" onclick="return false"  href="Cliente.php" rel="<?php echo $row['id_cliente']; ?>"> Excluir </a> </td>
  </tr>
 
 <?php	} } ?>
</table>
            
            
        </div><!--final row-->
    </div><!--final grid-->
</div><!--final container-->
    


<div id="form" class="span9">
                <div class="example">
                    	<section id="content">
                    		
                                <form method="POST" action="valida.php">
                                    <legend>Você está editando um cliente</legend>    

                                    <label>Cliente</label>
                                    <div class="input-control text">
                                        <input type="text" value="" placeholder="Nome do cleinte" name="nome_cliente"/>
                                        <button class="btn-clear"></button>
                                    </div>
                                    <label>CNPJ</label>
                                    <div class="input-control number">
                                        <input type="text" value="" placeholder="CNPJ" name="cnpj"/>
                                       <button class="btn-clear"></button>
                                    </div>
                                          <label>Razão Social</label>
                                    <div class="input-control text">
                                        <input type="text" value="" placeholder="Razão Social" name="razao_social"/>
                                        <button class="btn-clear"></button>
                                    </div>
                                    <label>Nome Fantasia</label>
                                    <div class="input-control text">
                                        <input type="text" value="" placeholder="Nome Fantasia" name="nome_fantasia"/>
                                        <button class="btn-clear"></button>
                                    </div>
                                       <label>Responsavel</label>
                                    <div class="input-control select">
                                        <select>
                                            <option>Herpino</option>
                                            <option>Derpino</option>
                                        </select>
                                    </div>
                                     <label>Representante Legal</label>
                                    <div class="input-control password">
                                        <input type="text" value="" placeholder="Representante Legal" name="nome_repr_legal"/>
                                        <button class="btn-clear"></button>
                                    </div>
                                           <label>Controle Financeiro</label>
                                    <div class="input-control password">
                                        <input type="text" value="" placeholder="Controle Financeiro" name="nome_cont_financeiro"/>
                                       <button class="btn-clear"></button>
                                    </div>
                                     <label>Tel Controle Financeiro</label>
                                    <div class="input-control password">
                                        <input type="text" value="" placeholder="Representante Legal" data-mask="0000-0000"  class="telefone" name="tel_cont_financeiro"/>
                                       <button class="btn-clear"></button>
                                    </div> 
                                     <label>Email</label>
                                    <div class="input-control password">
                                        <input type="text" value="" placeholder="Email" name="email_boleto"/>
                                       <button class="btn-clear"></button>
                                    </div>

                                    <input type="submit" value="Atualizar" id="atualizar"/>
                                    <input type="reset" value="Cancelar" class="close"/>
                    	       </form><!-- form -->
                    	</section><!-- content -->
                </div><!-- container -->
          
            </div><!--span9-->
            
            
            <script type="text/javascript" src="js/jquery.mask.min.js"></script>

		<script type="text/javascript">			
                       $(function(){
                         
                           // $('.telefone').mask('0000-0000');
                            
                        });
                        
		</script>
</body>
</html>
