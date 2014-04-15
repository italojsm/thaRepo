<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

   include ('conexao.php');
   
   $con = Conexao::getInstance();


    $id = $_POST['id'];
    $tipo = $_POST['tipo'];


    $sql = "SELECT * FROM ". $tipo ." WHERE id_".$tipo. " = ". $id .";";
    
    //echo $sql;
    
    //break;

    $stmt = $con->prepare($sql);
    $stmt->execute();
   
?>


    <!-- 
        se por um acaso do destino, a estrutura da tabela não for a mesma para os três itens (cliente, projeto, contrato), tenho que lembrar de fazer com a estrutura de 3 tabelas referenciadas por um id
        respectivo ao item e chamar esse id na função load na pagina de Dashboard.
    
    -->


   <!--<table class="table table-striped table-bordered">-->
     <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> <?php echo $tipo;?> </th>
                    <th> Rentabilidade R$ Realizada</th>
                    <th> Rentabilidade R$ Prevista</th>
                    <th> Rentabilidade % Realizada</th>
                    <th> Rentabilidade % Prevista</th>
                  </tr>
                </thead>
                <tbody>
                
                <?php  while($row = $stmt->fetch(PDO::FETCH_BOTH)){ ?>
                
    <?php echo $row['1'];?>
                  <tr>
                    <td> Projeto </td>
                    <td> 95 </td>
                    <td> 90 </td>
                    <td> 90 %</td>
                    <td> 91 %</td>
                  </tr>
                  <tr>
                    <td> Etapa </td>
                    <td> 95 </td>
                    <td> 90 </td>
                    <td> 90 %</td>
                    <td> 91 %</td>
                  </tr>
                  <tr>
                    <td> Atividade </td>
                    <td> 95 </td>
                    <td> 90 </td>
                    <td> 51 %</td>
                    <td> 55 %</td>
                  </tr>
                  <tr>
                    <td> Tarefa </td>
                    <td> 45 </td>
                    <td> 40 </td>
                    <td> 31 %</td>
                    <td> 30 %</td>
                  </tr>
                    <td> Tarefa </td>
                    <td> 40 </td>
                    <td> 39 </td>
                    <td> 20 %</td>
                    <td> 25 %</td>
                  </tr>
                
                <?php } ?>
                </tbody>
              </table>           
              
              
              
              
              
              
              
              
              
              
              
              
              
              <!--
              
              
                   <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> Cliente </th>
                    <th> Rentabilidade R$</th>
                    <th> Rentabilidade %</th>
                    <th> Download</th>
                    <th class="td-actions"> </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td> Fresh Web Development Resources </td>
                    <td> http://www.egrappler.com/ </td>
                    <td class="td-actions"><a href="javascript:;" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a><a href="javascript:;" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>
                  </tr>
                  <tr>
                    <td> Fresh Web Development Resources </td>
                    <td> http://www.egrappler.com/ </td>
                    <td class="td-actions"><a href="javascript:;" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a><a href="javascript:;" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>
                  </tr>
                  <tr>
                    <td> Fresh Web Development Resources </td>
                    <td> http://www.egrappler.com/ </td>
                    <td class="td-actions"><a href="javascript:;" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a><a href="javascript:;" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>
                  </tr>
                  <tr>
                    <td> Fresh Web Development Resources </td>
                    <td> http://www.egrappler.com/ </td>
                    <td class="td-actions"><a href="javascript:;" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a><a href="javascript:;" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>
                  </tr>
                  <tr>
                    <td> Fresh Web Development Resources </td>
                    <td> http://www.egrappler.com/ </td>
                    <td class="td-actions"><a href="javascript:;" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a><a href="javascript:;" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>
                  </tr>
                
                </tbody>
              </table>
              
              
              
              -->