<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reverse Integer Digits</title>
</head>
<body>
    <h2>Reverse Integer Digits</h2>

    <!-- Form to take user input -->
    <form method="post" action="">
        <label for="inputNumber">Enter an integer:</label>
        <input type="number" id="inputNumber" name="inputNumber" required>
        <button type="submit">Reverse Digits</button>
    </form>

    <?php
    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the integer from the form
        $inputNumber = $_POST['inputNumber'];

        // Call the function to reverse the digits of the integer
        $reversedNumber = reversedNumber($inputNumber);

        // Display the result
        echo "<p>The reversed digits of $inputNumber are: $reversedNumber</p>";
    }

    /**
     * Function to reverse the digits of an integer.
     *
     * @param int $number The integer to be reversed.
     * @return int The reversed integer.
     */
    function reversedNumber($number) {
        // Convert the integer to a string, reverse it, and convert it back to an integer
        $reversedString = strrev((string) $number);
        $reversedNumber = intval($reversedString);

        // Return the reversed integer
        return $reversedNumber;
    }
    ?>
</body>
</html>
