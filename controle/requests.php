<?php
error_reporting(E_ALL);
 ini_set("display_errors", 1);

/*
function __autoload($className){
    include_once('models/$className.php');
}*/
 
//include_once('../conexao.php');
 include_once('models/cliente.php');

 
$cliente = new Cliente('localhost','root','toor','falqontrol');
 

if(!isset($_POST['action'])) {
	print json_encode(0);
	return;
}
 

switch($_POST['action']) {
    
    case 'getCliente':
        print $cliente->getClientes($_POST['id']);
    break;

    case 'atualizaCliente':
        $cli = new stdClass;
        $cli = json_decode($_POST['clien']);
        print $cliente->updateCliente($cli);
    break;

    case 'deletaCliente':
        print $cliente->deletaCliente($_POST['id']);
    break;

    case 'insereCliente':
         $clie = new stdClass;
         $clie = json_decode($_POST['clie']);
          print $cliente->insereCliente($clie);
    break;
    
}

/*
print '<pre>';
var_dump(json_decode('{"nome_cliente":"12121","cnpj":"21.212","razao_social":"1221","nome_fantasia":"121212","nome_repr_legal":"121212","nome_cont_financeiro":"1212","tel_cont_financeiro":"1212","email_boleto":"121212"}'));
print '</pre>'; */
exit();

?>