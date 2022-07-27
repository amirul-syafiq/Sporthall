<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");

$active_group = 'default';
$query_builder = TRUE;
class db
{
    //Get Heroku ClearDB connection information

    private $cleardb_server;
    private $cleardb_username;
    private $cleardb_password;
    private $cleardb_db;

    function __construct() {
        $this->cleardb_server = parse_url(getenv("CLEARDB_DATABASE_URL"))["host"];
        $this->cleardb_username = parse_url(getenv("CLEARDB_DATABASE_URL"))["user"];
        $this->cleardb_password = parse_url(getenv("CLEARDB_DATABASE_URL"))["pass"];
        $this->cleardb_db = substr(parse_url(getenv("CLEARDB_DATABASE_URL"))["path"], 1);
      }

    // Connect
    public function connect()
    {
        $mysql_connect_str = "mysql:host=$this->cleardb_server;dbname=$this->cleardb_db";
        $dbConnection = new PDO($mysql_connect_str, $this->cleardb_username, $this->cleardb_password);
        $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbConnection;
    }
}