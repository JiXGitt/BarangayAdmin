<?php

namespace App\Core;

class GlobalMiddleware
{
    public static function checkAuth()
    {
        if (!Application::$app->session->get('user')) {
            Application::$app->response->redirect('/login');
        }
    }

    public static function checkGuest()
    {
        if (Application::$app->session->get('user')) {
            Application::$app->response->redirect('/');
        }
    }

    public static function checkAdmin()
    {
        if (Application::$app->session->get('user')->role !== 'admin') {
            Application::$app->response->redirect('/');
        }
    }
}