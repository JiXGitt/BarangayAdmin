<?php
/** @var $model \App\Models\UserModel */
?>
<style>
    body {
        background-color: #f5f5f5;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        margin: 0;
    }

    .login-box {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        padding: 2rem;
        max-width: 400px;
        width: 90%;
    }

    .logo {
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 2.5rem;
        font-weight: bold;
        color: #ff3860;
        margin-bottom: 2rem;
    }

    .input {
        border-radius: 4px;
        border: 1px solid #ddd;
        padding: 0.75rem 1rem;
        width: 100%;
        margin-bottom: 1.5rem;
        transition: box-shadow 0.3s ease-in-out;
    }

    .input:focus {
        box-shadow: 0 0 0 2px #ff3860;
    }

    .login-btn {
        background-color: #ff3860;
        color: #fff;
        border: none;
        border-radius: 4px;
        padding: 0.75rem 1rem;
        width: 100%;
        cursor: pointer;
        transition: background-color 0.3s ease-in-out;
    }

    .login-btn:hover {
        background-color: #f06292;
    }

    .forgot-password {
        text-align: right;
    }

    .signup-link {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 1rem;
    }

    .signup-link a {
        color: #ff3860;
        text-decoration: none;
        margin-left: 0.5rem;
    }

    .signup-link a:hover {
        text-decoration: underline;
    }
</style>

<div class="login-box">
    <div class="logo">
        Barangay Palico 4 Admin
    </div>
    <?php $form = App\Core\Form\Form::begin('', 'post') ?>
        <?php echo $form->field($model, 'username') ?>
        <?php echo $form->field($model, 'password')->passwordField() ?>

        <div class="forgot-password">
            <a href="#">Forgot password?</a>
        </div>

        <button class="login-btn" type="submit">Log In</button>
    <?php App\Core\Form\Form::end() ?>
</div>