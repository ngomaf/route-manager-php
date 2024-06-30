<?php

namespace Controllers\admin;

use Helpers\Controller;

class Start extends Controller {
    function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->view->render('admin/dashboard');
    }
}