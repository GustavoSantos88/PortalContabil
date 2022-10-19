<?php

/*
  Autor Gustavo Santos
  Atualizado - 23/05/2022

  Esse freamwork faz UPLOAD de arquivos e ao mesmo tempo o compacta em formato ZIP.
  Lembrar que: Descomentar a linha .zip no PHP.INI senão o ZIP não funcionara.

  Para usar basta apenas atribuir o nome do arquivo, tamanho e nome temporário.
  Exemplo:

  $nomeArquivo    = $_FILES['nome_do_campo_do_arquivo_no_seu_formulario']['name'];
  $tamanhoArquivo = $_FILES['nome_do_campo_do_arquivo_no_seu_formulario']['fize'];
  $nomeTemporario = $_FILES['nome_do_campo_do_arquivo_no_seu_formulario']['tmp_name'];

  $upload = new Upload($nomeArquivo , $tamanhoArquivo , $nomeTemporario);

 */

class Upload {

    //Diretorio do arquivo onde ser� feito o Upload
    public $diretorio = "docs/";
    //1 mega = 1000000, 2 mega = 2000000 [Enviando 1 Mega]			
    public $tamanho = 2000000;
    //Extencao que nao � permitida no programa          						
    public $extencao = array('a', 'txt', 'xls', 'sf', 'pdf', 'msword');
    //Separacao do Arquivo
    public $separador = '-';

    function upload($arquivo, $tamanho, $tmp_nome, $tipo) {
        $up = Upload::verificaTamanhoArquivo($arquivo, $tamanho, $tmp_nome, $tipo);
        if ($up == 1) {
            echo "<script>alert('Enviado com sucesso');</script>";
            return true;
        } else {
            return false;
        }
    }

    function verificaTamanhoArquivo($arquivo, $tamanho, $tmp_nome, $tipo) {
        if ($tamanho > $this->tamanho) {
//            echo "<script>alert('O Arquivo é Grande, Selecione Outro');</script>";
            return false;
        } else {
            $retorno = Upload::verificaTipoArquivo($arquivo, $tamanho, $tmp_nome, $tipo);
            if ($retorno == 1) {
                $nomeIndentificado = date('d-m-Y');
                move_uploaded_file($tmp_nome, $this->diretorio . $nomeIndentificado . $this->separador . $arquivo);
                return 1;
            } else {
                echo "<script>alert('Extenção do arquivo inválida!!!');</script>";
                return 0;
            }
        }
    }

    function verificaTipoArquivo($arquivo, $tamanho, $tmp_nome, $tipo) {
        $extencaoArquivo['extencao'] = explode('.', $arquivo);
        if (in_array($extencaoArquivo['extencao'][1], $this->extencao)) {
            return 1;
        } else {
            return 0;
        }
    }

}

?>