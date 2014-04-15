<?php

error_reporting(E_ALL);
 ini_set("display_errors", 1);
 
include ('../conexao.php');


   $con = Conexao::getInstance();
   
   $etapa = $_POST['etapa']; 
   $desc_etapa = $_POST['desc_etapa'];
  // $dt_inicio_hst = dt_inicio_hst;

 $query = "INSERT INTO etapa (`etapa`,  `desc_etapa`, `fl_inativo`) 
   						 	VALUES ('$etapa', '$desc_etapa', 0)";

 
            try{
                 $con->query($query) or die("ERROR: " . implode(":", $con->errorInfo()));
                 echo 'te';
                 echo $query;
              
            } catch ( Exception $e ) {
                echo "$e";
                //exit();
            }


?>
