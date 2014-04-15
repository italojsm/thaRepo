<?php

error_reporting(E_ALL);
 ini_set("display_errors", 1);
 
include ('../conexao.php');


   $con = Conexao::getInstance();
   
   $desc_endereco = $_POST['desc_endereco']; 
   $logradouro = $_POST['logradouro'];
   $bairro = $_POST['bairro'];
   $cep = $_POST['cep'];
   $numero = $_POST['numero'];
   $id_uf = $_POST['id_uf'];
   
   
   	
 $query = "INSERT INTO endereco (`desc_endereco`,  `logradouro`, `bairro`, `cep`, `numero`, `id_uf`) 
    					 VALUES ('$desc_endereco', '$logradouro',  '$bairro', '$cep', '$numero', '$id_uf')";

 
            try{
                 $con->query($query) or die("ERROR: " . implode(":", $con->errorInfo()));
                 echo 'te';
               //  echo $query;
              
            } catch ( Exception $e ) {
                echo "$e";
                //exit();
            }


?>
