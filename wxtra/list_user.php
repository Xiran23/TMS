<?php
 include('config/db.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <title>list users</title>
  </head>
  <body>
    <div class="container my-5">

        <table class="table" border="1">
  <thead>
    <tr>

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
            $roleName = 'manager';
            break;
        case 2:
            $roleName = 'Employee';
            break;
        case 3:
            $roleName = 'staff';
            break;
        default:
            $roleName = 'helper';
    }
echo '
<tr>
   <th scope="row">'.$id.'</th>
      <td>'.$firstname.'</td>
      <td>'.$lastname.'</td>
      <td>'.$username.'</td>
      <td>'.$email.'</td>
      <td>'.$roleName.'</td>
      <td>'.$password.'</td>
      <td>'.$phonenumber.'</td>

      <td>
      <button class="btn btn-primary"><a class="text-light" href="update.php">Edit</a></button>

      <button class="btn btn-danger"><a class="text-light" href="userdelete.php?deleteid='.$id.'">Delete</a></button>
    </td>
    </tr>
';
  }
}
    ?>

  </tbody>
</table>
<button class="btn btn-success ml-5"><a class="text-light" href="adduser.php">Add user</a></button>
      </div>
  </body>
</html>
