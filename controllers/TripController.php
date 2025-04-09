<?php
require_once '../models/Trip.php';
require_once '../models/Flight.php';
require_once '../models/Meals.php';
require_once '../models/Accommodation.php';

class TripController {
    private $trip;

    public function __construct() {
        // Initialize the base trip
        $this->trip = new Trip();
    }

    public function addService($service) {
        // Dynamically apply the selected service decorators
        switch ($service) {
            case 'flight':
                $this->trip = new Flight($this->trip);
                break;
            case 'meals':
                $this->trip = new Meals($this->trip);
                break;
            case 'accommodation':
                $this->trip = new Accommodation($this->trip);
                break;
        }
    }

    public function getTripDescription() {
        return $this->trip->getDescription();
    }

    public function getTripPrice() {
        return $this->trip->getPrice();
    }
}
?>