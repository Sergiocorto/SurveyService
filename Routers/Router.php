<?php
namespace Routers;

use Helpers\GenerateQueryStringHelper;
use Interfaces\RouterInterface;
use Models\Db;
use Repositories\Repository;

class Router implements RouterInterface
{
    private $routes;

    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    public function route($request)
    {
        $route = $request['urlParts'][0];

        if (array_key_exists($route, $this->routes) && isset($request['urlParts'][1]))
        {
            $action = $request['urlParts'][1];
            $controller = $this->routes[$route]['controller'];
            $method = $this->routes[$route]['actions'][$action][$request['requestMethod']];
            $data = $request['body'] ?? $request['params'];
           (new $controller())->$method($data);
        } else {
            print_r('404');
        }
    }
}