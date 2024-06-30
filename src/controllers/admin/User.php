<?php

namespace Controllers\admin;

use Helpers\Controller;

class User extends Controller {
    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->view->render('admin/users');
    }

    public function show($params) {
        $this->view->slug = $params[1];
        $this->view->render('admin/user');
    }

}