<?php
function __autoload($className){
	include_once("../models/despesas/despesasSQL.php");	
}

$despesas = new Despesa("localhost","root","toor","falqontrol");


if(!isset($_POST['action'])) {
	print json_encode(0);
	return;
}

switch($_POST['action']) {
    
	case 'get_despesas':
		print $despesas->getDespesas();		
	break;
		
	case 'update_field_data':
		$despesaDados = new stdClass;
		$despesaDados = json_decode($_POST['despesa']);
		print $despesas->updateValue($despesaDados);
	break;
}

exit();

?>