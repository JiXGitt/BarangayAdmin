<?php


namespace App\Controllers;

use App\Core\Application;
use App\Core\BaseController;
use App\Core\Request;
use App\Core\Response;
use App\Forms\LoginForm;
use App\Models\UserModel;


class AuthController extends BaseController
{
    public LoginForm $loginForm;

    public function login(Request $request, Response $response)
    {
        $loginForm = new LoginForm();

        if ($request->isPost()) {
            $loginForm->loadData($request->getBody());
            if ($loginForm->validate() && $loginForm->loginForm()) {
                // redirect to the home page
                $response->redirect('/dashboard');
                return true;
            }
        }

        // echo '<pre>';
        // var_dump(Application::$app->session->get('user'));
        // echo '</pre>';

        return $this->render('login', [
            'model' => $loginForm,
        ]);
    }

    public function register(Request $request, Response $response)
    {
        $userModel = new UserModel();
        if ($request->isPost()) {
            $userModel->loadData($request->getBody());

            if ($userModel->validate() && $userModel->save()) {
                $response->redirect('/login');
                return true;
            }
            
            return $this->render('register', [
                'model' => $userModel
            ]);
        }  

        return $this->render('register', [
            'model' => $userModel
        ]);
    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('/login');
    }
}