<?php
require_once '../models/ManualSignUp.php';
require_once '../models/FacebookSignUp.php';
require_once '../models/GoogleSignUp.php';

class SignUpController {
    private $strategy;

    public function setStrategy($strategy) {
        $this->strategy = $strategy;
    }

    public function signUp($data) {
        if (!$this->strategy) {
            throw new Exception("No sign-up strategy set.");
        }
        return $this->strategy->signUp($data);
    }

    public function handleRequest($data) {
        // Ensure the request method is POST
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            throw new Exception("Invalid request method.");
        }

        // Validate the 'method' field
        if (!isset($data['method'])) {
            throw new Exception("Sign-up method is required.");
        }

        $method = $data['method'];

        // Dynamically set the strategy based on the selected method
        switch ($method) {
            case 'manual':
            
                if (empty($data['name']) || empty($data['email']) || empty($data['password'])) {
                    return $data['name'].$data['email'];
                    throw new Exception("Name, email, and password are required for manual sign-up.");
                }
                $this->setStrategy(new ManualSignUp($data['name'], $data['email'], $data['password']));
                break;

            case 'facebook':
                if (empty($data['facebook_id']) || empty($data['facebook_token'])) {
                    throw new Exception("Facebook ID or facebook token is required for Facebook sign-up.");
                }
                $this->setStrategy(new FacebookSignUp());
                break;

            case 'google':
                if (empty($data['google_id']) || empty($data['google_token'])) {
                    throw new Exception("Google ID or google token is required for Google sign-up.");
                }
                $this->setStrategy(new GoogleSignUp());
                break;

            default:
                throw new Exception("Invalid sign-up method.");
        }

        // Perform the sign-up process
        return $this->signUp($data);
    }
}
?>