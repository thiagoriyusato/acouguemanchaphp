<?php
// Inicialize a sessão
session_start();
require_once "topo.php";
 
// Verifique se o usuário está logado, caso contrário, redirecione para a página de login
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
 
// Incluir arquivo de configuração
require_once "config.php";
 
// Defina variáveis e inicialize com valores vazios
$new_senha = $confirm_senha = "";
$new_senha_err = $confirm_senha_err = "";
 
// Processando dados do formulário quando o formulário é enviado
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validar nova senha
    if(empty(trim($_POST["new_senha"]))){
        $new_senha_err = "Por favor insira a nova senha.";     
    } else{
        $new_senha = trim($_POST["new_senha"]);
    }
    
    // Validar e confirmar a senha
    if(empty(trim($_POST["confirm_senha"]))){
        $confirm_senha_err = "Por favor, confirme a senha.";
    } else{
        $confirm_senha = trim($_POST["confirm_senha"]);
        if(empty($new_senha_err) && ($new_senha != $confirm_senha)){
            $confirm_senha_err = "A senha não confere.";
        }
    }
        
    // Verifique os erros de entrada antes de atualizar o banco de dados
    if(empty($new_senha_err) && empty($confirm_senha_err)){
        // Prepare uma declaração de atualização
        $sql = "UPDATE tbcontas SET senha = :senha WHERE id = :id";
        
        if($stmt = $pdo->prepare($sql)){
            // Vincule as variáveis à instrução preparada como parâmetros
            $stmt->bindParam(":senha", $param_senha, PDO::PARAM_STR);
            $stmt->bindParam(":id", $param_id, PDO::PARAM_INT);
            
            // Definir parâmetros
            $param_senha = password_hash($new_senha, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];
            
            // Tente executar a declaração preparada
            if($stmt->execute()){
                // Senha atualizada com sucesso. Destrua a sessão e redirecione para a página de login
                session_destroy();
                header("location: login.php");
                exit();
            } else{
                echo "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
            }

            // Fechar declaração
            unset($stmt);
        }
    }
    
    // Fechar conexão
    unset($pdo);
}
?>
 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Redefinir senha</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
<div class="container mt-5">

<div class="row">
    <div class="col-md-12">
        <div class="card">
    <div class="card-header">
        <h2>Redefinir senha</h2>
        <p>Por favor, preencha este formulário para redefinir sua senha.</p>
</div>
<div class="card-header">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
            <div class="mb-3">
                <label>Nova senha</label>
                <input type="password" name="new_senha" class="form-control <?php echo (!empty($new_senha_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $new_senha; ?>">
                <span class="invalid-feedback"><?php echo $new_senha_err; ?></span>
            </div>
            <div class="mb-3">
                <label>Confirme a senha</label>
                <input type="password" name="confirm_senha" class="form-control <?php echo (!empty($confirm_senha_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $confirm_senha_err; ?></span>
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Redefinir">
                <a class="btn btn-link ml-2" href="index.php">Cancelar</a>
            </div>
        </form>
</div>
</div>
</div>
</div>
</div>
    </div>    
</body>
</html>