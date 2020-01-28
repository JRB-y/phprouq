<?php

namespace Jrb\Router;

use Closure;

class Router
{
    /**
     * $url
     *
     * @var undefined
     */
    public $url;

    /**
     * $method
     *
     * @var undefined
     */
    public $method;

    /**
     * $routes
     *
     * @var array
     */
    public $routes = [];

    /**
     * __construct
     *
     * @param mixed $request
     * @return void
     */
    public function __construct($request)
    {
        $url = strtolower($request['REQUEST_URI']);
        $this->url = substr($url, 0, strlen($url));
        $this->method = strtolower($request['REQUEST_METHOD']);
    }

    /**
     * add
     *
     * @param String $url
     * @param String $method
     * @param Closure $callback
     * @return void
     */
    public function add(String $url, String $method, Closure $callback)
    {
        $this->routes[] = [$url, $method, $callback];
    }

    public function run()
    {
        
        foreach ($this->routes as $route) {
            list($r, $m, $c) = $route;

            if ($r === $this->url && $m === $this->method) {
                call_user_func($c);
                return true;
            }
        }
        echo "404";
        return false;
    }
}
