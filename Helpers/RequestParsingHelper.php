<?php

namespace Helpers;

class RequestParsingHelper
{
    public static function getRequestParts(): array
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
}