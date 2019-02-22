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
    private $logger;

    public function __construct(B $b, LoggerInterface $logger){
        $this->b = $b;
        $this->logger = $logger;
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
               $params = $constructor->getParameters();
               $arguments = [];

               foreach ($params as $key => $param){
                  $name =  $param->getClass()->name;
                  $arguments[$key] = $this->get($name);
               }

               $this->services[$id] = $this->definitions[$id]->newInstance($arguments);
           }else{
               throw new \InvalidArgumentException;
           }
        }

        return $this->services[$id];
    }

    public function add($id, $class){
        $this->definitions[$id] = new \ReflectionClass($class);

        return $this;
    }
}

$container = new Container;
$container->add('A', A::class);
$container->add(B::class, B::class);
$container->add(CImp::class, C::class);

//....
/**
 * @var C $c
 
 
 class UserController{
    public function __constructor(UserRepository $repository)
     {
     }
 }
 
 
 $container->get(UserController::class);
 */
$c = $container->get(CImp::class);
$c->test();

class ServiceProvider extends AbstructServiceProvider{
    public function register()
    {
        $this->container->add(
            
        );
    }
}
