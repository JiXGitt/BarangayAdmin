<?php

namespace App\Config;

require_once __DIR__ . '/env.php';

use PDO;

// class DatabaseConnection
// {
// 	private $pdo;

// 	public function __construct(
// 		$host = $_ENV['DB_HOST'],
// 		$dbname = DB_NAME,
// 		$username = DB_USER,
// 		$password = DB_PASSWORD
// 	) {
// 		try {
// 			$this->pdo = new PDO(
// 				'mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'],
// 				$_ENV['DB_USER'],
// 				$_ENV['DB_PASS']
// 			);

// 			$this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
// 			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// 			// Other PDO configuration options can be set here if needed.
// 		} catch (\PDOException $e) {
// 			die("Connection failed: " . $e->getMessage());
// 		}
// 	}

// 	public function fetchDataFromTable()
// 	{
// 		$stmt = $this->pdo->query('SELECT * FROM my_table');
// 		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
// 		return $data;
// 	}

// 	// ... Other methods for interacting with the database using PDO
// }


 class DBConnection
{
// create a database connection using PDO that uses psr-4 standard for autoloading classes
// this class will be used in the index.php file
	private $pdo;

	public function __construct()  
	{
		try {
			$this->pdo = new PDO(
				'mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'],
				$_ENV['DB_USER'],
				$_ENV['DB_PASS']
			);

			$this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		} catch (\PDOException $e) {
			die("Connection failed: " . $e->getMessage());
		}

	}
	// ,,, Other PDO configuration options can be set here if needed.
}

// class Database
// {
// 	private $pdo;

// 	public function __construct($host, $username, $password, $database, $charset = 'utf8')
// 	{
// 		$dsn = "mysql:host={$host};dbname={$database};charset={$charset}";
// 		$this->pdo = new PDO($dsn, $username, $password);
// 		$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// 	}

// 	public function getConnection()
// 	{
// 		return $this->pdo;
// 	}
// }