<?php

class Connection extends PDO
{
    const HOSTNAME = "10.14.93.20";
    const USERNAME = "root";
    const PASSWORD = "123456";
    const DBNAME = "jobsmart";

    private $conn;

    public function __construct()
    {
        $this->conn = parent::__construct(
            "mysql:dbname=" . Connection::DBNAME . ";host=" . Connection::HOSTNAME . ";charset=utf8",
            Connection::USERNAME,
            Connection::PASSWORD
        );
    }

    private function setParams($statement, $parameters = array())
    {
        foreach ($parameters as $key => $value) {

            $this->bindParam($statement, $key, $value);
        }
    }

    private function bindParam($statement, $key, $value)
    {
        $statement->bindParam($key, $value);
    }

    public function query($rawQuery, $params = array())
    {
        $stmt = $this->prepare($rawQuery);
        $this->setParams($stmt, $params);
        $stmt->execute();
    }

    public function insert($rawQuery)
    {
        try {
            $stmt = $this->prepare($rawQuery);
            $stmt->execute();
            return $stmt->errorInfo();
            // return $stmt->rowCount();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function select($rawQuery, $params = array()): array
    {
        $stmt = $this->prepare($rawQuery);
        $this->setParams($stmt, $params);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}