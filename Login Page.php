<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <?php
    session_start();

    // Check if the user is already logged in
    if (isset($_SESSION['username'])) {
        header("Location: welcome.php");
        exit();
    }

    // Handle form submission for login
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Replace 'your_host', 'your_username', 'your_password', 'your_database' with your actual database credentials
        $conn = new mysqli('your_host', 'your_username', 'your_password', 'your_database');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $_SESSION['username'] = $username;
            header("Location: welcome.php");
            exit();
        } else {
            $loginError = "Invalid username or password";
        }

        $conn->close();
    }
    ?>

    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>

        <button type="submit">Login</button>

        <?php
        if (isset($loginError)) {
            echo '<p style="color: red;">' . $loginError . '</p>';
        }
        ?>
    </form>

</body>
</html>
