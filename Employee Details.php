<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Database</title>
</head>
<body>
    <h2>Add Employee Record</h2>

    <!-- Form to take user input -->
    <form method="post" action="">
        <label for="empNo">Employee Number:</label>
        <input type="text" id="empNo" name="empNo" required>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="department">Department:</label>
        <input type="text" id="department" name="department" required>

        <label for="salary">Salary (Rs):</label>
        <input type="number" id="salary" name="salary" required>

        <button type="submit" name="addRecord">Add Record</button>
    </form>

    <?php
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";  // or your actual password
    $dbname = "run";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the form is submitted
    if (isset($_POST['addRecord'])) {
        // Get user input from the form
        $empNo = $_POST['empNo'];
        $name = $_POST['name'];
        $department = $_POST['department'];
        $salary = $_POST['salary'];

        // Insert record into the employee table
        $sql = "INSERT INTO emp (empNo, name, department, salary) VALUES ('$empNo', '$name', '$department', '$salary')";

        if ($conn->query($sql) === TRUE) {
            echo "<p>Record added successfully!</p>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Display employees with salary greater than 50000 Rs
    $result = $conn->query("SELECT * FROM emp WHERE salary > 50000");

    if ($result->num_rows > 0) {
        echo "<h2>Employees with Salary Greater than 50000 Rs</h2>";
        echo "<table border='1'>
                <tr>
                    <th>Employee Number</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Salary (Rs)</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['empNo']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['department']}</td>
                    <td>{$row['salary']}</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No employees found with salary greater than 50000 Rs.</p>";
    }

    // Close the database connection
    $conn->close();
    ?>
</body>
</html>
