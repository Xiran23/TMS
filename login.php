<?php
include('config/db.php');
session_start();
  $invalidpassword = '' ;
  $invaliduser     = ''  ;
if(!isset($_SESSION['username'])){

  
  if (isset($_POST['submit'])) 
  {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    
    $query = "SELECT * FROM users WHERE username = '$username'";  
    
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
    
    
    
    
    if ($user) {
      if ($password == $user['password']) {
        //getting user role 
        $role = $user['role'];
        $id  = $user['id'];
        if ($role == 1) {
          
          $_SESSION['username']=$username;
          $_SESSION['password']=$password; 
          $_SESSION['role']=$role; 
          $_SESSION['id']=$id; 
          
          header("Location:dashboard.php");
          
        } else if ($role == 2) {
          $_SESSION['username']=$username;
          $_SESSION['password']=$password; 
          $_SESSION['role']=$role; 
          $_SESSION['id']=$id; 
          
          header("Location:dashboard.php");
        
        
          
      
          // echo "manager";
        } else {
          $_SESSION['username']=$username;
          $_SESSION['password']=$password; 
          $_SESSION['role']=$role; 
          $_SESSION['id']=$id; 
          
          header("Location:dashboard.php");
        }
      }

      else {

        // echo 'password doesnot match';
        $invalidpassword = 'invalid password' ;
      }
      
      // echo $wrong_passowrd;
    } else {
      // echo "user doesnot match";
      $invaliduser     = 'invalid user'  ;
      
    }
  }
  
  
}else{
  header("Location:dashboard.php");

}

  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <title>Login | PAGE</title>
</head>

<body>


  <div class="align">
    <nav class="navbar">
      <ul class="nav-list">
        <div class="logo">
          <img src="images/mountain.png" alt="" />
        </div>
      </ul>

      <div class="right-part-nav">
        <button class="btn">Sign up</button>

        <button class="btn">About us</button>
      </div>
    </nav>

    <section class="first">
      <div class="main">
        <div class="main-left">
          <img src="images/ofc.png" alt="" />
        </div>

        <div class="main-right">


          <form method="POST" >
            <h2>LOGIN</h2>
            <div class="input-group">
              <label for="username">User_Id:</label>
              <input type="text" id="username" name="username" required placeholder="Username" />
              <!-- if username is wrong  -->
              <span><?php echo $invaliduser; ?></span>
              <span class="p-viewer">
                <i class="fa fa-eye" aria-hidden="true"></i>
              </span>
            </div>
            <div class="input-group">
              <label for="password">User_Password:</label>
              <input type="password" id="password" name="password" required placeholder="Password" />
              <span><?php echo  $invalidpassword; ?></span>
            </div>
            <div class="input-group">
              <input type="submit" name="submit" class="submit" value="login">
            </div>
          </form>







        </div>
      </div>
    </section>
  </div>
</body>

</html>