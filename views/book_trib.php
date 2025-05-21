<?php
require_once __DIR__ . '/../models/BookingService.php';
require_once __DIR__ . '/../models/Commands/BookTripCommand.php';



$destination = $_GET['destination'] ?? '';
$successMessage = '';
$errorMessage = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customer = trim($_POST['customer'] ?? '');
    $destination = trim($_POST['destination'] ?? '');
    $booking_date = trim($_POST['booking_date'] ?? '');

    if ($customer && $destination && $booking_date) {
        try {
            $bookingService = new BookingService();
            $command = new BookTripCommand($bookingService, $customer, $destination, $booking_date);
            $command->execute();
            $successMessage = "✅ Trip booked successfully! Booking ID: " . $command->getBookingId();
        } catch (Exception $e) {
            $errorMessage = "❌ Error while booking: " . $e->getMessage();
        }
    } else {
        $errorMessage = "❌ All fields are required!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book a Trip</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fefaf6;
            margin: 40px;
        }
        .form-container {
            max-width: 500px;
            background: #fff;
            padding: 28px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.15);
            margin: auto;
        }
        h2 {
            color: #b14200;
            text-align: center;
        }
        label {
            display: block;
            margin-top: 14px;
            font-weight: bold;
        }
        input[type="text"], input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        button {
            margin-top: 20px;
            width: 100%;
            padding: 12px;
            background-color: #b14200;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1rem;
        }
        button:hover {
            background-color: #8e3200;
        }
        .message {
            margin-top: 20px;
            padding: 12px;
            border-radius: 6px;
        }
        .success {
            background-color: #e1f7e7;
            color: #257942;
        }
        .error {
            background-color: #fdecea;
            color: #a52a2a;
        }
    </style>
</head>
<body>
<div class="form-container">
    <h2>Book Your Trip</h2>

    <?php if ($successMessage): ?>
        <div class="message success"><?php echo $successMessage; ?></div>
    <?php elseif ($errorMessage): ?>
        <div class="message error"><?php echo $errorMessage; ?></div>
    <?php endif; ?>

    <form method="POST">
        <label for="customer">Your Name:</label>
        <input type="text" name="customer" id="customer" required>

        <label for="destination">Destination:</label>
        <input type="text" name="destination" id="destination" readonly value="<?php echo htmlspecialchars($destination); ?>">

        <label for="booking_date">Booking Date:</label>
        <input type="date" name="booking_date" id="booking_date" required>

        <button type="submit">Confirm Booking</button>
    </form>
</div>
</body>
</html>
