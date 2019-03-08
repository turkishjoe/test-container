<?php
/**
 * TODO:
 * Created by PhpStorm.
 * User: prog12
 * Date: 08.03.19
 * Time: 16:13
 */

namespace Container;


class Container
{
    /**
     * TODO:
     *
     * @var ReflectionClass[]
     */
    private $definitions = [] ;
    private $services = [];

    public function get($id){
        if(!isset($this->services[$id])){
            if(isset($this->definitions[$id])){
                $constructor = $this->definitions[$id]->getConstructor();
                $arguments = [];

                if(!is_null($constructor)) {
                    $params = $constructor->getParameters();
                }else{
                    $params = [];
                }

                foreach ($params as $key => $param){
                    $name =  $param->getClass()->name;
                    $arguments[$key] = $this->get($name);
                }

                $this->services[$id] = $this->definitions[$id]->newInstanceArgs($arguments);
            }else{
                throw new \InvalidArgumentException;
            }
        }

        return $this->services[$id];
    }

    public function add($class){
        $this->definitions[$class] = new \ReflectionClass($class);

        return $this;
    }
}