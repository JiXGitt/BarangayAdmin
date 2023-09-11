<?php

namespace App\Core;



class Application
{

    // title
    public string $layout = 'main';
    public Router $router;
    public Request $request;
    public Response $response;
    public Session $session;
    public ?BaseController $controller = null;

    // ROot directory
    public static string $ROOT_DIR;

    public Database $db;
    public static Application $app;

    public function __construct(Database $db)
    {
        self::$app = $this; // this is a singleton pattern wherein we can access the application class and its properties from anywhere in the application
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);
        $this->controller = new BaseController();
        $this->db = $db;

        
    }

    public function getController(): BaseController
    {
        return $this->controller;
    }

    public function setController($controller)
    {
        $this->controller = $controller;
    }

    public function run()
    {
        $this->router->resolve();
    }

    public function login(BaseModel $user)
    {
        $this->session->set('user', $user);
        return true;
    }

    public function logout()
    {
        $this->session->remove('user');
    }

    public static function isGuest()
    {
        return !self::$app->session->get('user');
    }

    public static function isAdmin()
    {
        return self::$app->session->get('user')->role === 'admin';
    }

}