<?php
// Inicialize a sessão
session_start();
require_once "topo.php";
require 'connection.php';
require_once "verifyloggedin.php";
 
require_once "verifyloggedin.php";
?>
 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Olá!</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    
    <h4 class="my-1">Olá <b><?php echo htmlspecialchars($_SESSION["email"]); ?></b>!</h4>

    <div class="container mt-4">

<?php include('message.php'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Pedidos
                    <?php
                    echo "<a href='order_create.php' class='btn btn-primary float-end'>Novo Pedido</a>";
                
                    ?>
                </h4>
            </div>
            <div class="card-body">

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Cliente</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $query = "SELECT p.id idPedido, c.nome from tbpedidos p, tbclientes c WHERE p.idCliente = c.id";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $tbpedidos)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $tbpedidos['idPedido']; ?></td>
                                        <td><?= $tbpedidos['nome']; ?></td>
                                        <td>
                                            <?php
                                                echo "<a href='order_view.php?idPedido={$tbpedidos['idPedido']}' class='btn btn-info btn-sm'>Abrir</a>";
                                                echo " ";
                                                echo " ";
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            else
                            {
                                echo "<h5> Nenhuma mercadoria cadastrada </h5>";
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