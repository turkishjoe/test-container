<?php
include 'vendor/autoload.php';

use Demo\A;

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

    public function __construct(B $b){
        $this->b = $b;
    }

    public function test(){
        echo 'test' . PHP_EOL;
    }
}

$a = new A();
$b = new B($a);
$c = new C($b);

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

$c = $container->get(C::class);
