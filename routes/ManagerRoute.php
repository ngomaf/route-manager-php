<?php

namespace Routes;

use Routes\ParseRoute;

class ManagerRoute {

    private $tam;
    private $ctrl;

    use ParseRoute;

    public function __construct() {
        $this->url=ParseRoute::index();
        $this->tam=count($this->url);        

        $this->verifyParam();
    }

    public function verifyParam() {
        if($this->tam == 1 && empty($this->url[0])) {
            $this->ctrl = new \Controllers\Home;
            $this->ctrl->index();

            return false;
        } elseif ($this->tam==1 && !empty($this->url[0])) {
            var_dump($this->url[0]);
            $this->ctrl = new \Controllers\site\Notice;
            $this->ctrl->show($this->url[0]);

            return false;
        } else {
            echo "002";
        }
    }

    
}