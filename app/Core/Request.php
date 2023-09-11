<?php

namespace App\Core;

class Request{


    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');

        if($position === false){
            return $path;
        }

        return substr($path, 0, $position);
    }

    /**
     * Summary of method
     * @return string
     */
    public function method()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function isGet()
    {
        return $this->method() === 'get';
    }

    public function isPost()
    {
        return $this->method() === 'post';
    }

    public function getBody()
    {
        $body = [];

        // check if the request method is post
        if($this->method() === 'post'){
            // loop through the post request
            foreach($_POST as $key => $value){
                // assign the value to the body array
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        // check if the request method is get
        if($this->method() === 'get'){
            // loop through the get request
            foreach($_GET as $key => $value){
                // assign the value to the body array
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        return $body;

    }
}