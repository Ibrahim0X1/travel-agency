<?php
require_once 'SignInInterface.php';
require_once 'Connection.php';

class SignInService implements SignInInterface {
    public function login($email, $password): ?array {
        $conn = Connection::getInstance()->getConnection();

        $stmt = $conn->prepare("SELECT id, password, name, blocked FROM user WHERE email = ?");
        if (!$stmt) {
            return ['error' => 'Query failed'];
        }

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows === 1) {
            $stmt->bind_result($userId, $hashedPassword, $userName, $isBlocked);
            $stmt->fetch();

            if (password_verify($password, $hashedPassword)) {
                return [
                    'user_id' => $userId,
                    'user_name' => $userName,
                    'blocked' => $isBlocked
                ];
            }
        }

        return null; // Invalid credentials
    }
}
?>
