<?php

error_reporting(E_ALL);
 ini_set("display_errors", 1);
 
include ('../conexao.php');


   $con = Conexao::getInstance();
   
   $nome = $_POST['nome_cliente']; 
   $cnpj = $_POST['cnpj'];
   $razao_social = $_POST['razao_social'];
   $nome_fantasia = $_POST['nome_fantasia'];
   $id_resp_cliente = $_POST['id_resp_cliente'];
  
   //$id_endereco = $_POST['id_endereco'];
   
   $sql = "SELECT id_endereco from endereco ORDER BY id_endereco DESC LIMIT 1";   
   $id_endereco = $con->query($sql)->fetch(PDO::FETCH_ASSOC);
  
   $nome_repr_legal = $_POST['nome_repr_legal'];
   $nome_cont_financeiro = $_POST['nome_cont_financeiro'];
   $tel_cont_financeiro = $_POST['tel_cont_financeiro'];
  // $fl_iss = fl_iss;
   $email_boleto = $_POST['email_boleto']; 
  // $dt_inicio_hst = dt_inicio_hst;

 $query = "INSERT INTO cliente (`nome_cliente`,  `cnpj`, `razao_social`, `nome_fantasia`, `id_resp_cliente`, `id_endereco`, `nome_repr_legal`, `nome_cont_financeiro`, `tel_cont_financeiro`, `email_boleto`) 
    VALUES ('$nome', '$cnpj',  '$razao_social', '$nome_fantasia', '$id_resp_cliente', '$id_endereco', '$nome_repr_legal', '$nome_cont_financeiro', '$tel_cont_financeiro', '$email_boleto')";

 
            try{
                 $con->query($query) or die("ERROR: " . implode(":", $con->errorInfo()));
                 echo 'te';
                 echo $query;
              
            } catch ( Exception $e ) {
                echo "$e";
                //exit();
            }


?>
