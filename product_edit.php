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

    <script>
$("input[type='number']").bootstrapNumber({
// default, danger, success , warning, info, primary
upClass:'danger',
downClass:'success'
center:true
});

        </script>
    <title>Editar Mercadoria</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar mercadoria
                            <a href="product.php" class="btn btn-danger float-end">VOLTAR</a>
                        </h4>
                    </div>
                    <div class="card-body">

                    <?php
                        if(isset($_GET['idProduto']))
                        {
                            $tbprodutos_id = mysqli_real_escape_string($con, $_GET['idProduto']);
                            $query = "SELECT * FROM tbprodutos WHERE id = '$tbprodutos_id'";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $tbprodutos = mysqli_fetch_array($query_run);
                                ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="tbprodutos_id" value="<?= $tbprodutos['id']; ?>">
                                    <label>Preço</label>
                                    <div class="input-group mb-3">

                                        <div class="input-group-prepend">
                                            <span class="input-group-text">R$</span>
                                        </div>
                                        <input type="text" name="preco" value="<?=$tbprodutos['preco'];?>" class="form-control" aria-label="Amount (to the nearest dollar)">
                                    </div>
                                    <div class="mb-3">
                                    <label> Quantidade </label>
                                    <input type="number" name="quantidade" value="<?=$tbprodutos['quantidade'];?>" class="form-control">
                                    </div>
                                
                                    <div class="mb-3">
                                        <button type="submit" name="update_product" class="btn btn-primary">
                                            Atualizar Mercadoria
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