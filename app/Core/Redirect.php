<?php

// comply with the ps4 autoloader standard
namespace App\Core;

class Redirect1{

    public function __construct()
    {
        echo 'hello from redirect';
    }

}

class Redirect{

    public function __construct()
    {
        echo 'hello from redirect';
    }


    // redirect to a specific page
    public static function to($path)
    {
        header('Location: ' . $path);
    }

    // redirect to the same page
    public static function toSelf($extra_url_param = null)
    {
        header('Location: ' . $_SERVER['PHP_SELF'] . $extra_url_param);
    }

    public static function redirect_authenticated_user($user, $path)
    {
        if (isset($user)) {
            header('Location: ' . $path);
        }
    }

    public static function redirect_not_authenticated_user(
        $user,
        $path
    ) {

        if (!isset($user)) {
            header('Location: ' . $path);
        }
    }

    public static function redirect_to_self($extra_url_param = null)
    {
        header('Location: ' . $_SERVER['PHP_SELF'] . $extra_url_param);
    }

    public static function redirect_auth_user_level($field, $user_level, $path)
    {

        if (isset($_SESSION['user'])) {

            if ($field === $user_level) {
                header('Location:' . $path);
            }
        }
    }

    public static function redirect_with_params($path, $params)
    {
        $url = $path . '?' . http_build_query($params);
        header('Location: ' . $url);
    }


    public static function redirect_not_admin()
    {

        // put a message saying you are not allowed to access this page
        if (!isset($_SESSION['user']) || $_SESSION['user']['user_level'] !== 1) {
            echo "You are not allowed to access this page";
            exit();
        }
    }


    // check if the IP address match the whitelist. Put a message saying your allowed to access this page
    function check_ip_address($ip_address, $whitelist)
    {
        if (!in_array($ip_address, $whitelist)) {
            echo "You are not allowed to access this page";
            exit();
        }
    }

}

