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
    
}

exit();

?>