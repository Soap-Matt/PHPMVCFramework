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

        // TODO: get the callback using the above data. Call back should be set to false if there is no callback
        // TODO: Check if the callback is false and do something if is -> return not found for now
        // TODO: execute the callback



    }
}
