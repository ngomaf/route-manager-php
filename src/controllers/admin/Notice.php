<?php

namespace Controllers\admin;

use Helpers\Controller;

class Notice  extends Controller {
    function __construct() {
        parent::__construct();
    }

    public function index () {
        $this->view->render('admin/notices');
    }
    
    public function show($slug) {
        $this->view->slug = end($slug);
        $this->view->render('admin/notice');
    }
    
    public function edit($slug) {
        $this->view->slug = $slug;
        $this->view->render('admin/noticeEdit');
    }
    
    public function update($slug) {
        $this->view->slug = $slug;
        $this->view->msg = 'Success! Notice updated with success.';
        $this->index();
    }
    
    public function active($slug) {
        $this->view->slug = $slug;
        $this->index();
    }
    
    public function delete($slug) {
        $this->view->slug = $slug;
        $this->index();
    }
    
    public function destroy($slug) {
        $this->view->slug = $slug;
        $this->index();
    }

}