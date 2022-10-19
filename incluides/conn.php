<?php

//Conecta com o Banco de Dados MySQL
@session_start();
$host = "164.163.210.251";
$login = "root";
$senha = "1";
$banco = "portalcontabilidade";
$versao = "1.0.0.6";

$con = new mysqli($host, $login, $senha, $banco);
mysqli_set_charset($con, 'utf8');
//Checa se a conexão obteve sucesso
if ($con->connect_error) {
    die("Conexao falhou:" . $con->connect_error);
} else {
//echo "Conectado";
}
?>
