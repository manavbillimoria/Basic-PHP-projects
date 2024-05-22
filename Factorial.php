<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factorial Calculator</title>
</head>
<body>

    <h2>Factorial Calculator</h2>

    <?php
    // Function to calculate the factorial of a number using recursion
    function factorial($n) {
        if ($n == 0 || $n == 1) {
            return 1;
        } else {
            return $n * factorial($n - 1);
        }
    }

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        // Get the number from the query parameter
        $number = isset($_GET['number']) ? $_GET['number'] : null;

        // Display the result or an error message
        if (is_numeric($number) && $number >= 0) {
            $result = factorial($number);
            echo "<h3>Factorial of $number is: $result</h3>";
        } else {
            echo "<h3>Invalid input. Please enter a non-negative number.</h3>";
        }
    }
    ?>

    <script>
        // Use prompt to take input from the user
        var userInput = prompt("Enter a number to calculate its factorial:");
        
        // Redirect to the same page with the user input as a query parameter
        window.location.href = "factorial.php?number=" + userInput;
    </script>

</body>
</html>
