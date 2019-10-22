<!-- importa o arquivo cabeçalho -->
<?php require_once("../cabecalho.php"); ?>  
<?php require_once("../global/mostra-alerta.php"); ?>
<?php require_once("../global/formatador.php"); ?>
<?php 
require_once("../bancodados/banco-paciente.php");
//chama função que lista os pacientes do banco de dados e retorna uma array
$pacientes = listarPaciente($conexao);
?>  

    <section class="container mt-3">
        <div class="row my-4 ">
            <div class="col-sm-10">
                <h3>Pacientes</h3>
            </div>
            <div class="col-sm-2">
                <a class="btn btn-success " href="paciente-form.php" role="button" >Novo paciente</a>
            </div>
        </div>

        <div>
            <?php
            //MOSTRAR MENSAGEM
                mostraAlerta("success");
                mostraAlerta("danger")
            ?>
        </div>

        <div>
        
        <?php
        //verifica a quantidade de registro no array para montar ou não a tabela com os dados 
        if(sizeof($pacientes) > 0): 
        ?> 
        <div class="table-responsive-sm">
            <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Cidade</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>

            <?php
                //ler todos os registros do array pacientes e colocar na tabela
	            foreach ($pacientes as $paciente) :
            ?>

                <tr>
                    <td><?= $paciente['id'] ?></td>
                    <td><?php echo formatador($paciente['cpf'], "###.###.###-##"); ?></td>
                    <td><?= $paciente['nome'] ?></td>
                    <td>
                        <?php 
                            $telefone = $paciente['ddd'] . $paciente['telefone'];                           
                            echo formatador($telefone, "(##)#####-####");
                        ?>
                    </td>
                    <td><?= $paciente['email'] ?></td>
                    <td><?= $paciente['cidade'] ?></td>
                    <td>
                        <a href="paciente-detalhar.php?id=<?= $paciente['id'] ?>" class="btn btn-primary">Detalhar</a>
                        <a href="paciente-form-alterar.php?id=<?= $paciente['id'] ?>" class="btn btn-warning">Alterar</a>
                        <a href="paciente-action-excluir.php?id=<?= $paciente['id'] ?>" class="btn btn-danger" onclick="return confirm('Confirma exclusão de <?= $paciente['nome'] ?>?');" title="Exclusão" >Excluir</a>
                    </td><i class="fas fa-pencil-alt"></i>
                    
                </tr>
            <?php endforeach ?>

            </tbody>
        </table>
        </div>

        <?php else: ?>

          <p>Nenhum paciente cadastrado.</p>  
        
        <?php endif ?>
        
    </div>
    </section>

    <script>

    </script>
<!-- importa o arquivo rodapé -->
<?php require_once("../rodape.php"); ?>  