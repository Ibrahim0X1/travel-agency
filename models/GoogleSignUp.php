<?php
require_once 'SignUpStrategy.php';
require_once 'Connection.php';

class GoogleSignUp implements SignUpStrategy {
    public function signUp($data) {
        $conn = Connection::getInstance()->getConnection();

        // Prepare the SQL query
        $query = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);

        // Google sign-up doesn't require a password, so set it to NULL
        $password = null;

        // Bind parameters and execute the query
        $stmt->bind_param("sss", $data['name'], $data['email'], $password);

        if ($stmt->execute()) {
            return "User signed up using Google with name: " . $data['name'] . " and email: " . $data['email'];
        } else {
            throw new Exception("Error signing up with Google: " . $stmt->error);
        }

        $stmt->close();
    }
}
?>