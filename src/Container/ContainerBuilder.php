<?php
/**
 * TODO:
 * Created by PhpStorm.
 * User: prog12
 * Date: 08.03.19
 * Time: 16:13
 */

namespace Container;


use Demo\A;
use Demo\B;
use Demo\C;

class ContainerBuilder
{
    private $container;

    public function __construct()
    {
        $this->container = new Container();
    }

    public function build(){
        $this->container->add(A::class);
        $this->container->add(B::class);
        $this->container->add(C::class);

        return $this;
    }

    /**
     * TODO:
     * @return Container
     */
    public function getContainer(): Container
    {
        return $this->container;
    }
}