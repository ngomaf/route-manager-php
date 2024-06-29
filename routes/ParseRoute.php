<?php

namespace Routes;

trait ParseRoute {

    public static function index($par=null)
    {
        $url=explode("/",$_GET['url'],FILTER_SANITIZE_URL);
        if(!is_null($par))
        {
            if(array_key_exists($par,$url)){
                return $url[$par];
            }else{
                return false;
            }
        }else{
            return $url;
        }
    }
}