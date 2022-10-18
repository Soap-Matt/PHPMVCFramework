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


}
