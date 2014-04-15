<?php

     error_reporting(E_ALL);
 ini_set("display_errors", 1);
 
include ('../conexao.php');


   $con = Conexao::getInstance();
   
   
   if(isset($_POST['pagina'])){
   			   	
   			   $id = $_POST['id'];
		
			   $stmt = $con->prepare("UPDATE etapa SET fl_inativo = 1 where id_etapa = $id");
	   
	
	   // $stmt = $con->prepare("UPDATE cliente SET
	     //                     nome_cliente = 'testnado' where id_cliente = $id;");


            try {
                $stmt->execute();
            } catch ( Exception $e ) {
                echo 'Erro ao att';
                exit ();
            }
		
	
   }else{
   
   
	   $id = $_POST['idEtapa'];
	   $etapa = $_POST['etapa']; 
	   $desc_etapa = $_POST['desc_etapa'];
	   
	   
	   $stmt = $con->prepare("UPDATE etapa SET
	                          etapa = '$etapa', desc_etapa = '$desc_etapa' where id_etapa = $id");
	   
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