<?php

error_reporting(E_ALL);
 ini_set("display_errors", 1);
 
include ('../conexao.php');


   $con = Conexao::getInstance();
   

for($i = 0; $i < count($_POST['data']); $i++){   
   
$data  = $_POST['data'][$i];
$turno = $_POST['turno'][$i];
$entrada = $_POST['entrada'][$i];
$saida = $_POST['saida'][$i];
$total = $_POST['total'][$i];
$id_cliente = $_POST['id_cliente'][$i];
$observacao = $_POST['observacao'][$i];

//date('Y-m-d', strtotime($_POST['dt_hr_inicio']));


    $query[$i] = "INSERT INTO horas (`data`,  `turno`, `entrada`, `saida`, `total`, `id_cliente`, `observacao` ) 
            	VALUES ('$data', '$turno',  '$entrada', '$saida', '$total', '$id_cliente', '$observacao')";
            	
    echo $query[$i]. "</br>" ;            
}


//echo $query;


for($i=0; $i < count($query); $i++)
    try{
                 $con->query($query[$i]) or die("ERROR: " . implode(":", $con->errorInfo()));
                 echo 'te';
               //  echo $query;
              
        }catch ( Exception $e ){
                echo "$e";
               //exit();
         }
    

/*

 $query = "INSERT INTO tarefa (`id_atividade`,  `id_funcionario`, `dt_hr_inicio`, `dt_hr_fim`, `fl_tarefa_bloqueada`, `observacao` ) 
    					 VALUES ('$id_atividade', '$id_funcionario',  '$dt_hr_inicio', '$dt_hr_fim', '$fl_tarefa_bloqueada', '$observacao')";

 
            try{
                 $con->query($query) or die("ERROR: " . implode(":", $con->errorInfo()));
                 echo 'te';
               //  echo $query;
              
            } catch ( Exception $e ){
                echo "$e";
                //exit();
            }

*/
?>
