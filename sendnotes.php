<?php include('config/db.php'); ?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="styledash.css"/>
  <link rel="stylesheet" href="responsive.css">
  <!-- Link Swiper's CSS -->
  <!-- <link rel="stylesheet" href="swiper/swiper-bundle.min.css" /> -->

  <title>Dashbord</title>
</head>

<body>


  <?php
  include('inc/header.php');


  ?>

  <div class="container">

    <div class="Section">

      <!-- ******************************** -->

      <div class="register-form">
    <form id="registration-form" method="POST" action="">
      <div class="form-input">
        <label for="time">Title:</label>
        <input id="time" name="time" type="text">
        <span class="errors" id="stime"></span>
      </div>
      <div class="form-input">
        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea>
        <span class="errors" id="sdescription"></span>
      </div>
      <input type="submit" class="button-small" name="submit" value="Submit">
    </form>
  </div>
      <!-- ******************************** -->
      <!-- ************************************************************************************************************************************************************* -->


</html>
