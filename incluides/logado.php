<!--MANTENDO A SESSÃO ATIVA-->
<?php
include 'incluides/conn.php';
@session_start();

$nome = $_SESSION['nome'];
$senha = $_SESSION['senha'];
$codcontabil = $_SESSION['codcontabil'];
$codcliente = $_SESSION['codcliente'];
        
if (!isset($_SESSION['nome']) && !isset($_SESSION['senha'])) {
    header('Location: login.php');
    exit;
}
