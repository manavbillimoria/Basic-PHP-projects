<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Admission Form</title>
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
    </style>
</head>
<body>

    <h2>Student Admission Form</h2>

    <?php
    // Sample student data
    $students = [
        ['studentID' => '001', 'studentName' => 'John Doe', 'emailID' => 'john.doe@example.com', '12thGrade' => 90, 'JEEScore' => 150],
        ['studentID' => '002', 'studentName' => 'Jane Smith', 'emailID' => 'jane.smith@example.com', '12thGrade' => 95, 'JEEScore' => 160],
        ['studentID' => '003', 'studentName' => 'Bob Johnson', 'emailID' => 'bob.johnson@example.com', '12thGrade' => 88, 'JEEScore' => 145],
        ['studentID' => '004', 'studentName' => 'Alice Williams', 'emailID' => 'alice.williams@example.com', '12thGrade' => 92, 'JEEScore' => 155],
        ['studentID' => '005', 'studentName' => 'Charlie Brown', 'emailID' => 'charlie.brown@example.com', '12thGrade' => 87, 'JEEScore' => 140],
        // Add more student data as needed
    ];

    // Sort students based on JEEScore in descending order
    usort($students, function($a, $b) {
        return $b['JEEScore'] - $a['JEEScore'];
    });

    // Display top 5 students based on JEEScore
    echo '<h3>Top 5 Students Based on JEEScore</h3>';
    displayTopStudents($students, 5);

    // Function to display top N students
    function displayTopStudents($students, $topCount) {
        echo '<table>';
        echo '<tr><th>Student ID</th><th>Student Name</th><th>Email ID</th><th>12th Grade</th><th>JEE Score</th></tr>';
        
        for ($i = 0; $i < min($topCount, count($students)); $i++) {
            echo "<tr><td>{$students[$i]['studentID']}</td><td>{$students[$i]['studentName']}</td><td>{$students[$i]['emailID']}</td><td>{$students[$i]['12thGrade']}</td><td>{$students[$i]['JEEScore']}</td></tr>";
        }

        echo '</table>';
    }
    ?>

</body>
</html>
