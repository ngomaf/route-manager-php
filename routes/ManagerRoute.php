<?php

namespace Routes;

use Routes\ParseRoute;

class ManagerRoute {

    private $tam;
    private $ctrl;
    private $dir;
    private $verbs = [];
    private $path = DIR .'src/controllers/';

    use ParseRoute;

    public function __construct() {
        $this->url=ParseRoute::index();
        $this->tam=count($this->url);        

        $this->verifyParam();
    }

    private function verifyParam() {
        if($this->tam == 1 && empty($this->url[0])) {
            // empty url condition
            $this->ctrl = new \Controllers\site\Home;
            $this->ctrl->index();

            return false;
        } elseif ($this->tam==1 && !empty($this->url[0])) {
            // if url heve one element
            $item = $this->url[0];
            $ctrl = ucfirst($item);
            if(is_dir($this->path.$item)) {
                // if url element exist end is a directory
                $ClassName = "Controllers\\{$item}\\Start";
                $object = new $ClassName();
                $object->index();
            } elseif(file_exists($this->path.'site/'.$ctrl.'.php')) {
                // if url element exist in path controllers/site
                $ClassName = "Controllers\\site\\{$ctrl}";
                $object = new $ClassName();
                $object->index();
            } else {
                $this->ctrl = new \Controllers\site\Notice;
                $this->ctrl->show($this->url[0]);
            }
            
            return false;
        } elseif($this->tam==2 && !is_dir($this->path.$this->url[0])) {
            // condetion to permit remove show verb in url
            $ctrl = ucfirst($this->url[0]);
            $ClassName = "Controllers\\site\\{$ctrl}";
            $object = new $ClassName();

            if(!method_exists($object, $this->url[1])) {
                $object->show($this->url[1]);
                return false;
            }
            $object->index();

        } else {
            $this->verifyDir();
        }
    }

    private function verifyDir() {        

        for($i=0; $i<$this->tam; $i++){
            if(is_dir($this->path.$this->url[$i])) {

                $this->path.=$this->url[$i].'/';
                $this->dir = $this->url[$i];

            } else {
                
                $ctrl = ucfirst($this->url[$i]);

                if(file_exists($this->path . $ctrl .'.php')){
                    $this->ctrl = $ctrl;
                } else {
                    array_push($this->verbs, $this->url[$i]);
                }

            }
        }

        $ClassName = "Controllers\\{$this->dir}\\{$this->ctrl}";
        $object = new $ClassName();
        
        if(sizeof($this->verbs)==0) {
            $object->index();
        } elseif(sizeof($this->verbs)==1) {
            // condetion to permit remove show verb in url
            if(method_exists($object, $this->verbs[0])) {
                $object->{$this->verbs[0]}();
            } else {
                $this->verbs[1] = $this->verbs[0];
                $object->show($this->verbs);
            }
        } else {
            $object->{$this->verbs[0]}($this->verbs);
        }

    }
    
}