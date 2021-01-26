<?php

namespace MVC\controllers;
use MVC\core\controller;
use MVC\models\user;

class homecontroller extends controller {

    //any function u type here will be as folder in url
    public function index()
    {
        $user = new user;
        
        $data = $user->getData(); // from main Model we get SQL then pass it
        $title ='Home Page';
        return $this->view('home/index',['title'=>$title,'data'=>$data]);
        
    }

    public function details()
    {
        $title ='Details';
        return $this->view('home/details',['title'=>$title]);
    }
    

}

