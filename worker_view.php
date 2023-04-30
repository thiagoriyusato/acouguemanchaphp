<?php
session_start();
require 'connection.php';
require_once("topo.php");
require_once "verifyloggedin.php";
?>
<!doctype html>
<html lang="pt-BR">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Detalhes do Funcionário</title>
</head>
<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">   
                        <h4>Dados do Funcionário
                            <a href="worker.php" class="btn btn-danger float-end">VOLTAR</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['idFuncionario']))
                        {
                            $tbfuncionarios_id = mysqli_real_escape_string($con, $_GET['idFuncionario']);
                            $query = "SELECT * FROM tbfuncionarios, tbpessoas, tbcargos WHERE tbfuncionarios.id = '$tbfuncionarios_id' AND tbfuncionarios.idPessoa = tbpessoas.id AND tbfuncionarios.idCargo = tbcargos.id";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $tbfuncionarios = mysqli_fetch_array($query_run);
                                ?>
                                
                                    <div class="mb-3">
                                        <label>Nome</label>
                                        <p class="form-control">
                                            <?=$tbfuncionarios['nome'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Endereço</label>
                                        <p class="form-control">
                                            <?=$tbfuncionarios['endereco'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Email</label>
                                        <p class="form-control">
                                            <?=$tbfuncionarios['email'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Cargo</label>
                                        <p class="form-control">
                                            <?=$tbfuncionarios['descricao'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Salário</label>
                                        <p class="form-control">
                                            <?=$tbfuncionarios['salario'];?>
                                        </p>
                                    </div>

                                <?php
                            }
                            else
                            {
                                echo "<h4>Nenhum ID encontrado</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>