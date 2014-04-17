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
            
            
                $sth = $this->dbh->prepare("Select fl_aprv_responsavel from despesas WHERE id_despesa= 2");
                $sth->execute();
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
echo var_dump(json_decode($despesas->getDespesas()));
echo '</pre>';
*/
?>