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

?>