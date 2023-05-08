<?php

namespace Repositories;

use Models\Db;

class UserRepository
{
    private $conn;
    public function __construct()
    {
        $this->conn = (new Db())::getConnection();
    }
    public function add($user)
    {
        try {
            $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
            $stmt = $this->conn->prepare($sql);

            $stmt->execute($user);
        } catch (\PDOException $e)
        {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }

    }

    public function getUserByEmail($email)
    {
        try {
            $sql = "SELECT * FROM users WHERE email = ? LIMIT 1";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$email]);

            $user = $stmt->fetch();
            return $user;
        } catch (\PDOException $e)
        {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }

    }
}