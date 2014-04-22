<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Projeto {
	
	private $dbh;
	
	public function __construct($host,$user,$pass,$db)	{		
		$this->dbh = new PDO("mysql:host=".$host.";dbname=".$db,$user,$pass);		
	}
        
        public function getProjeto($id){				
		$sth = $this->dbh->prepare("SELECT * FROM projeto WHERE id_projeto = ?");
		$sth->execute(array($id));
                //$sth->execute();
		return json_encode($sth->fetchAll());
	}
        
        public function atualizaProjeto($projeto){		
            
          
		$sth = $this->dbh->prepare("UPDATE `projeto` SET `nome_projeto`= ?,`desc_projeto`=?,`id_contrato`= ?,`id_base_operacoes`=?, `id_base_comercial` = ?,"
                                           . "`id_entrega`=?, `id_tipo_inteligencia`=?, `id_etapa`=?  WHERE id_projeto = ?");
		$sth->execute(array($projeto->nome_projeto, $projeto->desc_projeto, $projeto->id_contrato, $projeto->id_base_operacoes,
                                 $projeto->id_base_comercial , $projeto->id_entrega, $projeto->id_tipo_inteligencia , $projeto->id_etapa, $projeto->id));				
		return json_encode(1);
	}
        
        public function deletaContrato($id){		
            
          
		$sth = $this->dbh->prepare("UPDATE `contrato` SET `fl_inativo`= 1 WHERE id_contrato = ?");
		$sth->execute(array($id));				
		return json_encode(1);
	}
        
        public function insereProjeto($projeto){		
            
          
		$sth = $this->dbh->prepare("INSERT INTO `projeto` (`nome_projeto`, `desc_projeto`, `id_contrato`, `id_base_operacoes`, `id_base_comercial`, `id_entrega`, `id_tipo_inteligencia`, `id_etapa`) VALUES (?,?,?,?,?,?,?,?)");
		$sth->execute(array($projeto->nome_projeto, $projeto->desc_projeto, $projeto->id_contrato, $projeto->id_base_operacoes,
                                 $projeto->id_base_comercial , $projeto->id_entrega, $projeto->id_tipo_inteligencia , $projeto->id_etapa));				
                
		return json_encode($this->dbh->lastInsertId());
	}

        
}


?>