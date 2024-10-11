<?php

namespace Routes;

use Routes\TranslateToPt;

class ParseRoute {

    use TranslateToPt;
    
    public static function index($par=null) {
        $transl = TranslateToPt::get();

        $uri=trim($_SERVER['REQUEST_URI'], '/');
        $uri=explode("/", $uri, FILTER_SANITIZE_URL);
        
        $route = [];
        foreach($uri as $value) {
            $route[] = $transl[$value] ?? $value; // translation
        }

        if(!is_null($par)) return (array_key_exists($par, $route))? $route[$par]: false;

        return $route;
    }
    
}