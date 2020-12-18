<script>
        function altera(){
            $("button[name='alterar_tipo']").click(function(){

            i = $(this).val();
                $.post("seleciona_tipo.php",{"id":i},function(r){
                    a = r[0];                               
                    $("input[name='idtipo']").val(a.id_tipo);
                    $("input[name='tipo_comida']").val(a.tipo);
                });
            });

            $("button[name='alterar_comida']").click(function(){
                
            i = $(this).val();
                
                $.post("seleciona_comida.php",{"identificador":i},function(r){
                    a = r[0];                       
                           
                    $("input[name='idcomida']").val(a.id_comida);
                    $("input[name='comida']").val(a.nome);
                    $("input[name='preco']").val(a.preco);
                    $("select[name='select2']").val(a.id_tipo);
                });
            });

            $("button[name='alterar_cardapio']").click(function(){

            i = $(this).val();

                $.post("seleciona_cardapio.php",{"id":i},function(r){
                    a = r[0];  
                                          
                    $("input[name='idcardapio']").val(a.id_cardapio);
                    $.each(r, function(i,v){
                        $("input[name='comidas[]'][value='"+v.id_comida+"']").attr("checked", true);
                    });
                    $("input[name='nome']").val(a.nome_cardapio);
                });
            });

            $("button[name='alterar_reserva']").click(function(){
               
            i = $(this).val();

                $.post("seleciona_reserva.php",{"id":i},function(r){
                    a = r[0];                               
                    $("input[name='idreserva']").val(a.id_reserva);
                    $("input[name='nome']").val(a.nome);
                    $("select[name='selectreserva']").val(a.id_cardapio);
                });
            }); 

            $("button[name='alterar_usuario']").click(function(){

                i = $(this).val();
                    $.post("seleciona_usuario.php",{"id":i},function(r){
                        a = r[0];        
                        $("input[name='hid']").val(a.id_usuario);                       
                        $("input[name='nome']").val(a.nome);
                        $("input[name='email']").val(a.email);
                    });
                });
        }

        function salvar(){
            $("#salvar").click(function(){ 
               
           p = {
                    id:$("input[name='idtipo']").val(),
                    tipo:$("input[name='tipo_comida']").val()
           };        
           
           $.post("atualizar_tipo.php",p,function(r){
               
            if(r=='1'){
                $("#msg").html("tipo alterado com sucesso.");
                $(".close").click();
                atualizar();                
            }else{
                $("#msg").html("Falha ao atualizar tipo.");
                $(".close").click();
            }
           });
       }); 
        }

        function salvar_comida(){
            $("#salvar").click(function(){ 
                
           p = {
                    id:$("input[name='idcomida']").val(),
                    nome:$("input[name='comida']").val(),
                    preco:$("input[name='preco']").val(),
                    select:$("select[name='select2']").val()
           };        
           
           $.post("atualizar_comida.php",p,function(r){
            
            if(r=='1'){
                $("#msg").html("comida alterada com sucesso.");
                $(".close").click();
                atualizar_comida();                
            }else{
                $("#msg").html("Falha ao atualizar comida.");
                $(".close").click();
            }
           });
       }); 
        }


        function salvar_cardapio(){
            $("#salvar").click(function(){ 
                var c= Array();
                var j=0;
                $.each($("input[name='comidas[]']:checked"), function(i,v){
                    c[j]=($("input[name='comidas[]']:checked")[i].value);
                    j++;
                });
           p = {
                    id:$("input[name='idcardapio']").val(),
                    nome:$("input[name='nome']").val(),
                    comidas:c
           };  
              
           
           $.post("atualizar_cardapio.php",p,function(r){
            if(r=='1'){
                $("#msg").html("cardapio alterado com sucesso.");
                $(".close").click();
                atualizar_cardapio(); 
                att_cardapio();               
            }else{
                $("#msg").html("Falha ao atualizar cardapio.");
                $(".close").click();
            }
           });
       }); 
        }

        function salvar_reserva(){
            $("#salvar").click(function(){ 
             
           p = {
                    id:$("input[name='idreserva']").val(),
                    nome:$("input[name='nome']").val(),
                    select:$("select[name='selectreserva']").val()
           };        
           
           $.post("atualizar_reserva.php",p,function(r){
            if(r=='1'){
                $("#msg").html("reserva alterada com sucesso.");
                $(".close").click();
                atualizar_reserva(); 
                att_reserva();               
            }else{
                $("#msg").html("Falha ao atualizar reserva.");
                $(".close").click();
            }
           });
       }); 
        }

        function salvar_usuario(){
            $("#salvar").click(function(){ 
               if(sessionStorage.getItem("senha") && $("input[name='senha']").val()!=""){
                   if($("input[name='senha']").val()==$("input[name='confirma_senha']").val()){
                        p = {
                            nome:$("input[name='nome']").val(),
                            email:$("input[name='email']").val(),
                            senha:$("input[name='senha']").val()
                        };    
                   }
                   else{
                    $(".close").click();
                       $("#msg").html("Confirme corretamente a senha");
                   }
               }
               else{
                        p = {
                            id:$("input[name='hid']").val(),
                            nome:$("input[name='nome']").val(),
                            email:$("input[name='email']").val()
                        };  
               }   
               
               $.post("atualizar_usuario.php",p,function(r){
                if(r=='1'){
                    $("#msg").html("Dados do usuario alterado(os) com sucesso.");
                    $(".close").click();
                    atualizar_usuario();                
                }else{
                    $("#msg").html("Falha ao atualizar dado(os) do usuario.");
                    $(".close").click();
                }
               });
           }); 
        }
        

       function atualizar(){           
        $.getJSON("seleciona_tipo.php", function(g){
        var lista="";
        $.each(g, function(indice, valor){
            lista+="<li>"+valor.tipo+" || <button class='btn btn-danger remover'  value='"+valor.id_tipo+"'>Remover</button> || <button class='btn btn-warning alterar' id='alterar_tipo' value='"+valor.id_tipo+"' data-toggle='modal' data-target='#modal'>Alterar</button> </li>";
        });
        $("#lista").html(lista);
        remove_tipo_comida();
        altera();
        salvar();
        });
        }


        function atualizar_comida(){           
            $.getJSON("seleciona_comida_tipo.php", function(g){
                var lista="";
                $.each(g, function(indice, valor){
                    lista+="<li>"+valor.nome+" || <button class='btn btn-danger remover'  value='"+valor.id_comida+"'>Remover</button> || <button class='btn btn-warning alterar' name='alterar_comida' value='"+valor.id_comida+"' data-toggle='modal' data-target='#modal'>Alterar</button></li>";
                });
            $("#recebe").html(lista);
                remove_comida();
                altera();
                salvar_comida();
        });
        }

        function atualizar_cardapio(){
            var id =$("#select").val();
            var t="";
            $.post("seleciona_cardapio_de_comidas.php",{"id":id}, function(g){
            var tabela="<table border='1'><td>Nome comida</td><td>tipo comida</td><td>preço</td></tr>";
            $.each(g, function(indice, valor){
                tabela+="<tr><td>"+valor.nome_comida+"</td><td>"+valor.tipo_comida+"</td><td>"+valor.preco_comida+"</td></tr>";
                t=valor.id_cardapio;
            });
            tabela+="<td colspan='3'><button class='btn btn-danger remover'  value='"+t+"'>Remover</button> || <button class='btn btn-warning alterar' name='alterar_cardapio' value='"+t+"' data-toggle='modal' data-target='#modal'>Alterar</button></td>"
            
            tabela+="</table>";
            $("#recebe").html(tabela);
            remove_cardapio();
            altera();
            });
        }

        function atualizar_reserva(){
            var id =$("#select").val();
            var t="";
            $.post("seleciona_reserva_de_cardapio.php",{"id":id}, function(g){
                
            var tabela="<table border='1'><td>nome cardapio</td><td>Nome comida</td><td>tipo comida</td><td>preço</td></tr>";
            $.each(g, function(indice, valor){
                tabela+="<tr><td>"+valor.nome_cardapio+"</td><td>"+valor.nome_comida+"</td><td>"+valor.tipo_comida+"</td><td>"+valor.preco_comida+"</td></tr>";
                t=valor.id_reserva;
            });
            tabela+="<td colspan='4'><button class='btn btn-danger remover'  value='"+t+"'>Remover</button> || <button class='btn btn-warning alterar' name='alterar_reserva' value='"+t+"' data-toggle='modal' data-target='#modal'>Alterar</button></td>"
            tabela+="</table>"
            $("#recebe").html(tabela);
            remove_reserva();
            altera();
            salvar_reserva();
            });
        }

        function atualizar_usuario(){
            
            $.getJSON("seleciona_usuario.php", function(g){
            var tabela="";
            var tabela="<table border='2'><tr><td>Nome</td><td>Email</td><td>Senha</td></tr>";
            var c=parseInt(g[0].id_usuario);
               
               var con=0;
               $.each(g, function(indice, valor){
                    if(sessionStorage.getItem('permissao') && sessionStorage.getItem('permissao')=="1"){
                            var i=parseInt(g[con].id_usuario);
                            if(c != i){
                                tabela+="<tr><td colspan='3'><button class='btn btn-danger remover'  value='"+t+"'>Remover</button> || <button class='btn btn-warning alterar' name='alterar_usuario' value='"+t+"' data-toggle='modal' data-target='#modal'>Alterar</button></td></tr>";
                                c=i;
                            }
                            tabela+="<tr><td>"+valor.nome+"</td><td>"+valor.email+"</td><td>Senha oculpa por motivos de segurança</td>"; 
                            t=valor.id_usuario;
                        con++;
                    }
                    else{
                        tabela+="<tr><td>"+valor.nome+"</td><td>"+valor.email+"</td><td>Senha oculpa por motivos de segurança</td>";
                        t=valor.id_usuario;
                    }
               });
               if(sessionStorage.getItem('permissao') && sessionStorage.getItem('permissao')=="1"){
                tabela+="<tr><td colspan='3'><button class='btn btn-danger remover'  value='"+t+"'>Remover</button> || <button class='btn btn-warning alterar' name='alterar_usuario' value='"+t+"' data-toggle='modal' data-target='#modal'>Alterar</button></td></tr>";
               }
               else{
                tabela+="<tr><td colspan='3'>|| <button class='btn btn-warning alterar' name='alterar_usuario' value='"+t+"' data-toggle='modal' data-target='#modal'>Alterar</button></td></tr>";
               }
        tabela+="</table>";
        $("#tabela").html(tabela);
        remove_usuario();
        altera();
        salvar_usuario();
        });
        }


        function remove_tipo_comida(){
                    $(".remover").click(function(){
                        i = $(this).val();
                        c = "id_tipo";
                        t = "tipo_comida";
                        p = {tabela: t, id:i, coluna:c}
                        $.post("remover.php",p,function(r){
                            if(r=='1'){                
                                $("#msg").html("Tipo de comida removido com sucesso.");
                                $("button[value='"+ i +"']").closest("li").remove();
                            }
                            else
                            {
                                $("#msg").html("Erro ao remover: este item nao pode ser removido pois esta ligado a outro item ainda cadastrado!!.");
                            }
                        });
                    }); 
        }

        function remove_comida(){
            $(".remover").click(function(){
                i = $(this).val();
                c = "id_comida";
                t = "comida";
                p = {tabela: t, id:i, coluna:c}
                $.post("remover.php",p,function(r){
                    if(r=='1'){                
                        $("#msg").html("Comida removida com sucesso.");
                        $("button[value='"+ i +"']").closest("li").remove();
                        }
                        else
                        {
                            $("#msg").html("Erro ao remover: este item nao pode ser removido pois esta ligado a outro item ainda cadastrado!!.");
                        }
                });
            }); 
        }
        function remove_cardapio(){
            $(".remover").click(function(){
                    i = $(this).val();
                    c = "id_cardapio";
                    t = "cardapio";
                    p = {tabela: t, id:i, coluna:c}
                    $.post("remover.php",p,function(r){
                        if(r=='1'){                
                            $("#msg").html("Cardapio removido com sucesso.");
                            $("button[value='"+ i +"']").closest("table").remove();
                            }
                            else
                            {
                                $("#msg").html("Erro ao remover: este item nao pode ser removido pois esta ligado a outro item ainda cadastrado!!.");
                            }
                    });
                }); 
        }
        function remove_reserva(){
            $(".remover").click(function(){
                    i = $(this).val();
                    c = "id_reserva";
                    t = "reserva";
                    p = {tabela: t, id:i, coluna:c}
                    $.post("remover.php",p,function(r){
                        if(r=='1'){                
                            $("#msg").html("Reserva removida com sucesso.");
                            $("button[value='"+ i +"']").closest("table").remove();
                            }
                            else
                            {
                                $("#msg").html("Erro ao remover: este item nao pode ser removido pois esta ligado a outro item ainda cadastrado!!.");
                            }
                    });
                }); 
        }

        function remove_usuario(){
            $(".remover").click(function(){
                        i = $(this).val();
                        c = "id_";usuario
                        t = "usuarios";
                        p = {tabela: t, id:i, coluna:c}
                        $.post("remover.php",p,function(r){
                            if(r=='1'){                
                                $("#msg").html("Usuario removido com sucesso.");
                                $("button[value='"+ i +"']").closest("li").remove();
                            }
                            else
                            {
                                $("#msg").html("Erro ao remover: este item nao pode ser removido pois esta ligado a outro item ainda cadastrado!!.");
                            }
                        });
                    }); 
        }


        function lista_usuario(){
            $.getJSON("seleciona_usuario.php", function(g){
        var lista="";
        var tabela="<table border='1'><tr><td>Nome</td><td>Email</td><td>Senha</td></tr>";
        var c=Number.parseInt(g[0].id_usuario);
               
               var con=0;
               $.each(g, function(indice, valor){
                    if(sessionStorage.getItem('permissao') && sessionStorage.getItem('permissao')=="1"){
                            var i=Number.parseInt(g[con].id_usuario);
                            
                            if(c != i){
                                tabela+="<tr><td colspan='3'><button class='btn btn-danger remover'  value='"+t+"'>Remover</button> || <button class='btn btn-warning alterar' name='alterar_usuario' value='"+t+"' data-toggle='modal' data-target='#modal'>Alterar</button></td><tr>";
                                c=i;
                            }
                            tabela+="<tr><td>"+valor.nome+"</td><td>"+valor.email+"</td><td>Senha oculta por motivos de segurança</td>"; 
                            t=valor.id_usuario;
                        con++;
                    }
                    else{
                        tabela+="<tr><td>"+valor.nome+"</td><td>"+valor.email+"</td><td>Senha oculta por motivos de segurança</td>";
                        t=valor.id_usuario;
                    }
               });
               if(sessionStorage.getItem('permissao') && sessionStorage.getItem('permissao')=="1"){
                tabela+="<tr><td colspan='3'><button class='btn btn-danger remover'  value='"+t+"'>Remover</button> || <button class='btn btn-warning alterar' name='alterar_usuario' value='"+t+"' data-toggle='modal' data-target='#modal'>Alterar</button></td></tr>";
               }
               else{
                tabela+="<tr><td colspan='3'> <button class='btn btn-warning alterar' name='alterar_usuario' value='"+t+"' data-toggle='modal' data-target='#modal'>Alterar</button></td></tr>"
               }
        tabela+="</table>"
        $("#tabela").html(tabela);
        remove_usuario();
        altera();
        salvar_usuario();
        });
        }

        function lista_comida(){
            $.getJSON("seleciona_comida_tipo.php", function(g){
                var lista="";
                $.each(g, function(indice, valor){
                    lista+="<li>"+valor.nome+"</li>";
                    if(sessionStorage.getItem('permissao') && sessionStorage.getItem('permissao')=="1"){
                       lista+=" || <button class='btn btn-danger remover'  value='"+valor.id_comida+"'>Remover</button> || <button class='btn btn-warning alterar' name='alterar_comida' value='"+valor.id_comida+"' data-toggle='modal' data-target='#modal'>Alterar</button>";
                    }
                });
            $("#recebe").html(lista);
                remove_comida();
                altera();
                salvar_comida();
        });
        }


        function lista_tipo(){
            $.getJSON("seleciona_tipo.php", function(g){
        var lista="";
        $.each(g, function(indice, valor){
            lista+="<li>"+valor.tipo+"</li>";
            if(sessionStorage.getItem('permissao') && sessionStorage.getItem('permissao')=="1"){
                lista+=" || <button class='btn btn-danger remover'  value='"+valor.id_tipo+"'>Remover</button> || <button class='btn btn-warning alterar' id='alterar_tipo' name='alterar_tipo' value='"+valor.id_tipo+"' data-toggle='modal' data-target='#modal'>Alterar</button> ";
            }
        });
        $("#lista").html(lista);
        remove_tipo_comida();
        altera();
        salvar();
        });
        }

        function lista_comida(){
            $.getJSON("seleciona_comida_tipo.php", function(g){
                var lista="";
                $.each(g, function(indice, valor){
                    lista+="<li>"+valor.nome+"</li>";
                    if(sessionStorage.getItem('permissao') && sessionStorage.getItem('permissao')=="1"){
                       lista+=" || <button class='btn btn-danger remover'  value='"+valor.id_comida+"'>Remover</button> || <button class='btn btn-warning alterar' name='alterar_comida' value='"+valor.id_comida+"' data-toggle='modal' data-target='#modal'>Alterar</button>";
                    }
                });
            $("#recebe").html(lista);
                remove_comida();
                altera();
                salvar_comida();
        });
        }

        function lista_cardapio(){
            $.getJSON("seleciona_cardapio.php", function(g){
                
            var option="<option label='Selecione um cardapio'></option>";
            $.each(g, function(indice, valor){
                option+="<option value='"+valor.id_cardapio+"'> "+valor.nome_cardapio+" </option>";
            });
            $("#select").html(option);
        });
        }

        function lista_reserva(){
          
            if(sessionStorage.getItem("permissao")==1)
            {
                
                $.getJSON("seleciona_reserva_de_cardapio.php", function(g){
                var option="<option label='Selecione um nome' />";
                $.each(g, function(indice, valor){
                    option+="<option value='"+valor.id_reserva+"'> "+valor.nome+" </option>";
                });
                $("#select").html(option);
                select_reserva();
                });
            $.getJSON("seleciona_cardapio.php", function(g){
                    
                var option="<option label='Selecione um cardapio' />";
                $.each(g, function(indice, valor){
                    option+="<option value='"+valor.id_cardapio+"'> "+valor.nome_cardapio+" </option>";
                });
                $("#selectreserva").html(option);
            });
            }
            else{
                $.getJSON("seleciona_cardapio.php", function(g){
                    
                    var option="<option label='Selecione um cardapio' />";
                    $.each(g, function(indice, valor){
                        option+="<option value='"+valor.id_cardapio+"'> "+valor.nome_cardapio+" </option>";
                    });
                    $("#selectreserva").html(option);
                });
                select_reserva();
            }
        }

        function select_cardapio(){
            $("#select").change(function(){
            var id =$("#select").val();
            var t="";
            $.post("seleciona_cardapio_de_comidas.php",{"id":id}, function(g){
            var tabela="<table border='1'><td>Nome comida</td><td>tipo comida</td><td>preço</td></tr>";
            $.each(g, function(indice, valor){
                tabela+="<tr><td>"+valor.nome_comida+"</td><td>"+valor.tipo_comida+"</td><td>"+valor.preco_comida+"</td></tr>";
                t=valor.id_cardapio;
            });
            tabela+="<td colspan='3'><button class='btn btn-danger remover'  value='"+t+"'>Remover</button> || <button class='btn btn-warning alterar' name='alterar_cardapio' value='"+t+"' data-toggle='modal' data-target='#modal'>Alterar</button></td>"
            
            tabela+="</table>";
            $("#recebe").html(tabela);
            remove_cardapio();
            altera();
            salvar_cardapio();
            
            });
        });
        }

        
        function select_reserva(){
            if(sessionStorage.getItem("permissao")==3){
                
                $.getJSON("seleciona_reserva_de_cardapio.php", function(g){
                  
               var tabela="<table border='1'><td>nome cardapio</td><td>Nome comida</td><td>tipo comida</td><td>preço</td></tr>";
             
               var c=(g[0].nome_cardapio.toString());
               
               var con=0;
               $.each(g, function(indice, valor){
                   
                        var i=g[con].nome_cardapio.toString();
                        
                        if(c != i){
                            
                            tabela+="<td colspan='4'><button class='btn btn-danger remover'  value='"+t+"'>Remover</button> || <button class='btn btn-warning alterar' name='alterar_reserva' value='"+t+"' data-toggle='modal' data-target='#modal'>Alterar</button></td>";
                            c=i;
                        }
                        tabela+="<tr><td>"+valor.nome_cardapio+"</td><td>"+valor.nome_comida+"</td><td>"+valor.tipo_comida+"</td><td>"+valor.preco_comida+"</td></tr>"; 
                        t=valor.id_reserva;
                   con++;
               });
               
               tabela+="<td colspan='4'><button class='btn btn-danger remover'  value='"+t+"'>Remover</button> || <button class='btn btn-warning alterar' name='alterar_reserva' value='"+t+"' data-toggle='modal' data-target='#modal'>Alterar</button></td>"
               tabela+="</table>"
               $("#recebe").html(tabela);
               remove_reserva();
               altera();
               salvar_reserva();
               });
            }
            $("#select").change(function(){
                
            var id =$("#select").val();
            var t="";
            $.post("seleciona_reserva_de_cardapio.php",{"id":id}, function(g){
               
            var tabela="<table border='1'><td>nome cardapio</td><td>Nome comida</td><td>tipo comida</td><td>preço</td></tr>";
            $.each(g, function(indice, valor){
                tabela+="<tr><td>"+valor.nome_cardapio+"</td><td>"+valor.nome_comida+"</td><td>"+valor.tipo_comida+"</td><td>"+valor.preco_comida+"</td></tr>";
                t=valor.id_reserva;
            });
            tabela+="<td colspan='4'><button class='btn btn-danger remover'  value='"+t+"'>Remover</button> || <button class='btn btn-warning alterar' name='alterar_reserva' value='"+t+"' data-toggle='modal' data-target='#modal'>Alterar</button></td>"
            tabela+="</table>"
            $("#recebe").html(tabela);
            remove_reserva();
            altera();
            salvar_reserva();
            });
        });
        }


        function selects_comidas(){
            $.getJSON("seleciona_tipo.php", function(g){
            var option='<option label="Selecione um tipo de comida"></option>';
            $.each(g, function(indice, valor){
                option+="<option value='"+valor.id_tipo+"'> "+valor.tipo+" </option>";
            });
            $("#select, #select2").html(option);
        });

        $("#select").change(function(){
            
            var id =$("#select").val();
            $.post("seleciona_comida_tipo.php",{"id":id}, function(g){
                var lista="";
                $.each(g, function(indice, valor){
                    lista+="<li>"+valor.nome+"</li>";
                    if(sessionStorage.getItem('permissao') && sessionStorage.getItem('permissao')=="1"){
                        lista+=" || <button class='btn btn-danger remover'  value='"+valor.id_comida+"'>Remover</button> || <button class='btn btn-warning alterar' name='alterar_comida' value='"+valor.id_comida+"' data-toggle='modal' data-target='#modal'>Alterar</button>";
                    }
                });
            $("#recebe").html(lista);
            altera();
            remove_comida();
            salvar_comida();
            });
        });
        }


        function check(){
            $.getJSON("seleciona_comida_tipo.php", function(g){
            var checkbox="";
            $.each(g, function(indice, valor){
                checkbox +="<input  class=\"check\" type=\"checkbox\" value=\""+valor.id_comida+"\" name='comidas[]' /> "+valor.nome+" ("+valor.tipo+") preço:"+valor.preco+"<br />";
            });
            $("#check").html(checkbox);              
        });
        }

        function att_reserva(){
            $.getJSON("seleciona_reserva_de_cardapio.php", function(g){
            var option="<option label='Selecione seu nome' />";
            $.each(g, function(indice, valor){
                option+="<option value='"+valor.id_reserva+"'> "+valor.nome+" </option>";
            });
            $("#select").html(option);
            });
        }

        function att_cardapio(){
            $.getJSON("seleciona_cardapio.php", function(g){
                
            var option="<option label='Selecione um cardapio'></option>";
            $.each(g, function(indice, valor){
                option+="<option value='"+valor.id_cardapio+"'> "+valor.nome_cardapio+" </option>";
            });
            $("#select").html(option);
        });
        }
</script>