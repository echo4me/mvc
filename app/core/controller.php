<?php
namespace MVC\core;


class controller {
    

    // to include .php files have classes
    public function view($path,$param)
    {
        if(file_exists(VIEWS.$path.'.php'))
        {
            extract($param); // this extract()  will revice the params as(assostive array) and convert to variables
            require_once(VIEWS.$path.'.php'); // include the file from views folder with name of method
    
        }else{
            die('Sorry this view not found');
        }
    }

    


    
}