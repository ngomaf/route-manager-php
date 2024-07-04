<?php

namespace Controllers\site;

use Helpers\Controller;

class ErrorMsg  extends Controller {
    
    function __construct() {
        parent::__construct();

        $this->view->render('site/error');
    }

}