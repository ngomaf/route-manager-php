<?php

namespace Controllers;

use Helpers\Controller;

class User extends Controller {
    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->view->render('admin/dashboard');
    }

}