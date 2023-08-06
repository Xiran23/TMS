<?php include('config/db.php'); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" href="images/picture2.png" type="image/png">
  <link rel="shortcut icon" href="images/picture2.png" type="image/png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styledash.css" />
    <link rel="stylesheet" href="responsive.css" />

    <title>Dashbord</title>
  </head>

  <body>
    <?php
  include('inc/header.php');

  if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $title = $_POST['title'];
      $description = $_POST['description'];


      $query = "INSERT INTO notices (title, description, username) VALUES ('$title', '$description', '$username')";

      if (mysqli_query($conn, $query)) {
        echo 'Data submitted successfully!';
      } else {
        echo 'Error: ' . mysqli_error($conn);
      }
    }

    mysqli_close($conn);
  } else {
    echo "<script> location.href='login.php'; </script>";
  }
  ?>

    <div class="container">
      <div class="Section">
        <div class="register-form">
          <form id="registration-form" method="POST" action="">
            <div class="form-input">
              <label for="time">Title:</label>
              <input id="time" name="title" type="text" />
              <span class="errors" id="stime"></span>
            </div>
            <div class="form-input">
              <label for="description">Description:</label>
              <textarea id="description" name="description"></textarea>
              <span class="errors" id="sdescription"></span>
            </div>
            <input
              type="submit"
              class="button-small"
              name="submit"
              value="Submit"
            />
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
