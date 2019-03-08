<?php
/**
 * TODO:
 * Created by PhpStorm.
 * User: prog12
 * Date: 08.03.19
 * Time: 16:23
 */

namespace Demo\Controller;


use Http\Router\BaseController;
use Http\Router\ControllerInterface;
use Http\Router\Request;

class UserController extends BaseController implements ControllerInterface
{
    public function create(){
        echo 'create' . PHP_EOL;
    }

    public function main(){
        echo 'main' . PHP_EOL;
    }


    public function get(){
        echo 'get user ' . $this->getRequest()->getParam('id') . PHP_EOL;
    }
}