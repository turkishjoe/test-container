<?php
/**
 * TODO:
 * Created by PhpStorm.
 * User: prog12
 * Date: 08.03.19
 * Time: 18:26
 */

namespace View;


class SimpleViewer implements ViewerInterface
{
    private $viewPath;

    public function __construct($viewPath)
    {
        $this->viewPath = $viewPath;
    }

    public function render($view, $params = []){
        $viewFile = $this->viewPath . DIRECTORY_SEPARATOR . $view . '.php';

        //TODO: File Exists
        include $viewFile;
    }
}