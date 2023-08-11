<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Grade Checker</title>
</head>
<body>

    <?php
    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $marks = $_POST["marks"];

        echo "<h2>Student Grade:</h2>";

        // Check the conditions and determine the grade
        if ($marks >= 60) {
            echo "Grade: First Division";
        } elseif ($marks >= 45 && $marks <= 59) {
            echo "Grade: Second Division";
        } elseif ($marks >= 33 && $marks <= 44) {
            echo "Grade: Third Division";
        } else {
            echo "Grade: Fail";
        }
    }
    ?>

    <!-- Form to take marks from the user -->
    <form method="post" action="">
        <label for="marks">Enter marks:</label>
        <input type="number" id="marks" name="marks" required>
        <br>

        <input type="submit" value="Check Grade">
    </form>

</body>
</html>
