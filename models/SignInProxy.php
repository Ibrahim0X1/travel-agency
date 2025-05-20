<?php
require_once 'SignInInterface.php';

class SignInProxy implements SignInInterface {
    private $realService;

    public function __construct(SignInInterface $realService) {
        $this->realService = $realService;
    }

    public function login($email, $password): ?array {
        $result = $this->realService->login($email, $password);

        if (is_array($result) && isset($result['blocked']) && (int)$result['blocked'] === 1) {
            return ['error' => 'blocked'];
        }

        return $result;
    }
}
?>
