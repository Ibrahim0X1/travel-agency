<?php
require_once 'ServicesDecorator.php';

class Flight extends ServicesDecorator {
    private $service;

    public function __construct(ServicesDecorator $service) {
        $this->service = $service;
    }

    public function getDescription() {
        return $this->service->getDescription() . ", including Flight";
    }

    public function getPrice() {
        return $this->service->getPrice() + 200; // Add flight cost
    }
}
?>