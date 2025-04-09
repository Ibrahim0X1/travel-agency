<?php
require_once 'ServicesDecorator.php';

class Meals extends ServicesDecorator {
    private $service;

    public function __construct(ServicesDecorator $service) {
        $this->service = $service;
    }

    public function getDescription() {
        return $this->service->getDescription() . ", including Meals";
    }

    public function getPrice() {
        return $this->service->getPrice() + 50; // Add meals cost
    }
}
?>