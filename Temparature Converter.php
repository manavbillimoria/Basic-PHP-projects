<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Temperature Converter</title>
</head>
<body>
    <h2>Temperature Converter</h2>

    <!-- Form to take user input -->
    <form method="post" action="">
        <!-- Include the degree sign in the label -->
        <label for="temperature">Enter temperature (°C or °F):</label>
        <input type="number" id="temperature" name="temperature" required>
        <select name="conversionType" required>
            <option value="fahrenheitToCelsius">Fahrenheit to Celsius</option>
            <option value="celsiusToFahrenheit">Celsius to Fahrenheit</option>
        </select>
        <button type="submit">Convert</button>
    </form>

    <?php
    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the temperature and conversion type from the form
        $temperature = $_POST['temperature'];
        $conversionType = $_POST['conversionType'];

        // Call the function to perform the temperature conversion
        $result = convertTemperature($temperature, $conversionType);

        // Display the result
        echo "<p>$result</p>";
    }

    /**
     * Function to convert temperature between Fahrenheit and Celsius.
     *
     * @param float $temperature The temperature value to be converted.
     * @param string $conversionType The type of conversion ('fahrenheitToCelsius' or 'celsiusToFahrenheit').
     * @return string The result of the temperature conversion.
     */
    function convertTemperature($temperature, $conversionType) {
        if ($conversionType === 'fahrenheitToCelsius') {
            $celsius = ($temperature - 32) * (5/9);
            return "$temperature°F is equal to $celsius°C.";
        } elseif ($conversionType === 'celsiusToFahrenheit') {
            $fahrenheit = ($temperature * 9/5) + 32;
            return "$temperature°C is equal to $fahrenheit°F.";
        } else {
            return "Invalid conversion type.";
        }
    }
    ?>
</body>
</html>
