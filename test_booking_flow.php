<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "=== Starting Booking Flow Test ===\n\n";

// 1. Define required classes if they don't exist
class Customer {
    public function __construct(public $id, public $name) {}
}

// 2. Load all dependencies with absolute paths
$baseDir = __DIR__;

require_once $baseDir . '/models/Trip.php';
require_once $baseDir . '/models/Flight.php';
require_once $baseDir . '/models/Meals.php';
require_once $baseDir . '/models/Accommodation.php';
require_once $baseDir . '/models/Commands/Command.php';
require_once $baseDir . '/models/Commands/BookTripCommand.php';
require_once $baseDir . '/models/BookingService.php';
require_once $baseDir . '/controllers/TripController.php';

echo "✔ All files loaded successfully\n";

// 3. Initialize components
echo "\nInitializing components...\n";
$controller = new TripController();
$customer = new Customer(1, "Test User");
echo "✔ Controller and customer ready\n";

// 4. Test service addition
echo "\nTesting service decorators:\n";
$services = ['flight', 'meals'];
foreach ($services as $service) {
    $controller->addService($service);
    echo "- Added $service service\n";
}

// 5. Test booking
echo "\nTesting booking creation:\n";
$bookingDate = date('Y-m-d', strtotime('+1 week'));
$bookingId = $controller->bookTrip($customer, $bookingDate);

if ($bookingId) {
    echo "✔ Booking created successfully\n";
    echo "Booking ID: $bookingId\n";
    echo "Trip Description: " . $controller->getTripDescription() . "\n";
    echo "Total Price: $" . $controller->getTripPrice() . "\n";
} else {
    die("✖ Booking failed!");
}

// 6. Test cancellation
echo "\nTesting cancellation:\n";
$result = $controller->cancelLastBooking();

if ($result) {
    echo "✔ Booking cancelled successfully\n";
    
    // Verify cancellation
    if (method_exists($controller, 'bookingExists')) {
        $exists = $controller->bookingExists($bookingId);
        echo "Booking still exists in system: " . ($exists ? 'YES' : 'NO') . "\n";
    }
} else {
    echo "✖ Cancellation failed!\n";
}

echo "\n=== Test Completed ===";