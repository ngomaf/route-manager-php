<?php

namespace Controllers\site;

use Helpers\Controller;

class Project  extends Controller {
    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->view->render('site/projects');
    }
    
    public function show($slug) {
        $this->view->slug = $slug;
        $this->view->render('site/project');
    }

    public function type($params=[]) {
        if(sizeof($params)==1 || $params[1]=='all') {$this->typeIndex();}
        elseif(sizeof($params)==2) {$this->typeShow($params[1]);}        
    }
    
    public function typeIndex() {
        $this->view->datas = null;
        $this->view->render('site/projectTypes');
    }
    
    public function typeShow($slug) {
        $this->view->slug = $slug;
        $this->view->render('site/projectType');
    }
}