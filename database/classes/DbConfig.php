<?php
include_once "env/Env.php";

class DbConfig
{
	protected mysqli $connection;

	public function __construct()
	{
		// Connection
		if (!isset($this->connection)) {
			$env = new Env(EnvType::Production);;
			$this->connection = new mysqli($env->host, $env->username, $env->password, $env->database, $env->port);

			if (!$this->connection) {
				echo 'Cannot connect to database server';
				exit;
			}
		}

		return $this->connection;
	}
}





?>
