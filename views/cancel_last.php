<?php
require_once '../controllers/TripController.php';

$controller = new TripController();
$success = $controller->cancelLastBooking();

if ($success) {
    echo "🔁 Last booking has been canceled.";
} else {
    echo "⚠️ No booking to cancel.";
}

echo "<br><a href='index.php'>← Back</a>";
?>
