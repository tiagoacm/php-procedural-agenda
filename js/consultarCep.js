    $(document).ready(function(){     
    
        $("#msgErroCep").hide();
    
        $("#cep").change(function(){
            $.ajax({                
                method: "GET",
                url: "https://viacep.com.br/ws/" + $("#cep").val() +"/json",
                dataType:"json",
                success(retorno) {                   
                    console.log(retorno);
                    console.log(retorno.mensagem);

                    if(retorno.erro){
                        console.log("CEP inválido");
                        $("#msgErroCep").text("CEP não encontrado");
                        $("#msgErroCep").show();

          //              $("#blocoEndereco").fadeOut();
                        $("#logradouro").val("");
                        $("#numero").val("");
                        $("#complemento").val("");
                        $("#bairro").val("");
                        $("#cidade").val("");
                        $("#estado").val("");
                    } else{
                        console.log("CEP encontrado");
                        $("#msgErroCep").hide();

         //               $("#blocoEndereco").fadeIn();
                        $("#logradouro").val(retorno.logradouro);
                        $("#complemento").val(retorno.complemento);
                        $("#bairro").val(retorno.bairro);
                        $("#cidade").val(retorno.localidade);
                        $("#estado").val(retorno.uf);
                        $("#numero").focus();
                    }
                    
                }
            });
        });




    });
