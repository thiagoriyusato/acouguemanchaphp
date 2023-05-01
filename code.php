<?php
session_start();
require 'connection.php';

if(isset($_POST['delete_person']))
{
    $tbpessoas_id = mysqli_real_escape_string($con, $_POST['delete_person']);

    $query = "DELETE FROM tbpessoas WHERE id='$tbpessoas_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Pessoa excluida com sucesso";
        header("Location: person.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Não foi possivel excluir a pessoa";
        header("Location: person.php");
        exit(0);
    }
}

if(isset($_POST['update_person']))
{
    $tbpessoas_id = mysqli_real_escape_string($con, $_POST['tbpessoas_id']);

    $nome = mysqli_real_escape_string($con, $_POST['nome']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $endereco = mysqli_real_escape_string($con, $_POST['endereco']);

    $query = "UPDATE tbpessoas SET nome='$nome', email='$email', endereco='$endereco' WHERE id='$tbpessoas_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Pessoa atualizada com sucesso";
        header("Location: person.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Pessoa não atualizada";
        header("Location: person.php");
        exit(0);
    }

}


if(isset($_POST['save_person']))
{
    $nome = mysqli_real_escape_string($con, $_POST['nome']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $endereco = mysqli_real_escape_string($con, $_POST['endereco']);
    $cpf = mysqli_real_escape_string($con, $_POST['cpf']);

    $query = "INSERT INTO tbpessoas (nome,email,endereco, cpf) VALUES ('$nome','$email','$endereco', '$cpf')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Pessoa cadastrada com sucesso!";
        header("Location: person_create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Pessoa não cadastrada";
        header("Location: person_create.php");
        exit(0);
    }
}

if(isset($_POST['save_worker']))
{
    $pessoa = mysqli_real_escape_string($con, $_POST['pessoaid']);
    $cargo = mysqli_real_escape_string($con, $_POST['cargoid']);
    $salario = mysqli_real_escape_string($con, $_POST['salario']);

    $query = "INSERT INTO tbfuncionarios (idPessoa,idCargo,salario) VALUES ('$pessoa','$cargo','$salario')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Funcionário cadastrado com sucesso!";
        header("Location: worker_create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Funcionário não cadastrado";
        header("Location: worker_create.php");
        exit(0);
    }
}

if(isset($_POST['update_worker']))
{
    $tbfuncionarios_id = mysqli_real_escape_string($con, $_POST['tbfuncionarios_id']);

    $salario = mysqli_real_escape_string($con, $_POST['salario']);
    $cargo = mysqli_real_escape_string($con, $_POST['cargoid']);

    $query = "UPDATE tbfuncionarios SET salario='$salario', idCargo='$cargo' WHERE id='$tbfuncionarios_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Funcionario atualizado com sucesso";
        header("Location: worker.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Funcionario não atualizado";
        header("Location: worker.php");
        exit(0);
    }

}

if(isset($_POST['delete_worker']))
{
    $tbfuncionarios_id = mysqli_real_escape_string($con, $_POST['delete_worker']);

    $query = "DELETE FROM tbfuncionarios WHERE id='$tbfuncionarios_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Funcionário excluido com sucesso";
        header("Location: worker.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Não foi possivel excluir o funcionário";
        header("Location: worker.php");
        exit(0);
    }
}

if(isset($_POST['update_product']))
{
    $tbprodutos_id = mysqli_real_escape_string($con, $_POST['tbprodutos_id']);

    $preco = mysqli_real_escape_string($con, $_POST['preco']);
    $quantidade = mysqli_real_escape_string($con, $_POST['quantidade']);

    $query = "UPDATE tbprodutos SET preco='$preco', quantidade='$quantidade' WHERE id='$tbprodutos_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Mercadoria atualizada com sucesso";
        header("Location: product.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Mercadoria não atualizada";
        header("Location: product.php");
        exit(0);
    }

}


if(isset($_POST['save_product']))
{
    $descricao = mysqli_real_escape_string($con, $_POST['descricaoProduto']);
    $categoria = mysqli_real_escape_string($con, $_POST['cargo']);
    $preco = mysqli_real_escape_string($con, $_POST['preco']);
    $quantidade = mysqli_real_escape_string($con, $_POST['quantidade']);
    $fornecedor = mysqli_real_escape_string($con, $_POST['fornecedor']);

    $query = "INSERT INTO tbprodutos (preco,categoria,quantidade,descricao,idFornecedor) 
    VALUES ('$preco','$categoria','$quantidade','$descricao','$fornecedor')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Mercadoria cadastrada com sucesso!";
        header("Location: product_create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Mercadoria não cadastrada";
        header("Location: product_create.php");
        exit(0);
    }
}

if(isset($_POST['save_orderproduct']))
{
    $idPedido = $_SESSION['idPedido'];
    $idProduto = mysqli_real_escape_string($con, $_POST['produto']);
    $quantidade = mysqli_real_escape_string($con, $_POST['quantidade']);
    $idPedidor = $idPedido;

    echo $idPedido, " ";
    echo $idProduto, " ";
    echo $quantidade, " ";
    echo $idPedidor, " ";

    $query33 = "SELECT * FROM tbprodutos WHERE tbprodutos.id = '$idProduto'";
    $query_run33 = mysqli_query($con, $query33);
    $row = mysqli_fetch_assoc($query_run33);
    $valor = $row['preco'];

    $preco = $quantidade * $valor;
    
    $query = "INSERT INTO tbpedidosprodutos (idPedido,idProduto,quantidade,preco) VALUES ('$idPedidor','$idProduto','$quantidade','$preco')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Mercadoria adicionada ao pedido com sucesso!";
        header("Location: order_add.php?idPedido=$idPedidor");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Mercadoria não adicionada ao pedido";
        header("Location: order_add.php?idPedido=$idPedidor");
        exit(0);
    }
}

if(isset($_POST['save_order']))
{
        $_SESSION['message'] = "Pedido finalizado";
        header("Location: index.php");
        exit(0);
}

if(isset($_POST['delete_orderitem']))
{
    $tbpedidoproduto_id = mysqli_real_escape_string($con, $_POST['delete_orderitem']);

    $query = "DELETE FROM tbpedidosprodutos WHERE id='$tbpedidoproduto_id' ";
    $query_run = mysqli_query($con, $query);

    $idPedido = $_SESSION['idPedido'];

    if($query_run)
    {
        $_SESSION['message'] = "Mercadoria removida da lista com sucesso";
        header("Location: order_view.php?idPedido=$idPedido");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Não foi possivel remover a mercadoria";
        header("Location: order_view.php?idPedido=$idPedido");
        exit(0);
    }
}


if(isset($_POST['create_order']))
{
    $cliente = mysqli_real_escape_string($con, $_POST['cliente']);

    $query = "INSERT INTO tbpedidos (idCliente) VALUES ('$cliente')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Pedido criado com sucesso!";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Pedido não criado";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['save_customer']))
{
    $nome = mysqli_real_escape_string($con, $_POST['nome']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $endereco = mysqli_real_escape_string($con, $_POST['endereco']);
    $cpf = mysqli_real_escape_string($con, $_POST['cpf']);

    $query = "INSERT INTO tbclientes (nome,endereco,CPF) VALUES ('$nome','$endereco','$cpf')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Cliente cadastrado com sucesso!";
        header("Location: customer_create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Cliente não cadastrado";
        header("Location: customer_create.php");
        exit(0);
    }
}


if(isset($_POST['update_customer']))
{
    $tbclientes_id = mysqli_real_escape_string($con, $_POST['tbclientes_id']);

    $nome = mysqli_real_escape_string($con, $_POST['nome']);
    $endereco = mysqli_real_escape_string($con, $_POST['endereco']);

    $query = "UPDATE tbclientes SET nome='$nome', endereco='$endereco' WHERE id='$tbclientes_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Cliente atualizado com sucesso";
        header("Location: customer.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Cliente não atualizado";
        header("Location: customer.php");
        exit(0);
    }

}


if(isset($_POST['delete_customer']))
{
    $tbclientes_id = mysqli_real_escape_string($con, $_POST['delete_customer']);

    $query = "DELETE FROM tbclientes WHERE id='$tbclientes_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Cliente excluido com sucesso";
        header("Location: customer.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Não foi possivel excluir o cliente";
        header("Location: customer.php");
        exit(0);
    }
}
?>