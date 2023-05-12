<?php


namespace Repositories;


use Interfaces\RepositoryInterface;
use Models\Db;
use PDO;

class SurveyRepository implements RepositoryInterface
{
    private $conn;
    public function __construct()
    {
        $this->conn = (new Db())::getConnection();
    }

    public function getAll($userId)
    {
        try {
            $sql = "SELECT * FROM surveys WHERE userId = :user_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e)
        {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function add($data)
    {
        try {
            $sql = "INSERT INTO surveys (title, userId, status) VALUES (:title, :userId, :status)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($data);

            return $this->conn->lastInsertId();
        } catch (\PDOException $e)
        {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function getById($id)
    {
        try {
            $sql = "SELECT * FROM surveys WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (\PDOException $e)
        {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function getSurveysByDate($userId)
    {
        try {
            $sql = "SELECT * FROM surveys WHERE userId = :user_id ORDER BY created_at";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e)
        {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function getSurveysByTitle($userId)
    {
        try {
            $sql = "SELECT * FROM surveys WHERE userId = :user_id ORDER BY title";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e)
        {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function getSurveysByPublished($userId)
    {
        try {
            $sql = "SELECT * FROM surveys WHERE userId = :user_id AND status = 'published'";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e)
        {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function getSurveysByUnpublished($userId)
    {
        try {
            $sql = "SELECT * FROM surveys WHERE userId = :user_id AND status = 'unpublished'";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e)
        {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function delete($id)
    {
        try {
            $sql = 'DELETE FROM surveys WHERE surveys.id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e)
        {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
}