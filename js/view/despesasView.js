/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function() {
    
    $(document).on("click", "#user_list", function(){ getDespesaList(this); });
   // $(document).on("click", "#create_user_form", function(){ getCreateForm(this); });
   // $(document).on("click", "button#add_user", function(){ addUser(this); });
    $(document).on("click", "a.aprova", function(){ removeEditable(this); });
});


//LISTA DESPESAS
function getDespesaList(element) {
	
	
        //alert(VARS_AMBIENTE['teste']);
        
        $('#indicator').show();
	$.post('../controle/controller/despesasControl.php',
		{
			action: 'get_despesas'//,
                        //id_func: VARS_AMBIENTE['teste']
		},
		function(data, textStatus) {
			renderDespesasList(data);
			$('#indicator').hide();
		}, 
		"json"		
	);
}//final getDespesaList()


function renderDespesasList(jsonData) {
	
	var table = '<table width="600" cellpadding="5" class="table bordered striped hovered">\n\
                        <thead>\n\
                           <tr>\n\
                              <th scope="col">Data</th>\n\
                              <th scope="col">Funcionario</th>\n\
                              <th scope="col">Despesa</th>\n\
                              <th scope="col">Valor</th>\n\
                              <th scope="col">Cliente</th>\n\
                              <th scope="col">Projeto</th>\n\
                              <th scope="col">Aprovar?</th>\n\
                           </tr>\n\
                        </thead>\n\
                        <tbody>';

	$.each( jsonData, function( index, despesa){     
		table += '<tr>';
		table += '<td class="edit" field="name" despesa_id="'+despesa.id_despesa+'">'+ despesa.data+ '</td>';
                table += '<td class="edit" field="email" despesa_id="'+despesa.id_despesa+'">'+despesa.nome+'</td>';
		table += '<td class="edit" field="email" despesa_id="'+despesa.id_despesa+'">'+despesa.descricao+'</td>';
		table += '<td class="edit" field="mobile" despesa_id="'+despesa.id_despesa+'">'+despesa.valor+'</td>';
		table += '<td class="edit" field="address" despesa_id="'+despesa.id_despesa+'">'+despesa.id_cliente+'</td>';
                table += '<td class="edit" field="address" despesa_id="'+despesa.id_despesa+'">'+despesa.id_projeto+'</td>';
		table += '<td><a class="aprova" rel="N" href="javascript:void(0);" despesa_id="'+despesa.id_despesa+'" func_id="'+despesa.id_funcionario+'" class="delete_confirm btn btn-danger"><i class="icon-remove icon-white"></i></a> <a class="aprova" rel="S" href="javascript:void(0);" despesa_id="'+despesa.id_despesa+'" func_id="'+despesa.id_funcionario+'" class="delete_confirm btn btn-danger"><i class="icon-checkmark icon-white"></i></a></td>';
		table += '</tr>';
    });
	
	table += '</tbody></table>';
	
	$('div#content').html(table);
}//final renderUserList()   


function removeEditable(element) { 
	
	$('#indicator').show();
	
	var Despesa = new Object();
	Despesa.id = $(element).attr('despesa_id');        
        Despesa.func_id = $(element).attr('func_id');
        Despesa.newvalue = $(element).attr('rel');
	
	var despesaJson = JSON.stringify(Despesa);
        
       // alert(despesaJson);
	
	$.post('../controle/controller/despesasControl.php',
		{
			action: 'update_field_data',			
			despesa: despesaJson
		},
		function(data, textStatus) {
			//$('td.current').html($(element).val());
			//$('.current').removeClass('current');
			$('#indicator').hide();			
                        alert(data);
		}, 
		"json"		
	);
}//final removeEditable()
