<?php
require_once __DIR__ . '/../models/Trip.php';
require_once __DIR__ . '/../models/Flight.php';
require_once __DIR__ . '/../models/Meals.php';
require_once __DIR__ . '/../models/Accommodation.php';

require_once __DIR__ . '/../models/Commands/Command.php';
require_once __DIR__ . '/../models/Commands/BookTripCommand.php';
require_once __DIR__ . '/../models/BookingService.php';
require_once __DIR__ . '/../models/TravelPackageModel.php';

class TripController {
    private $trip;
    private $commandHistory = [];
    private $bookingService;

    public function __construct() {
        // Initialize the base trip
        $this->trip = new Trip();
        $this->bookingService = new BookingService();
    }

    public function bookTrip($customer, $bookingDate): string {
        $command = new BookTripCommand(
            $this->bookingService,
            $customer,
            $this->trip,
            $bookingDate
        );

        if ($command->execute()) {
            $this->commandHistory[] = $command;
            return $command->getBookingId();
        }
        return false;
    }

    public function cancelLastBooking(): bool {
        if (!empty($this->commandHistory)) {
            $command = array_pop($this->commandHistory);
            return $command->undo();
        }
        return false;
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