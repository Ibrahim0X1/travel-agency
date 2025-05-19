<?php
class UserModel {
    public function findByEmail($email) {
        $conn = Connection::getInstance()->getConnection();
        $stmt = $conn->prepare("SELECT id, name, password FROM user WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc(); // returns user data or null
    }
}