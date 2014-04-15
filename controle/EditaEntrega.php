<?php

     error_reporting(E_ALL);
 ini_set("display_errors", 1);
 
include ('../conexao.php');


   $con = Conexao::getInstance();
   
   
   if(isset($_POST['pagina'])){
   			   	
   			   $id = $_POST['id'];
		
			   $stmt = $con->prepare("UPDATE entrega SET fl_inativo = 1 where id_etapa = $id");
	   


            try {
                $stmt->execute();
            } catch ( Exception $e ) {
                echo 'Erro ao att';
                exit ();
            }
		
	
   }else{
   
   
	   $id = $_POST['idEntrega'];
	   $desc_entrega = $_POST['desc_entrega']; 
	   $fl_servico_produto = $_POST['fl_servico_produto'];
	   
	   
	   $stmt = $con->prepare("UPDATE entrega SET
	                          desc_entrega = '$desc_entrega', fl_servico_produto = '$fl_servico_produto' where id_entrega = $id");
	   

            try {
                $stmt->execute();
            } catch ( Exception $e ) {
                echo 'Erro ao att';
                exit ();
            }
    }

   //$stmt->execute();

?>