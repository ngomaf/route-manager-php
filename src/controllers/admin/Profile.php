<?php

namespace Controllers\admin;

use Helpers\Controller;
use Controllers\site\ErrorMsg;

class Profile extends Controller {
    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->view->render('admin/profile');
    }

    public function password($params=[]) {
        if(empty($params) || $params[1]=='edit') {$this->passEdit();}
        elseif($params[1]=='update') {$this->passUpdate($params[1]);}
        else {new ErrorMsg();}
    }

    public function passEdit() {
        $this->view->slug = 'rosa-fortuna';
        $this->view->render('admin/profilePassEdit');
    }

    public function passUpdate($slug) {
        $this->view->slug = $slug[2];
        $this->view->msg = 'Success! Password updated with success.';
        $this->index();
    }

}