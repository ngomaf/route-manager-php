<?php

namespace Helpers;

class View {

    public function render($view) {
        require '../src/views/'. $view .'.php';
    }

}