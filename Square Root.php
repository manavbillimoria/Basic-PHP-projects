<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Square Root Calculator</title>
</head>
<body>

    <h2>Square Root Calculator</h2>

    <?php
    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the number from the form
        $number = isset($_POST['number']) ? $_POST['number'] : null;

        // Display the result or an error message
        if (is_numeric($number) && $number >= 0) {
            $squareRoot = sqrt($number);
            echo "<h3>Square Root of $number: $squareRoot</h3>";
        } else {
            echo "<h3>Invalid input. Please enter a non-negative number.</h3>";
        }
    }
    ?>

    <form method="post" action="">
        <label for="number">Enter a number:</label>
        <input type="text" id="number" name="number" required>
        <button type="submit" name="calculate">Calculate Square Root</button>
    </form>

</body>
</html>
