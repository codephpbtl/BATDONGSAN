<?php
// Database connection - replace with your database details
$host = "localhost";
$username = "root";
$password = "";
$database = "batdongsandb";

// Connect to the database
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$search = "";
$results = [];

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search = $_POST['search'];

    // SQL query with LIKE operator for partial matching
    $sql = "SELECT * FROM users WHERE Username LIKE ?";
    $stmt = $conn->prepare($sql);
    $searchTerm = "%" . $search . "%";
    $stmt->bind_param("s", $searchTerm);
    
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch all results
        $results = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        echo "No results found";
    }
}
?>