//CHAMADA AJAX PARA VERIFICAR CPF
$(document).ready(function(){     
    
    $("#msgVerificaCpf").hide();
    
    //QUANDO CAMPO CPF PERDER O FOCO EXECUTA CHAMADA
    $("#txtCpf").change(function(){
        $.ajax({                
            method: "POST",
            url: "../global/verificarCpf.php",
            dataType:"json",
            data: { "cpf" : $("#txtCpf").val()},
            success(retorno) {                   
                console.log(retorno);
                console.log(retorno.codigo);
                console.log(retorno.mensagem);

                //codigo = '0' -> cpf já existe
                //codigo = '1' -> cpf não encontrado
                if(retorno.codigo == '0'){
                    $("#msgVerificaCpf").text(retorno.mensagem);
                    $("#msgVerificaCpf").fadeIn();
                    $("#btnCadastrar").fadeOut();
                } else{
                    $("#msgVerificaCpf").fadeOut();
                    $("#btnCadastrar").fadeIn();
                }
                
            }
        });
    });

});


