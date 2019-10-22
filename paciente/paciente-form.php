<!-- importa o arquivo cabeçalho -->
<?php require_once("../cabecalho.php"); ?>  
<?php require_once("../global/mostra-alerta.php"); ?>

    <section class="container mt-3">
        <div>
            <h3>Novo Paciente</h3>
        </div>


        <div>
            <?php
                //VERIFICA EXISTENCIA DA SESSAO "VALIDAÇÃO" PARA EXIBIR ERRO DE VALIDAÇÃO DO BACKEND
                if(isset($_SESSION["validacao"])){
                    $erros = $_SESSION['validacao'];
                    echo '<div class="alert alert-danger"><ul>';
  
                    foreach ( $erros as $erro ) {
                        echo '<li>'. $erro . '</li>';
                    }
                    echo '</ul></div>'; 
                    //EXCLUIR SESSAO VALIDAÇÃO
                    unset($_SESSION["validacao"]);
                }
            ?>
        </div>

        <div id="msgVerificaCpf" class="alert alert-danger">
                
        </div>

        
        <div>

        <form action="paciente-action-inserir.php" method="post" class="needs-validation" novalidate  >
            <div class="form-group">
                <label for="txtCPF">CPF</label>
                <input type="text" class="form-control" id="txtCpf" name="cpf" placeholder="digite seu CPF"  maxlength="11" pattern="[0-9]{11}" autofocus required >
                <small id="cpfHelp" class="form-text text-muted">Informar somente os números</small>
                <div class="invalid-feedback">Por favor, informe um CPF.</div>
            </div>
            <div class="form-group">
                <label for="txtNome">Nome</label>
                <input type="text" class="form-control " id="txtNome" name="nome" placeholder="digite seu nome" minlength="3" maxlength="50" required>
                <div class="invalid-feedback">Por favor, informe um nome.</div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="txtDdd">DDD</label>
                    <input type="text" class="form-control" id="txtDdd" name="ddd" placeholder="DDD" value="14" maxlength="2" pattern="[0-9]{2}" required>
                    <div class="invalid-feedback">Por favor, informe o DDD.</div>
                </div>
                <div class="form-group col-md-10">
                    <label for="txtTelefone">Celular</label>           
                    <input type="tel" class="form-control" id="txtTelefone" name="telefone" placeholder="digite seu telefone"  maxlength="9" pattern="[0-9]{9}" required>
                    <small id="telHelp" class="form-text text-muted">Informar somente os números</small>
                    <div class="invalid-feedback">Por favor, informe um telefone.</div>
                </div>
            </div>

            <div class="form-group">
                <label for="txtEmail">Email</label>
                <input type="email" class="form-control" id="txtEmail" name="email" placeholder="digite seu email" maxlength="50" required>
                <div class="invalid-feedback">Por favor, informe um email correto</div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="cep">CEP</label>
                    <input type="text" class="form-control" id="cep" name="cep" placeholder="Qual seu CEP?" maxlength="8" pattern="[0-9]{8}" required>
                    <div class="invalid-feedback">Por favor, informe um CEP correto</div>
                </div>
                <div class="form-group col-md-3 mt-4">
                    <div id="msgErroCep" class="alert alert-warning"></div>
                </div>
            </div>


<div id="blocoEndereco">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="logradouro">Logradouro</label>
                    <input type="text" class="form-control" id="logradouro" name="logradouro" placeholder="" maxlength="100" required readonly>
                    <div class="invalid-feedback">Por favor, informe um logradouro correto</div>
                </div>

                <div class="form-group col-md-2">
                    <label for="numero">Número</label>
                    <input type="text" class="form-control" id="numero" name="numero" placeholder="Informe número" maxlength="4" pattern="[0-9]{1,4}"required>
                    <div class="invalid-feedback">Por favor, informe o número endereço correto</div>
                </div>

                <div class="form-group col-md-4">
                    <label for="complemento">Complemento</label>
                    <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Informe o complemento" maxlength="100">
                    <div class="invalid-feedback">Por favor, informe um complemento correto</div>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" id="bairro" name="bairro" placeholder="" maxlength="100" required readonly>
                    <div class="invalid-feedback">Por favor, informe um bairro correto</div>
                </div>

                <div class="form-group col-md-6">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" id="cidade" name="cidade" placeholder="" maxlength="100" required readonly>
                    <div class="invalid-feedback">Por favor, informe a cidade correto</div>
                </div>

                <div class="form-group col-md-1">
                    <label for="estado">Estado</label>
                    <input type="text" class="form-control" id="estado" name="estado" placeholder="" maxlength="100" required readonly>
                    <div class="invalid-feedback">Por favor, informe um estado correto</div>
                </div>
            </div>
</div>
            <a href="paciente-lista.php" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-success" id="btnCadastrar" name="btnCadastrar">Cadastrar</button>
        </form>

        </div>
    </section>

    <script>
    
    //SCRIPT BOOSTRAP PARA EXIBIR AS MENSAGEM DE VALIDAÇÃO
    (function() {
    'use strict';
    window.addEventListener('load', function() {
        // Pega todos os formulários que nós queremos aplicar estilos de validação Bootstrap personalizados.
        var forms = document.getElementsByClassName('needs-validation');
        // Faz um loop neles e evita o envio
        var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
        });
    }, false);
    })();
    </script>

<script type="text/javascript" src="../js/consultarCpf.js"></script>
<script type="text/javascript" src="../js/consultarCep.js"></script>

<!-- importa o arquivo rodapé -->
<?php require_once("../rodape.php"); ?>  