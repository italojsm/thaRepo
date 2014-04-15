<?php

     error_reporting(E_ALL);
 ini_set("display_errors", 1);
 
include ('../conexao.php');


   $con = Conexao::getInstance();
   
   
   if(isset($_POST['pagina'])){
   			   	
   			   $id = $_POST['id'];
		
			   $stmt = $con->prepare("UPDATE tipo_inteligencia SET fl_inativo = 1 where id_tipo_inteligencia = $id");
	   
	
	   // $stmt = $con->prepare("UPDATE cliente SET
	     //                     nome_cliente = 'testnado' where id_cliente = $id;");


            try {
                $stmt->execute();
            } catch ( Exception $e ) {
                echo 'Erro ao att';
                exit ();
            }
		
	
   }else{
   
   
	   $id = $_POST['idTipoInteligencia'];
	   $desc_tipo_inteligencia = $_POST['desc_tipo_inteligencia'];
	   
	   
	   $stmt = $con->prepare("UPDATE tipo_inteligencia SET
	                          desc_tipo_inteligencia = '$desc_tipo_inteligencia' where id_tipo_inteligencia = $id");
	   
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