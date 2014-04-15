<?php

     error_reporting(E_ALL);
 ini_set("display_errors", 1);
 
include ('../conexao.php');


   $con = Conexao::getInstance();
   
   
   if(isset($_POST['pagina'])){
   			   	
   			   $id = $_POST['id'];
		
			   $stmt = $con->prepare("UPDATE atividade SET fl_inativo = 1 where id_atividade = $id");
	   
	
	   // $stmt = $con->prepare("UPDATE cliente SET
	     //                     nome_cliente = 'testnado' where id_cliente = $id;");


            try {
                $stmt->execute();
            } catch ( Exception $e ) {
                echo 'Erro ao att';
                exit ();
            }
		
	
   }else{
   
   
	   $id = $_POST['idAtividade'];
	   $id_etapa = $_POST['id_etapa']; 
	   $desc_atividade = $_POST['desc_atividade'];
	   
	   
	   $stmt = $con->prepare("UPDATE atividade SET
	                          id_etapa = '$id_etapa', desc_atividade = '$desc_atividade' where id_atividade = $id");
	   
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