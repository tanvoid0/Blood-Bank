<?php
include_once 'DbConfig.php';

class Crud extends DbConfig
{
	public function __construct(){
		parent::__construct();
	}

	public function img($img){
		return "data:image;base64,'$img'";
	}

	public function rank($id){
		$query = "SELECT rank from member WHERE id = $id";
		$result = $this->connection->query($query);
		if(!$result){
			return false;
		}
		$row = $result->fetch_assoc();
		return $row;
	}

	public function select($table){
		$query = "SELECT * FROM ".$table;
		$result = $this->connection->query($query);
		if (!$result){
			return $result;
		}
		$rows = array();

		while ($row = $result->fetch_assoc()){
			$rows[] = $row;
		}
		return $rows;
	}

	public function insert($table, $into, $values){
		$query = "INSERT INTO ".$table." (".$into.") VALUES (".$values.")";
		$result = $this->connection->query($query);
		if(!$result){
			echo 'Error: Cannot Insert The data';
			return false;
		} else {
			return true;
		}
	}

	public function search($table, $column, $id){
		$query = "SELECT * FROM $table WHERE $column=$id";
		$result = $this->connection->query($query);

		if(!$result){
			echo 'Error: Cannot Search The data';
			return false;
		}
        $row = $result->fetch_assoc();

		return $row;
	}
	public function getData($query){
		$result = $this->connection->query($query);

		if ($result == false) {
			return false;
		}

		$rows = array();

		while ($row = $result->fetch_assoc()){
			$rows[] = $row;
		}

		return $rows;
	}

	public function execute($query){
		$result = $this->connection->query($query);

		if ($result == false) {
			echo 'Error: cannot execute the command: '.$query;
			return false;
		} else {
			return true;
		}
	}

	public function delete($id, $table){
		$query = "DELETE FROM $table WHERE id = $id";

		$result = $this->connection->query($query);

		if ($result == false) {
			echo 'Error: cannot delete id ' . $id . ' from table ' . $table;
			return false;
		} else {
			return true;
		}
	}

	public function escape_string($value){
		return $this->connection->real_escape_string($value);
	}

	public function login($table, $user, $password){
		$query = "SELECT * FROM ".$table." WHERE username='". $user . "' and password = '". $password."'";
		$result = $this->connection->query($query);

		if(!$result){
			return false;
		}
		$row = $result->fetch_assoc();

		return $row;
	}


}
?>
