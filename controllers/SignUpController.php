<?php
require_once '../models/ManualSignUp.php';
require_once '../models/FacebookSignUp.php';
require_once '../models/GoogleSignUp.php';
require_once '../models/Connection.php';

class SignUpController {
    private $strategy;

    // Set the strategy dynamically
    public function setStrategy($strategy) {
        $this->strategy = $strategy;
    }

    // Perform the sign-up process
    public function signUp($data) {
        if (!$this->strategy) {
            throw new Exception("No sign-up strategy set.");
        }

        // Execute the strategy's sign-up logic
        $result = $this->strategy->signUp($data);

        // Save user data to the database
        $this->saveUserToDatabase($data);

        return $result;
    }

    // Save user data to the database
    private function saveUserToDatabase($data) {
        $conn = Connection::getInstance()->getConnection();

        // Prepare the SQL query
        $query = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);

        // Hash the password if it exists (manual sign-up)
        $password = isset($data['password']) ? password_hash($data['password'], PASSWORD_BCRYPT) : null;

        // Bind parameters and execute the query
        $stmt->bind_param("sss", $data['name'], $data['email'], $password);

        if (!$stmt->execute()) {
            throw new Exception("Error saving user to database: " . $stmt->error);
        }

        $stmt->close();
    }
}
?>