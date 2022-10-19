<?php

//Autor Gustavo Santos
//Atualizado - 13/07/2022

if (isset($_GET['cliente']) != '') {
    $cliente = $_GET['cliente'];
} else {
    echo "<script language='javascript' type='text/javascript'>
            alert('Insira um Cliente!');window.location
            .href='../index.php';</script>";
    die();
    exit();
}
if (isset($_GET['ano']) != '') {
    $ano = $_GET['ano'];
} else {
    echo "<script language='javascript' type='text/javascript'>
            alert('Insira um Ano!');window.location
            .href='../index.php';</script>";
    die();
    exit();
}
if (isset($_GET['mes']) != '') {
    $mes = $_GET['mes'];
} else {
    echo "<script language='javascript' type='text/javascript'>
            alert('Insira um Mês!');window.location
            .href='../index.php';</script>";
    die();
    exit();
}
if (isset($_GET['arquivo']) != '') {
    $tipo_arquivo = $_GET['arquivo'];
} else {
    echo "<script language='javascript' type='text/javascript'>
            alert('Insira um Arquivo!');window.location
            .href='../index.php';</script>";
    die();
    exit();
}
$arquivo = trim($_GET['arquivo'] . '-' . $mes . $ano . '.txt');
//$arquivo = trim($arquivo . '-' . $mes + $ano + '.txt');
$diretorio = trim("/$cliente/$ano/$mes/$tipo_arquivo/");

include('../config/ftp.php');

$ftp = new ftp($diretorio, $arquivo);
