<?php
abstract class ServicesDecorator {
    protected $description = "Undefined Service";
    protected $price = 0;

    public function getDescription() {
        return $this->description;
    }

    public function getPrice() {
        return $this->price;
    }
}
?>