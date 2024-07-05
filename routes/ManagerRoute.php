<?php

namespace Routes;

use Routes\ParseRoute;
use Routes\TranslateToPt;
use Controllers\site\ErrorMsg;


class ManagerRoute {

    use ParseRoute;
    use TranslateToPt;

    private $tam;
    private $ctrl;
    private $dir;
    private $transl;
    private $verbs = [];
    private $path = DIR .'src/controllers/';

    public function __construct() {
        $this->url=ParseRoute::index();
        $this->tam=count($this->url); 

        // url translator
        $this->transl=TranslateToPt::get();

        $this->verifyParam();
    }

    private function verifyParam() {
        $item = isset($this->transl[$this->url[0]])? $this->transl[$this->url[0]]: $this->url[0];
        if($this->tam == 1 && empty($item)) {
            // empty url condition
            $object = new \Controllers\site\Home;
            $object->index();
            return false;
        } elseif ($this->tam==1 && !empty($item)) {
            // if url heve one element
            $ctrl = ucfirst($item);
            if(is_dir($this->path.$item)) {
                // if url element exist end is a directory
                $Class = "Controllers\\{$item}\\Start";
                $object = new $Class();
                $object->index();
            } elseif(file_exists($this->path.'site/'.$ctrl.'.php')) {
                // if url element exist in path controllers/site
                $Class = "Controllers\\site\\{$ctrl}";
                $object = new $Class();
                $object->index();
            } else {
                // main service or page, for examplo Post in one blog
                // Only need edit Notice
                $object = new \Controllers\site\Notice;
                if(method_exists($object, 'show')) 
                {$object->show($this->url[0]);}
                else {new ErrorMsg();}
                return false;
            }
            return false;
        } elseif($this->tam<4 && !is_dir($this->path.$item)) {
            // condition to permit remove show verb in url
            $ctrl = ucfirst($item);
            if(file_exists($this->path.'site/'.$ctrl.'.php'))
            {$Class = "Controllers\\site\\{$ctrl}"; $object = new $Class();}
            else {new ErrorMsg(); return false;}

            $param = isset($this->transl[$this->url[1]])? $this->transl[$this->url[1]]: $this->url[1];
            if(method_exists($object, $param)) {
                if($param=='show') {$object->show($this->url[2]);}
                else 
                {
                    $url[]=isset($this->transl[$this->url[1]])? $this->transl[$this->url[1]]: $this->url[1];
                    if(isset($this->url[2])) $url[]=$this->url[2];
                    (isset($url[1]) && isset($this->transl[$url[1]]))? $url[1]=$this->transl[$url[1]]: null;
                    $object->{$param}($url);
                }
                return false;
            } elseif(!method_exists($object, $param)) {
                if(method_exists($object, 'show'))
                {$object->show($this->url[1]);}
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
            $item = isset($this->transl[$this->url[$i]])? $this->transl[$this->url[$i]]: $this->url[$i];

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
        if($this->dir==null) {new ErrorMsg(); return false;}

        $Class = "Controllers\\{$this->dir}\\{$this->ctrl}";
        $object = new $Class();
        
        if(sizeof($this->verbs)==0) {
            $object->index();
        } elseif(sizeof($this->verbs)==1) {
            // condetion to permit remove show verb in url
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
            if(method_exists($object, $this->verbs[0]))
            {$object->{$this->verbs[0]}($this->verbs);}
            else {new ErrorMsg();}
        }
    }
}
