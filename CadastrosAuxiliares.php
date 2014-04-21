<?php
include("login/seguranca.php"); //Inclui o arquivo com o sistema de segurança
    protegePagina(); // Chama a função que protege a página
?>
<!DOCTYPE html>

<!--[if lt IE 7 ]> <html lang="en" class="ie6 ielt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7 ielt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
<head>
    
<meta charset="utf-8">
<title>Cadastros Extras</title>


    <link href="metro/css/metro-bootstrap.css" rel="stylesheet">
    <link href="metro/css/metro-bootstrap-responsive.css" rel="stylesheet">
    <link href="metro/css/iconFont.css" rel="stylesheet">
    <link href="metro/css/docs.css" rel="stylesheet">
    <!--<link href="../metro/css/myStyle.css" rel="stylesheet">-->
    <link href="metro/js/prettify/prettify.css" rel="stylesheet">
    <link rel="stylesheet" href="css/jquery.treegrid.css">
    <link rel="stylesheet" type="text/css" href="css/datepickr.css" /> 
   <!-- <link href="css/bootstrap3.css" rel="stylesheet">-->

    <!-- Load JavaScript Libraries -->
    <script src="metro/js/jquery/jquery.min.js"></script>
    <script src="metro/js/jquery/jquery.widget.min.js"></script>
    <script src="metro/js/jquery/jquery.mousewheel.js"></script>
    <script src="metro/js/prettify/prettify.js"></script>
    <script src="metro/js/metro.min.js"></script>
    <script src="js/jquery.lightbox_me.js"></script>
    

    <!-- Metro UI CSS JavaScript plugins -->
    <script src="metro/js/load-metro.js"></script>

    <!-- Local JavaScript -->
    <script src="metro/js/docs.js"></script>
    <script src="metro/js/github.info.js"></script>
    
    
    <script>                jQuery.fn.center = function () {
    this.css("position","absolute");
    this.css("top", Math.max(0, (($(window).height() - $(this).outerHeight()) / 2) + 
                                                $(window).scrollTop()) + "px");
    this.css("left", Math.max(0, (($(window).width() - $(this).outerWidth()) / 2) + 
                                                $(window).scrollLeft()) + "px");
    return this;
};
    
        
        $(document).ready(function(){
            
		
                $('#formInsertBaseComercial').hide();
                $('#attBaseComercial').hide(); 
                $('#attBaseOperacional').hide();
                $('#attIntel').hide();
                $('#attEntrega').hide();
                $('#insertEtapa').hide();
                $('#attEtapa').hide();
                $('#formInsertBaseOperacional').hide();
                $('#insertEntrega').hide();
                $('#formIntel').hide();
                
                
                /*********************  CRUD BASE COMERCIAL ****************/
                
                //INSERIR Base comercial
                $("#inserirBaseComercial").click(function(){

                    $('#formInsertBaseComercial').lightbox_me({                            
                            closeClick: false,
                            onLoad: function(){

                                $('#formBaseComercial').submit(function(e){
                                     var BaseComercial = new Object();
             

                                     BaseComercial.nome_base_comercial =         $(this).find('input[name="nome_base_comercial"]').val();
                                     BaseComercial.desc_base_comercial =                 $(this).find('input[name="desc_base_comercial"]').val();
                                     
                                     
                                     var BaseComercialJson = JSON.stringify(BaseComercial);
                                    
                                  //alert(BaseComercialJson);
                                         //console.log(clienteJson);
                                      $.post('controle/requestsGenericos.php',
                                          {
                                                  action: 'insereBaseComercial',			
                                                  baseComercial: BaseComercialJson
                                          },
                                          function(data, textStatus){
                                             // alert(data.nome_cliente);
                                              
                                             $("#formBaseComercial").trigger('close');
                                             
                                             $.Dialog({
                                                shadow: true,
                                                overlay: true,
                                                flat: true,
                                                icon: '<span class="icon-cube-2"></span>',
                                                title: 'Base Comercial',
                                                width: 500,
                                                padding: 10,
                                                onShow: function(){                        
                                                        $('.window-overlay').click(function(){
                                                               location.reload();
                                                         });
                                                        $('div.caption').find('button.btn-close').click(function(){
                                                            location.reload();
                                                        });                                
                                                },
                                                content: 'Base Comercial inserida com Sucesso!! xD'
                                            });
                                              
                                          }, 
                                          "json"		
                                      );
                                    
                                    e.preventDefault();
                                });
                          	
                            }
                        });
                    
                });//FINAL INSERIR CONTRATO
                
                
                //Editar Base COmercial
	        $("a.edit").click(function(e){
                       
                       var txt = $(this).attr('rel');
                       
                       //alert(txt);
                       
                        $("#attBaseComercial").lightbox_me({                            
                            closeClick: false,
                            onLoad: function(){
                              
                                //alert(txt);
                                $.post('controle/requestsGenericos.php',
                                    {
                                            action: 'getBaseComercial',			
                                            id: txt
                                    },
                                    function(data, textStatus){           
                                        $("#formAttBaseComercial").find('input[name="nome_base_comercial"]').val(data[0].nome_base_comercial);
                                        $("#formAttBaseComercial").find('input[name="desc_base_comercial"]').val(data[0].desc_base_comercial);
                                       
                                        //Atualiza Cliente
                                        $("#formAttBaseComercial").submit(function(e){

                                            var baseComercial = new Object();
                                                    //alert(txt);
                                             baseComercial.id = txt;
                                             baseComercial.nome_base_comercial =         $(this).find('input[name="nome_base_comercial"]').val();
                                             baseComercial.desc_base_comercial =                 $(this).find('input[name="desc_base_comercial"]').val();


                                             var baseComercialJson = JSON.stringify(baseComercial);

                                          //alert(baseComercialJson);

                                          //return false;
                                            $.post('controle/requestsGenericos.php',
                                                {
                                                        action: 'atualizaBaseComercial',			
                                                        cont: baseComercialJson
                                                },
                                                function(data, textStatus) {
//alert('traaa');

                                                    $("#formAttBaseComercial").trigger('close');

                                                     $.Dialog({
                                                        shadow: true,
                                                        overlay: true,
                                                        flat: true,
                                                        icon: '<span class="icon-cycle"></span>',
                                                        title: 'Cliente',
                                                        width: 500,
                                                        padding: 10,
                                                        onShow: function(){                        
                                                                $('.window-overlay').click(function(){
                                                                       location.reload();
                                                                 });
                                                                $('div.caption').find('button.btn-close').click(function(){
                                                                    location.reload();
                                                                });                                
                                                        },
                                                        content: 'Base Comercial Atualizada com Sucesso!! xD'
                                                    });


                                                }, 
                                                "json"		
                                           );	

                                              e.preventDefault();
                                            return false;
                                        });//final Atualiza Cliente
                                        
                                    }, 
                                    "json"		
                                );	
                            }
                        });				
                e.preventDefault();
                });//Final Edita Cliente
            
         
            
               //Remove Base Comercial
                $("a.excluir").click(function(){
                
                
                if(confirm("Deseja realmente excluir esta Base Comercial?")){
                   
               
                
                var idBase = $(this).attr('rel');
                
                //alert(idCli);
                
                   $.post('controle/requestsGenericos.php',
                    {
                            action: 'deletaBaseComercial',			
                            id: idBase
                    },
                    function(data, textStatus) {
                        $("#form").trigger('close');
                        
                    
                           $.Dialog({
                            shadow: true,
                            overlay: true,
                            flat: true,
                            icon: '<span class="icon-remove"></span>',
                            title: 'Cliente',
                            width: 500,
                            padding: 10,
                            onShow: function(){                        
                                    $('.window-overlay').click(function(){
                                           location.reload();
                                     });
                                    $('div.caption').find('button.btn-close').click(function(){
                                        location.reload();
                                    });                                
                            },
                            content: 'Base Comercial deletada com Sucesso!! xD'
                        });
                        
                    }, 
                    "json"		
                  );
                }//final if deseja remover Contrato
            });//final Remove Contrato

                /********************* FINAL CRUD BASE COMERCIAL ****************/
                
                
                
                
                /*********************  CRUD BASE OPEACIONAL ****************/
                
                
                //INSERIR BASE OPERACIONAL
                $("#inserirBaseOperacional").click(function(){

                    $('#formInsertBaseOperacional').lightbox_me({                            
                            closeClick: false,
                            onLoad: function(){

                                $('#formBaseOperacional').submit(function(e){
                                     var BaseOperacional = new Object();
             

                                     BaseOperacional.nome_base_operacoes =         $(this).find('input[name="nome_base_operacoes"]').val();
                                     BaseOperacional.desc_base_operacoes =                 $(this).find('input[name="desc_base_operacoes"]').val();
                                     
                                     
                                     var BaseOperacionalJson = JSON.stringify(BaseOperacional);
                                    
                                  //alert(BaseComercialJson);
                                         //console.log(clienteJson);
                                      $.post('controle/requestsGenericos.php',
                                          {
                                                  action: 'insereBaseOperacional',			
                                                  baseOperacional: BaseOperacionalJson
                                          },
                                          function(data, textStatus){
                                             // alert(data.nome_cliente);
                                              
                                             $("#formInsertBaseOperacional").trigger('close');
                                             
                                             $.Dialog({
                                                shadow: true,
                                                overlay: true,
                                                flat: true,
                                                icon: '<span class="icon-cube-2"></span>',
                                                title: 'Base Operacional',
                                                width: 500,
                                                padding: 10,
                                                onShow: function(){                        
                                                        $('.window-overlay').click(function(){
                                                               location.reload();
                                                         });
                                                        $('div.caption').find('button.btn-close').click(function(){
                                                            location.reload();
                                                        });                                
                                                },
                                                content: 'Base Operacional inserida com Sucesso!! xD'
                                            });
                                              
                                          }, 
                                          "json"		
                                      );
                                    
                                    e.preventDefault();
                                });
                          	
                            }
                        });
                    
                });//FINAL INSERIR BASE OPERACIONAL
                
                
                 //EDITAR BASE OPERACIONAL
	           $("a.editOP").click(function(e){
                       
                       var txt = $(this).attr('rel');
                       
                       //alert(txt);
                       
                        $("#attBaseOperacional").lightbox_me({                            
                            closeClick: false,
                            onLoad: function(){
                              
                                //alert(txt);
                                $.post('controle/requestsGenericos.php',
                                    {
                                            action: 'getBaseOperacional',			
                                            id: txt
                                    },
                                    function(data, textStatus){           
                                        $("#formAttBaseOperacional").find('input[name="nome_base_operacoes"]').val(data[0].nome_base_operacoes);
                                        $("#formAttBaseOperacional").find('input[name="desc_base_operacoes"]').val(data[0].desc_base_operacoes);
                                       
                                        //Atualiza Cliente
                                        $("#formAttBaseOperacional").submit(function(e){

                                            var baseOperacional = new Object();
                                                    //alert(txt);
                                             baseOperacional.id = txt;
                                             baseOperacional.nome_base_operacoes =         $(this).find('input[name="nome_base_operacoes"]').val();
                                             baseOperacional.desc_base_operacoes =                 $(this).find('input[name="desc_base_operacoes"]').val();


                                             var baseOperacionalJson = JSON.stringify(baseOperacional);

                                          //alert(baseComercialJson);

                                          //return false;
                                            $.post('controle/requestsGenericos.php',
                                                {
                                                        action: 'atualizaBaseOperacional',			
                                                        cont: baseOperacionalJson
                                                },
                                                function(data, textStatus) {
//alert('traaa');

                                                    $("#formAttBaseOperacional").trigger('close');

                                                     $.Dialog({
                                                        shadow: true,
                                                        overlay: true,
                                                        flat: true,
                                                        icon: '<span class="icon-cycle"></span>',
                                                        title: 'Cliente',
                                                        width: 500,
                                                        padding: 10,
                                                        onShow: function(){                        
                                                                $('.window-overlay').click(function(){
                                                                       location.reload();
                                                                 });
                                                                $('div.caption').find('button.btn-close').click(function(){
                                                                    location.reload();
                                                                });                                
                                                        },
                                                        content: 'Base Operacional Atualizada com Sucesso!! xD'
                                                    });


                                                }, 
                                                "json"		
                                           );	

                                              e.preventDefault();
                                            return false;
                                        });//FIM ATUALIZA BASE OPERACIONAL
                                        
                                    }, 
                                    "json"		
                                );	
                            }
                        });				
                e.preventDefault();
                });//Final Edita BASE OPERACIONAL
                
                //Remove Contrato
            $("a.excluirOP").click(function(){
                
                
                if(confirm("Deseja realmente excluir esta Base Operacional?")){
                   
               
                
                var idBase = $(this).attr('rel');
                
                //alert(idCli);
                
                   $.post('controle/requestsGenericos.php',
                    {
                            action: 'deletaBaseOperacional',			
                            id: idBase
                    },
                    function(data, textStatus) {
                        
                    
                           $.Dialog({
                            shadow: true,
                            overlay: true,
                            flat: true,
                            icon: '<span class="icon-remove"></span>',
                            title: 'Base Operacional',
                            width: 500,
                            padding: 10,
                            onShow: function(){                        
                                    $('.window-overlay').click(function(){
                                           location.reload();
                                     });
                                    $('div.caption').find('button.btn-close').click(function(){
                                        location.reload();
                                    });                                
                            },
                            content: 'Base Operacional deletada com Sucesso!! xD'
                        });
                        
                    }, 
                    "json"		
                  );
                }//final if deseja remover base operacional
            });//FIM REMOVE BASE OPERACIONAL
                
                /*********************  FINAL CRUD BASE OPEACIONAL ****************/
                
                
                  /*********************  CRUD TIPO INTELIGENCIA ****************/
                
                 //INSERIR TIPO INTELIGENCIA
                $("#inserirTipoInteligencia").click(function(){

                    $('#formIntel').lightbox_me({                            
                            closeClick: false,
                            onLoad: function(){

                                $('#formInsertIntel').submit(function(e){
                                     var tipoIntel = new Object();
             

                                     tipoIntel.nome_tipo_inteligencia =         $(this).find('input[name="nome_tipo_inteligencia"]').val();
                                     tipoIntel.desc_tipo_inteligencia =                 $(this).find('input[name="desc_tipo_inteligencia"]').val();
                                     
                                     
                                     var tipoIntelJson = JSON.stringify(tipoIntel);
                                    
                                  //alert(BaseComercialJson);
                                         //console.log(clienteJson);
                                      $.post('controle/requestsGenericos.php',
                                          {
                                                  action: 'insereTipoIntel',			
                                                  tipoIntel: tipoIntelJson
                                          },
                                          function(data, textStatus){
                                             // alert(data.nome_cliente);
                                              
                                             $("#formIntel").trigger('close');
                                             
                                             $.Dialog({
                                                shadow: true,
                                                overlay: true,
                                                flat: true,
                                                icon: '<span class="icon-cube-2"></span>',
                                                title: 'Tipo Inteligencia',
                                                width: 500,
                                                padding: 10,
                                                onShow: function(){                        
                                                        $('.window-overlay').click(function(){
                                                               location.reload();
                                                         });
                                                        $('div.caption').find('button.btn-close').click(function(){
                                                            location.reload();
                                                        });                                
                                                },
                                                content: 'Tipo Inteligencia inserida com Sucesso!! xD'
                                            });
                                              
                                          }, 
                                          "json"		
                                      );
                                    
                                    e.preventDefault();
                                });
                          	
                            }
                        });
                    
                });//INSERIR TIPO INTELIGENCIA
                
                    //EDITA TIPO INTEL
	           $("a.editIntel").click(function(e){
                       
                       var txt = $(this).attr('rel');
                       
                       //alert(txt);
                       
                        $("#attIntel").lightbox_me({                            
                            closeClick: false,
                            onLoad: function(){
                              
                                //alert(txt);
                                $.post('controle/requestsGenericos.php',
                                    {
                                            action: 'getIntel',			
                                            id: txt
                                    },
                                    function(data, textStatus){           
                                        $("#formAttIntel").find('input[name="nome_tipo_inteligencia"]').val(data[0].nome_tipo_inteligencia);
                                        $("#formAttIntel").find('input[name="desc_tipo_inteligencia"]').val(data[0].desc_tipo_inteligencia);
                                       
                                        //Atualiza Cliente
                                        $("#formAttIntel").submit(function(e){

                                            var tipoIntel = new Object();
                                                    //alert(txt);
                                             tipoIntel.id = txt;
                                             tipoIntel.nome_tipo_inteligencia =         $(this).find('input[name="nome_tipo_inteligencia"]').val();
                                             tipoIntel.desc_tipo_inteligencia =                 $(this).find('input[name="desc_tipo_inteligencia"]').val();


                                             var tipoIntelJson = JSON.stringify(tipoIntel);

                                          //alert(baseComercialJson);

                                          //return false;
                                            $.post('controle/requestsGenericos.php',
                                                {
                                                        action: 'atualizaTipoIntel',			
                                                        cont: tipoIntelJson
                                                },
                                                function(data, textStatus) {
//alert('traaa');

                                                    $("#attIntel").trigger('close');

                                                     $.Dialog({
                                                        shadow: true,
                                                        overlay: true,
                                                        flat: true,
                                                        icon: '<span class="icon-cycle"></span>',
                                                        title: 'Tipo Inteligencia',
                                                        width: 500,
                                                        padding: 10,
                                                        onShow: function(){                        
                                                                $('.window-overlay').click(function(){
                                                                       location.reload();
                                                                 });
                                                                $('div.caption').find('button.btn-close').click(function(){
                                                                    location.reload();
                                                                });                                
                                                        },
                                                        content: 'Tipo Inteligencia Atualizada com Sucesso!! xD'
                                                    });


                                                }, 
                                                "json"		
                                           );	

                                              e.preventDefault();
                                            return false;
                                        });//final Atualiza Cliente
                                        
                                    }, 
                                    "json"		
                                );	
                            }
                        });				
                e.preventDefault();
                });//FIM EDITA TIPO INTEL
                
                //FIM TIPO INTEL
                $("a.excluirIntel").click(function(){
                
                
                if(confirm("Deseja realmente excluir este Tipo de Inteligencia?")){
                   
               
                
                var idBase = $(this).attr('rel');
                
                //alert(idCli);
                
                   $.post('controle/requestsGenericos.php',
                    {
                            action: 'deletaTipoIntel',			
                            id: idBase
                    },
                    function(data, textStatus) {
                        
                    
                           $.Dialog({
                            shadow: true,
                            overlay: true,
                            flat: true,
                            icon: '<span class="icon-remove"></span>',
                            title: 'Tipo Inteligencia',
                            width: 500,
                            padding: 10,
                            onShow: function(){                        
                                    $('.window-overlay').click(function(){
                                           location.reload();
                                     });
                                    $('div.caption').find('button.btn-close').click(function(){
                                        location.reload();
                                    });                                
                            },
                            content: 'Tipo Inteligencia deletada com Sucesso!! xD'
                        });
                        
                    }, 
                    "json"		
                  );
                }//final if deseja remover Contrato
            });//FIM TIPO INTEL
                
                  /*********************  FINAL CRUD TIPO INTELIGENCIA ****************/
                  
                  
                   /*********************  CRUD ETAPA ****************/
                   
                    //INSERIR ETAPA
                $("#inserirEtapa").click(function(){

                    $('#insertEtapa').lightbox_me({                            
                            closeClick: false,
                            onLoad: function(){

                                $('#formInsertEtapa').submit(function(e){
                                     var Etapa = new Object();
             

                                     Etapa.nome_etapa =         $(this).find('input[name="nome_etapa"]').val();
                                     Etapa.desc_etapa =                 $(this).find('input[name="desc_etapa"]').val();
                                     
                                     
                                     var EtapaJson = JSON.stringify(Etapa);
                                    
                                 // alert(EtapaJson);
                                 // return false;
                                         //console.log(clienteJson);
                                      $.post('controle/requestsGenericos.php',
                                          {
                                                  action: 'insereEtapa',			
                                                  etapa: EtapaJson
                                          },
                                          function(data, textStatus){
                                             // alert(data.nome_cliente);
                                              
                                             $("#insertEtapa").trigger('close');
                                             
                                             $.Dialog({
                                                shadow: true,
                                                overlay: true,
                                                flat: true,
                                                icon: '<span class="icon-cube-2"></span>',
                                                title: 'Etapa',
                                                width: 500,
                                                padding: 10,
                                                onShow: function(){                        
                                                        $('.window-overlay').click(function(){
                                                               location.reload();
                                                         });
                                                        $('div.caption').find('button.btn-close').click(function(){
                                                            location.reload();
                                                        });                                
                                                },
                                                content: 'Etapa inserida com Sucesso!! xD'
                                            });
                                              
                                          }, 
                                          "json"		
                                      );
                                    
                                    e.preventDefault();
                                });
                          	
                            }
                        });
                    
                });//FIM INSERIR ETAPA
                
                //EDITA ETAPA
                $("a.editEtapa").click(function(e){
                       
                       var txt = $(this).attr('rel');
                       
                       //alert(txt);
                       
                        $("#attEtapa").lightbox_me({                            
                            closeClick: false,
                            onLoad: function(){
                              
                              // alert(txt);
                               
                               //return false;
                                $.post('controle/requestsGenericos.php',
                                    {
                                            action: 'getEtapa',			
                                            id: txt
                                    },
                                    function(data, textStatus){           
                                        $("#formAttEtapa").find('input[name="nome_etapa"]').val(data[0].nome_etapa);
                                        $("#formAttEtapa").find('input[name="desc_etapa"]').val(data[0].desc_etapa);
                                       
                                        //Atualiza Cliente
                                        $("#formAttEtapa").submit(function(e){

                                            var Etapa = new Object();
                                                    //alert(txt);
                                             Etapa.id = txt;
                                             Etapa.nome_etapa =         $(this).find('input[name="nome_etapa"]').val();
                                             Etapa.desc_etapa =                 $(this).find('input[name="desc_etapa"]').val();


                                             var EtapaJson = JSON.stringify(Etapa);

                                          //alert(baseComercialJson);

                                          //return false;
                                            $.post('controle/requestsGenericos.php',
                                                {
                                                        action: 'atualizaEtapa',			
                                                        cont: EtapaJson
                                                },
                                                function(data, textStatus) {
//alert('traaa');

                                                    $("#formAttBaseComercial").trigger('close');

                                                     $.Dialog({
                                                        shadow: true,
                                                        overlay: true,
                                                        flat: true,
                                                        icon: '<span class="icon-cycle"></span>',
                                                        title: 'Etapa',
                                                        width: 500,
                                                        padding: 10,
                                                        onShow: function(){                        
                                                                $('.window-overlay').click(function(){
                                                                       location.reload();
                                                                 });
                                                                $('div.caption').find('button.btn-close').click(function(){
                                                                    location.reload();
                                                                });                                
                                                        },
                                                        content: 'Etapa Atualizada com Sucesso!! xD'
                                                    });


                                                }, 
                                                "json"		
                                           );	

                                              e.preventDefault();
                                            return false;
                                        });//final Atualiza Cliente
                                        
                                    }, 
                                    "json"		
                                );	
                            }
                        });				
                e.preventDefault();
                });//FIM EDITA ETAPA
                
                //DELETA ETAPA
                $("a.excluirEtapa").click(function(){
                
                
                if(confirm("Deseja realmente excluir esta Etapa?")){
                   
               
                
                var idBase = $(this).attr('rel');
                
                //alert(idCli);
                
                   $.post('controle/requestsGenericos.php',
                    {
                            action: 'deletaEtapa',			
                            id: idBase
                    },
                    function(data, textStatus) {
                        
                    
                           $.Dialog({
                            shadow: true,
                            overlay: true,
                            flat: true,
                            icon: '<span class="icon-remove"></span>',
                            title: 'Etapa',
                            width: 500,
                            padding: 10,
                            onShow: function(){                        
                                    $('.window-overlay').click(function(){
                                           location.reload();
                                     });
                                    $('div.caption').find('button.btn-close').click(function(){
                                        location.reload();
                                    });                                
                            },
                            content: 'Etapa deletada com Sucesso!! xD'
                        });
                        
                    }, 
                    "json"		
                  );
                }//final if deseja remover etapa
            });//FIM DELETA ETAPA
                   
                   /********************* FIM CRUD ETAPA ****************/
                   
                   
                     /*********************  CRUD ENTREGA ****************/
                     
                     //INSERIR ENTREGA
                $("#inserirEntrega").click(function(){

                    $('#insertEntrega').lightbox_me({                            
                            closeClick: false,
                            onLoad: function(){

                                $('#formInsertEntrega').submit(function(e){
                                     var Entrega = new Object();
             

                                     Entrega.nome_entrega =         $(this).find('input[name="nome_entrega"]').val();
                                     Entrega.desc_entrega =         $(this).find('input[name="desc_entrega"]').val();
                                     Entrega.fl_servico_produto =         $(this).find('select[name="fl_servico_produto"]').val();
                                     
                                     
                                     var EntregaJson = JSON.stringify(Entrega);
                                    
                                  //alert(EntregaJson);
                                         //console.log(clienteJson);
                                      $.post('controle/requestsGenericos.php',
                                          {
                                                  action: 'insereEntrega',			
                                                  entrega: EntregaJson
                                          },
                                          function(data, textStatus){
                                             // alert(data.nome_cliente);
                                              
                                             $("#insertEntrega").trigger('close');
                                             
                                             $.Dialog({
                                                shadow: true,
                                                overlay: true,
                                                flat: true,
                                                icon: '<span class="icon-cube-2"></span>',
                                                title: 'Entrega',
                                                width: 500,
                                                padding: 10,
                                                onShow: function(){                        
                                                        $('.window-overlay').click(function(){
                                                               location.reload();
                                                         });
                                                        $('div.caption').find('button.btn-close').click(function(){
                                                            location.reload();
                                                        });                                
                                                },
                                                content: 'Entrega inserida com Sucesso!! xD'
                                            });
                                              
                                          }, 
                                          "json"		
                                      );
                                    
                                    e.preventDefault();
                                });
                          	
                            }
                        });
                    
                });//FINAL INSERIR CONTRATO
                
                   //EDITA ENTREGA
	           $("a.editEntrega").click(function(e){
                       
                       var txt = $(this).attr('rel');
                       
                       //alert(txt);
                       
                        $("#attEntrega").lightbox_me({                            
                            closeClick: false,
                            onLoad: function(){
                              
                                //alert(txt);
                                $.post('controle/requestsGenericos.php',
                                    {
                                            action: 'getEntrega',			
                                            id: txt
                                    },
                                    function(data, textStatus){           
                                        $("#formAttEntrega").find('input[name="nome_entrega"]').val(data[0].nome_entrega);
                                        $("#formAttEntrega").find('input[name="desc_entrega"]').val(data[0].desc_entrega);
                                        $("#formAttEntrega").find('select[name="fl_servico_produto"] option').filter(function(){
                                            
                                         return $(this).val() ==  data[0].fl_servico_produto;
                                            
                                        }).prop('selected', true); 
                                       
                                        //Atualiza Cliente
                                        $("#formAttEntrega").submit(function(e){

                                            var Entrega = new Object();
                                                    //alert(txt);
                                             Entrega.id = txt;
                                             Entrega.nome_entrega =                 $(this).find('input[name="nome_entrega"]').val();
                                             Entrega.desc_entrega =                 $(this).find('input[name="desc_entrega"]').val();
                                             Entrega.fl_servico_produto =                 $(this).find('select[name="fl_servico_produto"]').val();


                                             var EntregaJson = JSON.stringify(Entrega);

                                         // alert(EntregaJson);

                                          //return false;
                                            $.post('controle/requestsGenericos.php',
                                                {
                                                        action: 'atualizaEntrega',			
                                                        cont: EntregaJson
                                                },
                                                function(data, textStatus) {
//alert('traaa');

                                                    $("#attEntrega").trigger('close');

                                                     $.Dialog({
                                                        shadow: true,
                                                        overlay: true,
                                                        flat: true,
                                                        icon: '<span class="icon-cycle"></span>',
                                                        title: 'Entrega',
                                                        width: 500,
                                                        padding: 10,
                                                        onShow: function(){                        
                                                                $('.window-overlay').click(function(){
                                                                       location.reload();
                                                                 });
                                                                $('div.caption').find('button.btn-close').click(function(){
                                                                    location.reload();
                                                                });                                
                                                        },
                                                        content: 'Entrega Atualizada com Sucesso!! xD'
                                                    });


                                                }, 
                                                "json"		
                                           );	

                                              e.preventDefault();
                                            return false;
                                        });//final Atualiza Cliente
                                        
                                    }, 
                                    "json"		
                                );	
                            }
                        });				
                e.preventDefault();
                });//FIM EDITA ENTREGA
                   
                  //DELETA ENTREGA 
                 $("a.excluirEntrega").click(function(){
                
                
                if(confirm("Deseja realmente excluir esta Entrega?")){
                   
               
                
                var idBase = $(this).attr('rel');
                
                //alert(idCli);
                
                   $.post('controle/requestsGenericos.php',
                    {
                            action: 'deletaEntrega',			
                            id: idBase
                    },
                    function(data, textStatus) {
                        
                    
                           $.Dialog({
                            shadow: true,
                            overlay: true,
                            flat: true,
                            icon: '<span class="icon-remove"></span>',
                            title: 'Entrega',
                            width: 500,
                            padding: 10,
                            onShow: function(){                        
                                    $('.window-overlay').click(function(){
                                           location.reload();
                                     });
                                    $('div.caption').find('button.btn-close').click(function(){
                                        location.reload();
                                    });                                
                            },
                            content: 'Entrega deletada com Sucesso!! xD'
                        });
                        
                    }, 
                    "json"		
                  );
                }//final if deseja remover Contrato
            });//final Remove Contrato 
                     /*********************  CRUD FIM ENTREGA ****************/
                  
	});//final ready()
        
    </script>
  
<?php

   include ('conexao.php');
   
   
   
   $con = Conexao::getInstance();
   
   //$stmt = $con->prepare("SELECT * FROM contrato");
   // $stmt->execute();
   
   
?>
  
<script src="js/jquery.redirect.min.js"></script>

</head>
<body class="metro">
    
    <!--MENU-->
<nav class="navigation-bar dark"> <!-- maybe color: lightOlive-->
    
    <nav class="navigation-bar-content container">
        
        
        <!--Dashboard-->
            <a class="element" href="#">
               <i class="icon-home"></i> Dashboard
            </a><!--Dashboard-->
        <span class="element-divider"></span>
        
        <!--Cliente-->
        <div class="element">
            <a class="dropdown-toggle" href="#"><i class="icon-user"></i> Cliente</a>
            <ul class="dropdown-menu" data-role="dropdown">
                <li><a href="#">Gerenciar</a></li>
                <li class="divider"></li>
                <li><a href="#">Adicionar Contrato</a></li>
                <li class="divider"></li>
                <li><a href="#">Remover</a></li>
            </ul>
        </div><!--Cliente-->
        <!--Contrato-->
        <div class="element">
            <a class="dropdown-toggle" href="#"><i class="icon-book"></i> Contrato</a>
            <ul class="dropdown-menu" data-role="dropdown">
                <li><a href="#">Gerenciar</a></li>
                <li class="divider"></li>
                <li><a href="#">Adicionar Projeto</a></li>
                <li class="divider"></li>
                <li><a href="#">Remover</a></li>
            </ul>
        </div><!--Contrato-->
        <!--Projeto-->
        <div class="element">
            <a class="dropdown-toggle" href="#"><i class="icon-fire"></i> Projeto</a>
            <ul class="dropdown-menu" data-role="dropdown">
                <li><a href="#">Gerenciar</a></li>
                <li class="divider"></li>
                <li><a href="#">Remover</a></li>
            </ul>
        </div><!--Projeto-->
 
 
        <!--
        <span class="element-divider"></span>
        <a class="element brand" href="#"><span class="icon-spin"></span></a>
        <a class="element brand" href="#"><span class="icon-printer"></span></a>
        -->
        <span class="element-divider"></span>
 
        <!--buscar-->
        <div class="element input-element">
            <form>
                <div class="input-control text">
                    <input type="text" placeholder="Buscar...">
                    <button class="btn-search"></button>
                </div>
            </form>
        </div><!--buscar-->
 
    
        <div class="element place-right">
            <a class="dropdown-toggle" href="#">
                <span class="icon-cog"></span>
            </a>
            <ul class="dropdown-menu place-right" data-role="dropdown">
                <li><a href="#">Conta</a></li>
                <li><a href="href=login/logout.php">Logout</a></li>
            </ul>
        </div>
        <span class="element-divider place-right"></span>
        <span class="element-divider place-right"></span>
        <button class="element image-button image-left place-right">
            <?php echo $_SESSION['usuarioNome'] ." ". $_SESSION['usuarioSobreNome'];?> 
            <img src="http://www.insoonia.com/wp-content/uploads/2013/11/meme.jpg"/>
        </button>
    </nav>
</nav><!--MENU-->
    


<div class="container espaco">

    <div class="grid fluid">
        <div class="row">
            
  
            
   <div class="tab-control" data-role="tab-control">
    <ul class="tabs">
        <li class="active"><a href="#baseComercial">Base Comercial</a></li>
        <li><a href="#baseOperacional">Base Operacional</a></li>
        <li><a href="#intel">Tipo Inteligencia</a></li>
        <li><a href="#etapa">Etapa</a></li>
        <li><a href="#entrega">Entrega</a></li>
        <li class="place-right"><a href="#_page_6"><i class="icon-cog"></i></a></li>
    </ul>
 
    <div class="frames">
        
<!--Tab base comercial-->
<div class="frame" id="baseComercial">

<button id="inserirBaseComercial" class="bg-green fg-white">
<i class="icon-cube-2 on-left-more"></i>
Cadastrar Base Comercial
</button>
<table class="table bordered hovered espaco">
<tbody>
<tr>
<th>Base Comercial</th>
<th colspan = "2">Ações</th>
</tr>
</tbody>
<?php

$stmt = $con->prepare("SELECT * FROM base_comercial");
$stmt->execute();

?>

<?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ if($row['fl_inativo'] != 1){ ?>


<tr>
<td> <?php echo $row['nome_base_comercial'] ?></td>    
<td> <a class="edit" onclick="return false" name="nome" href="Cliente.php" rel="<?php echo $row['id_base_comercial']; ?>">Editar</a> </td>
<td> <a class="excluir" onclick="return false"  href="Cliente.php" rel="<?php echo $row['id_base_comercial']; ?>"> Excluir </a> </td>
</tr>

<?php	} } ?>
</table>


<!--FORMULARIO DE INSERÇÂO BASE COMERCIAL-->
<div id="formInsertBaseComercial" class="span9">
<div class="example">
    <section id="content">

            <form id="formBaseComercial" method="POST" action="">
                <legend>Você está inserindo uma Base Comercial</legend>    

                <label>Nome</label>
                <div class="input-control text">
                    <input type="text" value="" placeholder="Nome da base comercial" name="nome_base_comercial"/>
                    <button class="btn-clear"></button>
                </div>
                <label>Descrição</label>
                <div class="input-control text">
                    <input type="text" value="" placeholder="Descrição da base comercial" name="desc_base_comercial"/>
                    <button class="btn-clear"></button>
                </div>


                <input type="submit" value="Inserir"/>
                <input type="reset" value="Cancelar" class="close"/>
           </form><!-- form -->
    </section><!-- content -->
</div><!-- container -->


</div><!--span9--><!--FIM FORMULARIO DE INSERÇÂO BASE COMERCIAL-->

<!--FORMULARIO DE ATUALIZAÇÃO BASE COMERCIAL-->
<div id="attBaseComercial" class="span9">
<div class="example">
<section id="content">

<form id="formAttBaseComercial" method="POST" action="">
    <legend>Você está inserindo uma Base Comercial</legend>    

    <label>Nome</label>
    <div class="input-control text">
        <input type="text" value="" placeholder="Nome da base comercial" name="nome_base_comercial"/>
        <button class="btn-clear"></button>
    </div>
    <label>Descrição</label>
    <div class="input-control text">
        <input type="text" value="" placeholder="Descrição da base comercial" name="desc_base_comercial"/>
        <button class="btn-clear"></button>
    </div>


    <input type="submit" value="Inserir"/>
    <input type="reset" value="Cancelar" class="close"/>
</form><!-- form -->
</section><!-- content -->
</div><!-- container -->


</div><!--span9--><!--FIM FORMULARIO DE ATUALIZAÇÃO BASE COMERCIAL-->

</div><!--Fim Tab Base Comercial-->


<!--TAB BASE OPERACIONAL-->            
<div class="frame" id="baseOperacional">
        
                      <button id="inserirBaseOperacional" class="bg-green fg-white">
               <i class="icon-cube-2 on-left-more"></i>
               Cadastrar Base Operacional
             </button>
            <table class="table bordered hovered espaco">
  <tbody>
  <tr>
      <th>Base Operacional</th>
      <th colspan = "2">Ações</th>
  </tr>
  </tbody>
  <?php
  
   $stmt = $con->prepare("SELECT * FROM base_operacoes");
   $stmt->execute();
  
  ?>
 
 <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ if($row['fl_inativo'] != 1){ ?>
 
 
  <tr>
    <td> <?php echo $row['nome_base_operacoes'] ?></td>    
    <td> <a class="editOP" onclick="return false" name="nome" href="Cliente.php" rel="<?php echo $row['id_base_operacoes']; ?>">Editar</a> </td>
    <td> <a class="excluirOP" onclick="return false"  href="Cliente.php" rel="<?php echo $row['id_base_operacoes']; ?>"> Excluir </a> </td>
  </tr>
 
 <?php	} } ?>
</table>
     
            <!--FORMULARIO DE INSERÇÂO BASE OPERACIONAL-->
<div id="formInsertBaseOperacional" class="span9">
                <div class="example">
                    	<section id="content">
                    		
                                <form id="formBaseOperacional" method="POST" action="">
                                    <legend>Você está inserindo uma Base Operacional</legend>    
                                    
                                    <label>Nome</label>
                                    <div class="input-control text">
                                        <input type="text" value="" placeholder="Nome do base operacional" name="nome_base_operacoes"/>
                                        <button class="btn-clear"></button>
                                    </div>
                                    <label>Descrição</label>
                                    <div class="input-control text">
                                        <input type="text" value="" placeholder="Descrição da base operacional" name="desc_base_operacoes"/>
                                        <button class="btn-clear"></button>
                                    </div>
                      

                                    <input type="submit" value="Inserir"/>
                                    <input type="reset" value="Cancelar" class="close"/>
                    	       </form><!-- form -->
                    	</section><!-- content -->
                </div><!-- container -->
          
             
            </div><!--span9--><!--FIM FORMULARIO DE INSERÇÂO BASE OPERACIONAL-->
            
 <!--FORMULARIO DE EDIÇÂO BASE OPERACIONAL-->
<div id="attBaseOperacional" class="span9">
                <div class="example">
                    	<section id="content">
                    		
                                <form id="formAttBaseOperacional" method="POST" action="">
                                    <legend>Você está inserindo uma Base Operacional</legend>    
                                    
                                    <label>Nome</label>
                                    <div class="input-control text">
                                        <input type="text" value="" placeholder="Nome do base operacional" name="nome_base_operacoes"/>
                                        <button class="btn-clear"></button>
                                    </div>
                                    <label>Descrição</label>
                                    <div class="input-control text">
                                        <input type="text" value="" placeholder="Descrição da base operacional" name="desc_base_operacoes"/>
                                        <button class="btn-clear"></button>
                                    </div>
                      

                                    <input type="submit" value="Atualizar"/>
                                    <input type="reset" value="Cancelar" class="close"/>
                    	       </form><!-- form -->
                    	</section><!-- content -->
                </div><!-- container -->
          
             
            </div><!--span9--><!--FIM FORMULARIO DE EDIÇÂO BASE OPERACIONAL-->
            
            
        </div><!--Final Tab Base Operações-->
        
        
        
        
        
        
        
        
        
 <!--TAB TIPO INTELIGENCIA-->         
<div class="frame" id="intel">
        
             <button id="inserirTipoInteligencia" class="bg-green fg-white">
               <i class="icon-layers on-left-more"></i>
               Cadastrar Tipo Inteligencia
             </button>
            <table class="table bordered hovered espaco">
  <tbody>
  <tr>
      <th>Tipo Inteligencia</th>
      <th colspan = "2">Ações</th>
  </tr>
  </tbody>
  <?php
  
   $stmt = $con->prepare("SELECT * FROM tipo_inteligencia");
   $stmt->execute();
  
  ?>
 
 <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ if($row['fl_inativo'] != 1){ ?>
 
 
  <tr>
    <td> <?php echo $row['nome_tipo_inteligencia'] ?></td>    
    <td> <a class="editIntel" onclick="return false" name="nome" href="Cliente.php" rel="<?php echo $row['id_tipo_inteligencia']; ?>">Editar</a> </td>
    <td> <a class="excluirIntel" onclick="return false"  href="Cliente.php" rel="<?php echo $row['id_tipo_inteligencia']; ?>"> Excluir </a> </td>
  </tr>
 
 <?php	} } ?>
</table>
            
<!--FORMULARIO DE INSERÇÂO TIPO DE INTELIGENCIA-->
<div id="formIntel" class="span9">
                <div class="example">
                    	<section id="content">
                    		
                                <form id="formInsertIntel" method="POST" action="">
                                    <legend>Você está inserindo um tipo de Inteligencia</legend>    
                                    
                                    <label>Nome</label>
                                    <div class="input-control text">
                                        <input type="text" value="" placeholder="Nome do tipo de inteligencia" name="nome_tipo_inteligencia"/>
                                        <button class="btn-clear"></button>
                                    </div>
                                    <label>Descrição</label>
                                    <div class="input-control text">
                                        <input type="text" value="" placeholder="Descrição do tipo de inteligencia" name="desc_tipo_inteligencia"/>
                                        <button class="btn-clear"></button>
                                    </div>
                      

                                    <input type="submit" value="Inserir"/>
                                    <input type="reset" value="Cancelar" class="close"/>
                    	       </form><!-- form -->
                    	</section><!-- content -->
                </div><!-- container -->          
             
            </div><!--span9--><!--FIM FORMULARIO DE INSERÇÂO TIPO DE INTELIGENCIA-->
            
            
<!--FORMULARIO DE EDIÇÃO TIPO DE INTELIGENCIA-->
<div id="attIntel" class="span9">
                <div class="example">
                    	<section id="content">
                    		
                                <form id="formAttIntel" method="POST" action="">
                                    <legend>Você está editando um tipo de Inteligencia</legend>    
                                    
                                    <label>Nome</label>
                                    <div class="input-control text">
                                        <input type="text" value="" placeholder="Nome do tipo de inteligencia" name="nome_tipo_inteligencia"/>
                                        <button class="btn-clear"></button>
                                    </div>
                                    <label>Descrição</label>
                                    <div class="input-control text">
                                        <input type="text" value="" placeholder="Descrição do tipo de inteligencia" name="desc_tipo_inteligencia"/>
                                        <button class="btn-clear"></button>
                                    </div>
                      

                                    <input type="submit" value="Atualizar"/>
                                    <input type="reset" value="Cancelar" class="close"/>
                    	       </form><!-- form -->
                    	</section><!-- content -->
                </div><!-- container -->          
             
            </div><!--span9--><!--FIM FORMULARIO DE EDIÇÃO TIPO DE INTELIGENCIA-->
            
        </div><!--Final Tab Tipo Inteligencia-->
      
        
        
        
        
        
<!--TAB ETAPA-->                 
<div class="frame" id="etapa">
        
                 
             <button id="inserirEtapa" class="bg-green fg-white">
               <i class="icon-layers on-left-more"></i>
               Cadastrar Etapa
             </button>
            <table class="table bordered hovered espaco">
  <tbody>
  <tr>
      <th>Etapa</th>
      <th colspan = "2">Ações</th>
  </tr>
  </tbody>
  <?php
  
   $stmt = $con->prepare("SELECT * FROM etapa");
   $stmt->execute();
  
  ?>
 
 <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ if($row['fl_inativo'] != 1){ ?>
 
 
  <tr>
    <td> <?php echo $row['nome_etapa'] ?></td>    
    <td> <a class="editEtapa" onclick="return false" name="nome" href="Cliente.php" rel="<?php echo $row['id_etapa']; ?>">Editar</a> </td>
    <td> <a class="excluirEtapa" onclick="return false"  href="Cliente.php" rel="<?php echo $row['id_etapa']; ?>"> Excluir </a> </td>
  </tr>
 
 <?php	} } ?>
</table>

<!--FORMULARIO DE INSERÇÂO ETAPA-->
<div id="insertEtapa" class="span9">
                <div class="example">
                    	<section id="content">
                    		
                                <form id="formInsertEtapa" method="POST" action="">
                                    <legend>Você está inserindo uma Etapa</legend>    
                                    
                                    <label>Nome</label>
                                    <div class="input-control text">
                                        <input type="text" value="" placeholder="Nome da etapa" name="nome_etapa"/>
                                        <button class="btn-clear"></button>
                                    </div>
                                    <label>Descrição</label>
                                    <div class="input-control text">
                                        <input type="text" value="" placeholder="Descrição da etapa" name="desc_etapa"/>
                                        <button class="btn-clear"></button>
                                    </div>
                      

                                    <input type="submit" value="Inserir"/>
                                    <input type="reset" value="Cancelar" class="close"/>
                    	       </form><!-- form -->
                    	</section><!-- content -->
                </div><!-- container -->
          
             
            </div><!--span9--><!--FIM FORMULARIO DE INSERÇÂO ETAPA-->
            
<!--FORMULARIO DE EDIÇÃO ETAPA-->
<div id="attEtapa" class="span9">
                <div class="example">
                    	<section id="content">
                    		
                                <form id="formAttEtapa" method="POST" action="">
                                    <legend>Você está editando uma Etapa</legend>    
                                    
                                    <label>Nome</label>
                                    <div class="input-control text">
                                        <input type="text" value="" placeholder="Nome da etapa" name="nome_etapa"/>
                                        <button class="btn-clear"></button>
                                    </div>
                                    <label>Descrição</label>
                                    <div class="input-control text">
                                        <input type="text" value="" placeholder="Descrição da etapa" name="desc_etapa"/>
                                        <button class="btn-clear"></button>
                                    </div>
                      

                                    <input type="submit" value="Atualizar"/>
                                    <input type="reset" value="Cancelar" class="close"/>
                    	       </form><!-- form -->
                    	</section><!-- content -->
                </div><!-- container -->
          
             
            </div><!--span9--><!--FIM FORMULARIO DE EDIÇÃO ETAPA-->
            
       </div><!--FIM TAB ETAPA-->
       
       
       
       
       
       
       
<!--TAB ENTREGA-->         
<div class="frame" id="entrega">
        
             <button id="inserirEntrega" class="bg-green fg-white">
               <i class="icon-layers on-left-more"></i>
               Cadastrar Entrega
             </button>
            <table class="table bordered hovered espaco">
  <tbody>
  <tr>
      <th>Entrega</th>
      <th colspan = "2">Ações</th>
  </tr>
  </tbody>
  <?php
  
   $stmt = $con->prepare("SELECT * FROM entrega");
   $stmt->execute();
  
  ?>
 
 <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ if($row['fl_inativo'] != 1){ ?>
 
 
  <tr>
    <td> <?php echo $row['nome_entrega'] ?></td>    
    <td> <a class="editEntrega" onclick="return false" name="nome" href="Cliente.php" rel="<?php echo $row['id_entrega']; ?>">Editar</a> </td>
    <td> <a class="excluirEntrega" onclick="return false"  href="Cliente.php" rel="<?php echo $row['id_entrega']; ?>"> Excluir </a> </td>
  </tr>
 
 <?php	} } ?>
</table>
            
<!--FORMULARIO DE INSERÇÃO ENTREGA-->
<div id="insertEntrega" class="span9">
                <div class="example">
                    	<section id="content">
                    		
                                <form id="formInsertEntrega" method="POST" action="">
                                    <legend>Você está inserindo uma Entrega</legend>    
                                    
                                    <label>Nome</label>
                                    <div class="input-control text">
                                        <input type="text" value="" placeholder="Nome da entrega" name="nome_entrega"/>
                                        <button class="btn-clear"></button>
                                    </div>
                                    <label>Descrição</label>
                                    <div class="input-control text">
                                        <input type="text" value="" placeholder="Descrição da entrega" name="desc_entrega"/>
                                        <button class="btn-clear"></button>
                                    </div>
                                          <label>Tipo Entrega</label>
                                    <div class="input-control select">
                                        <select name="fl_servico_produto">
                                         
                                                         <option value="1"><?php echo 'Serviço'; ?></option>
                                                         <option value="2"><?php echo 'Entrega'; ?></option>

                                        </select>
                                    </div>
                      

                                    <input type="submit" value="Inserir"/>
                                    <input type="reset" value="Cancelar" class="close"/>
                    	       </form><!-- form -->
                    	</section><!-- content -->
                </div><!-- container --> 
          
             
            </div><!--span9--><!--FIM FORMULARIO DE INSERÇÃO ENTREGA-->
            
            
            
            <!--FORMULARIO DE EDIÇÂO ENTREGA-->
<div id="attEntrega" class="span9">
                <div class="example">
                    	<section id="content">
                    		
                                <form id="formAttEntrega" method="POST" action="">
                                    <legend>Você está inserindo uma Entrega</legend>    
                                    
                                    <label>Nome</label>
                                    <div class="input-control text">
                                        <input type="text" value="" placeholder="Nome da entrega" name="nome_entrega"/>
                                        <button class="btn-clear"></button>
                                    </div>
                                    <label>Descrição</label>
                                    <div class="input-control text">
                                        <input type="text" value="" placeholder="Descrição da entrega" name="desc_entrega"/>
                                        <button class="btn-clear"></button>
                                    </div>
                                          <label>Tipo Entrega</label>
                                    <div class="input-control select">
                                        <select name="fl_servico_produto">
                                                         <option value="1"><?php echo 'Serviço'; ?></option>
                                                         <option value="2"><?php echo 'Entrega'; ?></option>
                                        </select>
                                    </div>
                      

                                    <input type="submit" value="Atualizar"/>
                                    <input type="reset" value="Cancelar" class="close"/>
                    	       </form><!-- form -->
                    	</section><!-- content -->
                </div><!-- container --> 
          
             
            </div><!--span9--><!--FIM FORMULARIO DE EDIÇÂO ENTREGA-->
            
        </div><!--FIM TAB ENTREGA-->
        
        <div class="frame" id="_page_6">...</div>
    </div>
</div>
            
            
        </div><!--final row-->
    </div><!--final grid-->
</div><!--final container-->

         
            <script type="text/javascript" src="js/jquery.mask.min.js"></script>


</html>
