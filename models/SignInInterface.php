<?php
interface SignInInterface
{
    public function login($email, $password): ?array;
}
?>