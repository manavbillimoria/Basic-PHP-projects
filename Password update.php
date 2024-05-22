<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Database</title>
</head>
<body>
    <h2>Add User Record</h2>

    <!-- Form to take user input -->
    <form method="post" action="">
        <label for="userId">User ID:</label>
        <input type="text" id="userId" name="userId" required>

        <label for="userName">User Name:</label>
        <input type="text" id="userName" name="userName" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit" name="addRecord">Add Record</button>
    </form>

    <!-- Form to update user password -->
    <h2>Update User Password</h2>
    <form method="post" action="">
        <label for="updateUserId">User ID:</label>
        <input type="text" id="updateUserId" name="updateUserId" required>

        <label for="newPassword">New Password:</label>
        <input type="password" id="newPassword" name="newPassword" required>

        <button type="submit" name="updatePassword">Update Password</button>
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

    // Check if the form to add a record is submitted
    if (isset($_POST['addRecord'])) {
        // Get user input from the form
        $userId = $_POST['userId'];
        $userName = $_POST['userName'];
        $password = $_POST['password'];

        // Insert record into the users table
        $sql = "INSERT INTO users (userId, userName, password) VALUES ('$userId', '$userName', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "<p>Record added successfully!</p>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Check if the form to update a password is submitted
    if (isset($_POST['updatePassword'])) {
        // Get user input from the form
        $updateUserId = $_POST['updateUserId'];
        $newPassword = $_POST['newPassword'];

        // Update user password in the users table
        $updateSql = "UPDATE users SET password='$newPassword' WHERE userId='$updateUserId'";

        if ($conn->query($updateSql) === TRUE) {
            echo "<p>Password updated successfully!</p>";
        } else {
            echo "Error updating password: " . $conn->error;
        }
    }

    // Close the database connection
    $conn->close();
    ?>
</body>
</html>
