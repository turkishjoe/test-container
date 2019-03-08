<?php
/**
 * TODO:
 * Created by PhpStorm.
 * User: prog12
 * Date: 08.03.19
 * Time: 16:23
 */

namespace Demo\Controller;


use Http\BaseController;
use Http\ControllerInterface;
use Http\Request;

class UserController extends BaseController implements ControllerInterface
{
    public function create(){
        $this->getViewer()->render('user/create', []);
    }

    public function main(){
        $this->getViewer()->render('user/main', []);
    }


    public function get(){
        $this->getViewer()->render('user/get', ['id'=>$this->getRequest()->getParam('id')]);
    }
}