<?php

namespace App\Forms;

use App\Core\Application;
use App\Core\BaseModel;
use App\Models\UserModel;

class LoginForm extends BaseModel
{

    public string $username = '';
    public string $password = '';

    public UserModel $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function loginForm()
    {
        $user = $this->userModel->findOne(['username' => $this->username]);
        if (!$user) {
            $this->addError('username', 'User does not exist with this username');
            return false;
        }

        if (!password_verify($this->password, $user->password)) {
            $this->addError('password', 'Password is incorrect');
            return false;
        }

        // var dump session user
        // var_dump(Application::$app->session->get('user'));

        return Application::$app->login($user);
    }
    public function rules(): array
    {
        return [
            'username' => [self::RULE_REQUIRED, self::RULE_USERNAME],
            'password' => [self::RULE_REQUIRED],
        ];
    }
}