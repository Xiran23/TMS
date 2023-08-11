<?php include('config/db.php');


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <link rel="icon" href="images/picture2.png" type="image/png">
  <link rel="shortcut icon" href="images/picture2.png" type="image/png">

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="styledash.css" />
  <link rel="stylesheet" href="responsive.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


  <title>Dashbord</title>
</head>

<body>

  <?php
  include('inc/header.php');

  ?>


  <div class="container">





    <div class="usertable">
      <table class="table">
        <thead>
          <tr class="curve">

            <th scope="col">S/n</th>
            <th scope="col">USER_ID</th>
            <th scope="col">first name</th>
            <th scope="col">last name</th>
            <th scope="col">username</th>
            <th scope="col">email</th>
            <th scope="col">role</th>
            <th scope="col">Total task</th>
            <th scope="col">Remaning task</th>
            <th scope="col">completed task</th>
        
            <th scope="col">phonenumber</th>
            <?php if ($_SESSION['role'] == 1) : ?>
              <th scope="col" colspan="2">operation</th>
            <?php endif ?>

          </tr>
        </thead>
        <tbody>

          <?php

          $sql = "SELECT * FROM `Users` ";

          $result = mysqli_query($conn, $sql);

          if ($result) {
            $sn =0  ;

            while ($row = mysqli_fetch_assoc($result)) {

              $id = $row['id'];
              $firstname = $row['firstname'];
              $lastname = $row['lastname'];
              $username = $row['username'];
              $email = $row['email'];
              $role = $row['role'];
              $password = $row['password'];
              $phonenumber = $row['phonenumber'];
              $sn++;

              $user_id = $id;
              $queryuserstotaltask = "SELECT COUNT(*) AS usertotaltask from tasks WHERE user_id  = $user_id";
              $resultuserstasks = mysqli_query($conn, $queryuserstotaltask);
              $rowuserstasks = mysqli_fetch_array($resultuserstasks);
              $totalusertasks = $rowuserstasks['usertotaltask'];

              // $queryuserincompletetask = "SELECT COUNT(*) As incompletetask FROM tasks WHERE status = 'pending' OR status = 'in_progress'";
              $queryuserincompletetask = "SELECT COUNT(*) AS incompletetask FROM tasks WHERE (status = 'pending' OR status = 'in_progress') AND user_id = $user_id";
              $resultuserincompletetask = mysqli_query($conn, $queryuserincompletetask);
              $rowuserincompletetask = mysqli_fetch_array($resultuserincompletetask);
              $totaluserincompletetask = $rowuserincompletetask['incompletetask'];
              // echo $rowincompletetask;

              $queryusercompletetask = "SELECT COUNT(*) AS completedtask FROM tasks WHERE status = 'completed' AND user_id = $user_id";
              $resultusercompletetask = mysqli_query($conn, $queryusercompletetask);
              $rowusercompletetask = mysqli_fetch_array($resultusercompletetask);
              $totalusercompletetask = $rowusercompletetask['completedtask'];

              // assign role as givn by role no

              $roleName = '';
              switch ($role) {
                case 1:
                  $roleName = 'Admin';
                  break;
                case 2:
                  $roleName = 'Manager';
                  break;
                case 3:
                  $roleName = 'Employee';
                  break;
                default:
                  $roleName = 'helper';
              }


              $deletebutton = " ";
              if ($_SESSION['role'] == 1) {
                $deletebutton = '<td> <button class=" delete" ><a class="userdelet" href="userdelete.php?deleteid=' . $id . '"><i class="fas fa-trash"></i></a></button> </td>';
                $editbutton = '<td> <button class="edit" ><a class="userdelet" href="useredit.php?editid=' . $id . '"><i class="fas fa-edit"></i></a></button> </td>';
              }
              echo '

<tr>
   <td>'.$sn.'</td>
<td scope="row">00' . $id . '</td>
<td>' . $firstname . '</td>
<td>' . $lastname . '</td>
<td>' . $username . '</td>
<td>' . $email . '</td>
<td>' . $roleName . '</td>
<td>' . $totalusertasks . '</td>
<td>' . $totaluserincompletetask . '</td>
<td>' . $totalusercompletetask . '</td>

<td>' . $phonenumber . '</td>

' . $deletebutton,$editbutton . '



</tr>
';
            }
          }
          ?>

        </tbody>
      </table>




    </div>


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
  var deleteButtons = document.querySelectorAll(".delete");

  for (var i = 0; i < deleteButtons.length; i++) {
    var deleteButton = deleteButtons[i];

    deleteButton.addEventListener("click", function(event) {
      event.preventDefault();
      var flag = confirm("Are you sure you want to remove user?");
      if (flag == true) {
        window.location.href = this.querySelector("a").href;
      }
    });
  }

  var editButtons = document.querySelectorAll(".edit");

for (var i = 0; i < editButtons.length; i++) {
  var editButton = editButtons[i];

  editButton.addEventListener("click", function(event) {
    event.preventDefault();
    var flag = confirm("Are you sure you want to Edit user?");
    if (flag == true) {
      window.location.href = this.querySelector("a").href;
    }
  });
}



  // var deleteconfirm = document.getElementsByClassName("delete");
  // for(var i=0; i<= deleteconfirm.length; i++){
  //     var deletes = deleteconfirm[i];

  //     deletes.addEventListener("click",function(event){
  //         event.preventDefault();
  //         var flag = confirm("Are you sure you want to remove user");
  //         if(flag == false ){
  //         // alert("failed");
  //         return false;
  //         }
  //     })
  // }
</script>