<?php
require_once 'SignUpStrategy.php';
require_once 'Connection.php';

class FacebookSignUp implements SignUpStrategy {
    public function signUp($data) {
        $conn = Connection::getInstance()->getConnection();

        $query = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);

        $password = null;

        $stmt->bind_param("sss", $data['name'], $data['email'], $password);

        if ($stmt->execute()) {
            return "User signed up using Facebook with name: " . $data['name'] . " and email: " . $data['email'];
        } else {
            throw new Exception("Error signing up with Facebook: " . $stmt->error);
        }

        $stmt->close();
    }
}
?>