<?php

error_reporting(E_ALL);
 ini_set("display_errors", 1);
 
include ('../conexao.php');


   $con = Conexao::getInstance();
   

for($i = 0; $i < count($_POST['data']); $i++){   
   
$data  = $_POST['data'][$i];
$descricao = $_POST['descricao'][$i];
$valor = $_POST['valor'][$i];
$id_cliente = $_POST['id_cliente'][$i];
$id_projeto = $_POST['id_projeto'][$i];
$observacao = $_POST['observacao'][$i];

//date('Y-m-d', strtotime($_POST['dt_hr_inicio']));


    $query[$i] = "INSERT INTO despesas (`id_funcionario`, `data`, `descricao`, `valor`, `id_cliente`, `id_projeto`, `observacao` ) 
            	VALUES ('1', '$data', '$descricao',  '$valor', '$id_cliente', '$id_projeto', '$observacao')";
            	
    echo $query[$i]. "</br>" ;            
}


//echo $query;


for ($i = 0; $i < count($query); $i++) {
    try {
        $con->query($query[$i]) or die("ERROR: " . implode(":", $con->errorInfo()));
        echo 'te';
        //  echo $query;
    } catch (Exception $e) {
        echo "$e";
        //exit();
    }
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
