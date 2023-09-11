<?php

namespace App\Core;

class Router
{

    protected array $routes = [];
    public Request $request;
    public Response $response;


    public static string $title = '{{title}}';

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    // public function get($path, $callback)
    // {
    //     $this->routes['get'][$path] = $callback;
    // }

    // use chain routes in an unerror way
    public function get($path, $callback): self
    {
        $this->routes['get'][$path] = $callback;

        return $this;
    }

    public function post($path, $callback): self
    {
        $this->routes['post'][$path] = $callback;

        return $this;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->method();

        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            $this->response->setStatusCode(404);
            // output the Not Found page
            return $this->render("404");
        }

        if (is_string($callback)) {
            return $this->render($callback);
        }

        if (is_array($callback)) {
            Application::$app->controller = new $callback[0]();
            $callback[0] = Application::$app->controller;
        }

        // this is used to call the callback function
        return call_user_func($callback, $this->request, $this->response);

    }

    public function render($page, $params = [])
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($page, $params);

        echo str_replace("{{content}}", $viewContent, $layoutContent);
    }



    // this method is used to render the view only and not the layout and it returns the view content
    protected function renderOnlyView($view, $params)
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include_once TEMPLATE_PATH . "/$view.php";
        return ob_get_clean();
    }

    // this method is used to render the layout and it returns the layout content from the buffer
    protected function layoutContent()
    {
        $layout = Application::$app->layout;

        if (Application::$app->controller){
            $layout = Application::$app->controller->layout;
        }


        ob_start();
        include_once LAYOUT_PATH . "/$layout.php";
        return ob_get_clean();
    }


    public static function replaceTitle($title)
    {
        return str_replace("{{title}}", $title, self::$title);
    }
}