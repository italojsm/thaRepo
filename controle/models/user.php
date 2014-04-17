<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);


class User {
 
    private $dbh;
 
    public function __construct($host,$user,$pass,$db)  {
       
    $this->dbh = new PDO("mysql:host=".$host.";dbname=".$db,$user,$pass);
    }
    
    
    
    public function getUsers(){
      
        $sth = $this->dbh->prepare("SELECT * FROM funcionario");
        $sth->execute();
        return json_encode($sth->fetchAll());          
        //return $sth->fetchAll(PDO::FETCH_ASSOC);          
    
    }
    
    
}

/*
$users = new User('localhost','root','toor','falqontrol');

print '<pre>';
var_dump($users->getUsers());
print '</pre>';
*/
?>