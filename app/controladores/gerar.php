<?php

require_once('app/classes/regra.php');
/**
 * Description of Gerar
 *
 * @author Willian
 */
class Gerar {

    public function gerarTabelas($arrayParametros) {
        try {
            $this->_validaParametros($arrayParametros);
            $objRegra = new Regra($arrayParametros);
            $objRegra->gerar();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    private function _validaParametros($arrayParametros) {
        $numeroParametros = count($arrayParametros);
        if ($numeroParametros == 0) {  //tem q ter pelo menos o parametro do .txt
            throw new Exception("É necessário pelo menos o arquivo .txt!\n");
        }
        
        if ($numeroParametros > 2) {
            throw new Exception("Só é valido passar 2 parametros apenas!\n");
        }
        
        $temArquivoTxt = false;
        foreach ($arrayParametros as $parametro) {
            if(preg_match('/.txt$/', $parametro)) {
                $temArquivoTxt = true;
                break;
            }
        }
        
        if(!$temArquivoTxt) {
            throw new Exception("É necessário o arquivo no formato .txt!\n");
        }
    }

}
