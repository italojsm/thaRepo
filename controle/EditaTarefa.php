<?php

     error_reporting(E_ALL);
 ini_set("display_errors", 1);
 
include ('../conexao.php');


   $con = Conexao::getInstance();
   
   
   if(isset($_POST['pagina'])){
   			   	
   			   $id = $_POST['id'];
		
			   $stmt = $con->prepare("UPDATE tarefa SET fl_inativo = 1 where id_tarefa = $id");
	   
	
            try {
                $stmt->execute();
            } catch ( Exception $e ) {
                echo 'Erro ao att';
                exit ();
            }
		
	
   }else{
   
	   
$id = $_POST['idTarefa'];
$id_atividade  = $_POST['id_atividade'];
$id_funcionario = $_POST['id_funcionario'];
$dt_hr_inicio = date('Y-m-d', strtotime($_POST['dt_hr_inicio']));
$dt_hr_fim = date('Y-m-d', strtotime($_POST['dt_hr_fim']));
$fl_tarefa_bloqueada = $_POST['fl_tarefa_bloqueada'];
$observacao = $_POST['observacao'];
	   
	   
	   $stmt = $con->prepare("UPDATE tarefa SET
	                          id_atividade = '$id_atividade', id_funcionario = '$id_funcionario', dt_hr_inicio = '$dt_hr_inicio',
	                          dt_hr_fim = '$dt_hr_fim', fl_tarefa_bloqueada = '$fl_tarefa_bloqueada', observacao = '$observacao' where id_tarefa = $id");
	   

            try {
                $stmt->execute();
            } catch ( Exception $e ) {
                echo 'Erro ao att';
                exit ();
            }
    }

   //$stmt->execute();

?>