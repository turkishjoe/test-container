<?php
/**
 * TODO:
 * Created by PhpStorm.
 * User: prog12
 * Date: 08.03.19
 * Time: 17:15
 */

namespace Http;


use View\ViewerInterface;

interface ControllerInterface
{
    /**
     * TODO:
     * @param Request $request
     * @return mixed
     */
    public function setRequest(Request $request);

    /**
     * TODO:
     * @param ViewerInterface $viewer
     * @return mixed
     */
    public function setViewer(ViewerInterface $viewer);

    /**
     * TODO:
     * @param $pdo
     * @return mixed
     */
    public function initRepository($pdo);
}