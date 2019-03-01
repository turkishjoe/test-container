<?php
include 'vendor/autoload.php';

use Demo\A;

class D{
    public function __construct()
    {
    }
}

class B{
    protected $a;

    public function __construct(A $a){
        $this->a = $a;
    }
}

interface CImp{
   public function test(); 
}

class C implements CImp{
    protected $b;
    protected $d;

    public function __construct(B $b, D $d){
        $this->b = $b;
        $this->d = $d;
    }

    public function test(){
        echo 'test' . PHP_EOL;
    }
}


class Container{
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

$container = new Container;
$container->add(A::class);
$container->add(B::class);
$container->add(C::class);
$container->add(D::class);

$c = $container->get(C::class);
