<?php
/**
 * TODO:
 * Created by PhpStorm.
 * User: prog12
 * Date: 08.03.19
 * Time: 17:19
 */

namespace Http\Router;


class BaseController implements ControllerInterface
{
    private $request;

    /**
     * TODO:
     * @param Request $request
     * @return mixed
     */
    public function setRequest(Request $request)
    {
        $this->request = $request;

        return $this;
    }

    /**
     * TODO:
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }
}