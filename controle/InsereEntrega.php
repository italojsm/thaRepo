<?php

error_reporting(E_ALL);
 ini_set("display_errors", 1);
 
include ('../conexao.php');


   $con = Conexao::getInstance();
   
   $fl_servico_produto = $_POST['fl_servico_produto']; 
   $desc_entrega = $_POST['desc_entrega'];

 $query = "INSERT INTO entrega (`desc_entrega`,  `fl_servico_produto`, `fl_inativo`) 
   						 	VALUES ('$desc_entrega', '$fl_servico_produto', 0)";

 
            try{
                 $con->query($query) or die("ERROR: " . implode(":", $con->errorInfo()));
                 echo 'te';
                 echo $query;
              
            } catch ( Exception $e ) {
                echo "$e";
                //exit();
            }


?>
