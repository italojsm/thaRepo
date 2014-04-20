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
            
          
		$sth = $this->dbh->prepare("UPDATE `cliente` SET `nome_cliente`= ?,`cnpj`=?,`razao_social`= ?,`nome_fantasia`=?, `id_resp_cliente` = ?,"
                                           . "`nome_repr_legal`=?,`nome_cont_financeiro`=?,"
                                           . "`tel_cont_financeiro`=?,`email_boleto`=? WHERE id_cliente = ?");
		$sth->execute(array($cliente->nome_cliente, $cliente->cnpj, $cliente->razao_social, $cliente->nome_fantasia, $cliente->id_resp_cliente ,
                                    $cliente->nome_repr_legal, $cliente->nome_cont_financeiro, $cliente->tel_cont_financeiro,$cliente->email_boleto, $cliente->id));				
		return json_encode(1);
	}
        
        public function deletaCliente($id){		
            
          
		$sth = $this->dbh->prepare("UPDATE `cliente` SET `fl_inativo`= 1 WHERE id_cliente = ?");
		$sth->execute(array($id));				
		return json_encode(1);
	}
        
        public function insereCliente($cliente){		
            
          
		$sth = $this->dbh->prepare("INSERT INTO `cliente`(`nome_cliente`, `cnpj`, `razao_social`, `nome_fantasia`, `id_resp_cliente`, `nome_repr_legal`,"
                                                                . " `nome_cont_financeiro`, `tel_cont_financeiro`, `email_boleto`) VALUES (?,?,?,?,?,?,?,?,?)");
		$sth->execute(array($cliente->nome_cliente, $cliente->cnpj, $cliente->razao_social, $cliente->nome_fantasia,
                                 $cliente->id_resp_cliente , $cliente->nome_repr_legal, $cliente->nome_cont_financeiro, $cliente->tel_cont_financeiro,$cliente->email_boleto));				
                //$sth->execute(array('$cliente->nome_cliente', '131313', '$cliente->razao_social', '$cliente->nome_fantasia',
                  //                  '1' , '$cliente->nome_repr_legal', '$cliente->nome_cont_financeiro', '$2222222','$cliente->email_boleto'));				
		return json_encode($this->dbh->lastInsertId());
	}

        
}

//json_decode('{"nome_cliente":"12121","cnpj":"21.212","razao_social":"1221","nome_fantasia":"121212","nome_repr_legal":"121212","nome_cont_financeiro":"1212","tel_cont_financeiro":"1212","email_boleto":"121212"}')



/*
$cliente = new Cliente('localhost','root','toor','falqontrol');

print '<pre>';
print $cliente->insereCliente(json_decode('{"nome_cliente":"12121","cnpj":"21.212","razao_social":"1221","nome_fantasia":"121212","nome_repr_legal":"121212","nome_cont_financeiro":"1212","tel_cont_financeiro":"1212","email_boleto":"121212"}'));
print '</pre>';
 */

?>