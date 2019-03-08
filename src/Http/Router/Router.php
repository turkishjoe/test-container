<?php
/**
 * TODO:
 * Created by PhpStorm.
 * User: prog12
 * Date: 08.03.19
 * Time: 16:21
 */

namespace Http\Router;


use Exception\BaseException;

class Router
{
    private $routes;
    private $parser;

    public function __construct($routes,  UriParser $parser)
    {
        $this->routes = $routes;
        $this->parser = $parser;
    }

    public function callAction(Request $request){

        $uriParams = $this->parser->getUriParams();
        if(!isset($this->routes[$uriParams[0]])){
            throw new BaseException("Bad route configuration");
        }

        //TODO:validation
        $parentActionConfig = $this->routes[$uriParams[0] ?? null];
        $controllerClass = $parentActionConfig['controller'] ?? null;

        if(!class_exists($controllerClass)){
            throw new BaseException(sprintf("Controller class for route %s not exists", $uriParams[0]));
        }

        $controller = new $controllerClass();
        if(!$controller instanceof ControllerInterface){
            throw new BaseException(sprintf("Controller class %s does not implement Controller Interface", $controllerClass));
        }

        $actionName = $uriParams[1] ?? 'main';

        if(!method_exists($controller, $actionName)){
            throw new BaseException(sprintf("Controller class %s has no action %s", $controllerClass, $actionName));
        }


        $actionConfig = $parentActionConfig['actions'][$actionName] ?? null;
        $this->bindParams($actionConfig, $uriParams, $request);
        $controller->setRequest($request);

        return $controller->$actionName();
    }

    private function bindParams($actionConfig, $uriParams, Request $request){
        if(isset($actionConfig['parameters'])){
            $currentParam = 2;

            foreach ($actionConfig['parameters'] as $parameter){
                if(!isset($uriParams[$currentParam])){
                    throw new BaseException("Too ");
                }

                $request->addParam($parameter, $uriParams[$currentParam]);
                $currentParam++;
            }
        }

        return $this;
    }
}