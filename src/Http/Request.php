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
    private $post;
    private $get;

    public function __construct()
    {
        $this->get = $_GET;
        $this->post = $_POST;
    }

    public function addParam($paramName, $param)
    {
        $this->uriParams[$paramName] = $param;

        return $this;
    }

    /**
     * TODO:
     * @return mixed
     */
    public function getUriParams()
    {
        return $this->uriParams;
    }

    /**
     * TODO:
     * @return mixed
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * TODO:
     * @return mixed
     */
    public function getGet()
    {
        return $this->get;
    }
}