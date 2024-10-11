<?php

namespace Helpers;

use Helpers\View;

class Controller {

    protected function __construct() {
        $this->view = new View();
    }

} 