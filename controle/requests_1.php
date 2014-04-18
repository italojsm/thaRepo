<?php
error_reporting(E_ALL);
 ini_set("display_errors", 1);

/*
function __autoload($className){
    include_once('models/$className.php');
}*/
 
include_once('../conexao.php');
 
$users = new User('localhost','root','toor','falqontrol');
 
if(!isset($_POST['action'])) {
	print json_encode(0);
	return;
}
 
switch($_POST['action']) {
    
    case 'get_users':
    print $users->getUsers();
    break;
    
}
 
exit();

?>