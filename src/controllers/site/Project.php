<?php

namespace Controllers\site;

use Helpers\Controller;

class Project  extends Controller {
    function __construct() {
        parent::__construct();
    }

    public function index () {
        $this->view->render('site/projects');
    }
    
    public function show ($slug) {
        $this->view->slug = $slug;
        $this->view->render('site/project');
    }

}