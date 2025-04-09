<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customize Your Trip</title>
</head>
<body>
    <h1>Customize Your Trip</h1>
    <form action="trip_summary.php" method="POST">
        <label>
            <input type="checkbox" name="services[]" value="flight"> Add Flight
        </label><br>
        <label>
            <input type="checkbox" name="services[]" value="meals"> Add Meals
        </label><br>
        <label>
            <input type="checkbox" name="services[]" value="accommodation"> Add Accommodation
        </label><br><br>
        <button type="submit">Get Trip Summary</button>
    </form>
</body>
</html>