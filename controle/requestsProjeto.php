<?php
error_reporting(E_ALL);
 ini_set("display_errors", 1);

/*
function __autoload($className){
    include_once('models/$className.php');
}*/
 
//include_once('../conexao.php');
 include_once('models/projeto.php');

 
$projeto = new Projeto('localhost','root','toor','falqontrol');
 

if(!isset($_POST['action'])) {
	print json_encode(0);
	return;
}
 

switch($_POST['action']) {
    
    case 'getProjeto':
        print $projeto->getProjeto($_POST['id']);
    break;

    case 'atualizaProjeto':
        $proj = new stdClass;
        $proj = json_decode($_POST['proj']);
        print $projeto->atualizaProjeto($proj);
    break;

    case 'deletaContrato':
        print $contrato->deletaContrato($_POST['id']);
    break;

    case 'insereProjeto':
         $proj = new stdClass;
         $proj = json_decode($_POST['proj']);
          print $projeto->insereProjeto($proj);
    break;
    
}

exit();

?>