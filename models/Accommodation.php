<?php
require_once 'ServicesDecorator.php';

class Accommodation extends ServicesDecorator {
    private $service;

    public function __construct(ServicesDecorator $service) {
        $this->service = $service;
    }

    public function getDescription() {
        return $this->service->getDescription() . ", including Accommodation";
    }

    public function getPrice() {
        return $this->service->getPrice() + 150; // Add accommodation cost
    }
}
?>