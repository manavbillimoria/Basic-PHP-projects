<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Registration Form</title>
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

        input[type="text"] {
            padding: 8px;
        }

        input[type="submit"] {
            padding: 8px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <h2>Company Registration Form</h2>

    <?php
    // Sample registered companies data
    $registeredCompanies = [
        ['companyID' => '001', 'companyName' => 'ABC Corp', 'Location' => 'New York', 'Department' => 'IT'],
        ['companyID' => '002', 'companyName' => 'XYZ Ltd', 'Location' => 'London', 'Department' => 'Finance'],
        ['companyID' => '003', 'companyName' => 'PQR Inc', 'Location' => 'Tokyo', 'Department' => 'Marketing'],
    ];

    // Display the registration form
    echo '
        <form method="post" action="">
            <label for="searchLocation">Search Companies in City:</label>
            <input type="text" id="searchLocation" name="searchLocation" placeholder="Enter city name">
            <input type="submit" value="Search">
        </form>
    ';

    // Handle search
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $searchLocation = $_POST["searchLocation"];

        // Display search results
        echo "<h3>Search Results for Companies in $searchLocation</h3>";
        displayCompaniesByLocation($registeredCompanies, $searchLocation);
    }

    // Display all registered companies
    echo '<h3>All Registered Companies</h3>';
    displayAllCompanies($registeredCompanies);

    // Function to display companies based on location
    function displayCompaniesByLocation($companies, $location) {
        echo '<table>';
        echo '<tr><th>Company ID</th><th>Company Name</th><th>Location</th><th>Department</th></tr>';
        
        foreach ($companies as $company) {
            if (strtolower($company['Location']) == strtolower($location)) {
                echo "<tr><td>{$company['companyID']}</td><td>{$company['companyName']}</td><td>{$company['Location']}</td><td>{$company['Department']}</td></tr>";
            }
        }

        echo '</table>';
    }

    // Function to display all registered companies
    function displayAllCompanies($companies) {
        echo '<table>';
        echo '<tr><th>Company ID</th><th>Company Name</th><th>Location</th><th>Department</th></tr>';
        
        foreach ($companies as $company) {
            echo "<tr><td>{$company['companyID']}</td><td>{$company['companyName']}</td><td>{$company['Location']}</td><td>{$company['Department']}</td></tr>";
        }

        echo '</table>';
    }
    ?>

</body>
</html>
