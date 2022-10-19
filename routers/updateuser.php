<?php

// Include config file
include '../incluides/conn.php';

$codcontabil = $_SESSION['codcontabil'];

// Processing form data when form is submitted
if (isset($_POST["username"]) && !empty($_POST['password'])) {

    $codcontabil = $_SESSION['codcontabil'];
    $usuario = $_POST['username'];
    $senha = $_POST['password'];
        

    // Check input errors before inserting in database
    if (!empty($codcontabil)) {
        
        // Prepare an update statement
        $sql = "UPDATE usuarios SET usuario='$usuario', senha='$senha' WHERE codcontabil='$codcontabil'";
        if ($stmt = mysqli_prepare($con, $sql)) {
            // Bind variables to the prepared statement as parameters
            //mysqli_stmt_bind_param($stmt, "sss", $param_preco, $param_id, $param_lis);
            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records updated successfully. Redirect to landing page
                echo"<script language='javascript' type='text/javascript'>
                    alert('Alterado com Sucesso!');window.location
                    .href=' ../index.php';</script>";
                die();                
                exit();
            } else {
                echo"<script language='javascript' type='text/javascript'>
                    alert('Sem Comunicação com o Servidor!');window.location
                    .href=' ../login.php';</script>";
                die();                
                exit();
            }
        }
        // Close statement
        mysqli_stmt_close($stmt);
    }
    // Close connection
    mysqli_close($con);
}
?>
 
