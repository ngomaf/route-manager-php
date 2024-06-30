<?php 

namespace Controllers\site;

use Helpers\Controller;
use Models\NoticeModel;

class Home extends Controller {
    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->view->render('site/home');
    }

    public function getNotice() {
        $notice = new NoticeModel;
        return $notice->index();
    }
}