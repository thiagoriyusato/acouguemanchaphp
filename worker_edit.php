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

    <title>Editar Mercadoria</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar funcionário
                            <a href="worker.php" class="btn btn-danger float-end">VOLTAR</a>
                        </h4>
                    </div>
                    <div class="card-body">

                    <?php
                        if(isset($_GET['idFuncionario']))
                        {
                            $tbfuncionarios_id = mysqli_real_escape_string($con, $_GET['idFuncionario']);
                            $query = "SELECT f.id idFuncionario, f.salario, c.id idCargo, c.descricao descricaoCargo FROM tbfuncionarios f, tbcargos c WHERE f.id = '$tbfuncionarios_id' AND f.idCargo = c.id";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $tbfuncionarios = mysqli_fetch_array($query_run);
                                ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="tbfuncionarios_id" value="<?= $tbfuncionarios['idFuncionario']; ?>">
                                    <div class="mb-3">
                                        <label>Salário</label>
                                        <input type="text" name="salario" value="<?=$tbfuncionarios['salario'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                    <label> Cargo </label>
                        <select class="custom-select" name="cargoid">
                        <option selected value="<?=$tbfuncionarios['idCargo']?>"><?php echo $tbfuncionarios['descricaoCargo']; ?></option>
                        <?php 
                            $query2 = "SELECT id idCargo, descricao FROM tbcargos";
                            $query_run2 = mysqli_query($con, $query2);
                                foreach($query_run2 as $tbcargos)
                                {
                                    if($tbcargos['idCargo'] == $tbfuncionarios['idCargo'])
                                    continue;
                                    ?>


                            <option value="<?=$tbcargos['idCargo'];?>"><?php echo $tbcargos['descricao']; ?></option>

                        <?php }?>
                        </select>
                                    </div>
                                
                                    <div class="mb-3">
                                        <button type="submit" name="update_worker" class="btn btn-primary">
                                            Atualizar Funcionário
                                        </button>
                                    </div>
                                </form>
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