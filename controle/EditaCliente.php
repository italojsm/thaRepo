<?php

     error_reporting(E_ALL);
 ini_set("display_errors", 1);
 
include ('../conexao.php');


   $con = Conexao::getInstance();
   
   
   if(isset($_POST['pagina'])){
   			   	
   			   $id = $_POST['id'];
		
			   $stmt = $con->prepare("UPDATE cliente SET fl_inativo = 1 where id_cliente = $id");
	   
	
	   // $stmt = $con->prepare("UPDATE cliente SET
	     //                     nome_cliente = 'testnado' where id_cliente = $id;");


            try {
                $stmt->execute();
            } catch ( Exception $e ) {
                echo 'Erro ao att';
                exit ();
            }
		
	
   }else{
   
   
	   $id = $_POST['idCliente'];
	   $nome = $_POST['nome_cliente']; 
	   $cnpj = $_POST['cnpj'];
	   $razao_social = $_POST['razao_social'];
	   $nome_fantasia = $_POST['nome_fantasia'];
	   $id_resp_cliente = $_POST['id_resp_cliente'];
	   //$id_endereco = $_POST['id_endereco'];
	   $nome_repr_legal = $_POST['nome_repr_legal'];
	   $nome_cont_financeiro = $_POST['nome_cont_financeiro'];
	   $tel_cont_financeiro = $_POST['tel_cont_financeiro'];
	  // $fl_iss = fl_iss;
	   $email_boleto = $_POST['email_boleto']; 
	  // $dt_inicio_hst = dt_inicio_hst;
	   
	   
	   $stmt = $con->prepare("UPDATE cliente SET
	                          nome_cliente = '$nome', cnpj = '$cnpj', razao_social = '$razao_social', nome_fantasia = '$nome_fantasia',
	                          id_resp_cliente = '$id_resp_cliente', nome_repr_legal = '$nome_repr_legal', nome_cont_financeiro = '$nome_cont_financeiro',
	                          tel_cont_financeiro = '$tel_cont_financeiro', email_boleto = '$email_boleto' where id_cliente = $id");
	   
	   
	   echo "UPDATE cliente SET
	                          nome_cliente = '$nome', cnpj = '$cnpj', razao_social = '$razao_social', nome_fantasia = '$nome_fantasia',
	                          id_resp_cliente = '$id_resp_cliente', nome_repr_legal = '$nome_repr_legal', nome_cont_financeiro = '$nome_cont_financeiro',
	                          tel_cont_financeiro = '$tel_cont_financeiro', email_boleto = '$email_boleto' where id_cliente = $id";
	
	   // $stmt = $con->prepare("UPDATE cliente SET
	     //                     nome_cliente = 'testnado' where id_cliente = $id;");


            try {
                $stmt->execute();
            } catch ( Exception $e ) {
                echo 'Erro ao att';
                exit ();
            }
    }

   //$stmt->execute();

?>