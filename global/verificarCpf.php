<?php
require_once("../bancodados/banco-paciente.php");

//PEGAR AS INFORMAÇÕES DO POST DO FORMULARIO E UTILIZAR FUNÇÕES DE LIMPEZA DE CONTEUDO
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_NUMBER_INT);   

//CRIAR VARIAVEIS DE RETORNO
$codigo = "";
$mensagem = "";

//VALIDAR CPF


//VERIFICAR SE CPF EXISTE NO BANCO DE DADOS
    if(verificarCpf($conexao, $cpf)){
        $codigo = "0";
        $mensagem = "CPF já cadastrado";
    }else{
        $codigo = "1";
        $mensagem = "CPF não cadastrado";        
    };

//MONTA ARRAY
$retorno = array("codigo"=>$codigo, "mensagem"=>$mensagem);

//RETORNA FORMATO JSON A RESPOSTA
echo json_encode($retorno);

?>