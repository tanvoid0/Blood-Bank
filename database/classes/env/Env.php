<?php
include_once "EnvType.php";

class Env {
    public $host;
    public $username;
    public $password;
    public $database;
    public $port;

    public function __construct(EnvType $_type) {
        if($_type == EnvType::Production) {
            $this->host = "localhost";
//            $this->host = "server315.web-hosting.com";
            $this->username = "tanvjsbq_user";
            $this->password = "f^^jyxPB?5Wm";
            $this->database = "tanvjsbq_bb";
            $this->port = "2083";
        } else {
            $this->host = "localhost";
            $this->username = "root";
            $this->password = "";
            $this->database = "bb";
            $this->port = "3306";
        }
    }
}