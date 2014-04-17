<?php

error_reporting(E_ALL);
 ini_set("display_errors", 1);
 
include ('../conexao.php');
//require("../phpmailer/class.phpmailer.php");



   $con = Conexao::getInstance();
   

for($i = 0; $i < count($_POST['data']); $i++){   
   
$data  = date('Y-m-d', strtotime(str_replace("/","-",$_POST['data'][$i])));
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

$message = "Olá Derp, o usuario Tal fez um requerimento de despesa.";

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




//ENVIAR EMAIL
     /*
        $mail = new PHPMailer();

        $mail->IsSMTP(); // Define que a mensagem será SMTP12
        $mail->Host = "box827.bluehost.com";
        
        $mail->From = "italo@falqon.com"; // Seu e-mail
        $mail->FromName = "Balotê"; // Seu nome
        
        $mail->AddAddress('italojsm@hotmail.com.br');
        
        $mail->IsHTML(true); // Define que o e-mail será enviado como HTML

        $mail->Subject  = "Mensagem Teste"; // Assunto da mensagem
        $mail->Body = "Este é o corpo da mensagem de teste, em <b>HTML</b>!";
        $mail->AltBody = "Este é o corpo da mensagem de teste, em Texto Plano!"; 
        
        
        $enviado = $mail->Send();

        $mail->ClearAllRecipients();
        $mail->ClearAttachments();

        if ($enviado) {
            echo "E-mail enviado com sucesso";
        } else {
            echo "Não foi possível enviar o e-mail.<br /><br />";
            echo "<b>Informações do erro:</b> <br />" . $mail->ErrorInfo;
        }
*/
        
        

?>
