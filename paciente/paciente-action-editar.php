<?php
require_once("../bancodados/banco-paciente.php");

session_start();

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);  
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

$erros = array();
    
//VALIDAR CAMPOS DO FORMULÁRIO

    if (empty($nome) || strlen($nome) <= 3):
        $erros[] = "Informar um nome com mais de 3 caracteres";
    endif;

    if (!filter_var($ddd, FILTER_VALIDATE_INT)):
        $erros []= "DDD inválido";     
    endif;

    if (!filter_var($telefone, FILTER_VALIDATE_INT)):
        $erros []= "Celular inválido";     
    endif;

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)):
        $erros []= "Email inválido";     
    endif;

    if (!empty($erros)) {
        $_SESSION["validacao"] = $erros;
        header("Location: paciente-form-alterar.php?id=$id");
        die();
    } elseif(alterarPaciente($conexao, $id, $nome, $ddd, $telefone, $email, $cep, $logradouro, $numero, $complemento, $bairro, $cidade, $estado)){
        $_SESSION["success"] = "Paciente alterado com sucesso.";
        header("Location: paciente-lista.php");
    }else{
        //entra aqui no caso de erro da query
        $_SESSION["danger"] = "Erro ao alterar paciente.";
        header("Location: paciente-lista.php");
    };

    die();



