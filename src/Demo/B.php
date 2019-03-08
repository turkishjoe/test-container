<?php
/**
 * TODO:
 * Created by PhpStorm.
 * User: prog12
 * Date: 08.03.19
 * Time: 16:11
 */

namespace Demo;


class B
{
    protected $a;

    public function __construct(A $a){
        $this->a = $a;
    }
}