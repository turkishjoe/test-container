<?php
/**
 * TODO:
 * Created by PhpStorm.
 * User: prog12
 * Date: 08.03.19
 * Time: 16:23
 */

namespace Demo\Controller;


use Demo\Model\UserRepository;
use Http\BaseController;
use Http\ControllerInterface;
use Http\Request;
use Model\BaseRepository;

class UserController extends BaseController implements ControllerInterface
{
    /**
     * @var BaseRepository
     */
    private $repository;

    public function initRepository($pdo)
    {
        parent::setPdo($pdo);
        $this->repository = new UserRepository($pdo);
    }

    public function create(){
        $this->getViewer()->render('user/create', []);
    }

    public function main(){
        $this->getViewer()->render('user/main', [
            'users'=>$this->repository->findAll()
        ]);
    }


    public function get(){
        $this->getViewer()->render('user/get', ['id'=>$this->getRequest()->getParam('id')]);
    }
}