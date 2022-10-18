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

    /**
     * @var Response
     */
    public $response;

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }


    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function resolve()
    {

        $path = $this->request->getPath();
        $method = $this->request->getMethod();

        $callback = $this->routes[$method][$path] ?? false;

        if (is_string($callback)) {
          return $this->renderView($callback);
        }

        if ($callback) {
            return call_user_func($callback);

        }

        $this->response->set_status_code(404);
        return "Not Found";

    }

    private function renderView(string $view)
    {
        $layoutContent = $this->getLayoutContent();
        $viewContent = $this->getViewContent($view);
        return str_replace("{{ content }}", $viewContent, $layoutContent);
    }

    private function getLayoutContent()
    {
        ob_start();
        include_once Application::$ROOT_DIR.'/views/layouts/main.php';
        return ob_get_clean();
    }

    private function getViewContent(string $view)
    {
        ob_start();
        include_once Application::$ROOT_DIR."/views/$view.php";
        return ob_get_clean();
    }
}
