<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Admission Form</title>
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

    <h2>Student Admission Form</h2>

    <?php
    // Database connection
    $host = 'localhost'; // Change to your database host
    $user = 'root'; // Change to your database username
    $password = ''; // Change to your database password
    $database = 'admissionDB';

    $conn = new mysqli($host, $user, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Handle form submission to insert new student record
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $studentID = $_POST["studentID"];
        $studentName = $_POST["studentName"];
        $emailID = $_POST["emailID"];
        $twelfthGrade = $_POST["twelfthGrade"];
        $JEEScore = $_POST["JEEScore"];
        $department = $_POST["department"];

        $sqlInsert = "INSERT INTO students (studentID, studentName, emailID, twelfthGrade, JEEScore, Department)
                      VALUES ('$studentID', '$studentName', '$emailID', '$twelfthGrade', '$JEEScore', '$department')";

        if ($conn->query($sqlInsert) === TRUE) {
            echo '<p>New student record added successfully!</p>';
        } else {
            echo '<p>Error: ' . $sqlInsert . '<br>' . $conn->error . '</p>';
        }
    }

    // Fetch and display top 5 students based on JEEScore enrolled in CSE department
    $sqlSelect = "SELECT * FROM students WHERE Department = 'CSE' ORDER BY JEEScore DESC LIMIT 5";
    $result = $conn->query($sqlSelect);

    if ($result->num_rows > 0) {
        echo '<h3>Top 5 Students Based on JEEScore Enrolled in CSE Department</h3>';
        echo '<table>';
        echo '<tr><th>Student ID</th><th>Student Name</th><th>Email ID</th><th>12th Grade</th><th>JEEScore</th><th>Department</th></tr>';
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>{$row['studentID']}</td><td>{$row['studentName']}</td><td>{$row['emailID']}</td><td>{$row['twelfthGrade']}</td><td>{$row['JEEScore']}</td><td>{$row['Department']}</td></tr>";
        }

        echo '</table>';
    } else {
        echo '<p>No students found for CSE department.</p>';
    }

    $conn->close();
    ?>

    <!-- Student Admission Form -->
    <form method="post" action="">
        <label for="studentID">Student ID:</label>
        <input type="text" id="studentID" name="studentID" required>
        <br>

        <label for="studentName">Student Name:</label>
        <input type="text" id="studentName" name="studentName" required>
        <br>

        <label for="emailID">Email ID:</label>
        <input type="text" id="emailID" name="emailID" required>
        <br>

        <label for="twelfthGrade">12th Grade:</label>
        <input type="text" id="twelfthGrade" name="twelfthGrade" required>
        <br>

        <label for="JEEScore">JEE Score:</label>
        <input type="text" id="JEEScore" name="JEEScore" required>
        <br>

        <label for="department">Department:</label>
        <input type="text" id="department" name="department" required>
        <br>

        <input type="submit" value="Submit">
    </form>

</body>
</html>
