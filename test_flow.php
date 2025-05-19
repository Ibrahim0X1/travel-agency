<?php
require_once __DIR__ . '/models/Connection.php';
require_once __DIR__ . '/models/TravelPackageModel.php';
require_once __DIR__ . '/models/BookingModel.php';
require_once __DIR__ . '/models/BookingService.php';
require_once __DIR__ . '/models/Commands/Command.php';
require_once __DIR__ . '/models/Commands/BookTripCommand.php';

// Mock Customer Class (for test purposes)
class Customer {
    public $name;
    public function __construct($name) {
        $this->name = $name;
    }
}

// Initialize services
$bookingService = new BookingService();
$customer = new Customer("John Doe");
$packageId = 1; // Make sure this ID exists in your database
$travelPackage = new TravelPackage($packageId);
$bookingDate = date("Y-m-d");

// Create and execute booking command
$command = new BookTripCommand($bookingService, $customer, $travelPackage, $bookingDate);

echo "Booking Trip...\n";
if ($command->execute()) {
    echo "✅ Booking successful! Booking ID: " . $command->getBookingId() . "\n";
} else {
    echo "❌ Booking failed!\n";
}

// Undo the booking
echo "Cancelling booking...\n";
if ($command->undo()) {
    echo "✅ Booking cancelled successfully.\n";
} else {
    echo "❌ Failed to cancel booking.\n";
}
