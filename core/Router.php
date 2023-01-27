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
    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }


    public function resolve()
    {

        $path = $this->request->getPath();
        $method = $this->request->method();

        $callback = $this->routes[$method][$path] ?? false;

        if (is_string($callback)) {
          return $this->renderView($callback);
        }

        if ($callback) {
            if (is_array($callback)) {
                Application::$app->setController(new $callback[0]);
                $callback[0] = Application::$app->getController();
            }
            return $callback($this->request);
        }

        $this->response->set_status_code(404);
        return $this->renderView('_404');

    }

    public function renderView(string $view, $params = [])
    {
        $layoutContent = $this->getLayoutContent();
        $viewContent = $this->getViewContent($view, $params);
        return str_replace("{{ content }}", $viewContent, $layoutContent);
    }

    private function renderContent(string $viewContent)
    {
        $layoutContent = $this->getLayoutContent();
        return str_replace("{{ content }}", $viewContent, $layoutContent);
    }

    private function getLayoutContent()
    {
        $layout = Application::$app->getController()->layout;
        ob_start();
        include_once Application::$ROOT_DIR.'/views/layouts/' . $layout .'.php';
        return ob_get_clean();
    }

    private function getViewContent(string $view, $params = [])
    {
        if (!empty($params)) {
            foreach ($params as $key => $value) {
                $$key = $value;
            }
        }

        $name = 'Matthew De Jager';


        ob_start();
        include_once Application::$ROOT_DIR."/views/$view.php";
        return ob_get_clean();
    }


}
