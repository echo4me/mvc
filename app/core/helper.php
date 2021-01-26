<?php
namespace MVC\core;

class helper {


    public static function redirect($path)
    {
        header("Location:".URL.$path);
    }
}