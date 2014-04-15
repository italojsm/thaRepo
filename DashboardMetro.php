<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6 ielt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7 ielt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<title>Dashboard</title>


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
    <script type="text/javascript" src="js/jquery.treegrid.js"></script>

    <!-- Metro UI CSS JavaScript plugins -->
    <script src="metro/js/load-metro.js"></script>

    <!-- Local JavaScript -->
    <script src="metro/js/docs.js"></script>
    <script src="metro/js/github.info.js"></script>


<script type="text/javascript">
  
  $(document).ready(function(){
      
      $('.tree').treegrid({
          expanderExpandedClass: 'icon-arrow-down-5',
          expanderCollapsedClass: 'icon-arrow-right-5'
      });
      
  });
  
</script>

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
                <li><a href="#">Logout</a></li>
            </ul>
        </div>
        <span class="element-divider place-right"></span>
        <span class="element-divider place-right"></span>
        <button class="element image-button image-left place-right">
            Derp Meme
            <img src="http://www.insoonia.com/wp-content/uploads/2013/11/meme.jpg"/>
        </button>
    </nav>
</nav><!--MENU-->



<div class="container espaco">

<div class="grid fluid">
    <div class="row">

    <div class="span3">
    
        <nav class="sidebar (light)">
            <ul>
                <!--Cliente-->
                <li class="stick (bg-yellow)">
                    <a class="dropdown-toggle" href="#"><i class="icon-user"></i>Cliente</a>
                    <ul class="dropdown-menu" data-role="dropdown">
                        <li><a href="">Subitem 1</a></li>
                        <li><a href="">Subitem 2</a></li>
                        <li><a href="">Subitem 3</a></li>
                        <li class="divider"></li>
                        <li><a href="">Subitem 4</a></li>
                        <li class="disabled"><a href="">Subitem 4</a></li>
                    </ul>
                </li><!--Cliente-->
                
                <!--Contrato-->
                <li class="stick (bg-yellow)">
                    <a class="dropdown-toggle" href="#"><i class="icon-book"></i>Contrato</a>
                    <ul class="dropdown-menu" data-role="dropdown">
                        <li><a href="">Subitem 1</a></li>
                        <li><a href="">Subitem 2</a></li>
                        <li><a href="">Subitem 3</a></li>
                        <li class="divider"></li>
                        <li><a href="">Subitem 4</a></li>
                        <li class="disabled"><a href="">Subitem 4</a></li>
                    </ul>
                </li><!--Contrato-->
                
                <!--Projeto-->
                <li class="stick (bg-yellow)">
                    <a class="dropdown-toggle" href="#"><i class="icon-fire"></i>Projeto</a>
                    <ul class="dropdown-menu" data-role="dropdown">
                        <li><a href="">Subitem 1</a></li>
                        <li><a href="">Subitem 2</a></li>
                        <li><a href="">Subitem 3</a></li>
                        <li class="divider"></li>
                        <li><a href="">Subitem 4</a></li>
                        <li class="disabled"><a href="">Subitem 4</a></li>
                    </ul>
                </li><!--Projeto-->
        
            </ul>
        </nav>
    </div>
    
    
    <div class="span9">
    
    
    <p class="description bg-grayLighter padding20">
       <strong>Visão Geral</strong>
       <strong><?php echo date('d-m-Y');?></strong>
    </p>
    
    <!--Objeto Visão Geral-->
             <table class="tree table bordered hovered">
         
            <thead>
               <tr>
                    <th>Tipo </th>
                    <th> Rentabilidade R$ Realizada</th>
                    <th> Rentabilidade R$ Prevista</th>
                    <th> Rentabilidade % Realizada</th>
                    <th> Rentabilidade % Prevista</th>
                  </tr>
            </thead>
            
             <tbody>
             
            	<tr class="success">
            	    <td> Projeto </td>
                    <td> 95 </td>
                    <td> 90 </td>
                    <td> 90 %</td>
                    <td> 91 %</td>
            	</tr>
            	<tr>
            		<td> Projeto </td>
                    <td> 95 </td>
                    <td> 90 </td>
                    <td> 90 %</td>
                    <td> 91 %</td>
            	</tr>
            	<tr class="warning">
            		 <td> Projeto </td>
                    <td> 95 </td>
                    <td> 90 </td>
                    <td> 51 %</td>
                    <td> 55 %</td>
            	</tr>
            	<tr>
            		<td> Projeto </td>
                    <td> 45 </td>
                    <td> 40 </td>
                    <td> 31 %</td>
                    <td> 30 %</td>
            	</tr>
            	<tr>
            		<td> Projeto </td>
                    <td> 45 </td>
                    <td> 40 </td>
                    <td> 31 %</td>
                    <td> 30 %</td>
            	</tr>
            	<tr class="error">
            		<td> Projeto </td>
                    <td> 45 </td>
                    <td> 40 </td>
                    <td> 31 %</td>
                    <td> 30 %</td>
            	</tr>
             </tbody>
        </table><!--Objeto Visão Geral-->
    
    
    
        <!--Objeto Detalhamento-->
         <table class="tree table bordered hovered">
         
            <thead>
               <tr>
                    <th>Cliente </th>
                    <th> Rentabilidade R$ Realizada</th>
                    <th> Rentabilidade R$ Prevista</th>
                    <th> Rentabilidade % Realizada</th>
                    <th> Rentabilidade % Prevista</th>
                  </tr>
            </thead>
            
             <tbody>
             
            	<tr class="treegrid-1">
            	    <td> Projeto </td>
                    <td> 95 </td>
                    <td> 90 </td>
                    <td> 90 %</td>
                    <td> 91 %</td>
            	</tr>
            	<tr class="treegrid-2 treegrid-parent-1 ">
            		<td> Etapa </td>
                    <td> 95 </td>
                    <td> 90 </td>
                    <td> 90 %</td>
                    <td> 91 %</td>
            	</tr>
            	<tr class="treegrid-3 treegrid-parent-2 warning">
            		 <td> Atividade </td>
                    <td> 95 </td>
                    <td> 90 </td>
                    <td> 51 %</td>
                    <td> 55 %</td>
            	</tr>
            	<tr class="treegrid-4 treegrid-parent-3 success">
            		<td> Tarefa </td>
                    <td> 45 </td>
                    <td> 40 </td>
                    <td> 31 %</td>
                    <td> 30 %</td>
            	</tr>
            	<tr class="treegrid-5 treegrid-parent-3">
            		<td> Tarefa </td>
                    <td> 45 </td>
                    <td> 40 </td>
                    <td> 31 %</td>
                    <td> 30 %</td>
            	</tr>
             </tbody>
        </table>  <!--Objeto Detalhamento-->

            <div>
              <button class="button success">Sucesso!!</button>
              <button class="button warning">Cuidado heim!</button>
              <button class="button bg-red fg-white">Ta mal!</button>
            </div>
    </div>
    
   </div> 
  </div> 
    
</div>



</body>
</html>
