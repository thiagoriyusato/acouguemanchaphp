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

    <title>Funcionario</title>
</head>
<body>
  
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Detalhes do funcionário
                            <?php
                        if($_SESSION["tipo"] == 1){
                            echo "<a href='worker_create.php' class='btn btn-primary float-end'>Adicionar funcionario</a>";
                        }
                            ?>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Endereço</th>
                                    <th>CPF</th>
                                    <th>Cargo</th>
                                    <th>Salário</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT f.id idFuncionario, f.idPessoa, f.idCargo, f.salario, p.id idPessoa1 , p.endereco , p.nome, p.cpf, c.id idCargo1, c.descricao FROM tbfuncionarios f, tbpessoas p, tbcargos c WHERE f.idPessoa = p.id AND f.idCargo = c.id ORDER BY f.id ASC";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $tbfuncionarios)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $tbfuncionarios['idFuncionario']; ?></td>
                                                <td><?= $tbfuncionarios['nome']; ?></td>
                                                <td><?= $tbfuncionarios['endereco']; ?></td>
                                                <td><?= $tbfuncionarios['cpf']; ?></td>
                                                <td><?= $tbfuncionarios['descricao']; ?></td>
                                                <td>R$<?= $tbfuncionarios['salario']; ?></td>
                                                <td>
                                                    <?php if($_SESSION["tipo"] == 1){
                                                        echo "<a href='worker_view.php?idFuncionario={$tbfuncionarios['idFuncionario']}' class='btn btn-info btn-sm'>Visualizar</a>";
                                                        echo " ";
                                                        echo "<a href='worker_edit.php?idFuncionario={$tbfuncionarios['idFuncionario']}' class='btn btn-success btn-sm'>Editar</a>";
                                                        echo "<form action='code.php' method='POST' class='d-inline'>
                                                                <button type='submit' name='delete_worker' value='{$tbfuncionarios['idFuncionario']}' class='btn btn-danger btn-sm'>Deletar</button>
                                                                </form>";
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> Nenhum funcionario cadastrado </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
</html>