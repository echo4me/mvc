<?php
namespace MVC\controllers;
use MVC\core\controller;
use MVC\models\user;

class apicontroller extends controller{

    
    public function users()
    {
        $url = explode('/',$_SERVER['QUERY_STRING']);
        $user = new user();
        $data = $user->getData();
        if($url[2] == 'all')
        {
            header("Access-Control-Allow-Origin: application/json");
            header("Content-Type: application/json");
            http_response_code(200);
            $res = ['status' => 200,'data' => $data];
            echo $result = json_encode($res);
        }
        elseif($url[2] == 'update')
        {
            $user->update('adam','adam123',5);
        }
        elseif($url[2] == 'add')
        {
           // $mm = file_get_contents('php://input');
            //var_dump($mm);die;
            $user->insert('Momo','lol');
        }
        elseif($url[2] == 'delete')
        {
            $user->delete(5);
        }
        else{
        $title='api';
        return $this->view('api/users',compact('title'));
        }

    }


}