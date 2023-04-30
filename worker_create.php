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

    <title>Criar pessoa</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Adicionar Funcionário
                            <a href="person.php" class="btn btn-danger float-end">VOLTAR</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">
                        <div class="mb-3">
                        <label>Pessoa</label>
                        <select class="custom-select" name="pessoaid">
                        <option selected>Escolha...</option>
                        <?php 
                            $query = "SELECT * FROM tbpessoas WHERE tbpessoas.id NOT IN (SELECT idPessoa from tbfuncionarios) AND tbpessoas.id NOT IN (SELECT idPessoa from tbfornecedores) ";
                            $query_run = mysqli_query($con, $query);
                                foreach($query_run as $tbpessoas)
                                {
                                    ?>


                            <option value="<?php echo $tbpessoas['id']; ?>"><?php echo $tbpessoas['nome']; ?></option>

                        <?php }?>
                        </select>
                        </div>
                        <div class="mb-3">
                        <label> Cargo </label>
                        <select class="custom-select" name="cargoid">
                        <option selected>Escolha...</option>
                        <?php 
                            $query2 = "SELECT * FROM tbcargos";
                            $query_run2 = mysqli_query($con, $query2);
                                foreach($query_run2 as $tbcargos)
                                {
                                    ?>


                            <option value="<?php echo $tbcargos['id']; ?>"><?php echo $tbcargos['descricao']; ?></option>

                        <?php }?>
                        </select>
                        </div>

                            <div class="mb-3">
                                <label>Salário</label>
                                <input type="text" name="salario" class="form-control">
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="save_worker" class="btn btn-primary">Salvar Funcionario</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>