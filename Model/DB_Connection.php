<?php
namespace Model;
use PDO;
class DB_Connection
{
public $conn;
public $dns;
public $user;
public $password;

public function __construct($dns,$user,$password)
{
    $this->dns = $dns;
    $this->user = $user;
    $this->password = $password;
    $this->conn = new PDO($this->dns,$this->user,$this->password);
}
public function connect(){
    return $this->conn;
}
}