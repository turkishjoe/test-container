<?php
/**
 * TODO:
 * Created by PhpStorm.
 * User: prog12
 * Date: 08.03.19
 * Time: 18:26
 */

namespace View;


interface ViewerInterface
{
    public function render($view, $params);
}