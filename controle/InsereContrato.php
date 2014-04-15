<?php

error_reporting(E_ALL);
 ini_set("display_errors", 1);
 
include ('../conexao.php');


   $con = Conexao::getInstance();
   
   $desc_contrato = $_POST['desc_contrato']; 
   $id_cliente = $_POST['id_cliente'];
   $id_resp_contrato = $_POST['id_resp_contrato'];
   $dt_inicio_vigencia = date('Y-m-d', strtotime($_POST['dt_inicio_vigencia']));
   $dt_fim_vigencia = date('Y-m-d', strtotime($_POST['dt_fim_vigencia'])); 

 $query = "INSERT INTO contrato (`desc_contrato`,  `id_cliente`, `id_resp_contrato`, `dt_inicio_vigencia`, `dt_fim_vigencia`) 
    					 VALUES ('$desc_contrato', '$id_cliente',  '$id_resp_contrato', '$dt_inicio_vigencia', '$dt_fim_vigencia')";

 
            try{
                 $con->query($query) or die("ERROR: " . implode(":", $con->errorInfo()));
                 echo 'te';
               //  echo $query;
              
            } catch ( Exception $e ) {
                echo "$e";
                //exit();
            }


?>
