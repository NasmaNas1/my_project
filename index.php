<?php
use app\controller\UserCont;
require_once  __DIR__ . '/config/config.php';
require_once  __DIR__ . '/vendor/lib/MysqliDb.php';
require_once  __DIR__ . '/app/controller/userCont.php';

$config = require 'config/config.php';
$db = new MysqliDb(
    $config['db_host'],
    $config['db_user'],
    $config['db_pass'],
    $config['db_name'],
);
//  echo $_SERVER['REQUEST_URI'];
$request = $_SERVER['REQUEST_URI'];
 
define('BASE_PATH', '/');

$controller = new UserCont($db);
switch ($request) {
    case BASE_PATH:
        $controller->index();
        break;
    case BASE_PATH . 'add':
        $controller->add();
        break;
    case BASE_PATH . 'show?id='.$_GET['id']:
        $controller->show($_GET['id']);
        break;
        case BASE_PATH . 'delete?id=' . $_GET['id']:
            // var_dump($_GET['id']);
            $controller->delete($_GET['id']);
            break;
    case BASE_PATH . 'update?id=' . $_GET['id']:
             $controller->update($_GET['id']);
            break;
   case BASE_PATH . 'edit?id=' . $_GET['id']:
    //'edit?id='  انا هاد عندي ياه ثابت لهيك بكتبو
    //. $_GET['id'] هون انا مابدي ياه ثابت هوي متغيير
                // var_dump($_GET['id']);
          $controller->edit($_GET['id']);
          break;
   }