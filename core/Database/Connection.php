<?php

namespace Core\Database;

use PDO;
use PDOException;

class Connection extends PDO
{
	protected string $host = 'localhost';
	protected string $port = '3310';
	protected string $user = 'root';
	protected string $password = 'fr33pass';
	protected string $database = 'pengaduan_masyarakat';

	public function __construct()
	{
		try {
			parent::__construct("mysql:host=$this->host:$this->port;dbname=$this->database", $this->user, $this->password);

			$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
}