<?php

error_reporting(E_ALL);
 ini_set("display_errors", 1);
 
include ('conexao.php');


   $con = Conexao::getInstance();
  
  
   $query = "SELECT id_endereco from endereco ORDER BY id_endereco DESC	 LIMIT 1";

 
            	$result = $con->query($query)->fetch(PDO::FETCH_ASSOC);
				echo $result['id_endereco'];

   
   
?>