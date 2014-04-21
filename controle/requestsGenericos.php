<?php
error_reporting(E_ALL);
 ini_set("display_errors", 1);

/*
function __autoload($className){
    include_once('models/$className.php');
}*/
 
//include_once('../conexao.php');
 include_once('models/genericos.php');

 
$contrato = new Contrato('localhost','root','toor','falqontrol');
 

if(!isset($_POST['action'])) {
	print json_encode(0);
	return;
}
 

switch($_POST['action']) {
    
    /********** BASE COMERCIAL ************/
    
    case 'getBaseComercial':
        print $contrato->getBaseComercial($_POST['id']);
    break;

    case 'atualizaBaseComercial':
        $cont = new stdClass;
        $cont = json_decode($_POST['cont']);
        print $contrato->atualizaBaseComercial($cont);
    break;

    case 'deletaBaseComercial':
        print $contrato->deletaBaseComercial($_POST['id']);
    break;

    case 'insereBaseComercial':
         $cont = new stdClass;
         $cont = json_decode($_POST['baseComercial']);
          print $contrato->insereBaseComercial($cont);
    break;
/********** FIM BASE COMERCIAL ************/    

/********** BASE OPERACIONAL ************/
    case 'getBaseOperacional':
        print $contrato->getBaseOperacional($_POST['id']);
    break;

    case 'atualizaBaseOperacional':
        $cont = new stdClass;
        $cont = json_decode($_POST['cont']);
        print $contrato->atualizaBaseOperacional($cont);
    break;

    case 'deletaBaseOperacional':
        print $contrato->deletaBaseOperacional($_POST['id']);
    break;

    case 'insereBaseOperacional':
         $cont = new stdClass;
         $cont = json_decode($_POST['baseOperacional']);
          print $contrato->insereBaseOperacional($cont);
    break;

/********** FIM BASE OPERACIONAL ************/


/********** TIPO INTEL ************/
    case 'getIntel':
        print $contrato->getIntel($_POST['id']);
    break;

    case 'atualizaTipoIntel':
        $cont = new stdClass;
        $cont = json_decode($_POST['cont']);
        print $contrato->atualizaTipoIntel($cont);
    break;

    case 'deletaTipoIntel':
        print $contrato->deletaTipoIntel($_POST['id']);
    break;

    case 'insereTipoIntel':
         $cont = new stdClass;
         $cont = json_decode($_POST['tipoIntel']);
          print $contrato->insereTipoIntel($cont);
    break;

/********** FIM TIPO INTEL ************/

/********** ETAPA ************/
    case 'getEtapa':
        print $contrato->getEtapa($_POST['id']);
    break;

    case 'atualizaEtapa':
        $cont = new stdClass;
        $cont = json_decode($_POST['cont']);
        print $contrato->atualizaEtapa($cont);
    break;

    case 'deletaEtapa':
        print $contrato->deletaEtapa($_POST['id']);
    break;

    case 'insereEtapa':
         $cont = new stdClass;
         $cont = json_decode($_POST['etapa']);
          print $contrato->insereEtapa($cont);
    break;

/********** FIM ETAPA ************/

/********** ENTREGA ************/
    case 'getEntrega':
        print $contrato->getEntrega($_POST['id']);
    break;

    case 'atualizaEntrega':
        $cont = new stdClass;
        $cont = json_decode($_POST['cont']);
        print $contrato->atualizaEntrega($cont);
    break;

    case 'deletaEntrega':
        print $contrato->deletaEntrega($_POST['id']);
    break;

    case 'insereEntrega':
         $cont = new stdClass;
         $cont = json_decode($_POST['entrega']);
          print $contrato->insereEntrega($cont);
    break;

/********** FIM ENTREGA ************/

}

/*
print '<pre>';
var_dump(json_decode('{"nome_cliente":"12121","cnpj":"21.212","razao_social":"1221","nome_fantasia":"121212","nome_repr_legal":"121212","nome_cont_financeiro":"1212","tel_cont_financeiro":"1212","email_boleto":"121212"}'));
print '</pre>'; */
exit();

?>