<?php
require_once("conexao.php");

//função para retornar todos os pacientes
function listarPaciente($conexao){
    //monta SQL
    $query = "SELECT id, cpf, nome, ddd, telefone, email,cidade FROM paciente";
    //executa SQL
    $resultado = mysqli_query($conexao, $query);
    
    //cria uma array de pacientes
    $pacientes = array();
    
    //le resultado do SQL e coloca dentro da array
    while ($dados = mysqli_fetch_array($resultado)) {
		array_push($pacientes, $dados);
    }
    
    //retorna array com os dados 
    return $pacientes;
}

//função para buscar um paciente por ID
function buscarPaciente($conexao, $id) {
    //monta SQL para pegar um paciente especifico
    $query = "SELECT id, cpf, nome, ddd, telefone, email,cep, logradouro, numero, complemento, bairro, cidade, uf FROM paciente WHERE id = $id";
    //executa SQL
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
}

//função para inserir um paciente
function inserirPaciente($conexao, $cpf, $nome, $ddd, $telefone, $email, $cep, $logradouro, $numero, $complemento, $bairro, $cidade, $estado){

    $cpf = mysqli_escape_string($conexao, $cpf);
    $nome = mysqli_escape_string($conexao, $nome);
    $ddd = mysqli_escape_string($conexao, $ddd);
    $telefone = mysqli_escape_string($conexao, $telefone);
    $email = mysqli_escape_string($conexao, $email);

    $cep = mysqli_escape_string($conexao, $cep); 
    $logradouro = mysqli_escape_string($conexao, $logradouro);
    $numero = mysqli_escape_string($conexao, $numero);
    $complemento = mysqli_escape_string($conexao, $complemento);
    $bairro = mysqli_escape_string($conexao, $bairro);
    $cidade = mysqli_escape_string($conexao, $cidade);
    $estado = mysqli_escape_string($conexao, $estado);
    
    //monta o SQL
	$query = "insert into paciente (cpf, nome, ddd, telefone, email, cep, logradouro, numero, complemento, bairro, cidade, uf) values ('$cpf', '$nome', '$ddd', '$telefone','$email', '$cep', '$logradouro', $numero, '$complemento', '$bairro', '$cidade', '$estado' )";
    //executa o SQL
    $resultadoInsercao = mysqli_query($conexao, $query);
    //retorna resultado da execucao
    return $resultadoInsercao;
}

//função apra alterar um paciente
function alterarPaciente($conexao, $id, $nome, $ddd, $telefone, $email, $cep, $logradouro, $numero, $complemento, $bairro, $cidade, $estado) {
    $id = mysqli_escape_string($conexao, $id);
    $nome = mysqli_escape_string($conexao, $nome);
    $ddd = mysqli_escape_string($conexao, $ddd);
    $telefone = mysqli_escape_string($conexao, $telefone);
    $email = mysqli_escape_string($conexao, $email);

    $cep = mysqli_escape_string($conexao, $cep); 
    $logradouro = mysqli_escape_string($conexao, $logradouro);
    $numero = mysqli_escape_string($conexao, $numero);
    $complemento = mysqli_escape_string($conexao, $complemento);
    $bairro = mysqli_escape_string($conexao, $bairro);
    $cidade = mysqli_escape_string($conexao, $cidade);
    $estado = mysqli_escape_string($conexao, $estado);

    //monta SQL
    $query = "UPDATE paciente SET  nome = '$nome', ddd = '$ddd', telefone = '$telefone', email = '$email' , cep = '$cep' , logradouro = '$logradouro' , numero = '$numero' , complemento = '$complemento' , bairro = '$bairro' , cidade = '$cidade' , uf = '$estado'  WHERE id = $id";
    //executa o SQL
    $resultadoAlteracao = mysqli_query($conexao, $query);
    //retorna resultado da execucao
    return $resultadoAlteracao;
}

//função para excluir um paciente
function removerPaciente($conexao, $id) {
    $id = mysqli_escape_string($conexao, $id);
    //monta SQL
    $query = "DELETE FROM paciente where id = $id";
    //executa SQL
    $resultadoExclusao = mysqli_query($conexao, $query);
    return $resultadoExclusao;
}

//função para verificar se CPF já existe no banco de dados
function verificarCpf($conexao, $cpf) {
    $cpf = mysqli_escape_string($conexao, $cpf);

    //monta SQL
    $query = "SELECT id FROM paciente where cpf = '$cpf'";
    
    //executa SQL
    $resultado = mysqli_query($conexao, $query);

    //verificar quantidade encontrada e retornar verdadeiro ou false
    $qtdEncontrada = mysqli_num_rows($resultado);

    if($qtdEncontrada > 0){
        return true; //encontrou registro na tabela
    }else{
        return false; // não encontrou registro na tabela
    }
}
?>