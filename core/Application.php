<?php

namespace app\core;

class Application
{

    /**
     * @var Router
     */
    public $router;

    /**
     * @var Request
     */
    public $request;

    public static $app;

    public static $ROOT_DIR;

    public Controller $controller;

    /**
     * @var Response
     */
    public $response;

    public function __construct($rootPath)
    {
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
    }

    public function run()
    {
       echo $this->router->resolve();
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @param mixed $controller
     */
    public function setController($controller)
    {
        $this->controller = $controller;
    }


}
