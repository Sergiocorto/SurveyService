<?php

namespace Helpers;

class RequestParsingHelper
{
    static public function getRequestParts(): array
    {
        $requestParts = [
            'urlParts' => explode('/', trim($_SERVER['REQUEST_URI'], '/')),
            'requestMethod' => $_SERVER['REQUEST_METHOD'],
        ];
        if (!isset($requestParts['urlParts'][1])) $requestParts['urlParts'][1] = '/';
        if($_SERVER['REQUEST_METHOD'] != 'GET')
        {
            $json = file_get_contents('php://input');
            $requestParts['body'] = json_decode($json, true);
        }else{
            $requestParts['params'] = $_GET;
        }
    
        return $requestParts;
    }

    static public function getUserIdInSession()
    {
        session_start();
        if(isset($_SESSION['user'])) return $id = $_SESSION['user']['id'];
        header('Location: /auth/login');

    }
}