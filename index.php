<?php
class A{

}

class B{
    protected $a;

    public function __construct(A $a){
        $this->a = $a;
    }
}

class C{
    protected $b;

    public function __construct(B $b){
        $this->b = $b;
    }
}

$a = new A();
$b = new B($a);
$c = new C($b);

class Container{
    public function get($service){

    }
}