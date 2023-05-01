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

    <title>Criar mercadoria</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Adicionar Mercadoria
                            <a href="product.php" class="btn btn-danger float-end">VOLTAR</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">
                    <div class="mb-3">
                            <label>Descricao</label>
                            <input type="text" name="descricaoProduto" class="form-control">
                    </div>
                        <div class="mb-3">
                            <label>Preço</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">R$</span>
                                </div>
                                <input type="text" name="preco" class="form-control" aria-label="Amount (to the nearest dollar)">
                            </div>
                        </div>
                        <div class="mb-3">
                        <label> Categoria </label>
                        <select class="custom-select" name="cargo">
                        <option selected>Escolha...</option>
                        <?php 
                            $query2 = "SELECT * FROM tbcategoria";
                            $query_run2 = mysqli_query($con, $query2);
                                foreach($query_run2 as $tbcategoria)
                                {
                                    ?>


                            <option value="<?php echo $tbcategoria['id']; ?>"><?php echo $tbcategoria['descricao']; ?></option>

                        <?php }?>
                        </select>
                        </div>
                            <div class="mb-3">
                                <label>Quantidade</label>
                                <input type="number" name="quantidade" class="form-control">
                            </div>
                        <div class="mb-3">
                        <label> Fornecedor </label>
                        <select class="custom-select" name="fornecedor">
                        <option selected>Escolha...</option>
                        <?php 
                            $query = "SELECT * FROM tbfornecedores";
                            $query_run = mysqli_query($con, $query);
                                foreach($query_run as $tbfornecedores)
                                {
                                    ?>


                            <option value="<?php echo $tbfornecedores['id']; ?>"><?php echo $tbfornecedores['nome']; ?></option>

                        <?php }?>
                        </select>
                                </div>
                        <div class="mb-3">
                                <button type="submit" name="save_product" class="btn btn-primary">Salvar Mercadoria</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>