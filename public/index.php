<?php
//db info path
define('SERVER', 'localhost');
define('USER', 'root');
define('PASS', '');
// project path
define('DS',DIRECTORY_SEPARATOR);
define('CSS_PATH', 'css/ok');
define('URL','http://mvc.test/');
define('ROOT',dirname(__DIR__));
define('APP',ROOT.DS.'app'.DS);
define('CONFIG',APP.'config'.DS);
define('CORE',APP.'core'.DS);
define('MODELS',APP.'models'.DS);
define('CONTROLLERS',APP.'controllers'.DS);
define('VIEWS',APP.'views'.DS);

require_once('../vendor/autoload.php');
new MVC\core\App; // to make App class work