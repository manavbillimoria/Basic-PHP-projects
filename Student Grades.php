<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information</title>
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

    <h2>Student Information</h2>

    <?php
    // Database connection
    $host = 'localhost'; // Change to your database host
    $user = 'root'; // Change to your database username
    $password = 'root'; // Change to your database password
    $database = 'run';

    $conn = new mysqli($host, $user, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Handle form submission to insert new student record
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $rollNo = $_POST["rollNo"];
        $studName = $_POST["studName"];
        $studDept = $_POST["studDept"];
        $passingYear = $_POST["passingYear"];
        $classGrades = $_POST["classGrades"];

        $sqlInsert = "INSERT INTO students (rollNo, studName, studDept, passingYear, classGrades)
                      VALUES ('$rollNo', '$studName', '$studDept', '$passingYear', '$classGrades')";

        if ($conn->query($sqlInsert) === TRUE) {
            echo '<p>New student record added successfully!</p>';
        } else {
            echo '<p>Error: ' . $sqlInsert . '<br>' . $conn->error . '</p>';
        }
    }

    // Fetch and display student information
    $sqlSelect = "SELECT * FROM students";
    $result = $conn->query($sqlSelect);

    if ($result->num_rows > 0) {
        echo '<table>';
        echo '<tr><th>Roll No</th><th>Student Name</th><th>Student Department</th><th>Passing Year</th><th>Class Grades</th></tr>';
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>{$row['rollNo']}</td><td>{$row['studName']}</td><td>{$row['studDept']}</td><td>{$row['passingYear']}</td><td>{$row['classGrades']}</td></tr>";
        }

        echo '</table>';
    } else {
        echo 'No records found.';
    }

    $conn->close();
    ?>

    <!-- Student Entry Form -->
    <form method="post" action="">
        <label for="rollNo">Roll No:</label>
        <input type="text" id="rollNo" name="rollNo" required>
        <br>

        <label for="studName">Student Name:</label>
        <input type="text" id="studName" name="studName" required>
        <br>

        <
