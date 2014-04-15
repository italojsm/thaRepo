<?php

error_reporting(E_ALL);
 ini_set("display_errors", 1);

   include ('conexao.php');
   
   $con = Conexao::getInstance();


    $titulo = strtolower($_POST['titulo']);


    $sql = "SELECT * FROM ". $titulo .";";
    
    //echo $sql;

    $stmt = $con->prepare($sql);
    $stmt->execute();
   
 
   
?>


    <!-- 
        se por um acaso do destino, a estrutura da tabela não for a mesma para os três itens (cliente, projeto, contrato), tenho que lembrar de fazer com a estrutura de 3 tabelas referenciadas por um id
        respectivo ao item e chamar esse id na função load na pagina de Dashboard.
    
    -->
    <!-- <table class="table table-striped table-bordered">-->

     <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> <?php echo $titulo;?> </th>
                    <th> Rentabilidade R$ Realizada</th>
                    <th> Rentabilidade R$ Prevista</th>
                    <th> Rentabilidade % Realizada</th>
                    <th> Rentabilidade % Prevista</th>
                  </tr>
                </thead>
                <tbody>
                
                <?php  while($row = $stmt->fetch(PDO::FETCH_BOTH)){ ?>
                
                  <tr>
                    <td> <?php echo $row[1]; ?> </td>
                    <td> 81 </td>
                    <td> 80 </td>
                    <td> 90 %</td>
                    <td> 91 %</td>
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