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

    <title>Mercadoria</title>
</head>
<body>
  
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Detalhes da mercadoria
                            <?php
                        if($_SESSION["tipo"] == 1){
                            echo "<a href='product_create.php' class='btn btn-primary float-end'>Adicionar mercadoria</a>";
                        }
                            ?>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Descricao</th>
                                    <th>Preço</th>
                                    <th>Categoria</th>
                                    <th>Quantidade</th>
                                    <th>Fornecedor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT p.id idProduto, p.preco, p.categoria, p.quantidade, p.descricao descricaoProduto, p.idFornecedor, c.id idCategoria, c.descricao descricaoCategoria, f.id idFornecedor, f.nome FROM tbprodutos p, tbcategoria c, tbfornecedores f WHERE p.categoria = c.id AND p.idFornecedor = f.id ORDER BY p.id ASC";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $tbprodutos)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $tbprodutos['idProduto']; ?></td>
                                                <td><?= $tbprodutos['descricaoProduto']; ?></td>
                                                <td>R$<?= $tbprodutos['preco']; ?></td>
                                                <td><?= $tbprodutos['descricaoCategoria']; ?></td>
                                                <td><?= $tbprodutos['quantidade']; ?></td>
                                                <td><?= $tbprodutos['nome']; ?></td>
                                                <td>
                                                    <?php if($_SESSION["tipo"] == 1){
                                                        echo "<a href='product_view.php?idProduto={$tbprodutos['idProduto']}' class='btn btn-info btn-sm'>Visualizar</a>";
                                                        echo " ";
                                                        echo "<a href='product_edit.php?idProduto={$tbprodutos['idProduto']}' class='btn btn-success btn-sm'>Editar</a>";
                                                        echo "<form action='code.php' method='POST' class='d-inline'>
                                                                <button type='submit' name='delete_product' value='{$tbprodutos['idProduto']}' class='btn btn-danger btn-sm'>Deletar</button>
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
                                        echo "<h5> Nenhuma mercadoria cadastrado </h5>";
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