<html lang="pt-br">
<head>


<?php
   
   include ('conexao.php');
   
   
   
   $con = Conexao::getInstance();
   
?>


<style>

form {
    font-family: helvetica, arial, sans-serif;
    font-size: 11px;
}

form div{
    margin-bottom:10px;
}

form a {
    font-size: 12px;
    padding: 4px 10px;
    border: 1px solid #444444;
    background: #555555;
    color:#f7f7f7;
    text-decoration:none;
    vertical-align: middle;
}

form a:hover{
    color:#ffffff;
    background:#111111;   
}

#multi label {
    margin-left:20px;
    margin-right:5px;
    font-size:12px;
    background:#f7f7f7;
    padding: 4px 10px;
    border:1px solid #cccccc;
    vertical-align: middle;
}

#multi input[type="text"]{
    height:30px;
    padding-left:10px;
    padding-right:10px; 
    border:1px solid #cccccc;
    vertical-align: middle;
}

#multi input[type="submit"]{
    margin-left:20px;
    border:none;
    background:#222222;
    outline:none;
    color:#ffffff;
    padding: 4px 10px;
    font-size:12px;
}

#multi table thead tr {
    
    background-color: #ccc;
    width: 100px;
    height: 30px;
    
}

#multi table thead tr td{

    padding: 10px;
    color: #fff;
    font-weight: bold;
    text-align: center;
    vertical-align: middle;
}

#multi  table tbody tr td{

   background-color: red;
}

#multi  table tbody tr td input{

   height: 40px;
}

</style>

<script src="js/jquery-1.7.2.min.js"></script> 
<script src="js/dateFormat.js"></script>
<script src="js/jquery.redirect.min.js"></script>

<script>

jQuery(function($) {
    
    var vIdCliente, 

    //Ações para quando um cliente é selecionado
    $('#cliente').change(function(){
        
        //alert($(this).val());
        vIdCliente = $(this).val();
        //alert('Alohaaaa');
        
    });
    
    
    

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
        var tags = multiTags.find("input.tag").map(function() {
            return $(this).val();
        }).get().join(',');
        alert(tags);
        //return false;
    }

    multiTags.submit(save).find("a").live("click", handler);
    
    
    //envio do formulario
     $("form").submit(function(){
    
    
       // $('#nomeFantasia').attr('name');
    
        //alert($('#nomeFantasia').attr('name'));
        
        var dados = $( this ).serialize();
        
        alert(dados);
        
         //$(window).redirect('controle/InsereHora.php', {dados: dados});
         
         alert('alohaa');
        
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
         
        
            
    return false;
    });
});

</script>

</head>

<body>

    
    <form id="multi" method="POST" action="controle/InsereHora.php">
        <table>
        <thead>
            
            <tr>
                <td>Data</td>
                <td>Despesa</td>
                <td>Valor</td>
                <td>Cliente</td>
                <td>Projeto</td>
                <td>Observacao</td>
            </tr>
        
        </thead>
        
        <tbody>
        
        <tr>            
            <td>
                <input class="tag" type="text" name="data[]" type="text" />
            </td>
            <td>
                <select class="tag" name="Despesa[]">
                    <option> ALMOCO / LANCHES (EM VIAGENS) </option>
                    <option> REFEICOES DE NEGOCIOS </option>
                    <option> HOTEL / ACOMODACOES  / LAVANDERIAS </option>
                    <option> ALUGUEL DE VEICULO </option>
                    <option> COMBUSTIVEL (DESLOCAMENTO - DESCREVER ABAIXO)</option>
                    <option> TAXI </option>
                </select>
            </td>
            <td class="entrada">
                <input class="tag" type="text" name="valor[]" />
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
                       $stmt = $con->prepare("SELECT id_cliente, nome_cliente FROM cliente;");
                       $stmt->execute();
                       while($aux = $stmt->fetch(PDO::FETCH_ASSOC)){?>
                  	        <option value="<?php echo $aux['id_cliente']; ?>"><?php echo $aux['nome_cliente']; ?></option>
                  
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
       <!-- <input type="submit" value="save" /> -->
        
    </form>

        



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

</body>
</hmtl>