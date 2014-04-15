<?php

error_reporting(E_ALL);
 ini_set("display_errors", 1);
 
include ('../conexao.php');


   $con = Conexao::getInstance();
   
   $desc_perfil = $_POST['desc_perfil'];

 $query = "INSERT INTO perfil (`desc_perfil`, `fl_inativo`) 
   						 	VALUES ('$desc_perfil', 0)";

 
            try{
                 $con->query($query) or die("ERROR: " . implode(":", $con->errorInfo()));
                 echo 'te';
                 echo $query;
              
            } catch ( Exception $e ) {
                echo "$e";
                //exit();
            }


?>
