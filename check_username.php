<?php
// Your database connection code here

if (isset($_POST['username'])) {
  $username = $_POST['username'];
  // Perform a query to check if the username exists in the database
  // Replace 'users' with your actual table name
  $query = "SELECT * FROM users WHERE username = '$username'";
  // Execute the query and check if there are any rows returned
  // If rows exist, then the username is already taken
  // Adjust the condition based on your database handling (e.g., mysqli, PDO)
  if ($result = $mysqli->query($query)) {
    if ($result->num_rows > 0) {
      echo "exists";
    } else {
      echo "available";
    }
  }
}
?>
