<?php include('config/db.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="styledash.css">
<link rel="stylesheet" href="responsive.css">
  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="swiper/swiper-bundle.min.css" />

  <title>Dashbord</title>
</head>

<body>


<div class="'navandheader">
  <?php
  include('inc/header.php');
  ?>
</div>

  <div class="container">

      <div class="createtask-form">



        <form method="POST" name="myForm" onsubmit="return validateForm()">





          <div class="form-group">
            <label  for="tname">Title:</label>
            <input  type="text.title" name="tname" type="text">
          </div>



          <div>
            <label for="emp">Employee:</label>
            <select name="emp" placeholder="please neter the title" onchange="populateInputField()" id="emp"> //multiple is removed

              <?php
              $employees = $conn->query("SELECT *FROM users");
              while ($employee = $employees->fetch_assoc()) {
                // var_dump($employee);
                // print_r($employee);
                $firstname = $employee['firstname'];
                $id = $employee['id'];
                // echo $firstname;
                echo "<option value='$id'>$firstname </option>";
              }
              ?>
            </select> <br>
            <label for="emp">Employee_ID:</label>
            <input name="empid" type="text" id="myInputField" readonly>
          </div>
        <div class="dateee">
          <div>
            <!-- <label for="">due_date:</label>
            <input type="date" name="tduedate" type="text"> -->

            <label for="">submission_date:</label>
            <input type="datetime-local" name="subdate" >
            </div>
         </div>

          <div>

            <label for="">Priority:</label>
            <select name="priority" id="">
              <option value="1">Low</option>
              <option value="2">Medium</option>
              <option value="3">High</option>
            </select>

          </div>

          <div class="textareaa">
          <label for="">description:</label>
          <textarea name="tdesc" placeholder="Enter task description..."> </textarea>

          </div>


          <input class="button-small" style="background-color: grey;" type="submit" value="submit" name="submit" id="submit">


        </form>


      </div>


      <!-- ******************************** -->


    </div>

    <!-- ************************************************************************************************************************************************************* -->






  </div>

</body>

<!-- Swiper JS -->

<script src="swiper/swiper-bundle.min.js"></script>
<script src="js/jquery-3.7.0.min.js"></script>
<script src="js/index.js"></script>
<script src="ajax/ajax.js"></script>

<!-- Initialize Swiper -->

</html>

<script>
  function populateInputField() {
    var dropdown = document.getElementById("emp");
    var selectedOptions = Array.from(dropdown.selectedOptions).map(option => option.value);
    var inputField = document.getElementById("myInputField");
    inputField.value = selectedOptions.join(", ");


  }


  
  function validateForm() {
    console.log("WORKING");
    var title = document.forms["myForm"]["tname"].value;
    var empID = document.forms["myForm"]["empid"].value;
    var subdate = document.forms["myForm"]["subdate"].value;
    var tdesc = document.forms["myForm"]["tdesc"].value;

    if (title == "") {
      alert("Title must be filled out");
      return false;
    }

    if (empID == "") {
      alert("Employee ID must be filled out");
      return false;
    }

    if (subdate == "") {
      alert("Submission date must be filled out");
      return false;
    }

    if (tdesc == "") {
      alert("Description must be filled out");
      return false;
    }
  }

</script>
<?php
if (isset($_POST['submit'])) {
  echo "hey";

  $title = $_POST['tname'];
  $description  = $_POST['tdesc'];
  // $submissiondate     = $_POST['submission'];
  // $submissiondate= $_POST['submission'];
  $subdate = $_POST['subdate'];
  $employee_id  = $_POST['empid'];
  $priority     = $_POST['priority'];
  //creating object


  $query = "INSERT INTO tasks (title, description, due_date, user_id,task_priority) VALUES
              ('$title','$description', '$subdate','$employee_id','$priority')";

  if (mysqli_query($conn, $query)) {
    /*
                header('Location:<?php echo $_SERVER["PHP_SELF"]; ?>');
                */
    echo "<script> alert(1); </script>";
  } else {
    echo "failed";
    echo "<script> alert(0); </script>";
  }
}
?>