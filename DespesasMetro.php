<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6 ielt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7 ielt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<title>Despesas</title>

<?php
   
   include ('conexao.php');
   
   
   $con = Conexao::getInstance();
   
?>


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
    <!--<script src="metro/js/metro/metro-calendar.js"></script>-->
    <!--<script src="metro/js/metro/metro-datepicker.js"></script>-->
    <script type="text/javascript" src="js/jquery.treegrid.js"></script>

    <!-- Metro UI CSS JavaScript plugins -->
    <script src="metro/js/load-metro.js"></script>

    <!-- Local JavaScript -->
    <script src="metro/js/docs.js"></script>
    <script src="metro/js/github.info.js"></script>
    
    <script src="js/jquery-1.7.2.min.js"></script> 
    <script src="js/dateFormat.js"></script>
    <script src="js/jquery.redirect.min.js"></script>
      
    
    
<script>

jQuery(function($){
    
    
    
    var vIdCliente;

 
    var multiTags = $("#multi");

    function handler(e) {
        var jqEl = $(e.currentTarget);
        var tag = jqEl.parent().parent();
        switch (jqEl.attr("data-action")) {
        case "add":
            tag.after(tag.clone().find("input").val("").end());
            contador++;
            break;
        case "delete":
            tag.remove();
            break;
        }
        return false;
    }

    function save(e) {
       // alert('Alohaaa');
        var tags = multiTags.find("input.tag").map(function() {
            return $(this).val();
        }).get().join(',');
        //alert(tags);
        //return false;
    }

    multiTags.submit(save).find("a").live("click", handler);
    
    
    //envio do formulario
    
     $("form").submit(function(){
    
    
       // $('#nomeFantasia').attr('name');
    
        //alert($('#nomeFantasia').attr('name'));
        
       // var dados = $( this ).serialize();
        
       // alert(dados);
        
         //$(window).redirect('controle/InsereHora.php', {dados: dados});
         
         //alert('alohaa');
        /*
            $.ajax({
                 url: "controle/InsereHora.php",
                 data: dados, 
                 type: "POST",
                 success: function(){
                        
                            $("body").fadeOut(500, function(){
                            //alert('ALOHAAAA');
                            $(window.document.location).attr('href','Horas.php');                            
                            });
                 }
            });
         */
                   
   // return false;
    });
});

</script>


</head>

<body class="metro">
           
    <div class="container">
    
        <form id="multi" method="POST" action=""> <!--controle/InsereDespesa.php-->
        <table class="table bordered striped hovered">
        <thead>
            
            <tr class="fg-green">
                <th>Data</th>
                <th>Despesa</th>
                <th>Valor</th>
                <th>Cliente</th>
                <th>Projeto</th>
                <th>Observacao</th>
            </tr>
        
        </thead>
        
        <tbody>
        
        <tr>            
            <td>
           <div class="input-control text" >
               <input type="text" id="datepicker" name="data[]">
             </div>
                
            </td>
            <td>
                <select class="tag" name="descricao[]">
                    <option> ALMOCO / LANCHES (EM VIAGENS) </option>
                    <option> REFEICOES DE NEGOCIOS </option>
                    <option> HOTEL / ACOMODACOES  / LAVANDERIAS </option>
                    <option> ALUGUEL DE VEICULO </option>
                    <option> COMBUSTIVEL (DESLOCAMENTO - DESCREVER ABAIXO)</option>
                    <option> TAXI </option>
                </select>
            </td>
            <td>
                <input class="tag valor" type="text" name="valor[]" />
            </td>
            <td>
                <select class="tag" id="cliente" name="id_cliente[]">
                  <?php
                       $stmt = $con->prepare("SELECT id_cliente, nome_cliente FROM cliente;");
                       $stmt->execute();
                       while($aux = $stmt->fetch(PDO::FETCH_ASSOC)){?>
                  	        <option value="<?php echo $aux['id_cliente']; ?>"><?php echo $aux['nome_cliente']; ?></option>
                  
                 <?php } ?>
                  </select>
            </td>
            <td>
                <select class="tag" name="id_projeto[]">
                  <?php
                       $stmt = $con->prepare("SELECT id_projeto, nome_projeto FROM projeto;");
                       $stmt->execute();
                       while($aux = $stmt->fetch(PDO::FETCH_ASSOC)){?>
                  	        <option value="<?php echo $aux['id_projeto']; ?>"><?php echo $aux['nome_projeto']; ?></option>
                  
                 <?php } ?>
                  </select>
            </td>
            <td>
                <textarea rows="2" cols="10" name="observacao[]">
                </textarea>
            </td>
            
            <td>
                <a href="#" data-action="add">add</a>
                <a href="#" data-action="delete">delete</a>
            </td>
        </tr>
        </tbody>
        
        </table>
        <input type="submit" class="enviar" value="save" /> 
        
    </form>

        
</div> <!-- container -->


<!--


 <form id="multi">
        <div>
            <label>Tag</label><input class="tag" type="text" name="" type="text" />
            <label>Tag</label><input class="tag" type="text" name="" type="text" />
            <a href="#" data-action="add">add</a>
            <a href="#" data-action="delete">delete</a>
        </div>
        <input type="submit" value="save" >
    </form>


-->

<script src="js/view/despesasView.js"></script>
<script type="text/javascript" src="js/datepickr.min.js"></script>
<script type="text/javascript" src="js/jquery.mask.min.js"></script>

		<script type="text/javascript">
			new datepickr('datepicker', {
				'dateFormat': 'd/m/Y'
			});
                        
                       $(function(){
                         
                            $('.valor').mask('#.##0,00', {reverse: true, maxlength: false});
                            
                        });
                        
		</script>
</body>
</hmtl>