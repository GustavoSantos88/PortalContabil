<?php

/**
 * Conexão via FTP com o PHP
 * 04/08/2022
 * Gustavo Santos
 */
class ftp {

//public $diretorio;

    function ftp($diretorio, $arquivo) {
        // Dados do servidor        
        $servidor = '164.163.210.251'; // Endereço
        $usuario = 'fiscais'; // Usuário
        $senha = 'fiscais'; // Senha
        // Abre a conexão com o servidor FTP
        $ftp = ftp_connect($servidor); // Retorno: true oudirfalse
        // Faz o login no servidor FTP
        $login = ftp_login($ftp, $usuario, $senha); // Retorno: true ou false
        // Informa sucesso ou não da conexão
        #if (isset($login)) {
        #    echo "conectado";
        #} else {
        #    echo "não conectado";
        #}
        // Habilita o modo Passivo on(ligado) ou off(desligado)
        ftp_pasv($ftp, true);
        // ======
//        if ($novocadastro == 1) {
//            // Cria um novo diretório da raiz do servidor, nesse caso, o diretório novapasta/
//            if ($loja != '') {
//                ftp_mkdir($ftp, "/lojas/$loja");
//                ftp_mkdir($ftp, "/lojas/$loja/$departamentos");
//            }
//            if ($departamento != '') {
//                ftp_mkdir($ftp, "/lojas/$loja/$departamentos/$departamento");
//            }
//            if ($subdepartamento != '') {
//                ftp_mkdir($ftp, "/lojas/$loja/$departamentos/$departamento/$subdepartamento");
//            }
//            if ($tipo != '') {
//                ftp_mkdir($ftp, "/lojas/$loja/$departamentos/$departamento/$subdepartamento/$tipo");
//            }
//        }
        // ======
//        if ($arquivo != '') {
//            // Define variáveis para o envio de arquivo            
//            $local_arquivo = str_replace("'", '', str_replace('"', '', "..\lojas\'" . $loja . "'\'" . $departamentos . "'\'" . $departamento . "'\'" . $subdepartamento . "'\'" . $tipo . "'\'" . $arquivo . "'")); // Localização (local)                        
//            $ftp_pasta = "/lojas/$loja/$departamentos/$departamento/$subdepartamento/$tipo/"; // Pasta (externa)
//            $ftp_arquivo = $arquivo; // Nome do arquivo (externo)            
//            // Envia o arquivo pelo FTP em modo ASCII (FTP_ASCII) Use para arquivos texto ou Binario (FTP_BINARY) para arquivos binários            
//            $envia = ftp_put($ftp, $ftp_pasta . $ftp_arquivo, $local_arquivo, FTP_BINARY); // Retorno: true / false FTP_ASCII
//            #if (isset($envia)) {
//            #    echo "enviado";
//            #}else{
//            #    echo "não enviado";
//            #}
//        }
        // ======
        // Renomeia um arquivo do servidor FTP, no caso, o arquivo texto.txt passa a chamar novotexto.txt
        #ftp_rename($ftp, "/texto.txt", "/novotexto.txt");
        // ======
        // Retorna o tamanho (em bytes) de um determinado arquivo, no caso, do arquivo texto.txt
        #ftp_size($ftp, "/texto.txt");
        // ======
        // A função ftp_delete() remove um arquivo do servidor FTP, no caso iremos remover o texto.txt 
        #ftp_delete($ftp, "/public_html/texto.txt");
        // ======
        // Utilizamos a função ftp_rmdir() para remover o diretório teste/ que está na raiz do servidor FTP.
        #ftp_rmdir($ftp, "/teste/");
        // ======
        if ($diretorio != '') {
            // Define variáveis para o recebimento de arquivo        
            
            //$local_arquivo = trim("..\\temp\\" . $arquivo); // Localização (local)                                    
            //$ftp_pasta = $diretorio; // Pasta (externa)
            //$ftp_arquivo = $arquivo; // Nome do arquivo (externo)  
            
            $local_arquivo = "..\\temp\\SPED-052022.txt"; // Localização (local)                                    
            $ftp_pasta = "/BEM BOM LOJA 01 PINA/2022/05/SPED/"; // Pasta (externa)
            $ftp_arquivo = "SPED-052022.txt"; // Nome do arquivo (externo)  
                      
            // Recebe o arquivo pelo FTP em modo ASCII (FTP_ASCII) Use para arquivos texto ou Binario (FTP_BINARY) para arquivos binários
            $recebe = ftp_get($ftp, $ftp_pasta . $ftp_arquivo, $local_arquivo, FTP_BINARY); // Retorno: true / false  FTP_ASCII
            // Informa se receber o arquivo ou não
            if (!empty($recebe)) {
                echo "recebido";
            } else {
                echo "não recebido";
            }
//            $arquivo = basename($ftp_arquivo);
//            $arquivo_temp = $ftp_pasta . $ftp_arquivo;
//
//            //Prepara o arquivo para download no navegador
//            $file = $arquivo;
//
//            //Vê a extensão do arquivo
//            $type = filetype($arquivo_temp);
//            //$type = str_replace(".", '',strtolower(substr($arquivo_temp, -4)));
//            //Vê o tamanho do arquivo
//            $size = filesize($arquivo_temp);
//
//            //Seta o header da página para forçar o navegador a fazer download
//            header("Content-Description: File Transfer");            
//            header("Content-Type: {
//            $type
//        }");
//            header("Content-Length: {
//            $size
//        }");
//            header("Content-Disposition: attachment;
//        filename = \"" . $arquivo_temp . "\"");
//            
//            //Faz download
//            readfile($arquivo_temp);
            #-----------------------------------------------------------------------------
//            $arquivo = htmlspecialchars($pegar_arquivo);
//            $extencao = strtolower(substr($arquivo, -4));
//
//            $file = basename($arquivo);
//            $filename = $arquivo; /* Note: Always use .pdf at the end. */
//
//            if (($extencao == '.doc')) {
//                //header('Content-Type: application/octet-stream');
//                header('Content-type: application/vnd.ms-word');
//                header('Content-Disposition: inline;filename="' . $filename . '"'); //attachment
//            } elseif (($extencao == '.docx')) {
//                header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
//                header('Content-Disposition: attachment;filename="' . $filename . '"');
//            } elseif (($extencao == '.xls')) {
//                header('Content-Type: application/vnd.ms-excel');
//                header('Content-Disposition: inline;filename="' . $filename . '"'); //attachment
//            } elseif (($extencao == '.xlsx')) {
//                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); //attachment    
//                header('Content-Disposition: attachment;filename="' . $filename . '"');
//            } elseif (($extencao == '.pdf')) {
//                header('Content-type: application/pdf');
//                header('Content-Disposition: inline;filename="' . $filename . '"');
//            } else {
//                header('content-type: image/' . str_replace(".", '', $extencao));
//                header('Content-Disposition: inline;filename="' . $filename . '"');
//            }
//            header('Content-Transfer-Encoding: binary');
//            header('Content-Length: ' . filesize($file));
//            header('Accept-Ranges: bytes');
//
//            @readfile($file);
            #------------------------------------------------------------------------------
//            header("Content-type: application/octet-stream");
//            header("Content-Disposition: attachment; filename=\"" . basename($arquivo_temp) . "\"");
//            header("Content-Transfer-Encoding: binary");
//
//            //Configura a conexão curl
//            $ch = curl_init();
//            curl_setopt($ch, CURLOPT_URL, "ftp://$ftp/$arquivo_temp"); //Caminho do arquivo
//            curl_setopt($ch, CURLOPT_HEADER, 0);
//            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
//            curl_setopt($ch, CURLOPT_USERPWD, "$usuario:$senha"); //Faz a autenticação
//            curl_exec($ch); //Executa
//
//            curl_close($ch);
        }
        // ======
        // Exibe todos os arquivos e pastas de um determinado diretório, com vários detalhes. Os valores são colocados em um array(), por isso utilizamos o laço foreach() para exibir os itens da raiz do servidor FTP.
        #$lista = ftp_rawlist($ftp, "/lojas/");
        #foreach ($lista as $item) {
        #    echo $item . "<br>";
        #}
        // Encerra a conexão ftp
        ftp_close($ftp);
    }

}
