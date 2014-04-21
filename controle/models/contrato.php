<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Contrato {
	
	private $dbh;
	
	public function __construct($host,$user,$pass,$db)	{		
		$this->dbh = new PDO("mysql:host=".$host.";dbname=".$db,$user,$pass);		
	}
        
        public function getContratos($id){				
		$sth = $this->dbh->prepare("SELECT * FROM contrato WHERE id_contrato = ?");
		$sth->execute(array($id));
                //$sth->execute();
		return json_encode($sth->fetchAll());
	}
        
        public function updateContrato($contrato){		
            
          
		$sth = $this->dbh->prepare("UPDATE `contrato` SET `nome_contrato`= ?,`desc_contrato`=?,`id_cliente`= ?,`id_resp_contrato`=?, `dt_inicio_vigencia` = ?,"
                                           . "`dt_fim_vigencia`=?  WHERE id_contrato = ?");
		$sth->execute(array($contrato->nome_contrato, $contrato->desc_contrato, $contrato->id_cliente, $contrato->id_resp_contrato, $contrato->dt_inicio_vigencia ,
                                    $contrato->dt_fim_vigencia, $contrato->id));				
		return json_encode(1);
	}
        
        public function deletaContrato($id){		
            
          
		$sth = $this->dbh->prepare("UPDATE `contrato` SET `fl_inativo`= 1 WHERE id_contrato = ?");
		$sth->execute(array($id));				
		return json_encode(1);
	}
        
        public function insereContrato($contrato){		
            
          
		$sth = $this->dbh->prepare("INSERT INTO `contrato`(`nome_contrato`, `desc_contrato`, `id_cliente`, `id_resp_contrato`, `dt_inicio_vigencia`, `dt_fim_vigencia`) VALUES (?,?,?,?,?,?)");
		$sth->execute(array($contrato->nome_contrato, $contrato->desc_contrato, $contrato->id_cliente, $contrato->id_resp_contrato,
                                 $contrato->dt_inicio_vigencia , $contrato->dt_fim_vigencia));				
                
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