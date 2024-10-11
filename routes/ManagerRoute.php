<?php

namespace Routes;

use Routes\ParseRoute;
use Controllers\site\ErrorMsg;

class ManagerRoute {

    private int $tam;
    private string $ctrl;
    private string $dir;
    private array $verbs = [];
    private string $path = '../src/controllers/';

    public function __construct() {
        $this->uri=(new ParseRoute)::index();
        $this->tam=count($this->uri); 

        $this->verifyParam();
    }

    private function verifyParam() {
        if($this->tam == 1 && empty($this->uri[0])) {
            $object = new \Controllers\site\Home;
            $object->index();
            return false;
        } elseif ($this->tam==1 && !empty($this->uri[0])) {
            $ctrl = ucfirst($this->uri[0]);

            if(is_dir($this->path.$this->uri[0])) {
                // if uri element exist end is a directory
                $Class = "Controllers\\{$this->uri[0]}\\Start";
                $object = (new $Class)->index();
            } elseif(file_exists($this->path.'site/'.$ctrl.'.php')) {
                // if uri element exist in path controllers/site
                $Class = "Controllers\\site\\{$ctrl}";
                $object = (new $Class)->index();
            } else {
                // main service or page, for example Post in one blog
                // Only need edit Notice
                $object = new \Controllers\site\Notice;
                if(method_exists($object, 'show')) {$object->show($this->uri[0]);}
                else {new ErrorMsg();}
            }
            return false;
        } elseif($this->tam<4 && !is_dir($this->path.$this->uri[0])) {
            // condition to permit remove show verb in uri
            $ctrl = ucfirst($this->uri[0]);
            if(file_exists($this->path.'site/'.$ctrl.'.php'))
            {$Class = "Controllers\\site\\{$ctrl}"; $object = new $Class();}
            else {new ErrorMsg(); return false;}

            if(method_exists($object, $this->uri[1])) {
                $uri[] = $this->uri[1];
                if(isset($this->uri[2])) $uri[] = $this->uri[2];
                $object->{$this->uri[1]}($uri);
                return false;
            } elseif(!method_exists($object, $this->uri[1])) {
                if(method_exists($object, 'show'))
                {$object->show($this->uri[1]);}
                else {new ErrorMsg();}
                return false;
            }
            $object->index();
        } else {
            $this->verifyDir();
        }
    }

    private function verifyDir() {        
        for($i=0; $i<$this->tam; $i++){
            if(is_dir($this->path.$this->uri[$i])) {
                $this->path .= $this->uri[$i].'/';
                $this->dir = $this->uri[$i];
            } else {
                $ctrl = ucfirst($this->uri[$i]);    

                (file_exists($this->path . $ctrl .'.php'))? 
                $this->ctrl = $ctrl: array_push($this->verbs, $this->uri[$i]);
            }
        }
        if($this->dir==null) {new ErrorMsg(); return false;}

        $Class = "Controllers\\{$this->dir}\\{$this->ctrl}";
        $object = new $Class();
        
        if(sizeof($this->verbs)==0) {
            $object->index();
        } elseif(sizeof($this->verbs)==1) {
            // condition to permit remove show verb in uri
            if(method_exists($object, $this->verbs[0])) {
                $object->{$this->verbs[0]}();
            } else {
                if(method_exists($object, 'show')) {
                    $this->verbs[1] = $this->verbs[0];
                    $object->show($this->verbs);
                    return false;
                }
                new ErrorMsg();
            }
        } else {
            (method_exists($object, $this->verbs[0]))? $object->{$this->verbs[0]}($this->verbs): new ErrorMsg();
        }
    }
}
