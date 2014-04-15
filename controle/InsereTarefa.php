<?php

error_reporting(E_ALL);
 ini_set("display_errors", 1);
 
include ('../conexao.php');


   $con = Conexao::getInstance();
   
$id_atividade  = $_POST['id_atividade'];
$id_funcionario = $_POST['id_funcionario'];
$dt_hr_inicio = date('Y-m-d', strtotime($_POST['dt_hr_inicio']));
$dt_hr_fim = date('Y-m-d', strtotime($_POST['dt_hr_fim']));
$fl_tarefa_bloqueada = $_POST['fl_tarefa_bloqueada'];
$observacao = $_POST['observacao'];


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


?>
