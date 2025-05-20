<?php
require_once '../controllers/TripController.php';

$customer = $_POST['customer'];
$bookingDate = $_POST['booking_date'];

$controller = new TripController();
$bookingId = $controller->bookTrip($customer, $bookingDate);

if ($bookingId) {
    echo "✅ Trip booked successfully! Booking ID: " . $bookingId;
} else {
    echo "❌ Failed to book trip.";
}

echo "<br><a href='index.php'>← Back</a>";
?>
