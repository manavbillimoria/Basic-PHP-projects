<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }

        form {
            margin: 20px;
        }

        input {
            padding: 5px;
            font-size: 16px;
        }

        button {
            padding: 8px;
            font-size: 16px;
            cursor: pointer;
        }

        p {
            font-size: 20px;
            margin-top: 20px;
        }
    </style>
    <title>Day of the Week</title>
</head>
<body>

    <h2>Day of the Week</h2>

    <!-- Form to take user input -->
    <form method="post" action="">
        <label for="dayNumber">Enter a number (1 to 7):</label>
        <input type="number" id="dayNumber" name="dayNumber" required min="1" max="7">
        <button type="submit" name="submit">Get Day</button>
    </form>

    <?php
    // Function to get the day of the week based on a given number
    function getDayOfWeek($number) {
        switch ($number) {
            case 1:
                return "Monday";
            case 2:
                return "Tuesday";
            case 3:
                return "Wednesday";
            case 4:
                return "Thursday";
            case 5:
                return "Friday";
            case 6:
                return "Saturday";
            case 7:
                return "Sunday";
            default:
                return false; // Return false for invalid numbers
        }
    }

    // Check if the form is submitted
    if (isset($_POST['submit'])) {
        // Get user input from the form
        $dayNumber = $_POST['dayNumber'];

        // Display the result or an error message
        $result = getDayOfWeek($dayNumber);
        echo "<p>" . ($result !== false ? "Day $dayNumber: $result" : "Invalid number") . "</p>";
    }
    ?>

</body>
</html>
