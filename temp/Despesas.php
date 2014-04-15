<html lang="pt-br">
<head>


<?php
   
   include ('../conexao.php');
   
   
   
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


    var txt = "00.00";
    var txt2 = "00.00";
    var hora;
    var contador = 0;
     var vet1, vet2, dat1 = new Date(), dat2 = new Date(), aux, te, final, milli = 2.77777777777778E-07;
    
    var times = new Array();
    
    
    
function completaZeroEsquerda(char){
    
 //  alert(char.toString().length); // < 2 ?  "z" + (char.toString()) : char);
    
    return  char.toString().length < 2 ?  "0" + char.toString() : char;
    
}
            
            /**
 * Verifica se a hora inicial é menor que a final.
 */
function isHoraInicialMenorHoraFinal(horaInicial, horaFinal){
    horaIni = horaInicial.split(':');
    horaFim = horaFinal.split(':');
 
    // Verifica as horas. Se forem diferentes, é só ver se a inicial 
    // é menor que a final.
    hIni = parseInt(horaIni[0], 10);
    hFim = parseInt(horaFim[0], 10);
    if(hIni != hFim)
        return hIni < hFim;
     
    // Se as horas são iguais, verifica os minutos então.
    mIni = parseInt(horaIni[1], 10);
    mFim = parseInt(horaFim[1], 10);
    if(mIni != mFim)
        return mIni < mFim;
}

//SOMA HORAS
function somaHora(horaInicio, horaSomada) {
     
    horaIni = horaInicio.split(':');
    horaSom = horaSomada.split(':');
 
    horasTotal = parseInt(horaIni[0], 10) + parseInt(horaSom[0], 10);
    minutosTotal = parseInt(horaIni[1], 10) + parseInt(horaSom[1], 10);
     
    if(minutosTotal >= 60){
        minutosTotal -= 60;
        horasTotal += 1;
    }
     
    //horaFinal = completaZeroEsquerda(horasTotal) + ":" + completaZeroEsquerda(minutosTotal);
    return completaZeroEsquerda(horasTotal) + ":" + completaZeroEsquerda(minutosTotal);
    //return horaFinal;
}


/**
* Retona a diferença entre duas horas.
* Exemplo: 14:35 a 17:21 = 02:46
* Adaptada de http://stackoverflow.com/questions/2053057/doing-time-subtraction-with-jquery
*/
function diferencaHoras(horaInicial, horaFinal) {
 
    // Tratamento se a hora inicial é menor que a final 
    if( ! isHoraInicialMenorHoraFinal(horaInicial, horaFinal) ){
        aux = horaFinal;
        horaFinal = horaInicial;
        horaInicial = aux;
    }
 
    hIni = horaInicial.split(':');
    hFim = horaFinal.split(':');
 
    horasTotal = parseInt(hFim[0], 10) - parseInt(hIni[0], 10);
    minutosTotal = parseInt(hFim[1], 10) - parseInt(hIni[1], 10);
     
    if(minutosTotal < 0){
        minutosTotal += 60;
        horasTotal -= 1;
    }
     
    //alert( horasTotal +":" +minutosTotal );
    return completaZeroEsquerda(horasTotal) + ":" + completaZeroEsquerda(minutosTotal);
     
    //horaFinal = completaZeroEsquerda(horasTotal) + ":" + completaZeroEsquerda(minutosTotal);
   // return horaFinal;
}
    
    
    function horas(e){
        
            
        var ele = $(e.currentTarget),
        tdPai = ele.parent(); //objeto td pai do objeto input

        
        if(tdPai.attr('class') == 'entrada'){
            vet2 = tdPai.next().find('input[type="time"]').val();
            
            //pega o valor de saida
            vet2 = tdPai.next().find('input[type="time"]').val().split(':');
            
            //pega o valor de entrada
            vet1 = ele.val();      
        }else{
            //pega o valor de entrada
            vet1 = tdPai.prev().find('input[type="time"]').val();
            
             //pega o valor de saida
            vet2 = ele.val();
        }
        
        //alert(diferencaHoras(vet1, vet2));
        final = diferencaHoras(vet1, vet2);
        

        if(tdPai.attr('class') == 'entrada'){
           //add o valor no total
            tdPai.next().next().find('input[type="time"]').val(final);          
        }else{
            //add o valor no total
            tdPai.next().find('input[type="time"]').val(final);
            //alert(hora);
        }
       
    }//final horas()
    
  
    //mostra soma do total de horas
    $('input[name="entao"]').click(function(){
        
        var sum = "00:00";
        
        $('input[name="total"]').each(function(){
        
            sum = somaHora($(this).val(), sum);
            
        });
        
        
        alert(sum);
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
                <select class="tag" name="id_cliente[]">
                  <?php
                       $stmt = $con->prepare("SELECT id_cliente, nome_cliente FROM cliente;");
                       $stmt->execute();
                       while($aux = $stmt->fetch(PDO::FETCH_ASSOC)){?>
                  	        <option value="<?php echo $aux['id_cliente']; ?>"><?php echo $aux['nome_cliente']; ?></option>
                  
                 <?php } ?>
                  </select>
            </td>
            <td>
                <textarea rows="2" cols="40" name="observacao[]">
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