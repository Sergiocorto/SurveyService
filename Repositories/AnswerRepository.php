<?php


namespace Repositories;


use Interfaces\RepositoryInterface;
use Models\Db;
use PDO;

class AnswerRepository implements RepositoryInterface
{
    private $conn;
    public function __construct()
    {
        $this->conn = (new Db())::getConnection();
    }

    public function getAll($surveyId)
    {
        try {
            $sql = "SELECT * FROM answers WHERE surveyId = :surveyId";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':surveyId', $surveyId);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e)
        {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function add($answers)
    {
        try {
            $placeholders = implode(',', array_fill(0, count($answers), '(?, ?, ?)'));
            $values = array();
            foreach ($answers as $answer) {
                $values[] = $answer['title'];
                $values[] = $answer['numberOfVotes'];
                $values[] = $answer['surveyId'];
            }
            $stmt = $this->conn->prepare("INSERT INTO answers (title, numberOfVotes, surveyId) VALUES $placeholders");
            $stmt->execute($values);
            return true;
        } catch (\PDOException $e)
        {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function delete($surveyId)
    {
        try {
            $sql = "DELETE FROM answers WHERE surveyId = :surveyId";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':surveyId', $surveyId);
            $stmt->execute();
            return $stmt->execute();
        } catch (\PDOException $e)
        {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function edit($answers)
    {
        try {
            foreach ($answers as $answer)
            {
                $sql = "UPDATE answers SET title = :title WHERE id = :id";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':title', $answer['title']);
                $stmt->bindParam(':id', $answer['id']);
                $stmt->execute();
            }
            return true;
        } catch (\PDOException $e)
        {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
}