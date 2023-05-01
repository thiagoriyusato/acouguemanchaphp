<?php
session_start();
require 'connection.php';
require_once("topo.php");
require_once "verifyloggedin.php";
$_SESSION['idPedido'] = $_GET['idPedido'];
$tbpedidos_id1 = mysqli_real_escape_string($con, $_GET['idPedido']);
?>
<!doctype html>
<html lang="pt-BR">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Detalhes do Pedido</title>
</head>
<body>

<div class="container mt-4">

<?php include('message.php'); ?>

<div class="container mt-5">

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">   
                <h4>Pedido <?php echo $tbpedidos_id1?>
                    <a href="index.php" class="btn btn-danger float-end">VOLTAR</a>
                    
                    <a href='order_add.php?idPedido=<?=$tbpedidos_id1?>' class='btn btn-primary float-end'>Adicionar Mercadoria ao Pedido</a>
                </h4>
            </div>
            <div class="card-body">

            <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>idPedido</th>
                                    <th>idProduto</th>
                                    <th>Descricao</th>
                                    <th>Preço</th>
                                    <th>Quantidade</th>
                                    <th>Preço total</th>
                                </tr>
                            </thead>
                            <tbody>
                <?php
                if(isset($_GET['idPedido']))
                {
                    $total = 0;
                    $tbpedidos_id = mysqli_real_escape_string($con, $_GET['idPedido']);
                    $query = "SELECT tbpedidos.id idPedido, tbpedidosprodutos.id idpp,
                    tbpedidosprodutos.idProduto, tbpedidosprodutos.quantidade, tbpedidosprodutos.preco precoPP, 
                    tbprodutos.preco, tbprodutos.descricao from tbpedidos, tbpedidosprodutos, 
                    tbprodutos WHERE tbpedidos.id = '$tbpedidos_id' AND 
                    tbpedidosprodutos.idPedido = tbpedidos.id AND tbpedidosprodutos.idProduto = tbprodutos.id;";
                    $query_run = mysqli_query($con, $query);	

                                   if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $tbpedidos)
                                        {
                                            $valor = $tbpedidos['preco'];
                                            $quantidade = $tbpedidos['quantidade'];

                                            $total = $total + ($valor*$quantidade);
                                            ?>
                                            <tr>
                                                <td><?= $tbpedidos['idPedido']; ?></td>
                                                <td><?= $tbpedidos['idProduto']; ?></td>
                                                <td><?= $tbpedidos['descricao']; ?></td>
                                                <td>R$<?= $tbpedidos['preco']; ?></td>
                                                <td><?= $tbpedidos['quantidade']; ?></td>
                                                <td><?= $tbpedidos['precoPP']; ?></td>
                                                <td>
                                                    <?php if($_SESSION["tipo"] == 1){
                                                        echo "<a href='person_edit.php?id={$tbpedidos['idpp']}' class='btn btn-success btn-sm'>Editar</a>";
                                                        echo "<form action='code.php' method='POST' class='d-inline'>
                                                                <button type='submit' name='delete_orderitem' value='{$tbpedidos['idpp']}' class='btn btn-danger btn-sm'>Deletar</button>
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
                                        echo "<h5> Nenhuma pessoa cadastrada </h5>";
                                    }
                }
                ?>
                <tr>
                    <td colspan="5">Total do Pedido</td>
                    <td>R$<?= $total; ?></td>
                    <td colspan="2">
                    <a href="index.php" class="btn btn-primary float-end">Finalizar Pedido</a>
                    </td>
                </tr>
                 </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>


 
</body>
</html>