<?php
/**
 * TODO:
 * Created by PhpStorm.
 * User: prog12
 * Date: 08.03.19
 * Time: 17:08
 */

namespace Http;


class Request
{
    private $uriParams;

    public function addParam($paramName, $param){
        $this->uriParams[$paramName] = $param;

        return $this;
    }

    public function getParam($paramName){
        return $this->uriParams[$paramName] ?? null;
    }
}