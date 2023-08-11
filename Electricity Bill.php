<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electricity Bill Calculator</title>
</head>
<body>

    <h2>Electricity Bill Calculator</h2>

    <?php
    // Function to calculate electricity bill based on units consumed
    function calculateElectricityBill($units) {
        $totalBill = 0;

        // Calculate bill based on the given conditions
        if ($units <= 50) {
            $totalBill = $units * 3.50;
        } elseif ($units <= 150) {
            $totalBill = (50 * 3.50) + (($units - 50) * 4.00);
        } elseif ($units <= 250) {
            $totalBill = (50 * 3.50) + (100 * 4.00) + (($units - 150) * 5.20);
        } else {
            $totalBill = (50 * 3.50) + (100 * 4.00) + (100 * 5.20) + (($units - 250) * 6.50);
        }

        return $totalBill;
    }

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        // Get the units from the query parameter
        $units = isset($_GET['units']) ? $_GET['units'] : null;

        // Display the result or an error message
        if (is_numeric($units) && $units >= 0) {
            $bill = calculateElectricityBill($units);
            echo "<h3>Electricity Bill for $units units: Rs. $bill</h3>";
        } else {
            echo "<h3>Invalid input. Please enter a non-negative number of units.</h3>";
        }
    }
    ?>

    <form method="get" action="">
        <label for="units">Enter units consumed:</label>
        <input type="number" id="units" name="units" required min="0">
        <button type="submit" name="calculate">Calculate Bill</button>
    </form>

</body>
</html>
