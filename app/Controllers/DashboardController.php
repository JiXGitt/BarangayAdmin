<?php

namespace App\Controllers;

use App\Core\BaseController;

// kailangan same ang pangalan ng class sa file name
class DashboardController extends BaseController
{

    public function index()
    {

        $params = [
            'name' => 'John Doe'
        ];

        return $this->render('index', $params);
    }
}