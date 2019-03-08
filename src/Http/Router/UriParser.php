<?php
/**
 * TODO:
 * Created by PhpStorm.
 * User: prog12
 * Date: 08.03.19
 * Time: 17:08
 */

namespace Http\Router;


class UriParser
{
    private $url;
    private $uriParams;

    public function __construct()
    {
        $this->url = trim($_SERVER['REQUEST_URI'], '/');
        $this->uriParams = explode('/', $this->url);
    }

    public function getUriParams(){
        return $this->uriParams;
    }

}