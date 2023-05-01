<?php
session_start();
require 'connection.php';
require_once("topo.php");
require_once "verifyloggedin.php";
$idPedido = $_GET['idPedido'];
?>

<!doctype html>
<html lang="pt-BR">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Adicionar mercadoria ao pedido </title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Adicionar Mercadoria ao Pedido <?php echo $idPedido;?>
                            <a href="order_view.php?idPedido=<?=$_SESSION['idPedido']?>" class="btn btn-danger float-end">VOLTAR</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">
                            

                        <div class="mb-3">
                        <label> Produto </label>
                        <select class="custom-select" name="produto">
                        <option selected>Escolha...</option>
                        <?php 
                            $query = "SELECT * FROM tbprodutos";
                            $query_run = mysqli_query($con, $query);
                            $query1 = "SELECT descricao, id FROM tbprodutos WHERE id NOT IN (SELECT idProduto FROM tbpedidosprodutos WHERE idPedido = '$idPedido');";
                            $query_run1 = mysqli_query($con, $query1);

                            foreach($query_run1 as $tbprodutos)
                                {
                        ?>
                            <option value="<?php echo $tbprodutos['id']; ?>">
                                <?php echo $tbprodutos['descricao']; ?>
                            </option>

                        <?php }?>
                        </select>
                        </div>

                        <div class="mb-3">
                            <label>Quantidade</label>
                            <input type="number" name="quantidade" class="form-control">
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="save_orderproduct" class="btn btn-primary">Adicionar Mercadoria ao Pedido</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>