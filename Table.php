<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiplication Table</title>
    <style>
        table {
            width: 30%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>

    <?php
    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $number = $_POST["number"];

        echo "<h2>Multiplication Table of $number</h2>";
        echo '<table>';
        echo '<tr><th>Multiplier</th><th>Result</th></tr>';

        for ($i = 1; $i <= 10; $i++) {
            $result = $number * $i;
            echo "<tr><td>$i</td><td>$result</td></tr>";
        }

        echo '</table>';
    }
    ?>

    <!-- Form to take number from the user -->
    <form method="post" action="">
        <label for="number">Enter a number:</label>
        <input type="number" id="number" name="number" required>
        <br>

        <input type="submit" value="Generate Table">
    </form>

</body>
</html>
