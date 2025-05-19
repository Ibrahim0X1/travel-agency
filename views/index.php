<!DOCTYPE html>
<html>
<head>
    <title>Book a Trip</title>
</head>
<body>
    <h2>Book a New Trip</h2>
    <form action="/travel-agency/views/book_trip.php" method="POST">
        <label>Customer Name:</label>
        <input type="text" name="customer" required><br><br>

        <label>Booking Date:</label>
        <input type="date" name="booking_date" required><br><br>

        <input type="submit" value="Book Trip">
    </form>

    <form action="/travel-agency/views/cancel_last.php" method="POST" style="margin-top: 20px;">
        <input type="submit" value="Undo Last Booking">
    </form>
</body>
</html>
