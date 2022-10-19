<?php

//Autor Gustavo Santos
//Atualizado - 13/07/2022

class MultiploUpload {

    public $diretorio;
    //public $numeroAleatorio;
    public $data;

    function MultiploUpload($nomearquivo, $tamanho, $tmp_nome, $tipo, $caminho) {

        $this->diretorio = $caminho;

        $contador = count($nomearquivo);
        //$this->numeroAleatorio = rand(0, 1000);
        $this->data = date('d-m-Y');

        include '../incluides/conn.php';
        @session_start();
        date_default_timezone_set('America/Sao_Paulo');

        $codloja = $_POST['loja'];
        $_SESSION['loja'] = $_POST['loja'];
        $_SESSION['departamento'] = $_POST['departamento'];
        $_SESSION['subdepartamento'] = $_POST['subdepartamento'];
        $_SESSION['tipo'] = $_POST['tipo'];
        $_SESSION['datainicial'] = $_POST['datainicial'];
        $_SESSION['datafinal'] = $_POST['datafinal'];

        for ($i = 0; $i <= $contador; $i++) {
            //move_uploaded_file($tmp_nome[$i], $this->diretorio . $this->numeroAleatorio . '+' . $this->data . '+' . $nomeArquivo[$i]);                       

            $nome = $nomearquivo[$i];

            if ($nome != '') {

                $arquivo = $nome;
                //pega a extensão do arquivo                            
                $extensao = pathinfo($arquivo, PATHINFO_EXTENSION);
                if (in_array($extensao, array("pdf", "jpg", "png", "doc", "docx", "xlsx", "xls"))) {
                    
                } else {
                    //echo 'alert("Extenção do Arquivo não permitida!")';
                    echo "<script language='javascript' type='text/javascript'>
                        alert('Extenção do Arquivo não permitida!');window.location
                        .href='javascript:window.history.go(-2)';</script>";
                    die();
                    exit();
                }

                $loja = $_POST['loja'];
                $departamento = $_POST['departamento'];
                $subdepartamento = $_POST['subdepartamento'];
                $tipo = $_POST['tipo'];
                $datalan = date('Y-m-d');

                $sql = "SELECT Distinct(razaosocial), nomefantasia, nreg, codloja FROM loja Where codloja='$loja' Order By codloja";
                $resultado = mysqli_query($con, $sql);
                if (mysqli_num_rows($resultado) != 0) {
                    if ($row = mysqli_fetch_array($resultado)) {
                        $loja = $row['razaosocial'];
                    }
                }
                $sql = "SELECT nreg, descricao, codloja FROM departamentos WHERE nreg='$departamento' And codloja='$codloja'";
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) != 0) {
                    if ($row = mysqli_fetch_array($result)) {
                        $nomedepartamento = $row['descricao'];
                    }
                    // Free result set
                    mysqli_free_result($result);
                }
                $sql = "SELECT nreg, descricao, codloja FROM departamentos_sub WHERE nreg='$subdepartamento' And codloja='$codloja'";
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) != 0) {
                    if ($row = mysqli_fetch_array($result)) {
                        $nomedepartamentosub = $row['descricao'];
                    }
                    // Free result set
                    mysqli_free_result($result);
                }
                $sql = "SELECT nreg, descricao, codloja FROM departamentos_tipos WHERE nreg='$tipo' And codloja='$codloja'";
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) != 0) {
                    if ($row = mysqli_fetch_array($result)) {
                        $nomedepartamentotipo = $row['descricao'];
                    }
                    // Free result set
                    mysqli_free_result($result);
                }
                $sql = "SELECT nreg, nomearquivo, codloja FROM documentos WHERE coddepartamento='$departamento' And coddepartamentosub='$subdepartamento' And coddepartamentotipo='$tipo' And nomearquivo='$nome' And codloja='$codloja'";
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) != 0) {
                    if ($row = mysqli_fetch_array($result)) {
                        $dataalteracao = date('Y-m-d');
                        $nome = $row['nomearquivo'];

                        move_uploaded_file($tmp_nome[$i], $this->diretorio . $nome);

                        include('../config/ftp.php');
                        $departamentos = 'departamentos';
                        $novocadastro = 0;
                        $arquivo = $nome;
                        $pegar_arquivo = 0;
                        $ftp = new ftp($loja, $departamentos, $nomedepartamento, $nomedepartamentosub, $nomedepartamentotipo, $novocadastro, $arquivo, $pegar_arquivo);

                        $sql = "UPDATE documentos SET dataalteracao='$dataalteracao' Where nreg='" . $row['nreg'] . "' And codloja='$codloja'";
                        if ($stmt = mysqli_prepare($con, $sql)) {
                            if (mysqli_stmt_execute($stmt)) {
                                
                            }
                        }
                    }
                } else {

                    move_uploaded_file($tmp_nome[$i], $this->diretorio . $nome);

                    $dataalteracao = "0000-00-00";
                    //$nome = $this->data . ' - ' . $nomearquivo[$i];
                    //$nome = $nomearquivo[$i];
                    $diretorio = "lojas/$loja/departamentos/$nomedepartamento/$nomedepartamentosub/$nomedepartamentotipo/";

                    include('../config/ftp.php');
                    $departamentos = 'departamentos';
                    $novocadastro = 0;
                    $arquivo = $nome;
                    $pegar_arquivo = '';
                    $ftp = new ftp($loja, $departamentos, $nomedepartamento, $nomedepartamentosub, $nomedepartamentotipo, $novocadastro, $arquivo, $pegar_arquivo);

                    $sql = "INSERT INTO documentos (coddepartamento, coddepartamentosub, coddepartamentotipo, nomearquivo, caminhoarquivo, datalan, dataalteracao, codloja) VALUES ('$departamento', '$subdepartamento', '$tipo', '$nome', '$diretorio', '$datalan', '$dataalteracao','$codloja')";
                    if ($stmt = mysqli_prepare($con, $sql)) {
                        if (mysqli_stmt_execute($stmt)) {
                            
                        }
                    }
                    //Close statement
                    //mysqli_stmt_close($stmt);                    
                }
            }
        }
    }

}

header("location:../admin-page.php");
?>