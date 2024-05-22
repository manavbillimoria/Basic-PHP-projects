<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prime Number Checker</title>
</head>
<body>

    <h2>Prime Number Checker</h2>

    <?php
    // Function to check whether a number is prime
    function isPrime($number) {
        if ($number <= 1) {
            return false;
        }

        for ($i = 2; $i <= sqrt($number); $i++) {
            if ($number % $i == 0) {
                return false;
            }
        }

        return true;
    }

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the number from the form
        $number = isset($_POST['number']) ? $_POST['number'] : null;

        // Display the result or an error message
        if (is_numeric($number) && $number >= 0) {
            $result = isPrime($number) ? 'Prime' : 'Not Prime';
            echo "<h3>$number is $result</h3>";
        } else {
            echo "<h3>Invalid input. Please enter a non-negative number.</h3>";
        }
    }
    ?>

    <form method="post" action="">
        <label for="number">Enter a number:</label>
        <input type="text" id="number" name="number" required>
        <button type="submit" name="check">Check Prime</button>
    </form>

</body>
</html>
