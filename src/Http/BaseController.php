<?php
/**
 * TODO:
 * Created by PhpStorm.
 * User: prog12
 * Date: 08.03.19
 * Time: 17:19
 */

namespace Http;


use View\ViewerInterface;

class BaseController implements ControllerInterface
{
    private $request;
    private $viewer;

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

    /**
     * TODO:
     * @param ViewerInterface $viewer
     * @return mixed
     */
    public function setViewer(ViewerInterface $viewer)
    {
        $this->viewer = $viewer;

        return $this;
    }

    /**
     * TODO:
     * @return ViewerInterface
     */
    public function getViewer()
    {
        return $this->viewer;
    }
}