<?php
class Conexao extends PDO {
 
    private static $instancia;
 
    public function Conexao($dsn, $username = "", $password = "") {
        // O construtro abaixo é o do PDO
        parent::__construct($dsn, $username, $password);
    }
 
    public static function getInstance() {
      
        // Se o a instancia não existe eu faço uma
        if(!isset( self::$instancia )){
            try {
                self::$instancia = new Conexao("mysql:host=localhost;dbname=falqontrol", "root", "toor");
            } catch ( Exception $e ) {
                echo 'Erro ao conectar';
                exit ();
            }
        }
        // Se já existe instancia na memória eu retorno ela
        
        return self::$instancia;
        
    }
}




/*

$stmt = Conexao::getInstance();


$cliente = $_POST["cliente"];
$CNPJ = $_POST["cnpj"];
$nomeFantasia =  $_POST["nomeFantasia"];
$razaoSocial = $_POST["razaosSocial"];
$responsavel = $_POST["reponsavel"];
$estado = $_POST["estado"];
$representanteLegal = $_POST["representanteLegal"];
$controleFinanceiro = $_POST["controleFinanceiro"];
$telControleFinanceiro = $_POST["telControleFinanceiro"];
$boleto = $_POST["boleto"];




$sql = "INSERT INTO 
        cliente (nome_cliente, cnpj, razao_social, nome_fantasia, id_resp_cliente, id_endereco, nome_repr_legal, nome_cont_financeiro, tel_cont_financeiro, fl_iss, email_boleto, dt_inicio_hst)
        VALUES ('$cliente', '$CNPJ', '$razaoSocial', '$nomeFantasia', '$responsavel', '$estado', '$representanteLegal', '$controleFinanceiro', '$telControleFinanceiro', 1, '$boleto', '2014-02-11')";



$stmt->query($sql);
*/
?>