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

<script>

jQuery(function($) {

    String.prototype.toHHMMSS = function () {
    var sec_num = parseInt(this, 10); // don't forget the second param
    var hours   = Math.floor(sec_num / 3600);
    var minutes = Math.floor((sec_num - (hours * 3600)) / 60);
    var seconds = sec_num - (hours * 3600) - (minutes * 60);

    if (hours   < 10) {hours   = "0"+hours;}
    if (minutes < 10) {minutes = "0"+minutes;}
    if (seconds < 10) {seconds = "0"+seconds;}
    var time    = hours+':'+minutes+':'+seconds;
    return time;
}


    var txt = "00.00";
    var txt2 = "00.00";
    var hora;
    var contador = 0;
     var vet1, vet2, dat1 = new Date(), dat2 = new Date(), aux, te, final, milli = 2.77777777777778E-07;
    
    var times = new Array();
    
    //alert(parseFloat("09:00".replace(':','.'))  - parseFloat("12:00".replace(':', '.')));

    
    function timeToSeconds(time) {
    time = time.split(/:/);
    return time[0] * 3600 + time[1] * 60;// + time[2];
    }
    
    
    function horas(e){
        
            
        var ele = $(e.currentTarget),
        tdPai = ele.parent(); //objeto td pai do objeto input

        
        if(tdPai.attr('class') == 'entrada'){
            //pega o valor de saida
            vet2 = tdPai.next().find('input[type="time"]').val().split(':');
            alert('v2.1: ' + vet2);
            dat2.setHours(parseInt(vet2[0]), parseInt(vet2[1]));
            alert('d2.1: ' + dat2.getTime());
            //pega o valor de entrada
            vet1 = ele.val().split(':');      
            dat1.setHours(parseInt(vet1[0]), parseInt(vet1[1]));  
            alert('d1: ' + dat1.getTime());
            //alert(dat1.getTime());
             //alert('alohaaa');
        }else{
            //pega o valor de entrada
            vet1 = tdPai.prev().find('input[type="time"]').val().split(':');
            dat1.setHours(parseInt(vet1[0]), parseInt(vet1[1]));
            alert('d1: ' + dat1.getTime());
             //pega o valor de saida
            vet2 = ele.val().split(':');
            alert('v2.2: ' + vet2);
            dat2.setHours(parseInt(vet2[0]), parseInt(vet2[1]));
            alert('d2.2: ' + dat2.getTime());
        }
        
        //alert("dat2: " + new Date(dat2.getTime()).toString("hh:mm"));
        //alert("dat1: " + dat1.getTime());
        
        //alert ("date: " + dateFormat(dat1.getTime(), "h:MM:ss") );
       
        
        //subtração das horas
        //aux = dat2.getTime() - dat1.getTime();
        
        //alert("dat2: "+ dat2.getTime());
        //alert("dat1: "+dat1.getTime());
        
        // alert ("date: " + dateFormat(aux, "h:MM:ss") );
        
        //("aux: " + aux);
        //divide a hora dos segundos que serão convertidos
        te = parseFloat((aux * milli)).toFixed(2).toString().split('.');
        //final = te[0].toString() + ":" + parseInt((te[1] / 100 * 60)).toString();
        final = te[0].toString() + ":" + Math.floor(te[1]).toString();
        
        //alert(te[1]);
        
        //alert((te[1] / 100 * 60).toFixed(2).toString());
        
        //final = final.length == 5 ? final : 0+final;
       
        //alert(final.toString());
                
        if(tdPai.attr('class') == 'entrada'){
           //add o valor no total
            tdPai.next().next().find('input[type="time"]').val(final);          
        }else{
            //add o valor no total
            tdPai.next().find('input[type="time"]').val(final);
            //alert(hora);
        }
       
    }//final horas()
    
    
    $('input[name="entao"]').click(function(){
        
        var sum = 0.0;
        /*
        $('input[name="total"]').each(function(){
            
            sum += parseFloat($(this).val().replace(':','.'));
            
        });*/
        
        
        //alert(sum.toString().replace('.', ':'));
        alert((timeToSeconds('01:70')));
        //alert("7800".toHHMMSS());
    });
    
    //chama a função hora no evento de mudança de um dos inputs do tipo time editaveis
   $('input[type="time"]').live("change", horas);

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
        return false;
    }

    multiTags.submit(save).find("a").live("click", handler);
    
    
    //envio do formulario
     $("form").submit(function(){
    
    
       // $('#nomeFantasia').attr('name');
    
        //alert($('#nomeFantasia').attr('name'));
        
        var dados = $( this ).serialize();
        
        alert(dados);
        

        /*
            $.ajax({
                 url: "../controle/InserePerfilFuncionario.php",
                 data: dados, 
                 type: "POST",
                 success: function(){
                        
                            $("body").fadeOut(500, function(){
                            //alert('ALOHAAAA');
                            $(window.document.location).attr('href','../Cadastro/CadastrarPerfilFuncionario.php');                            
                            });
                 }
            });
          */
        
            
    return false;
    });
});

</script>

</head>

<body>

    
    <form id="multi">
        <table>
        <thead>
            
            <tr>
                <td>Data</td>
                <td>Turno</td>
                <td>Entrada</td>
                <td>Saida</td>
                <td>Total</td>
                <td>Cliente</td>
                <td>Observacao</td>
            </tr>
        
        </thead>
        
        <tbody>
        
        <tr>            
            <td>
                <input class="tag" type="text" name="data" type="text" />
            </td>
            <td>
                <select class="tag" name="Turno">
                    <option> Matutino </option>
                    <option> Vespertino </option>
                </select>
            </td>
            <td class="entrada">
                <input class="tag" type="time" name="entrada" />
            </td>
            <td class="saida">
                <input class="tag" type="time" name="saida"  />
            </td>
            <td class="total">
                <input class="tag" type="time" name="total" value="" readonly/>
            </td>
            <td>
                <select class="tag" name="id_cliente">
                  <?php
                       $stmt = $con->prepare("SELECT id_cliente, nome_cliente FROM cliente;");
                       $stmt->execute();
                       while($aux = $stmt->fetch(PDO::FETCH_ASSOC)){?>
                  	        <option value="<?php echo $aux['id_cliente']; ?>"><?php echo $aux['nome_cliente']; ?></option>
                  
                 <?php } ?>
                  </select>
            </td>
            <td>
                <textarea rows="2" cols="50">
                
                </textarea>
            </td>
            
            <td>
            <a href="#" data-action="add">add</a>
            <a href="#" data-action="delete">delete</a>
            </td>
        </tr>
        </tbody>
        </table>
        <input type="button" value="clica ai poow" name="entao"/>  <input type="submit" value="save" /> <input name="totaltal" type="text" value="" readonly />
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