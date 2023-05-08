<?php


namespace Models;


use http\Client\Response;
use Repositories\UserRepository;

class Auth
{
    private $userRepository;

    static public function login($data): string
    {
        $user = (new UserRepository())->getUserByEmail($data['email']);

        if (!$user) {
            echo "Користувача з таким емейлом не знайдено";
            exit;
        }

        if ($data['password'] != $user['password']) {
            echo "Невірний пароль";
            die();
        }
        session_start();
        $_SESSION['user'] = $user;
        header("Location: /myCabinet");
        exit;
    }

    static public function logout()
    {
        session_unset();
        session_destroy();
        setcookie(session_name(), '', 0, '/');
        header("Location: /auth/login");
        exit;
    }

    static public function registration($data)
    {
        (new UserRepository())->add($data);
        self::login($data);
    }
}