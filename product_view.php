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

    <title>Detalhes da Mercadoria</title>
</head>
<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">   
                        <h4>Dados da mercadoria
                            <a href="worker.php" class="btn btn-danger float-end">VOLTAR</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['idProduto']))
                        {
                            $tbprodutos_id = mysqli_real_escape_string($con, $_GET['idProduto']);
                            $query = "SELECT p.preco, p.descricao descricaoProduto, p.categoria categoriaProduto, p.quantidade, f.nome, c.descricao descricaoCategoria FROM tbprodutos p, tbfornecedores f, tbcategoria c WHERE p.id = '$tbprodutos_id' AND p.categoria = c.id AND p.idFornecedor = f.id";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $tbprodutos = mysqli_fetch_array($query_run);
                                ?>
                                
                                    <div class="mb-3">
                                        <label>Descrição</label>
                                        <p class="form-control">
                                            <?=$tbprodutos['descricaoProduto'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Preço</label>
                                        <p class="form-control">
                                            <?=$tbprodutos['preco'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Categoria</label>
                                        <p class="form-control">
                                            <?=$tbprodutos['descricaoCategoria'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Quantidade</label>
                                        <p class="form-control">
                                            <?=$tbprodutos['quantidade'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Fornecedor</label>
                                        <p class="form-control">
                                            <?=$tbprodutos['nome'];?>
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