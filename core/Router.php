<?php

namespace app\core;

class Router
{
    /**
     * @var array
     */
    protected $routes;

    /**
     * @var Request
     */
    public $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    public function get($path, \Closure $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function resolve()
    {

        $path = $this->request->getPath();
        $method = $this->request->getMethod();

        $callback = $this->routes[$method][$path] ?? false;

        if ($callback) {
            return call_user_func($callback);
        }


        echo "Not Found";


    }
}
