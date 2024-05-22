<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Registration Form</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        form {
            margin-top: 20px;
        }

        input {
            margin-bottom: 10px;
            padding: 5px;
        }

        input[type="submit"] {
            cursor: pointer;
        }
    </style>
</head>
<body>

    <h2>Sports Registration Form</h2>

    <?php
    // Database connection
    $host = 'localhost'; // Change to your database host
    $user = 'root'; // Change to your database username
    $password = ''; // Change to your database password
    $database = 'run';

    $conn = new mysqli($host, $user, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Handle form submission to insert new player record
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $playerID = $_POST["playerID"];
        $playerName = $_POST["playerName"];
        $gameGenre = $_POST["gameGenre"];
        $score = $_POST["score"];

        $sqlInsert = "INSERT INTO players (playerID, playerName, gameGenre, score)
                      VALUES ('$playerID', '$playerName', '$gameGenre', '$score')";

        if ($conn->query($sqlInsert) === TRUE) {
            echo '<p>New player record added successfully!</p>';
        } else {
            echo '<p>Error: ' . $sqlInsert . '<br>' . $conn->error . '</p>';
        }
    }

    // Fetch and display players with the highest score in cricket
    $sqlSelect = "SELECT * FROM players WHERE gameGenre = 'cricket' ORDER BY score DESC LIMIT 1";
    $result = $conn->query($sqlSelect);

    if ($result->num_rows > 0) {
        echo '<h3>Players with Highest Score in Cricket</h3>';
        echo '<table>';
        echo '<tr><th>Player ID</th><th>Player Name</th><th>Game Genre</th><th>Score</th></tr>';
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>{$row['playerID']}</td><td>{$row['playerName']}</td><td>{$row['gameGenre']}</td><td>{$row['score']}</td></tr>";
        }

        echo '</table>';
    } else {
        echo '<p>No players found for cricket.</p>';
    }

    $conn->close();
    ?>

    <!-- Player Registration Form -->
    <form method="post" action="">
        <label for="playerID">Player ID:</label>
        <input type="text" id="playerID" name="playerID" required>
        <br>

        <label for="playerName">Player Name:</label>
        <input type="text" id="playerName" name="playerName" required>
        <br>

        <label for="gameGenre">Game Genre:</label>
        <input type="text" id="gameGenre" name="gameGenre" required>
        <br>

        <label for="score">Score:</label>
        <input type="text" id="score" name="score" required>
        <br>

        <input type="submit" value="Submit">
    </form>

</body>
</html>
