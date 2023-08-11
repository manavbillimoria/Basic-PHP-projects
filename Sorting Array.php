
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Array Sorting</title>
</head>
<body>

<?php
// Numeric Array
$numericArray = array(5, 2, 8, 1, 7);

// Associative Array
$associativeArray = array(
    "name" => "John",
    "age" => 25,
    "city" => "New York"
);

// Multidimensional Array
$multidimensionalArray = array(
    array("name" => "Alice", "age" => 30),
    array("name" => "Bob", "age" => 22),
    array("name" => "Charlie", "age" => 35)
);

// Sorting Numeric Array
sort($numericArray);
echo "<h2>Numeric Array - Sorted</h2>";
print_r($numericArray);

// Sorting Associative Array by Values
asort($associativeArray);
echo "<h2>Associative Array - Sorted by Values</h2>";
print_r($associativeArray);

// Sorting Associative Array by Keys
ksort($associativeArray);
echo "<h2>Associative Array - Sorted by Keys</h2>";
print_r($associativeArray);

// Sorting Multidimensional Array by a Specific Key
usort($multidimensionalArray, function($a, $b) {
    return $a["age"] - $b["age"];
});
echo "<h2>Multidimensional Array - Sorted by Age</h2>";
print_r($multidimensionalArray);
?>

</body>
</html>
