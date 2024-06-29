<?php 

namespace Controllers;

use Helpers\Controller;
use Models\NoticeModel;

class Home extends Controller {
    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->view->render('home');
    }

    public function getNotice() {
        $notice = new NoticeModel;
        return $notice->index();
    }
}