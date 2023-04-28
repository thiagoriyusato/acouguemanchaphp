<?php
// Inicialize a sessão
session_start();
require_once "topo.php";
 
// Remova todas as variáveis de sessão
$_SESSION = array();
 
// Destrua a sessão.
session_destroy();
 
// Redirecionar para a página de login
header("location: login.php");
exit;
?>