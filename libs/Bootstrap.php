<?php

class Bootstrap {

    function __construct() {
        
        $url = isset($_GET['url']) ? $_GET['url'] : NULL;
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        
        //print_r($url);
        
        if(empty($url[0])) {
            require_once 'controllers/index.php';
            $controller = new Index();
            $controller->index();
            return false;
        }

        $file = './controllers/' . $url[0] . '.php';
        if(file_exists($file)) {
            require_once $file;
        } else {
            $this->error();
        }

        $controller = new $url[0];
        $controller->loadModel($url[0]);

        if (isset($url[2])) {
            if(method_exists($controller, $url[1])) {
                $controller->{$url[1]}($url[2]);
            } else {
                $this->error();
            }
        } elseif(isset($url[1])) {
            if(method_exists($controller, $url[1])) {
                $controller->{$url[1]}();
            } else {
                $this->error();
            }
        } else {
            $controller->index();
        }
    }
    
    public function error() {
        require './controllers/errorr.php';
            $controller = new Errorr();
            $controller->index();
            return false;
    }

}
