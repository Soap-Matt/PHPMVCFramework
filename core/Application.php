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

    public static $ROOT_DIR;

    public function __construct($rootPath)
    {
        $this->request = new Request();
        $this->router = new Router($this->request);
        self::$ROOT_DIR = $rootPath;
    }

    public function run()
    {
       echo $this->router->resolve();
    }


}
