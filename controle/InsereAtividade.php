<?php

error_reporting(E_ALL);
 ini_set("display_errors", 1);
 
include ('../conexao.php');


   $con = Conexao::getInstance();
   
   $id_etapa = $_POST['id_etapa'];
   $desc_atividade = $_POST['desc_atividade'];
   
  // $dt_inicio_hst = dt_inicio_hst;

 $query = "INSERT INTO atividade (`id_etapa`,`desc_atividade`, `fl_inativo`) 
   						 	VALUES ('$id_etapa','$desc_atividade', 0)";

 
            try{
                 $con->query($query) or die("ERROR: " . implode(":", $con->errorInfo()));
                 echo 'te';
                 echo $query;
              
            } catch ( Exception $e ) {
                echo "$e";
                //exit();
            }


?>
