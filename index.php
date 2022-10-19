<?php
include 'incluides/conn.php';
include 'incluides/logado.php';
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
        <script src="resources/js/jquery.mask.min.js"></script>
        <link REL="SHORTCUT ICON" HREF="imagens/ICONE.ico">
        <title>Portal Contabil | Arquivos Fiscais</title>

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
            table-layout: auto;
            overflow: hidden;
            border-collapse:collapse;
        }

        td{
            /*width: 33.33%;*/
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
        $(document).ready(function (e) {
            //alert('aqui');
            $("form[ajax=true]").submit(function (e) {
//                e.preventDefault();
//                    var form_data = $(this).serialize();
                var form_url = $(this).attr("action");
                var form_method = $(this).attr("method").toUpperCase();
                $.ajax({
                    url: form_url,
                    cache: false,
                    type: form_method,
//                        data: form_data,                        
                    success: function () {
                        $("#result").html(returnhtml);
                        $("#loader.gif").hide();
//                            alert('Salvo com Sucesso!');
                    }
                });
            });
        });
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>	    
</head>
<body class="cyan" onload="carregar();">

    <!--Start Page Loading--> 
    <?php if (isset($_POST['mes']) != 'mes') { ?>
        <div id="loader-wrapper">
            <div id="loader"></div>        
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        </div>
    <?php } ?>
    <!--End Page Loading--> 

    <div class="container-fluid">         
        <div class="panel-body">                   
            <div class="row">
                <div class="panel panel-default">                    
                    <div id="work-collections" class="seaction">                        
                        <div class="panel-heading" onsubmit="submeter();">                                                        
                            <img src="imagens/Dlinks.jpg" alt="Dlinks" width="80" height="49">                          
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a class="letras login-text">Olá <?php
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
                                <li class="nav-item active">
                                    <a class="letras nav-link active" href="index.php" data-toggle="tooltip"><span class='glyphicon glyphicon-file'></span> Arquivos Fiscais </a>  
                                </li>
                                <li class="nav-item">
                                    <a class="letras nav-link" href="Informativo.php" data-toggle="tooltip"><span class='glyphicon glyphicon-comment'></span> Informativos </a> 
                                </li>                                    
                            </ul><br/>
                            <div class="col-sm-1">  
                                <p style="font-size:16px; margin-left: 10px">
                                    <span style="font-size:15px;">
                                        <span style="color:#262626;">
                                            <b><span style="font-family:roboto-bold,roboto,sans-serif;">Período Fiscal</span></b>
                                        </span>
                                    </span>
                                </p>       
                            </div>      
                            <form name="Combobox" method="POST">  <!--action="index.php" enctype="multipart/form-data" ajax="true"-->                                     
                                <div class="col-sm-1" style="width: 110px">    
                                    <select class="form-control" id="mes" name="mes" title="Mês">                   
                                        <?php
                                        if (isset($_POST['mes']) == 'mes') {
                                            echo '<option value="">Mês</option>';
                                            if ($_POST['mes'] == '01') {
                                                echo '<option value="01" selected="selected">01</option>';
                                            } else {
                                                echo '<option value="01">01</option>';
                                            }
                                            if ($_POST['mes'] == '02') {
                                                echo '<option value="02" selected="selected">02</option>';
                                            } else {
                                                echo '<option value="02">02</option>';
                                            }
                                            if ($_POST['mes'] == '03') {
                                                echo '<option value="03" selected="selected">03</option>';
                                            } else {
                                                echo '<option value="03">03</option>';
                                            }
                                            if ($_POST['mes'] == '04') {
                                                echo '<option value="04" selected="selected">04</option>';
                                            } else {
                                                echo '<option value="04">04</option>';
                                            }
                                            if ($_POST['mes'] == '05') {
                                                echo '<option value="05" selected="selected">05</option>';
                                            } else {
                                                echo '<option value="05">05</option>';
                                            }
                                            if ($_POST['mes'] == '06') {
                                                echo '<option value="06" selected="selected">06</option>';
                                            } else {
                                                echo '<option value="06">06</option>';
                                            }
                                            if ($_POST['mes'] == '07') {
                                                echo '<option value="07" selected="selected">07</option>';
                                            } else {
                                                echo '<option value="07">07</option>';
                                            }
                                            if ($_POST['mes'] == '08') {
                                                echo '<option value="08" selected="selected">08</option>';
                                            } else {
                                                echo '<option value="08">08</option>';
                                            }
                                            if ($_POST['mes'] == '09') {
                                                echo '<option value="09" selected="selected">09</option>';
                                            } else {
                                                echo '<option value="09">09</option>';
                                            }
                                            if ($_POST['mes'] == '10') {
                                                echo '<option value="10" selected="selected">10</option>';
                                            } else {
                                                echo '<option value="10">10</option>';
                                            }
                                            if ($_POST['mes'] == '11') {
                                                echo '<option value="11" selected="selected">11</option>';
                                            } else {
                                                echo '<option value="11">11</option>';
                                            }
                                            if ($_POST['mes'] == '12') {
                                                echo '<option value="12" selected="selected">12</option>';
                                            } else {
                                                echo '<option value="12">12</option>';
                                            }
                                        } else {
                                            $mesatual = date('m') - 1;
                                            echo '<option value = "">Mês</option>';
                                            if ($mesatual == '01') {
                                                echo '<option value="01" selected="selected">01</option>';
                                            } else {
                                                echo '<option value="01">01</option>';
                                            }
                                            if ($mesatual == '02') {
                                                echo '<option value="02" selected="selected">02</option>';
                                            } else {
                                                echo '<option value="02">02</option>';
                                            }
                                            if ($mesatual == '03') {
                                                echo '<option value="03" selected="selected">03</option>';
                                            } else {
                                                echo '<option value="03">03</option>';
                                            }
                                            if ($mesatual == '04') {
                                                echo '<option value="04" selected="selected">04</option>';
                                            } else {
                                                echo '<option value="04">04</option>';
                                            }
                                            if ($mesatual == '05') {
                                                echo '<option value="05" selected="selected">05</option>';
                                            } else {
                                                echo '<option value="05">05</option>';
                                            }
                                            if ($mesatual == '06') {
                                                echo '<option value="06" selected="selected">06</option>';
                                            } else {
                                                echo '<option value="06">06</option>';
                                            }
                                            if ($mesatual == '07') {
                                                echo '<option value="07" selected="selected">07</option>';
                                            } else {
                                                echo '<option value="07">07</option>';
                                            }
                                            if ($mesatual == '08') {
                                                echo '<option value="08" selected="selected">08</option>';
                                            } else {
                                                echo '<option value="08">08</option>';
                                            }
                                            if ($mesatual == '09') {
                                                echo '<option value="09" selected="selected">09</option>';
                                            } else {
                                                echo '<option value="09">09</option>';
                                            }
                                            if ($mesatual == '10') {
                                                echo '<option value="10" selected="selected">10</option>';
                                            } else {
                                                echo '<option value="10">10</option>';
                                            }
                                            if ($mesatual == '11') {
                                                echo '<option value="11" selected="selected">11</option>';
                                            } else {
                                                echo '<option value="11">11</option>';
                                            }
                                            if ($mesatual == '12') {
                                                echo '<option value="12" selected="selected">12</option>';
                                            } else {
                                                echo '<option value="12">12</option>';
                                            }
                                        }
                                        ?>
                                    </select> 
                                </div>  
                                <div class="col-sm-1" style="width: 110px">         
                                    <select class="form-control" id="ano" name="ano" title="Ano">
                                        <?php
                                        $anoatual = date('Y');
                                        if (isset($_POST['ano']) == 'ano') {
                                            echo '<option value="">Ano</option>';
                                            if ($_POST['ano'] == $anoatual) {
                                                echo '<option value="' . $anoatual . '" selected="' . $anoatual . '">' . $anoatual . '</option>';
                                            } else {
                                                echo ' <option value="' . $anoatual . '">' . $anoatual . '</option>';
                                            }
                                            $anoatual = $anoatual - 1;
                                            if ($_POST['ano'] == $anoatual) {
                                                echo '<option value="' . $anoatual . '" selected="' . $anoatual . '">' . $anoatual . '</option>';
                                            } else {
                                                echo ' <option value="' . $anoatual . '">' . $anoatual . '</option>';
                                            }
                                            $anoatual = $anoatual - 1;
                                            if ($_POST['ano'] == $anoatual) {
                                                echo '<option value="' . $anoatual . '" selected="' . $anoatual . '">' . $anoatual . '</option>';
                                            } else {
                                                echo ' <option value="' . $anoatual . '">' . $anoatual . '</option>';
                                            }
                                            $anoatual = $anoatual - 1;
                                            if ($_POST['ano'] == $anoatual) {
                                                echo '<option value="' . $anoatual . '" selected="' . $anoatual . '">' . $anoatual . '</option>';
                                            } else {
                                                echo ' <option value="' . $anoatual . '">' . $anoatual . '</option>';
                                            }
                                            $anoatual = $anoatual - 1;
                                            if ($_POST['ano'] == $anoatual) {
                                                echo '<option value="' . $anoatual . '" selected="' . $anoatual . '">' . $anoatual . '</option>';
                                            } else {
                                                echo ' <option value="' . $anoatual . '">' . $anoatual . '</option>';
                                            }
                                            $anoatual = $anoatual - 1;
                                        } else {
                                            echo ' <option value="' . $anoatual . '">' . $anoatual . '</option>';
                                            $anoatual = $anoatual - 1;
                                            echo ' <option value="' . $anoatual . '">' . $anoatual . '</option>';
                                            $anoatual = $anoatual - 1;
                                            echo ' <option value="' . $anoatual . '">' . $anoatual . '</option>';
                                            $anoatual = $anoatual - 1;
                                            echo ' <option value="' . $anoatual . '">' . $anoatual . '</option>';
                                            $anoatual = $anoatual - 1;
                                            echo ' <option value="' . $anoatual . '">' . $anoatual . '</option>';
                                        }
                                        ?>
                                    </select>                   
                                </div>
                                <div class="col-sm-3">
                                    <b><?php
                                        $cliente = '';
                                        if (isset($_POST['cliente'])) {
                                            $cliente = $_POST['cliente'];
                                        }
                                        $codcontabil = $_SESSION['codcontabil'];
                                        $sql = "SELECT Distinct(CodCliente), NomeCliente FROM contabilidade where CodContabil=$codcontabil Group BY CodCliente";
                                        $resultado = mysqli_query($con, $sql);
                                        if (mysqli_num_rows($resultado) != 0) {
                                            //echo '<form name="Combobox1" method="GET">';
                                            echo '<select class="form-control" id="cliente" name="cliente" title="Clientes">';
                                            echo '<option value="" selected="selected">Clientes</option>';
                                            while ($elemento = mysqli_fetch_array($resultado)) {
                                                $codcliente = $elemento['CodCliente'];
                                                $nomecliente = mb_strimwidth($elemento['NomeCliente'], 0, 40);
                                                if ($cliente == $codcliente) {
                                                    echo '<option value="' . $codcliente . '" selected="' . $codcliente . '">' . $codcliente . ' - ' . $nomecliente . '</option>';
                                                    $cliente = '';
                                                } else {
                                                    echo '<option value="' . $codcliente . '">' . $codcliente . ' - ' . $nomecliente . '</option>';
                                                }
                                            }
                                            echo '</select>';
                                            //echo '</form>';
                                        } else {
                                            /* echo"<script language='javascript' type='text/javascript'>
                                              alert('Nenhuma Cliente Disponivel!');window.location
                                              .href='login.php';</script>";
                                              die();
                                              exit; */
                                        }
                                        // Close connection
                                        //mysqli_close($con);
                                        ?>      
                                    </b>                     
                                </div>  
                                <!--<div class="col-sm-1">  TESTE Ajax 
                                        <input type="submit" id="enviaDados" name="" value="Consultar">
                                    </div>-->                            
                                <?php
                                if (isset($_POST['mes'])) {
                                    $perido = $_POST['mes'] . "/" . $_POST['ano'];
                                } else {
                                    $mesatual = date('m') - 1;
                                    $anoatual = date('Y');
                                    $perido = $mesatual . "/" . $anoatual;
                                }
                                ?>                            
                                <!--                            <div class="col-sm-1">                                
                                                                <a href="grafico.php?periodo=<?php echo $perido ?>" target="_blank" title="Gráfico"><h4><span class="glyphicon glyphicon-stats"></span></h4></a>
                                                            </div>-->
                                <br/>
                                <br/>                               
                                <b><?php
                                    if (!isset($_POST['mes'])) {
                                        $mes = date('m') - 1;
                                        $ano = date('Y');
                                        $sql = "SELECT nContabil, CNPJ, Mes, Ano, NomeCliente, DataHoraSPEED, LinkSPEED, DataHoraEFD, LinkEFD, Outros FROM arquivosfiscais Where nContabil=$codcontabil AND Mes=$mes AND Ano=$ano";
                                    } else {
                                        $sql = "SELECT nContabil, CNPJ, Mes, Ano, NomeCliente, DataHoraSPEED, LinkSPEED, DataHoraEFD, LinkEFD, Outros FROM arquivosfiscais Where nContabil=$codcontabil";
                                    }
                                    if (!empty($_POST['mes']) != "") {
                                        $sql .= " AND Mes=" . $_POST['mes'];
                                    }
                                    if (!empty($_POST['ano']) != "") {
                                        $sql .= " AND Ano=" . $_POST['ano'];
                                    }
                                    if (!empty($_POST['cliente']) != "") {
                                        $sql .= " AND CodCliente=" . $_POST['cliente'];
                                    }
                                    $sql .= " ORDER BY NomeCliente, Mes, Ano";
                                    //echo $sql;
                                    if ($result = mysqli_query($con, $sql)) {
                                        if (mysqli_num_rows($result) > 0) {
                                            echo '<div class = "hidden-print">';
                                            echo '<div class = "panel-heading">';
                                            echo '<br/>';
                                            echo '<input class = "form-control mr-sm-2" type = "search" placeholder = "Pesquisar" aria-label = "Pesquisar" id = "txtBusca" name = "txtBusca" onkeyup = "txtBusca(this)" />';
                                            echo '</div>';
                                            echo '</div>';
                                            echo '<div class="table-responsive">';
                                            echo '<table class="table table-striped table-bordered table-hover">';
                                            echo '<thead>';
                                            echo '<tr class="active">';
                                            echo '<th>Cliente</th>';
                                            echo '<th>CNPJ</th>';
                                            echo '<th>Período Fiscal</th>';
                                            echo '<th>SPED</th>';
                                            echo '<th>Data/Hora SPED</th>';
                                            echo '<th>EFD</th>';
                                            echo '<th>Data/Hora EFD</th>';
                                            echo '<th>Outros</th>';
                                            echo '</tr>';
                                            echo '</thead>';
                                            echo '<tbody>';
                                            while ($row = mysqli_fetch_array($result)) {
                                                if (!empty($_POST['cliente'])) {
                                                    echo '<p class="lead text-center"><em>' . $row['NomeCliente'] . '</em></p>';
                                                }
                                                //echo '<hr/>';
                                                echo '<tr>';
                                                echo '<td>' . $row['NomeCliente'] . '</td>';
                                                echo '<td>' . $row['CNPJ'] . '</td>';
                                                echo '<td>' . $row['Mes'] . '/' . $row['Ano'] . '</td>';
                                                if ($row['LinkSPEED'] != "") {
                                                    echo '<td><a href="routers/busca-arquivos.php?arquivo=SPED&cliente=' . $row['NomeCliente'] . '&ano=' . $row['Ano'] . '&mes=' . $row['Mes'] . '" title="SPED" target="_blank" download="download">Download</a></td>';
                                                } else {
                                                    echo '<td></td>';
                                                }
                                                echo '<td>' . $row['DataHoraSPEED'] . ' </td>';
                                                if ($row['LinkEFD'] != "") {
                                                    echo '<td><a href="' . $row['LinkEFD'] . '" title="EFD" download="download">Download</a></td>';
                                                } else {
                                                    echo '<td></td>';
                                                }
                                                echo '<td>' . $row['DataHoraEFD'] . ' </td>';
                                                if ($row['Outros'] != "") {
                                                    echo '<td><a href="' . $row['Outros'] . '" title="Outros" download="download">Download</a></td>';
                                                } else {
                                                    echo '<td></td>';
                                                }
                                                echo '</tr>';
                                            }
                                            echo '</tbody>';
                                            echo '</table>';
                                            echo '</div>';
                                            // Free result set
                                            mysqli_free_result($result);
                                        } else {
                                            echo '<hr/>';
                                            echo '<p class="lead text-center"><em>Nenhum Arquivo Dísponivel para esse Período</em></p>';
                                            echo '<hr/>';
                                        }
                                    }
                                    ?></b>  
                            </form>  
                        </div>
                    </div>
                </div>
            </div>             
        </div>                              
    </div> 

    <p class="versao message text-center login-form-text"> Versão <?php echo $versao ?> </p>

    <!--================================================
    Scripts
    ================================================-->

    <!--jQuery Library-->
    <script type = "text/javascript" src = "js/plugins/jquery-1.11.2.min.js"></script>    
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
    <script src="resources/js/jquery.mask.min.js"></script>
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.min.js"></script>
    <script type="text/javascript">
                            function txtBusca() {
                                $("#txtBusca").on("keyup", function () {
                                    var value = $(this).val().toLowerCase();
                                    $("table tbody tr").filter(function () {
                                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                                    });
                                });
                            }
                            ;
                            /*
                             * Carregando a combobox
                             */
                            document.getElementById("cliente").onchange = function (e) {
                                e.preventDefault();
                                var comboNome = document.getElementById("cliente");
                                if (comboNome.options[comboNome.selectedIndex].value == "0") {
                                    alert("Selecione um Cliente!");
                                } else {
                                    //document.forms.Combobox.action = "index.php";
                                    document.forms.Combobox.submit();
                                }
                            };
                            document.getElementById("mes").onchange = function (e) {
                                //e.preventDefault();
                                var comboNome = document.getElementById("mes");
                                if (comboNome.options[comboNome.selectedIndex].value == "0") {
                                    alert("Selecione um Mês!");
                                } else {
                                    //document.forms.Combobox.action = "index.php";
                                    document.forms.Combobox.submit();
                                }
                            };
                            document.getElementById("ano").onchange = function (e) {
                                e.preventDefault();
                                var comboNome = document.getElementById("ano");
                                if (comboNome.options[comboNome.selectedIndex].value == "0") {
                                    alert("Selecione um Ano!");
                                } else {
                                    //document.forms.Combobox.action = "index.php";
                                    document.forms.Combobox.submit();
                                }
                            }
                            ;

    </script>       
</body>
</html>
