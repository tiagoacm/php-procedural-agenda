<?php
require_once("../bancodados/banco-paciente.php");

//INICIAR A SESSAO
session_start();

//PEGAR AS INFORMAÇÕES DO POST DO FORMULARIO E UTILIZAR FUNÇÕES DE LIMPEZA DE CONTEUDO
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_NUMBER_INT);   
$nome = strtoupper(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS));
$ddd = filter_input(INPUT_POST, 'ddd', FILTER_SANITIZE_NUMBER_INT);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

$cep = strtoupper(filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_NUMBER_INT));
$logradouro = strtoupper(filter_input(INPUT_POST, 'logradouro', FILTER_SANITIZE_SPECIAL_CHARS));
$numero = strtoupper(filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_NUMBER_INT));
$complemento = strtoupper(filter_input(INPUT_POST, 'complemento', FILTER_SANITIZE_SPECIAL_CHARS));
$bairro = strtoupper(filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_SPECIAL_CHARS));
$cidade = strtoupper(filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_SPECIAL_CHARS));
$estado = strtoupper(filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_SPECIAL_CHARS));

//variavel tipo array para armazenar todos erros de validação
$erros = array();
    
//VALIDAR CAMPOS DO FORMULÁRIO

    //validar cpf
    if ( strlen($cpf) < 11 or strlen($cpf) > 11 or !filter_var($cpf, FILTER_VALIDATE_INT)){
        $erros [] = "CPF inválido";
    } else{
        //verificar se CPF já está cadastrado na base de dados
        if(verificarCpf($conexao, $cpf)){
            $erros [] = "CPF já cadastrado";   
        }
    }

    //validar nome
    if (empty($nome) || strlen($nome) <= 3):
        $erros[] = "Informar um nome com mais de 3 caracteres";
    endif;

    //validar telefone
    if (strlen($ddd) < 2 || strlen($ddd) > 2 || !filter_var($ddd, FILTER_VALIDATE_INT)):
        $erros []= "DDD inválido";     
    endif;

    if (strlen($telefone) < 9 || strlen($telefone) > 9 || !filter_var($telefone, FILTER_VALIDATE_INT)):
        $erros []= "Celular inválido";     
    endif;

    //validar email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)):
        $erros []= "Email inválido";     
    endif;

    //validar cep
    if ( strlen($cep) < 8 or strlen($cep) > 8 or !filter_var($cep, FILTER_VALIDATE_INT)){
        $erros [] = "CEP inválido";
    }

    //validar logradouro
    if (empty($logradouro)):
        $erros[] = "Informar logradouro";
    endif;

    //validar numero
    if (strlen($numero) > 5 || !filter_var($numero, FILTER_VALIDATE_INT)):
        $erros []= "Informar número";     
    endif;

    //validar bairro
    if (empty($bairro)):
        $erros[] = "Informar bairro";
    endif;

    //validar cidade
    if (empty($cidade)):
        $erros[] = "Informar cidade";
    endif;

    //validar estado
    if (empty($estado) || strlen($estado) < 2):
        $erros[] = "Informar estado";
    endif;

    if (!empty($erros)) {
        // entra aqui quando a variavel $erros não for vazia
        // cria sessão com as mensagem de erros da validação
        $_SESSION["validacao"] = $erros;
        header("Location: paciente-form.php");
        die();
    } elseif(inserirPaciente($conexao, $cpf, $nome, $ddd, $telefone, $email, $cep, $logradouro, $numero, $complemento, $bairro, $cidade, $estado)){
        //entra aqui no caso de sucesso da query
        $_SESSION["success"] = "Paciente cadastrado com sucesso.";
        header("Location: paciente-lista.php");
    }else{
        //entra aqui no caso de erro da query
        $_SESSION["danger"] = "Erro ao cadatrar paciente.";
        header("Location: paciente-lista.php");
    };

    die();
