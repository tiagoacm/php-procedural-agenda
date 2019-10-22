<?php
//conexao com banco de dados
$servidor = "localhost"; 
$usuario = "root";
$senha = "";
$banco = "crud";

$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

//caso ocorra erro na conexao exibe mensagem de erro
if (!$conexao) {
    echo "ERRO = " . mysqli_connect_error();
}

