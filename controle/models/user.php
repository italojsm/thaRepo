<?php
 
class User {
 
    private $dbh;
 
    public function __construct($host,$user,$pass,$db)  {
    $this->dbh = new PDO("mysql:host=".$host.";dbname=".$db,$user,$pass);
    }
    
    
    
    public function getUsers(){
        $sth = $this->dbh->prepare("SELECT * FROM funcionario");
        $sth->execute();
        return json_encode($sth->fetchAll());
    }
    
    
    public function getProjetos($id_cliente){
        $sth = $this->dbh->prepare("SELECT id_projeto from contrato where id_contrato in (
                                            SELECT  id_contrato FROM `cliente` WHERE id_cliente = ?)");
        $sth->execute(array($user->id));
        $sth->execute();
        return json_encode($sth->fetchAll());
    }
}


?>