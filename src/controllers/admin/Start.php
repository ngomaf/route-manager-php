<?php

namespace Controllers\admin;

use Helpers\Controller;

class Start extends Controller {
    public function index() {
        $this->view->render('admin/dashboard');
    }
}