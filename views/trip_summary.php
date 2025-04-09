<?php
require_once '../controllers/TripController.php';

// Initialize the controller
$controller = new TripController();

// Check which services were selected and add them to the trip
if (isset($_POST['services'])) {
    foreach ($_POST['services'] as $service) {
        $controller->addService($service);
    }
}

// Get the trip details
$description = $controller->getTripDescription();
$price = $controller->getTripPrice();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trip Summary</title>
</head>
<body>
    <h1>Your Trip Summary</h1>
    <p><strong>Description:</strong> <?php echo $description; ?></p>
    <p><strong>Total Price:</strong> $<?php echo $price; ?></p>
    <a href="trip_form.php">Go Back</a>
</body>
</html>