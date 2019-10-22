<?php
require_once("../bancodados/banco-paciente.php");

//inicia a sessão que será utilizada no caso de sucesso ou erro
session_start();

//pega as informações do formulário
$id = $_GET['id'];

if(removerPaciente($conexao, $id)):
    $_SESSION["success"] = "Paciente excluido com sucesso.";
    header("Location: paciente-lista.php");
else:
    $_SESSION["danger"] = "Erro ao excluir paciente.";
    header("Location: paciente-lista.php");
endif;


