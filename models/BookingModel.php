<?php
// Class to handle Bookings
class Booking {
    public $id;
    public $customer;
    public $travelPackage;
    public $bookingDate;

    public function __construct($id, $customer, $travelPackage, $bookingDate) {
        $this->id = $id;
        $this->customer = $customer;
        $this->travelPackage = $travelPackage;
        $this->bookingDate = $bookingDate;
    }

    public function getBookingDetails() {
        return "Booking ID: $this->id, Customer: {$this->customer->name}, Package: {$this->travelPackage->name}, Date: $this->bookingDate";
    }
}

?>