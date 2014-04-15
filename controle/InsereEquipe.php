<?php

error_reporting(E_ALL);
 ini_set("display_errors", 1);
 
include ('../conexao.php');


   $con = Conexao::getInstance();
   

   $nome_equipe = $_POST['nome_equipe'];
   $id_projeto = $_POST['id_projeto'];

    //query para inseção na tabela de equipe de projeto
   $sql = "INSERT INTO equipe_projeto (`nome_equipe`, `id_projeto`, `fl_inativo`) 
   						 	VALUES ('$nome_equipe', '$id_projeto', 0)";
 
    try{
       $con->query($sql) or die("ERROR: " . implode(":", $con->errorInfo()));
       //echo 'te';
      // echo $sql;
    }catch ( Exception $e ){
             echo "$e";
             //exit();
    }
 
 
 
   $sql_id = "SELECT id_equipe_projeto from equipe_projeto ORDER BY id_equipe_projeto DESC LIMIT 1";   
   $id_equipe_projeto = $con->query($sql_id)->fetch(PDO::FETCH_BOTH);
 
//query para inseção na tabela de funcionario da equipe
for($i=0; $i < count($_POST['id_funcionario']); $i++){
    
    
   $id_funcionario = $_POST['id_funcionario'][$i];

  $query[$i] = "INSERT INTO `funcionario_equipe` (`id_equipe_projeto`, `id_funcionario`, `fl_inativo`) 
   						VALUES (".$id_equipe_projeto[0].", $id_funcionario, 0)";
 
 
 echo $query[$i]. "</br>";  						 	
} 



for($i=0; $i < count($_POST['id_funcionario']); $i++){

    try{
       $con->query($query[$i]) or die("ERROR: " . implode(":", $con->errorInfo()));
       echo 'te';
       echo $query[$i];
    }catch ( Exception $e ){
             echo "$e";
             //exit();
    }
 
 //echo $query. "</br>" ;  						 	
}
 
 /*
 
 $sql = "INSERT INTO tipo_inteligencia (`desc_tipo_inteligencia`, `fl_inativo`) 
   						 	VALUES ('$desc_tipo_inteligencia', 0)";
 
 */
 
 /*
            try{
                 $con->query($query) or die("ERROR: " . implode(":", $con->errorInfo()));
                 echo 'te';
                 echo $query;
              
            } catch ( Exception $e ) {
                echo "$e";
                //exit();
            }*/


?>
