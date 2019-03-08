<?php
/**
 * TODO:
 * Created by PhpStorm.
 * User: prog12
 * Date: 08.03.19
 * Time: 19:12
 */

namespace Http;


class ParameterBag
{
    private $array;

    public function __construct($params)
    {
        $this->array = $params;
    }

    public function get($paramName){
        return $this->array[$paramName] ?? null;
    }
}