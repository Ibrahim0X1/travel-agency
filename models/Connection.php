<?php

use Dba\Connection as DbaConnection;

class Connection {
    private $host = "localhost";
    private $db_name = "unique_destination_website";
    private $username = "root";
    private $password = "";
    private $conn;
    public static $instance = null;

    public function __construct()
    {

        if ($this->conn === null) {
            try {
                $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
                if ($this->conn->connect_error) {
                    throw new Exception("Connection failed: " . $this->conn->connect_error);
                }
            } catch (Exception $e) {
                error_log("Connection error: " . $e->getMessage()); // Log the error for debugging
                return null; // Return null if the connection fails
            }
        }
    }
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Connection();
        }
        return self::$instance;
    }
    public function getConnection() {
        
        return $this->conn;
        
    }
}
// Usage example
//  $a=Connection::getInstance();
//  $x=Connection::getInstance();
// $conn=$a->getConnection();
// $conn2=$x->getConnection();
// if($conn === $conn2) {
//     echo "Same connection instance";
// } else {
//     echo "Different connection instances";
// }
?>