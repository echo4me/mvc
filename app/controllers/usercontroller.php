<?php
namespace MVC\controllers;
use MVC\models\user;
use MVC\core\Session;
use MVC\core\controller;
use MVC\core\helper;
use Rakit\Validation\Validator;

class usercontroller extends controller
{
    public function __construct()
    {
        Session::Start();     
    }
    public function login()
    {
        $title = 'Login Page';
        if(!isset($_SESSION['userdata']))
        {
            $id = $_SESSION['student_id'];
            return $this->view('home/login',compact('title','id'));
        }else{
            header("Location:".URL."user/dashboard");
        }
        
    }

    public function postlogin()
    {
        $validator = new Validator;
        $validation = $validator->validate($_POST + $_FILES, ['email' => 'required|email','password' => 'required|min:6|max:10' ]);
        //  validation failed
        if ($validation->fails()) {
            // handling errors
            $errors = $validation->errors();
            echo "<pre>";
            print_r($errors->firstOfAll());
            echo "</pre>";
            exit;
        } else {
            // validation passes
            $email = $_POST['email']; $password = $_POST['password'];
            $userCheck = new user;
            $result = $userCheck->getUserData($email,$password);
            $userCheck->lastlogin($email);
            if(!empty($result))
            {
                $data = Session::Set('userdata',$result);
                helper::redirect('user/dashboard');

            }else{
                helper::redirect('user/login');
            }
        }
    }

    // Dashboard Page
    public function dashboard()
    {
        $data = Session::Get('userdata');
        $title = 'Dashboard Admin';
        return $this->view('home/dashboard',compact('data','title'));
    }

    // Logout Page
    public function logout()
    {
        Session::Stop();
        helper::redirect('user/login');
    }

}