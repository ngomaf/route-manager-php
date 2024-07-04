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
    
    public function show ($params) {
        $this->view->slug = $params;
        $this->view->render('site/notice');
    }

    public function category($params) {
        $this->view->slug = $params;
        $this->view->render('site/noticeCat');        
    }

}