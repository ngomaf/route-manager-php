<?php

namespace Controllers\site;

use Helpers\Controller;

class Notice  extends Controller {
    function __construct() {
        parent::__construct();
    }

    public function index () {
        $this->view->render('site/notices');
    }
    
    public function show ($slug) {
        $this->view->slug = $slug;
        $this->view->render('site/notice');
    }

}