<?php
/**
 * TODO:
 * Created by PhpStorm.
 * User: prog12
 * Date: 08.03.19
 * Time: 16:11
 */

namespace Demo;


class C implements CImp
{
    protected $b;

    public function __construct(B $b){
        $this->b = $b;
    }

    public function test(){
        echo 'test' . PHP_EOL;
    }
}