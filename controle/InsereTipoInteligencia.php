<?php

error_reporting(E_ALL);
 ini_set("display_errors", 1);
 
include ('../conexao.php');


   $con = Conexao::getInstance();
   
   $desc_tipo_inteligencia = $_POST['desc_tipo_inteligencia'];

 $query = "INSERT INTO tipo_inteligencia (`desc_tipo_inteligencia`, `fl_inativo`) 
   						 	VALUES ('$desc_tipo_inteligencia', 0)";

 
            try{
                 $con->query($query) or die("ERROR: " . implode(":", $con->errorInfo()));
                 echo 'te';
                 echo $query;
              
            } catch ( Exception $e ) {
                echo "$e";
                //exit();
            }


?>
