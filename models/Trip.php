<?php
require_once 'ServicesDecorator.php';
class Trip extends ServicesDecorator
{

    public function __construct() {
        $this->description = "Basic Trip";
        $this->price = 100; // Base price for the trip
}
}
?>