<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student-Mentor Meeting Records</title>
    <style>
        table {
            width: 70%;
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

    <h2>Student-Mentor Meeting Records</h2>

    <?php
    // Database connection
    $host = 'localhost'; // Change to your database host
    $user = 'root'; // Change to your database username
    $password = 'root'; // Change to your database password
    $database = 'run';

    $conn = new mysqli($host, $user, $password, $database,3307);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Handle form submission to insert new meeting record
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $studRollNo = $_POST["studRollNo"];
        $studClass = $_POST["studClass"];
        $studName = $_POST["studName"];
        $studContact = $_POST["studContact"];
        $mentorName = $_POST["mentorName"];
        $issuesDiscussed = $_POST["issuesDiscussed"];

        $sqlInsert = "INSERT INTO student_mentor (studRollNo, studClass, studName, studContact, MentorName, issuesDiscussed)
                      VALUES ('$studRollNo', '$studClass', '$studName', '$studContact', '$mentorName', '$issuesDiscussed')";

        if ($conn->query($sqlInsert) === TRUE) {
            echo '<p>New meeting record added successfully!</p>';
        } else {
            echo '<p>Error: ' . $sqlInsert . '<br>' . $conn->error . '</p>';
        }
    }

    // Fetch and display meeting records for absent students
    $sqlSelect = "SELECT * FROM student_mentor WHERE issuesDiscussed = 'absent'";
    $result = $conn->query($sqlSelect);

    if ($result->num_rows > 0) {
        echo '<h3>Meeting Records for Absent Students</h3>';
        echo '<table>';
        echo '<tr><th>Student Roll No</th><th>Student Class</th><th>Student Name</th><th>Student Contact</th><th>Mentor Name</th><th>Issues Discussed</th></tr>';
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>{$row['studRollNo']}</td><td>{$row['studClass']}</td><td>{$row['studName']}</td><td>{$row['studContact']}</td><td>{$row['MentorName']}</td><td>{$row['issuesDiscussed']}</td></tr>";
        }

        echo '</table>';
    } else {
        echo '<p>No meeting records found for absent students.</p>';
    }

    $conn->close();
    ?>

    <!-- Meeting Record Entry Form -->
    <form method="post" action="">
        <label for="studRollNo">Student Roll No:</label>
        <input type="text" id="studRollNo" name="studRollNo" required>
        <br>

        <label for="studClass">Student Class:</label>
        <input type="text" id="studClass" name="studClass" required>
        <br>

        <label for="studName">Student Name:</label>
        <input type="text" id="studName" name="studName" required>
        <br>

        <label for="studContact">Student Contact:</label>
        <input type="text" id="studContact" name="studContact" required>
        <br>

        <label for="mentorName">Mentor Name:</label>
        <input type="text" id="mentorName" name="mentorName" required>
        <br>

        <label for="issuesDiscussed">Issues Discussed:</label>
        <input type="text" id="issuesDiscussed" name="issuesDiscussed" required>
        <br>

        <input type="submit" value="Submit">
    </form>

</body>
</html>
