<?php

namespace Routes;

use Routes\ParseRoute;
use Routes\TranslateToPt;

class ManagerRoute {

    use ParseRoute;
    use TranslateToPt;

    private $tam;
    private $ctrl;
    private $dir;
    private $page;
    private $verbs = [];
    private $path = DIR .'src/controllers/';

    public function __construct() {
        $this->url=ParseRoute::index();
        $this->tam=count($this->url); 

        // url translator
        $this->page=TranslateToPt::get();

        $this->verifyParam();
    }

    private function verifyParam() {
        $item = isset($this->page[$this->url[0]])? $this->page[$this->url[0]]: $this->url[0];
        if($this->tam == 1 && empty($item)) {
            // empty url condition
            $this->ctrl = new \Controllers\site\Home;
            $this->ctrl->index();

            return false;
        } elseif ($this->tam==1 && !empty($item)) {
            // if url heve one element
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
        } elseif($this->tam<4 && !is_dir($this->path.$item)) {
            // condetion to permit remove show verb in url
            $ctrl = ucfirst($item);
            $ClassName = "Controllers\\site\\{$ctrl}";
            $object = new $ClassName();

            $param = isset($this->page[$this->url[1]])? $this->page[$this->url[1]]: $this->url[1];
            if(method_exists($object, $param)) {
                if($param=='show') {$object->show($this->url[2]);}
                else 
                {
                    $url[]=isset($this->page[$this->url[1]])? $this->page[$this->url[1]]: $this->url[1];
                    if(isset($this->url[2])) $url[]=$this->url[2];
                    (isset($url[1]) && isset($this->page[$url[1]]))? $url[1]=$this->page[$url[1]]: null;
                    $object->{$param}($url);
                }
                return false;
            } elseif(!method_exists($object, $param)) {
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
            $item = isset($this->page[$this->url[$i]])? $this->page[$this->url[$i]]: $this->url[$i];

            if(is_dir($this->path.$item)) {

                $this->path .= $item.'/';
                $this->dir = $item;
                
            } else {
                
                $ctrl = ucfirst($item);                
                if(file_exists($this->path . $ctrl .'.php')){
                    $this->ctrl = $ctrl;
                } else {
                    array_push($this->verbs, $item);
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