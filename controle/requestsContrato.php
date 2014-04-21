<?php
error_reporting(E_ALL);
 ini_set("display_errors", 1);

/*
function __autoload($className){
    include_once('models/$className.php');
}*/
 
//include_once('../conexao.php');
 include_once('models/contrato.php');

 
$contrato = new Contrato('localhost','root','toor','falqontrol');
 

if(!isset($_POST['action'])) {
	print json_encode(0);
	return;
}
 

switch($_POST['action']) {
    
    case 'getContrato':
        print $contrato->getContratos($_POST['id']);
    break;

    case 'atualizaContrato':
        $cont = new stdClass;
        $cont = json_decode($_POST['cont']);
        print $contrato->updateContrato($cont);
    break;

    case 'deletaContrato':
        print $contrato->deletaContrato($_POST['id']);
    break;

    case 'insereContrato':
         $cont = new stdClass;
         $cont = json_decode($_POST['cont']);
          print $contrato->insereContrato($cont);
    break;
    
}

/*
print '<pre>';
var_dump(json_decode('{"nome_cliente":"12121","cnpj":"21.212","razao_social":"1221","nome_fantasia":"121212","nome_repr_legal":"121212","nome_cont_financeiro":"1212","tel_cont_financeiro":"1212","email_boleto":"121212"}'));
print '</pre>'; */
exit();

?>