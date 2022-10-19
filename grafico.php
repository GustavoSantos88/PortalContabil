<?php
include 'incluides/conn.php';
@session_start();

if (isset($_REQUEST['periodo'])) {
    $periodo = $_REQUEST['periodo'];
} else {
    $periodo = '';
}

$naoenviado = '100';
$enviado = '80';
$umenviado = '25';
$planilhaxml = '5';
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
        <script src="resources/js/jquery.mask.min.js"></script>
        <link REL="SHORTCUT ICON" HREF="imagens/ICONE.ico">
        <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>
        <title>Portal Contabil | Gráfico</title>
        <style type="text/css">
            body {
                background-color: #f9f9fa;
            }

            .flex {
                -webkit-box-flex: 1;
                -ms-flex: 1 1 auto;
                flex: 1 1 auto
            }

            @media (max-width:991.98px) {
                .padding {
                    padding: 1.5rem
                }
            }

            @media (max-width:767.98px) {
                .padding {
                    padding: 4rem
                }
            }

            .padding {
                padding: 2rem;
            }

            .card {
                background: #fff;
                border-width: 0;
                border-radius: .25rem;
                box-shadow: 0 1px 3px rgba(0, 0, 0, .05);
                margin-bottom: 1.5rem
            }

            .card {
                position: relative;
                display: flex;
                flex-direction: column;
                min-width: 0;
                word-wrap: break-word;
                background-color: #fff;
                background-clip: border-box;
                border: 1px solid rgba(19, 24, 44, .125);
                border-radius: .25rem
            }

            .card-header {
                padding: .75rem 1.25rem;
                margin-bottom: 0;
                background-color: rgba(19, 24, 44, .03);
                border-bottom: 1px solid rgba(19, 24, 44, .125)
            }

            .card-header:first-child {
                border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0
            }

            card-footer, .card-header {
                background-color: transparent;
                border-color: rgba(160, 175, 185, .15);
                background-clip: padding-box
            }
        </style>
        <script type="text/javascript">
            $(document).ready(function () {
                var ctx = $("#chart-line");

                var naoenviado = <?php echo $naoenviado ?>;
                var todosenviado = <?php echo $enviado ?>;
                var umenviado = <?php echo $umenviado ?>;
                var planilhaxml = <?php echo $planilhaxml ?>;

                var myLineChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ["Não Enviado", "Enviados", "Um Enviados", "Planilha/XML"],
                        datasets: [{
                                data: [naoenviado, todosenviado, umenviado, planilhaxml],
                                backgroundColor: ["rgba(255, 0, 0, 0.5)", "rgba(100, 255, 0, 0.5)", "rgba(200, 50, 255, 0.5)", "rgba(0, 100, 255, 0.5)"]
                            }]
                    },
                    options: {
                        title: {
                            display: true,
                            text: 'Clientes'
                        }
                    }
                });
            });
            $(document).ready(function () {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    </head>
    <script type="text/javascript"> alert ("Atenção:  Este Gráfico esta em Desenvolvimento!"); </script>
    <body class="alert-success">              
        <div class="page-content page-content" id="page-content">
            <div class="padding">
                <div class="row">
                    <div class="container-fluid d-flex justify-content">
                        <div class="col-sm-7 col-md-8">
                            <div class="card text-center">                                                       
                                <div class="card-header"><b>Monitoramento de Arquivos</b></div>   
                                <div class="header"><b>Período Fiscal <?php echo $periodo ?></b></div>
                                <!--<div class="card-body" style="height: 800px">-->
                                <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                    <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                        <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                        <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                    </div>
                                </div> <canvas id="chart-line" width="299" height="200" class="chartjs-render-monitor" style="display: block; width: 299px; height: 200px;"></canvas>                                    
                                <!--</div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </body>
</html>
