<?php
class UserModel {
    private $id;
    private $name; 
    private $email;
    private $password;

    public function findByEmail($email) {
        $conn = Connection::getInstance()->getConnection();
        $stmt = $conn->prepare("SELECT id, name, password FROM user WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc(); // returns user data or null
    }

    // Create a new user
    public function create($name, $email, $password) {
        $conn = Connection::getInstance()->getConnection();
        $stmt = $conn->prepare("INSERT INTO user (name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $password);
        return $stmt->execute();
    }

    // Read user by ID
    public function findById($id) {
        $conn = Connection::getInstance()->getConnection();
        $stmt = $conn->prepare("SELECT id, name, email FROM user WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Update user info
    public function update($id, $name, $email) {
        $conn = Connection::getInstance()->getConnection();
        $stmt = $conn->prepare("UPDATE user SET name = ?, email = ? WHERE id = ?");
        $stmt->bind_param("ssi", $name, $email, $id);
        return $stmt->execute();
    }

    // Delete user
    public function delete($id) {
        $conn = Connection::getInstance()->getConnection();
        $stmt = $conn->prepare("DELETE FROM user WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>