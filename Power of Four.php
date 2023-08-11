<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Power of Four</title>
</head>
<body>
    <h2>Check Power of Four</h2>

    <!-- Form to take user input -->
    <form method="post" action="">
        <label for="inputNumber">Enter a positive integer:</label>
        <input type="number" id="inputNumber" name="inputNumber" required>
        <button type="submit">Check Power of Four</button>
    </form>

    <?php
    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the positive integer from the form
        $inputNumber = $_POST['inputNumber'];

        // Call the function to check if the number is a power of four
        $isPowerOfFour = isPowerOfFour($inputNumber);

        // Display the result
        if ($isPowerOfFour) {
            echo "<p>$inputNumber is a power of four.</p>";
        } else {
            echo "<p>$inputNumber is not a power of four.</p>";
        }
    }

    /**
     * Function to check if a positive integer is a power of four.
     *
     * @param int $number The positive integer to be checked.
     * @return bool True if the number is a power of four, false otherwise.
     */
    function isPowerOfFour($number) {
        // Check if the number is positive and a power of four
        return ($number > 0) && (($number & ($number - 1)) == 0) && (fmod(log10($number) / log10(4), 1) == 0);
    }
    ?>
</body>
</html>
