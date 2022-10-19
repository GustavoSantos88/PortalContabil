<?php
//Destruindo a sessão
@session_start();
session_destroy();
unset($_SESSION);
header('Location:../login.php');
exit;
?>