<?php

namespace App\Core;

 class Router{

    protected $routes = [


        'GET' => [],

        'POST' => []

    ];

    public function get($uri,$controller){

        $this->routes['GET'][$uri] = $controller;
      
    }

    public function post($uri,$controller){

        $this->routes['POST'][$uri] = $controller;
      
    }

    public static function load($file){

        $router = new static;

        require $file;

        return $router;
      
    }

    public function direct($uri,$requestMethod){

        if(!array_key_exists($uri,$this->routes[$requestMethod])){

            throw new Exception ('Could not find this route');

        }

        return $this->callMethod(

            ...explode('@',$this->routes[$requestMethod][$uri])

        );
      
    }

    protected function callMethod($controller,$method){

        $controller = "App\\Controllers\\{$controller}";

        $controller = new $controller;

        if(!method_exists($controller,$method)){

            throw new Exception ('could not find this method');

        }

        return $controller->$method();
      
    }
    
    
    
    
        
        

 }

?>