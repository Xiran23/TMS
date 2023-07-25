<?php include('config/db.php');


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styledash.css" />
    <link rel="stylesheet" href="responsive.css">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="swiper/swiper-bundle.min.css" />


    <title>Dashbord</title>
</head>
<body>

    <?php
      include('inc/header.php');

      ?>


 <div class="container">





    <div class="usertable">
    <table  class="table">
             <thead>
                <tr class="curve">

                    <th scope="col">S/N</th>
                    <th scope="col">first name</th>
                    <th scope="col">last name</th>
                    <th scope="col">username</th>
                    <th scope="col">email</th>
                    <th scope="col">role</th>
                    <th scope="col">password</th>
                    <th scope="col">phonenumber</th>
                    <th scope="col">operation</th>

                </tr>
            </thead>
            <tbody>

                <?php
                $sql = "SELECT * FROM `Users`; ";

                $result = mysqli_query($conn,$sql);

                if($result){

    while( $row = mysqli_fetch_assoc($result)){
        $id=$row['id'];
        $firstname=$row['firstname'];
        $lastname=$row['lastname'];
        $username=$row['username'];
        $email=$row['email'];
        $role=$row['role'];
        $password=$row['password'];
        $phonenumber=$row['phonenumber'];

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
                    echo '
<tr>
<td scope="row">'.$id.'</td>
<td>'.$firstname.'</td>
<td>'.$lastname.'</td>
<td>'.$username.'</td>
<td>'.$email.'</td>
<td>'.$roleName.'</td>
<td>'.$password.'</td>
<td>'.$phonenumber.'</td>

<td>


<button class="btn btn-danger delete" ><a class="text-light" href="userdelete.php?deleteid='.$id.'">Delete</a></button>

</td>
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


