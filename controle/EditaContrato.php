<?php

     error_reporting(E_ALL);
 ini_set("display_errors", 1);
 
include ('../conexao.php');


   $con = Conexao::getInstance();
   
   
   if(isset($_POST['pagina'])){
   			   	
   			   $id = $_POST['id'];
		
			   $stmt = $con->prepare("UPDATE contrato SET fl_inativo = 1 where id_contrato = $id");
	   
            try {
                $stmt->execute();
            } catch ( Exception $e ) {
                echo 'Erro ao att';
                exit ();
            }
		
	
   }else{
   
   $id = $_POST['idContrato'];
   $desc_contrato = $_POST['desc_contrato']; 
   $id_cliente = $_POST['id_cliente'];
   $id_resp_contrato = $_POST['id_resp_contrato'];
   $dt_inicio_vigencia = date('Y-m-d', strtotime($_POST['dt_inicio_vigencia']));
   $dt_fim_vigencia = date('Y-m-d', strtotime($_POST['dt_fim_vigencia'])); 

	   	
	$query = "UPDATE contrato SET desc_contrato = '$desc_contrato', id_resp_contrato = '$id_resp_contrato', dt_inicio_vigencia = '$dt_inicio_vigencia', dt_fim_vigencia = '$dt_fim_vigencia' where id_contrato = $id";

            try{
                 $con->query($query) or die("ERROR: " . implode(":", $con->errorInfo()));
                 echo 'te';
                echo $query;
              
            } catch ( Exception $e ) {
                echo "$e";
                //exit();
            }

    }

   //$stmt->execute();

?>