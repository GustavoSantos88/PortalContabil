<?php
include 'incluides/conn.php';
@session_start();
?>
<?php
if (isset($_POST['entrar']) && $_POST['entrar'] == "login") {
    $usuario = $_POST['username'];
    $senha = $_POST['password'];

    if (empty($login) || empty($senha)) {
        echo"<script language='javascript' type='text/javascript'>
                                    alert('Erro com a Conexão com o Banco de Dados!');window.location
                                    .href='login.php';</script>";
        die();
    } else {
        $sql = "SELECT nReg, Usuario, Senha, CodContabil FROM usuarios WHERE Usuario='$usuario' AND Senha='$senha' AND Desativar=0";
        if ($result = mysqli_query($con, $sql)) {
            //echo $sql;
            $busca = mysqli_num_rows($result);
            //echo $busca;
            $linha = mysqli_fetch_assoc($result);
            //echo $linha;
            if ($busca > 0) {

                $_SESSION['codcliente'] = $linha['nReg'];
                $_SESSION['nome'] = $linha['Usuario'];
                $_SESSION['senha'] = $linha['Senha'];
                $_SESSION['codcontabil'] = $linha['CodContabil'];

                header('Location:index.php');
                exit;
            } else {
                echo"<script language='javascript' type='text/javascript'>
                                    alert('Login ou Senha Incorreta!');window.location
                                    .href='login.php';</script>";
                die();
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="msapplication-tap-highlight" content="no">       
        <link REL="SHORTCUT ICON" HREF="imagens/ICONE.ico">       
        <link rel="stylesheet" href="resources/css/bootstrap.min.css">
        <script src="resources/js/jquery.min.js"></script>
        <script src="resources/js/bootstrap.min.js"></script>      
        <title>Portal Contabil | Login</title>

        <!-- Função para desabilitar botão e habilitar quando digitar no input> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 

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
        <!--<link href="css/layouts/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">-->

        <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
        <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">

    </head>
    <style type="text/css">
        @import url(https://fonts.googleapis.com/css?family=Roboto:300);

        .login-page {
            width: 360px;
            padding: 8% 0 0;
            margin: auto;
        }
        .form {
            position: relative;
            z-index: 1;
            background: #FFFFFF;
            max-width: 360px;
            margin: 0 auto 100px;
            padding: 45px;
            text-align: center;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }
        .form input {
            font-family: "Roboto", sans-serif;
            outline: 0;
            background: #f2f2f2;
            width: 100%;
            border: 0;
            margin: 0 0 15px;
            padding: 15px;
            box-sizing: border-box;
            font-size: 14px;
        }
        .form button {
            font-family: "Roboto", sans-serif;
            text-transform: uppercase;
            outline: 0;
            background: #4CAF50;
            width: 100%;
            border: 0;
            padding: 15px;
            color: #FFFFFF;
            font-size: 14px;
            -webkit-transition: all 0.3 ease;
            transition: all 0.3 ease;
            cursor: pointer;
        }
        .form button:hover,.form button:active,.form button:focus {
            background: #43A047;
        }
        .form .message {
            margin: 15px 0 0;
            color: #546e7a;
            font-size: 12px;
        }
        .form .message a {
            color: #4CAF50;
            text-decoration: none;
        }
        .form .register-form {
            display: none;
        }
        .container {
            position: relative;
            z-index: 1;
            max-width: 300px;
            margin: 0 auto;
        }
        .container:before, .container:after {
            content: "";
            display: block;
            clear: both;
        }
        .container .info {
            margin: 50px auto;
            text-align: center;
        }
        .container .info h1 {
            margin: 0 0 15px;
            padding: 0;
            font-size: 36px;
            font-weight: 300;
            color: #1a1a1a;
        }
        .container .info span {
            color: #4d4d4d;
            font-size: 12px;
        }
        .container .info span a {
            color: #000000;
            text-decoration: none;
        }
        .container .info span .fa {
            color: #EF3B3A;
        }
        body  {
            background: #68B04D; /* fallback for old browsers */
            background: rgb(141,194,111);
            background: linear-gradient(90deg, rgba(141,194,111,1) 0%, rgba(118,184,82,1) 50%);
            font-family: "Roboto", sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        .versao {
            background: rgb(141,194,111);
            background: linear-gradient(90deg, rgba(141,194,111,1) 0%, rgba(118,184,82,1) 50%);
            font-family: "Roboto", sans-serif;
            color: #f2f2f2;
            font-size: 10px;
        }
    </style>
    <body class="cyan">

        <!-- Start Page Loading -->
        <div id="loader-wrapper">
            <div id="loader"></div>        
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        </div>
        <!-- End Page Loading -->

        <div class="container-fluid">
            <div class="login-page">
                <div class="form">
                    <form class="login-form" method="POST">                    
                        <img src="imagens/Dlinks.jpg" alt="Dlinks" width="160" height="98">
                        <br/>
                        <br/>
                        <br/>                                                                                                         
                        <input class="form-control" type="text" name="username" placeholder="Usuário" required autofocus > <!-- style="text-transform:uppercase" -->                                                                                                                                                                       
                        <input class="form-control" type="password" name="password" placeholder="Senha" required>                                            
                        <br/>
                        <button type="hidden" name="entrar" value="login">Login</button> 
                        <div class="input-field col s12 center">                    
                            <p class="message text-center login-form-text">Realize o Login para entrar no Sistema</p>
                        </div>
                        <p class="message">Ainda não é Cadastrado? <a href="#">Realize seu Cadastro</a></p>
                    </form>
                    <form class="register-form" method="POST">                    
                        <img src="imagens/Dlinks.jpg" alt="Dlinks" width="160" height="98">
                        <br/>
                        <br/>
                        <br/> 
                        <div class="alert alert-success" role="alert">
                            <div class="input-field center">                    
                                <b><p class="message text-center login-form-text">Entre em contato conosco!!!</p></b>
                                <b><p class="message text-center login-form-text">Telefone: (81) 3456-1189 Seguda à Sexta 08hs as 18hs</p></b>
                                <b><p class="message text-center login-form-text">WhatsApp: (81) 8671-4482 Suporte 24hs</p></b>
                                <b><p class="message text-center login-form-text"></p></b>
                            </div> 
                        </div>                    
                        <p class="message">Já é Cadastrado? <a href="#">Efetue o Login</a></p>
                    </form>               
                </div>
            </div>   
            <p class="versao message text-center login-form-text"> Versão <?php echo $versao ?> </p>
        </div>

        <!-- ================================================
             Scripts
             ================================================ -->

        <!-- jQuery Library -->
        <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>
        <!--materialize js-->
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <!--scrollbar-->
        <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

        <!--plugins.js - Some Specific JS codes for Plugin Settings-->
        <script type="text/javascript" src="js/plugins.min.js"></script>
        <!--custom-script.js - Add your own theme custom JS-->
        <script type="text/javascript" src="js/custom-script.js"></script>

        <script type="text/javascript">
            $('.message a').click(function () {
                $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
            });
        </script> 

    </body>
</html>

