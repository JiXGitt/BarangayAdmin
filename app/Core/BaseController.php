<?php

namespace App\Core;

class BaseController  
{
    // the main layout is the default layout if no layout is specified
    public string $layout = 'main';


    // create a render method to render the view
    public function render($view, $params = [])
    {
        // we can access the Application class using the static keyword app property with the router property because it is in the "same namespace and directory" without creating a new instance of the Application class
        return Application::$app->router->render($view, $params);
    }

    public function setLayout($layout)
    {
        $this->layout = $layout;
    }


}