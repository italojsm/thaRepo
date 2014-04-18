<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Cliente {
	
	private $dbh;
	
	public function __construct($host,$user,$pass,$db)	{		
		$this->dbh = new PDO("mysql:host=".$host.";dbname=".$db,$user,$pass);		
	}
        
        public function getClientes($id){				
		$sth = $this->dbh->prepare("SELECT * FROM cliente WHERE id_cliente = ?");
		$sth->execute(array($id));
                //$sth->execute();
		return json_encode($sth->fetchAll());
	}
        
        public function updateCliente($cliente){		
            
          
		$sth = $this->dbh->prepare("UPDATE `cliente` SET `nome_cliente`= ?,`cnpj`=?,`razao_social`= ?,`nome_fantasia`=?,"
                                           . "`nome_repr_legal`=?,`nome_cont_financeiro`=?,"
                                           . "`tel_cont_financeiro`=?,`email_boleto`=? WHERE id_cliente = ?");
		$sth->execute(array($cliente->nome_cliente, $cliente->cnpj, $cliente->razao_social, $cliente->nome_fantasia,
                                    $cliente->nome_repr_legal, $cliente->nome_cont_financeiro, $cliente->tel_cont_financeiro,$cliente->email_boleto, $cliente->id));				
		return json_encode(1);
	}

        
}


/*
$cliente = new Cliente('localhost','root','toor','falqontrol');

print '<pre>';
print $cliente->updateCliente();
print '</pre>';
 */

?>