<?php

require_once 'Connection.php'; // Assuming you have a Connection class for database connection

class ManualSignUp {
    private $name;
    private $email;
    private $password;

    public function __construct($name, $email, $password) {
        $this->name = $name;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }

    public function register() {
        $conn = Connection::getInstance()->getConnection();

        // Use a prepared statement to insert data
        $sql = "INSERT INTO user (name, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            // Bind the variables to the prepared statement
            $stmt->bind_param("sss", $this->name, $this->email, $this->password);

            // Execute the statement
            if ($stmt->execute()) {
                echo "User registered successfully!";
            } else {
                echo "Error: " . $stmt->error;
            }

            // Close the statement
            $stmt->close();
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
// $SIGNuP= new ManualSignUp('AAA','AAA','AAA'); 
// $SIGNuP->register();
?>