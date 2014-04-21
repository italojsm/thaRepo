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
        
          /********** BASE COMERCIAL ************/
        public function getBaseComercial($id){				
		$sth = $this->dbh->prepare("SELECT * FROM base_comercial WHERE id_base_comercial = ?");
		$sth->execute(array($id));
                //$sth->execute();
		return json_encode($sth->fetchAll());
	}
        
        public function atualizaBaseComercial($base){		
            
          
		$sth = $this->dbh->prepare("UPDATE `base_comercial` SET `nome_base_comercial`= ?,`desc_base_comercial`=? WHERE id_base_comercial = ?");
		$sth->execute(array($base->nome_base_comercial, $base->desc_base_comercial, $base->id));				
		return json_encode(1);
	}
        
        public function deletaBaseComercial($id){		
            
          
		$sth = $this->dbh->prepare("UPDATE `base_comercial` SET `fl_inativo`= 1 WHERE id_base_comercial = ?");
		$sth->execute(array($id));				
		return json_encode(1);
	}
        
        public function insereBaseComercial($base){		
            
          
		$sth = $this->dbh->prepare("INSERT INTO `base_comercial`(`nome_base_comercial`, `desc_base_comercial`) VALUES (?,?)");
		$sth->execute(array($base->nome_base_comercial, $base->desc_base_comercial));				
                
		return json_encode($this->dbh->lastInsertId());
	}

        /********** FIM BASE COMERCIAL ************/  
        
        
        /********** BASE OPERACIONAL ************/
         public function getBaseOperacional($id){				
		$sth = $this->dbh->prepare("SELECT * FROM base_operacoes WHERE id_base_operacoes = ?");
		$sth->execute(array($id));
                //$sth->execute();
		return json_encode($sth->fetchAll());
	}
        
        public function atualizaBaseOperacional($base){		
            
          
		$sth = $this->dbh->prepare("UPDATE `base_operacoes` SET `nome_base_operacoes`= ?,`desc_base_operacoes`=? WHERE id_base_operacoes = ?");
		$sth->execute(array($base->nome_base_operacoes, $base->desc_base_operacoes, $base->id));				
		return json_encode(1);
	}
        
        public function deletaBaseOperacional($id){		
            
          
		$sth = $this->dbh->prepare("UPDATE `base_operacoes` SET `fl_inativo`= 1 WHERE id_base_operacoes = ?");
		$sth->execute(array($id));				
		return json_encode(1);
	}
        
         public function insereBaseOperacional($base){		
            
          
		$sth = $this->dbh->prepare("INSERT INTO `base_operacoes`(`nome_base_operacoes`, `desc_base_operacoes`) VALUES (?,?)");
		$sth->execute(array($base->nome_base_operacoes, $base->desc_base_operacoes));				
                
		return json_encode($this->dbh->lastInsertId());
	}
        
        
        /********** FIM BASE OPERACIONAL ************/
        
        
        /********** TIPO INTEL ************/
         public function getIntel($id){				
		$sth = $this->dbh->prepare("SELECT * FROM tipo_inteligencia WHERE id_tipo_inteligencia = ?");
		$sth->execute(array($id));
                //$sth->execute();
		return json_encode($sth->fetchAll());
	}
        
        public function atualizaTipoIntel($intel){		
            
          
		$sth = $this->dbh->prepare("UPDATE `tipo_inteligencia` SET `nome_tipo_inteligencia`= ?,`desc_tipo_inteligencia`=? WHERE id_tipo_inteligencia = ?");
		$sth->execute(array($intel->nome_tipo_inteligencia, $intel->desc_tipo_inteligencia, $intel->id));				
		return json_encode(1);
	}
        
        public function deletaTipoIntel($id){		
            
          
		$sth = $this->dbh->prepare("UPDATE `tipo_inteligencia` SET `fl_inativo`= 1 WHERE id_tipo_inteligencia = ?");
		$sth->execute(array($id));				
		return json_encode(1);
	}
        
         public function insereTipoIntel($intel){		
            
          
		$sth = $this->dbh->prepare("INSERT INTO `tipo_inteligencia` (`nome_tipo_inteligencia`, `desc_tipo_inteligencia`) VALUES (?,?)");
		$sth->execute(array($intel->nome_tipo_inteligencia, $intel->desc_tipo_inteligencia));				
                
		return json_encode($this->dbh->lastInsertId());
	}
        
        
        /********** FIM TIPO INTEL ************/
        
        
                /********** ETAPA ************/
         public function getEtapa($id){				
		$sth = $this->dbh->prepare("SELECT * FROM etapa WHERE id_etapa = ?");
		$sth->execute(array($id));
                //$sth->execute();
		return json_encode($sth->fetchAll());
	}
        
        public function atualizaEtapa($etapa){		
            
          
		$sth = $this->dbh->prepare("UPDATE `etapa` SET `nome_etapa`= ?,`desc_etapa`=? WHERE id_etapa = ?");
		$sth->execute(array($etapa->nome_etapa, $etapa->desc_etapa, $etapa->id));				
		return json_encode(1);
	}
        
        public function deletaEtapa($id){		
            
          
		$sth = $this->dbh->prepare("UPDATE `etapa` SET `fl_inativo`= 1 WHERE id_etapa = ?");
		$sth->execute(array($id));				
		return json_encode(1);
	}
        
         public function insereEtapa($etapa){		
            
          
		$sth = $this->dbh->prepare("INSERT INTO `etapa` (`nome_etapa`, `desc_etapa`) VALUES (?,?)");
		$sth->execute(array($etapa->nome_etapa, $etapa->desc_etapa));				
                
		return json_encode($this->dbh->lastInsertId());
	}
        
        
        /********** FIM ETAPA ************/
        
        
        /********** ETAPA ************/
         public function getEntrega($id){				
		$sth = $this->dbh->prepare("SELECT * FROM entrega WHERE id_entrega = ?");
		$sth->execute(array($id));
                //$sth->execute();
		return json_encode($sth->fetchAll());
	}
        
        public function atualizaEntrega($entrega){		
            
          
		$sth = $this->dbh->prepare("UPDATE `entrega` SET `nome_entrega`= ?,`desc_entrega`=? , `fl_servico_produto` = ? WHERE id_entrega = ?");
		$sth->execute(array($entrega->nome_entrega, $entrega->desc_entrega, $entrega->fl_servico_produto, $entrega->id));				
		return json_encode(1);
	}
        
        public function deletaEntrega($id){		
            
          
		$sth = $this->dbh->prepare("UPDATE `entrega` SET `fl_inativo`= 1 WHERE id_entrega = ?");
		$sth->execute(array($id));				
		return json_encode(1);
	}
        
         public function insereEntrega($entrega){		
            
          
		$sth = $this->dbh->prepare("INSERT INTO `entrega` (`nome_entrega`, `desc_entrega`, `fl_servico_produto`) VALUES (?,?,?)");
		$sth->execute(array($entrega->nome_entrega, $entrega->desc_entrega, $entrega->fl_servico_produto));				
                
		return json_encode($this->dbh->lastInsertId());
	}
        
        
        /********** FIM ETAPA ************/
        
}

//json_decode('{"nome_cliente":"12121","cnpj":"21.212","razao_social":"1221","nome_fantasia":"121212","nome_repr_legal":"121212","nome_cont_financeiro":"1212","tel_cont_financeiro":"1212","email_boleto":"121212"}')



/*
$cliente = new Cliente('localhost','root','toor','falqontrol');

print '<pre>';
print $cliente->insereCliente(json_decode('{"nome_cliente":"12121","cnpj":"21.212","razao_social":"1221","nome_fantasia":"121212","nome_repr_legal":"121212","nome_cont_financeiro":"1212","tel_cont_financeiro":"1212","email_boleto":"121212"}'));
print '</pre>';
 */

?>