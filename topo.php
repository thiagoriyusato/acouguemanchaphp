<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Açougue</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <!-- barra de navegação -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">Açougue do Mancha</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <?php
      if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        echo"
        <li class='nav-item active'>
        <a class='nav-link' href='person.php'> Pessoas <span class='sr-only'>(current)</span></a>
        </li>";
        echo"
        <li class='nav-item active'>
        <a class='nav-link' href='worker.php'> Funcionários <span class='sr-only'>(current)</span></a>
        </li>";
      } 
      ?>
        </div>
    </ul>
    <form method="post" class="form-inline my-2 my-lg-0">
    <?php

        if(isset($_SESSION['email'])){
            echo "<span class='nav-text' style='color: white'>Olá " .
            $_SESSION["email"] . "</span>";
            echo "<a href='logout.php' 
            class='btn btn-danger ml-3'>Sair da conta</a>";
    ?>

    <?php
        }
        ?>
    </form>
  </div>
</nav>
</ul>
<br><br>