<?php

     error_reporting(E_ALL);
 ini_set("display_errors", 1);
 
include ('../conexao.php');


   $con = Conexao::getInstance();
   
   
   if(isset($_POST['pagina'])){
   			   	
   			   $id = $_POST['id'];
		
			   $stmt = $con->prepare("UPDATE perfil SET fl_inativo = 1 where id_perfil = $id");
	   
	
	   // $stmt = $con->prepare("UPDATE cliente SET
	     //                     nome_cliente = 'testnado' where id_cliente = $id;");


            try {
                $stmt->execute();
            } catch ( Exception $e ) {
                echo 'Erro ao att';
                exit ();
            }
		
	
   }else{
   
   
	   $id = $_POST['idPerfil'];
	   $desc_perfil = $_POST['desc_perfil'];
	   
	   
	   $stmt = $con->prepare("UPDATE perfil SET
	                          desc_perfil = '$desc_perfil' where id_perfil = $id");
	   
	   // $stmt = $con->prepare("UPDATE cliente SET
	     //                     nome_cliente = 'testnado' where id_cliente = $id;");


            try {
                $stmt->execute();
            } catch ( Exception $e ) {
                echo 'Erro ao att';
                exit ();
            }
    }

   //$stmt->execute();

?>