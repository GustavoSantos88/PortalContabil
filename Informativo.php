<?php
include 'incluides/conn.php';
@session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="msapplication-tap-highlight" content="no">
        <link rel="stylesheet" href="resources/css/bootstrap.min.css">
        <script src="resources/js/jquery.min.js"></script>
        <script src="resources/js/bootstrap.min.js"></script>
        <script src="resources/js/numeros.js"></script>
        <link REL="SHORTCUT ICON" HREF="imagens/ICONE.ico">
        <title>Portal Contabil | Informativos</title>

        <!-- Favicons-->
        <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
        <!-- Favicons-->
        <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
        <!-- For iPhone -->
        <meta name="msapplication-TileColor" content="#00bcd4">
        <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
        <!-- For Windows Phone -->

        <!-- CORE CSS-->
        <!--<link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">-->
        <link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
        <!-- Custome CSS-->    
        <link href="css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">
        <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
        <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!Função para desabilitar botão e habilitar quando digitar no input>
    <style type="text/css">
        .wrapper{
            width: 0 auto;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }

        table.comBordaSimples {
            border-collapse: collapse; /* CSS2 */
            background: #FFFFF0;
        }
        table.comBordaSimples td {
            border: 1px solid #BDBDBD;
        }
        table.comBordaSimples th {
            border: 2px solid #BDBDBD;
            background: #546e7a;
        }

        /* Pagination links */
        .pagination a {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
            transition: background-color .3s;
        }
        /* Style the active/current link */
        .pagination a.active {
            background-color: dodgerblue;
            color: white;
        }
        /* Add a grey background color on mouse-over */
        .pagination a:hover:not(.active) {
            background-color: #ddd;
        }

        body {
            background-color: #68B04D;
        }
        /*nav {
            color: #fff;
            background-color: #546e7a;
        }*/
        .versao {
            font-family: "Roboto", sans-serif;
            color: #f2f2f2;
            font-size: 10px;
        }
        .letras {
            position: relative;
            font-family: "Roboto", sans-serif;
            font-size: 16px;
        }


        /*##########################################################*/
        nav{
            background: skyblue;
        }

        /*body{
            background: #e2e2e2;
        }*/

        table {
            width: 100%;
            table-layout: fixed;
            overflow: hidden;
            border-collapse:collapse;
        }

        td{
            width: 33.33%;
            position: relative;
            color: #101935;
            background: #F2FDFF;
            border: 4px solid #F0EAEF;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.4s ease-out;
        }

        td:hover{
            background: #68B04D;
        }

        .alive{
            background: #61baf2;
        }

        .btn{
            background: #93C0A4
        }

        .controller{
            margin-top: 10px;
            text-align: center;
        }

        .pause{
            background: #be3131;
        }

        .generation{
            background: #977fd0;
            cursor: default;
            pointer-events: none;
        }

        .board {
            border: solid 4px;
            height: 40px;

        }
    </style>
    <script type="text/javascript">
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>	    
</head>
<body class="cyan">

<!--    Start Page Loading     
    <div id="loader-wrapper">
        <div id="loader"></div>        
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>   
    End Page Loading -->

    <div class="container-fluid">         
        <div class="panel-body">                   
            <div class="row">
                <div class="panel panel-default">                    
                    <div id="work-collections" class="seaction">                        
                        <div class="panel-heading">
                            <img src="imagens/Dlinks.jpg" alt="Dlinks" width="80" height="49">                          
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a class="letras login-text">Olá <?php
                                        include 'incluides/logado.php';
                                        echo $_SESSION['nome'];
                                        ?>
                                    </a>
                                </li>
                                <li>
                                    <a class="letras login-text" href="alterar.php" title="Alterar Usuário" data-toggle="tooltip"><span class='glyphicon glyphicon-user'></span> Alterar </a>   
                                </li>
                                <li>
                                    <a class="letras login-text" href="incluides/sair.php" title="Sair" data-toggle="tooltip"><span class='glyphicon glyphicon-off'></span> Sair </a>  
                                </li>
                            </ul>
                            <fieldset>                                                   
                                <div text-center>                                        
                                    <p style="font-size:16px; text-align:center;">
                                        <span style="font-size:56px;">
                                            <span style="color:#68B04D;">
                                                <b><span style="font-family:roboto-bold,roboto,sans-serif;"> PORTAL CONTABIL </span></b>
                                            </span>
                                        </span>
                                    </p>                                        
                                </div>                                    
                            </fieldset>
                            <br/>                                
                            <ul class="nav nav-tabs" id="Tab" role="tablist" style="background-color: #e3f2fd;">
                                <li class="nav-item">
                                    <a class="letras nav-link" href="index.php" data-toggle="tooltip"><span class='glyphicon glyphicon-file'></span> Arquivos Fiscais </a>  
                                </li>
                                <li class="nav-item active">
                                    <a class="letras nav-link active" href="Informativo.php" data-toggle="tooltip"><span class='glyphicon glyphicon-comment'></span> Informativos </a> 
                                </li>                                    
                            </ul><br/>
                            <b><?php
                                //Mensagem para Todos
                                $codcontabil = $_SESSION['codcontabil'];
                                $sql = "SELECT Titulo, Mensagem FROM informativo WHERE CodContabil=0 AND Todos =0";
                                $resultado = mysqli_query($con, $sql);
                                if (mysqli_num_rows($resultado) != 0) {

                                    while ($row = mysqli_fetch_array($resultado)) {
                                        echo '<div class="alert alert-info" role="alert">';
                                        echo '<h4 class="alert-heading"><b>' . $row['Titulo'] . '</b></h4>';
                                        echo '<p></p>';
                                        echo '<hr>';
                                        echo '<p class="mb-0">' . $row['Mensagem'] . '</p>';
                                        echo '</div>';
                                    }
                                }
                                // Close connection
                                //mysqli_close($con);
                                ?>      
                            </b> 
                            <b><?php
                                $codcontabil = $_SESSION['codcontabil'];
                                $sql = "SELECT Titulo, Mensagem FROM informativo WHERE CodContabil=$codcontabil AND Todos =1";
                                $resultado = mysqli_query($con, $sql);
                                if (mysqli_num_rows($resultado) != 0) {

                                    while ($row = mysqli_fetch_array($resultado)) {
                                        echo '<div class="alert alert-info" role="alert">';
                                        echo '<h4 class="alert-heading">' . $row['Titulo'] . '</h4>';
                                        echo '<p></p>';
                                        echo '<hr>';
                                        echo '<p class="mb-0">' . $row['Mensagem'] . '</p>';
                                        echo '</div>';
                                    }
                                }
                                // Close connection
                                //mysqli_close($con);
                                ?>      
                            </b>                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <p class="versao message text-center login-form-text"> Versão <?php echo $versao ?> </p>

    <!-- ================================================
            Scripts
            ================================================ -->

    <!-- jQuery Library -->
    <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>    
    <!--angularjs-->
    <script type="text/javascript" src="js/plugins/angular.min.js"></script>
    <!--materialize js-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>       
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.min.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="js/custom-script.js"></script>

    <script src="resources/js/jquery.min.js"></script>
    <script src="resources/js/bootstrap.min.js"></script>
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.min.js"></script>
    <script type="text/javascript">
        function txtBusca()
        {
            $("#txtBusca").on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $("table tbody tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        }
        ;
    </script>                   
</body>
</html>
