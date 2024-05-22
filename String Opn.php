<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String Transformations</title>
</head>
<body>
    <h2>String Transformations</h2>

    <!-- Form to take user input -->
    <form method="post" action="">
        <label for="inputString">Enter a string:</label>
        <input type="text" id="inputString" name="inputString" required>
        <button type="submit">Transform</button>
    </form>

    <?php
    // Function to transform a string to all uppercase letters
    function transformToUppercase($str) {
        return strtoupper($str);
    }

    // Function to transform a string to all lowercase letters
    function transformToLowercase($str) {
        return strtolower($str);
    }

    // Function to make the first character of a string uppercase
    function makeFirstCharUppercase($str) {
        return ucfirst($str);
    }

    // Function to make the first character of all words in a string uppercase
    function makeFirstCharOfWordsUppercase($str) {
        return ucwords($str);
    }

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the input string from the form
        $inputString = $_POST['inputString'];

        // Display original string
        echo "<p>Original String: $inputString</p>";

        // a) Transform to uppercase
        $uppercaseString = transformToUppercase($inputString);
        echo "<p>Uppercase: $uppercaseString</p>";

        // b) Transform to lowercase
        $lowercaseString = transformToLowercase($inputString);
        echo "<p>Lowercase: $lowercaseString</p>";

        // c) Make first character uppercase
        $firstCharUppercaseString = makeFirstCharUppercase($inputString);
        echo "<p>First Character Uppercase: $firstCharUppercaseString</p>";

        // d) Make first character of all words uppercase
        $firstCharOfWordsUppercaseString = makeFirstCharOfWordsUppercase($inputString);
        echo "<p>First Character of Words Uppercase: $firstCharOfWordsUppercaseString</p>";
    }
    ?>
</body>
</html>
