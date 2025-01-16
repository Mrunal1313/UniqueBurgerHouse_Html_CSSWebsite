<?php
// Database credentials
$servername = "localhost";
$username = "root";  // Your database username
$password = "";      // Your database password
$dbname = "mrunal";  // Your database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    // echo ("Connection done"); // This can be commented out after successful testing
}

// Insert data when the form is submitted
if (isset($_POST['order_now'])) {
    // Sanitize and validate user input
    $Name = mysqli_real_escape_string($conn, $_POST['Name']);
    $Email = mysqli_real_escape_string($conn, $_POST['Email']);
    $Number = mysqli_real_escape_string($conn, $_POST['Number']);
    $How_much = mysqli_real_escape_string($conn, $_POST['How_much']);
    $You_Order = mysqli_real_escape_string($conn, $_POST['You_Order']);
    $Address = mysqli_real_escape_string($conn, $_POST['Address']);

    // Debugging output: Check if all fields are filled
    if (empty($Name) || empty($Email) || empty($Number) || empty($How_much) || empty($You_Order) || empty($Address)) {
        echo "Please fill in all the fields.";
    } else {
        // SQL query to insert data into the database
        $sql = "INSERT INTO `order` (Name, Email, Number, How_much, You_Order, Address) 
                VALUES ('$Name', '$Email', '$Number', '$How_much', '$You_Order', '$Address')";

        // Execute the query and check if it was successful
        if (mysqli_query($conn, $sql)) {
            echo "Order placed successfully!";
        } else {
            // Print MySQL error message if the query fails
            echo "Error: " . mysqli_error($conn);
        }
    }
}

// Close the database connection
mysqli_close($conn);
?>
