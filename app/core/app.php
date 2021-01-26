<?php
namespace MVC\core;

class App {

    private $controller;
    private $method;
    private $params = [];
    public function __construct()
    {
        $this->url();
        $this->render();
        
    }

    private function url()
    {
        //parse the url
        if(!empty($_SERVER['QUERY_STRING']))
        {
            $url = explode('/',$_SERVER['QUERY_STRING']);
            //$this->controller = isset($url[0]) ? $url[0].'Controller' : $this->controller;
            $this->controller = isset($url[0]) ? $url[0].'controller' : 'homecontroller';
            $this->method = isset($url[1]) ? $url[1] : 'index';
            unset($url[0],$url[1]); //remove value from 2 indexed ,the rest for params
            $this->params = array_values($url); // array_value retrun index number from zero
        }else{
            $this->controller = 'homecontroller';
            $this->method     = 'index';
        }
        
    }


    private function render()
    {
        $controllers = "MVC\controllers\\".$this->controller; // class with namespace MVC\controllers\homecontroller
        //check class homecontroller is there and have class with same name
        if(class_exists($controllers))
        {
            $controllers = new $controllers; // create object from the class homecontroller
            // check method inside thecontroller if it exist
            if(method_exists($controllers,$this->method))
            {
                call_user_func_array([$controllers,$this->method],$this->params); //to run the method index()
            }
            else
            {
               //echo "Method Not Found";
               echo "Fuk you";
            }
        }
        else
        {
            //echo "Class Not Found";
            echo "Fuk you";
        }
    }









}

