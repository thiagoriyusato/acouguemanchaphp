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

    <title>Editar Pessoa</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar cliente
                            <a href="customer.php" class="btn btn-danger float-end">VOLTAR</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $tbclientes_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM tbclientes WHERE id='$tbclientes_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $tbclientes = mysqli_fetch_array($query_run);
                                ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="tbclientes_id" value="<?= $tbclientes['id']; ?>">

                                    <div class="mb-3">
                                        <label>Nome</label>
                                        <input type="text" name="nome" value="<?=$tbclientes['nome'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Endereco</label>
                                        <input type="text" name="endereco" value="<?=$tbclientes['endereco'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_customer" class="btn btn-primary">
                                            Atualizar Cliente
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>