<?php
include('config/db.php');

$query = "SELECT * FROM notices";

$result = mysqli_query($conn, $query);

$notices = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

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
  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="swiper/swiper-bundle.min.css" />


  <title>Dashbord</title>
</head>

<body>

  <?php
  include('inc/header.php');

  ?>


  <div class="container">

    <div class="note-cards">
      <?php foreach ($notices as $notice) : ?>
        <div class="note-card">
          <!-- use php for each echo name,description ani employee ma chai jasley note assign garyaa tesko name -->
          <div class="note-name">
            <img src="images/icon/user-logo.png" width="40" height="40px" alt="">
            <span><?php echo $notice['username']; ?></span>
            <form method="post" action="delete_note.php">
              <input value=" <?php  echo $notice['id'];?>" name="deleteid" type="hidden" >
              <button  type="submit" class="clear">clear</button>
              

            </form>
           

          </div>
          <h2 class="note-heading"><?php echo $notice['title']; ?></h2>
          <p class="note-description"><?php echo $notice['description']; ?></p>

        </div>
      <?php endforeach; ?>
    </div>
  </div>

</body>

</html>