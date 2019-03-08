<?php
/**
 * TODO:
 * Created by PhpStorm.
 * User: prog12
 * Date: 08.03.19
 * Time: 18:51
 */

namespace Demo\Model;


use Model\BaseRepository;

class UserRepository extends BaseRepository
{
    protected function getTableName() : string
    {
        return 'users';
    }
}