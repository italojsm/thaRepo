<?php
 
class Despesa {
 
    private $dbh;
    
    //CONEXÂO
    public function __construct($host,$user,$pass,$db)  {
    $this->dbh = new PDO("mysql:host=".$host.";dbname=".$db,$user,$pass);
    }
    
    
    
    public function getDespesas(){
                
        $sth = $this->dbh->prepare("Select despesas.*, funcionario.nome from despesas left join funcionario on despesas.id_funcionario = funcionario.id_funcionario");
        $sth->execute();
        return json_encode($sth->fetchAll());
    }
    
    
    
    //INSERT
   public function add($user){		
	}
	
        
        //DELETE
	public function delete($user){				
		$sth = $this->dbh->prepare("DELETE FROM users WHERE id=?");
		$sth->execute(array($user->id));
		return json_encode(1);
	}
	
        
        //UPDATE
	public function updateValue($despesa){		
            
                    
            //obetem responsavel pelo funcionario que gerou a despesa
            /*
           $result = $this->dbh->prepare("SELECT equipe_tecnica.*, funcionario.nome FROM equipe_tecnica "
                ."left join funcionario on equipe_tecnica.id_func_resp = funcionario.id_funcionario "
                . "WHERE equipe_tecnica.id_equipe_tecnica in (SELECT id_equipe_tecnica FROM funcionario_equipe_tecnica WHERE id_funcionario = 1)");
            //$result->execute(array($despesa->func_id));
           //$result->execute();
            
            $temp = $result->fetchAll();            
            */
            //$temp[0]['id_func_resp'];
            
                $sth = $this->dbh->prepare("Select fl_aprv_responsavel from despesas WHERE id_despesa= ?");
                $sth->execute(array($despesa->id));
                //return json_encode($sth->fetchAll());		
               // $sth->execute(array($despesa->newvalue, $despesa->id));				
                
                $dados = $sth->fetchAll();
                
                if(is_null($dados[0]['fl_aprv_responsavel'])){
                    $sth = $this->dbh->prepare("UPDATE despesas SET fl_aprv_responsavel =? WHERE id_despesa=?");
                    $sth->execute(array($despesa->newvalue, $despesa->id));                    
                    return json_encode(1);	                    
                }else{
                    $sth = $this->dbh->prepare("UPDATE despesas SET fl_aprv_financeiro =? WHERE id_despesa=?");
                    $sth->execute(array($despesa->newvalue, $despesa->id));				
                    return json_encode(1);	                    
                }
                
                /*
		$sth = $this->dbh->prepare("UPDATE despesas SET fl_aprv_responsavel =? WHERE id_despesa=?");
		$sth->execute(array($despesa->newvalue, $despesa->id));				
		return json_encode(1);	
                 * */
                 
	}
}

/*
$despesas = new Despesa('localhost','root','toor','falqontrol');

echo '<pre>';
echo var_dump($despesas->updateValue());
echo '</pre>';
*/
?>