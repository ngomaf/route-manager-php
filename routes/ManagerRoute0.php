<?php

namespace Routes;

use Routes\ParseRoute;

class ManagerRoute{

    private $init;
    private $url;
    private $dir=null;
    private $cont;
    private $file;
    private $page;
    private $ctrl;

    use ParseRoute;

    public function __construct() {
        $this->url=ParseRoute::index();
        $this->cont=count($this->url);        

        $this->verificaParametros();
    }

    #Verificar se existem parâmetros digitados pelo usuário
    private function verificaParametros() {
        if($this->cont == 1 && empty($this->url[0])){
            $this->page = new \Controllers\Home;
            $this->page->index();

            return false;
        }else{
            $this->verificaDir();
        }
    }

    #Verificar se o índice digitado pelo usuário é um diretório
    private function verificaDir() {
        $this->init= DIR.'src/controllers/'. $this->url[0] .'/';

        for($i=0; $i<$this->cont; $i++){
            if(is_dir($this->init)){
                if($i==0){
                    $this->dir.=$this->init;
                }elseif(is_dir($this->dir.$this->url[$i])){
                    $this->dir.=$this->url[$i].'/';
                }else{
                    echo "Entreiiii<br>";
                    var_dump($this->init);
                    $this->ctrl = ucfirst($this->url[$i]);
                    $this->file=$this->init.$this->ctrl;
                    break;
                }
            }else{
                if($i==0){
                    $this->dir.='controllers/';
                }

                if(is_dir($this->dir.$this->url[$i])){
                    $this->dir.=$this->url[$i].'/';
                }else{
                    $this->file=$this->url[$i];
                    break;
                }
            }
        }
        $this->dir=str_replace("//","/",$this->dir);
        $this->verificaFile();
    }

    # Verificar se existe o arquivo requisitado, se não existir ele chama o index.php, senão chama a pagina 404.
    private function verificaFile() {
        
        if(file_exists($this->file.'.php')){
            $this->page=$this->file.'.php';
            var_dump($this->init);
        }elseif(file_exists('index.php')){
            $this->page='index.php';
        }else{
            $this->page=DIR.'views/404.php';
        }
    }

    #Retornar a página final para o sistema
    public function getInclusao() {
        return $this->page;
    }
}