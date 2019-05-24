<?php

class Connection extends PDO
{
	const HOSTNAME = "127.0.0.1";
	const USERNAME = "root";
	const PASSWORD = "";
	const DBNAME = "v2";

	private $conn;

	public function __construct()
	{
		try {

			$this->conn = new PDO(
				"mysql:dbname=" . Connection::DBNAME . ";host=" . Connection::HOSTNAME,
				Connection::USERNAME,
				Connection::PASSWORD
			);
		} catch (PDOException $e) {
			throw $e->getMessage();
		}
	}

	private function setParams($statement, $parameters = array())
	{
		foreach ($parameters as $key => $value) {
			$this->setParam($statement, $key, $value);
		}
	}

	private function setParam($statement, $key, $value)
	{
		$statement->bindParam($key, $value);
	}
	public function query($rawQuery, $params = array())
	{
		$stmt = $this->conn->prepare($rawQuery);
		$this->setParams($stmt, $params);
		$stmt->execute();
		return $stmt;
	}
	public function select($rawQuery, $params = array()): array
	{
		$stmt = $this->query($rawQuery, $params);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}