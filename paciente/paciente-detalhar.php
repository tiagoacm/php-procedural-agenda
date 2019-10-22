<!-- importa o arquivo cabeçalho -->
<?php require_once("../cabecalho.php"); ?>  
<?php require_once("../global/formatador.php"); ?>
<?php require_once("../bancodados/banco-paciente.php");

//pega o id no GET
$id = $_GET['id'];
//chama função que busca o paciente para valorizar os campos do formulário
$paciente = buscarPaciente($conexao, $id);

?> 

    <section class="container mt-3">
        <div>
            <h3>Paciente</h3>
        </div>

        <div class="row">
            <div class="col-md-1" >  <p><strong>Código</strong></p> </div>
            <div class="col-md-11"> <p><?= $paciente['id'] ?></p></div>
        </div>

        <div class="row">
            <div class="col-md-1" > <p><strong>CPF</strong></p> </div>
            <div class="col-md-11"> <p><?php echo formatador($paciente['cpf'], "###.###.###-##"); ?></p></div>
        </div>

        <div class="row">
            <div class="col-md-1" > <p ><strong>Nome</strong></p> </div>
            <div class="col-md-11"> <p class="lead"><?= $paciente['nome'] ?></p></div>
        </div>

        <div class="row">
            <div class="col-md-1" > <p><strong>Telefone</strong></p> </div>
            <div class="col-md-11"> 
                        <p>
                        <?php 
                            $telefone = $paciente['ddd'] . $paciente['telefone'];                           
                            echo formatador($telefone, "(##)#####-####");
                        ?>
                        </p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-1" > <p><strong>Email</strong></p>  </div>
            <div class="col-md-11"> <p><?= $paciente['email'] ?></p></div>
        </div>

        <div class="row">
            <div class="col-md-1" > <p><strong>CEP</strong></p> </div>
            <div class="col-md-11"> <p><?php echo formatador($paciente['cep'], "##.###-###"); ?></p></div>
        </div>

        <div class="row">
            <div class="col-md-6" > 
                <p><strong>Logradouro</strong> </p>
                <p><?= $paciente['logradouro'] ?> </p>
            </div>
            <div class="col-md-1" > 
                <p><strong>Número</strong> </p>
                <p><?= $paciente['numero'] ?> </p>
            </div>
            <div class="col-md-5" > 
                <p><strong>Complemento</strong> </p>
                <p><?= $paciente['complemento'] ?> </p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6" > 
                <p><strong>Bairro</strong> </p>
                <p><?= $paciente['bairro'] ?> </p>
            </div>
            <div class="col-md-5" > 
                <p><strong>Cidade</strong> </p>
                <p><?= $paciente['cidade'] ?> </p>
            </div>
            <div class="col-md-1" > 
                <p><strong>Estado</strong> </p>
                <p><?= $paciente['uf'] ?> </p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
            <a href="paciente-lista.php" class="btn btn-secondary">Cancelar</a>
            <a href="paciente-form-alterar.php?id=<?= $paciente['id'] ?>" class="btn btn-warning">Alterar</a>
            </div>
        </div>
       
        
       

    </section>





<!-- importa o arquivo rodapé -->
<?php require_once("../rodape.php"); ?>  