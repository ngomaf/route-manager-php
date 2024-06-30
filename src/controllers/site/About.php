<?php

namespace Controllers\site;

use Helpers\Controller;

class About  extends Controller {
    function __construct() {
        parent::__construct();
    }

    public function index () {
        $this->view->render('site/about');
    }

}