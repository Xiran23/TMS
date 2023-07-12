<?php
session_start();
// if(isset($_SESSION['uname'])){



// }else{
//   echo "<script> location.href='login.php'; </script>";

// }

?>



<?php
// session_start();//alerady in header.php
if(isset($_SESSION['username'])){


  // echo "<script> alert('value is set: $use') </script>";

}
else{
  echo "<script> location.href='login.php'; </script>";

}
if(isset($_POST['logout'])){
  session_unset();
  session_destroy();
  echo "<script> location.href='login.php'; </script>";
}

?>
<header>
    <label>USERs: <?php echo  $_SESSION['username'] ?></label>
    <label>Role: <?php echo  $_SESSION['role'] ?></label>
    <label style="color: brown;">userid: <?php echo  $_SESSION['id'] ?></label>


</header>

<nav>
        <ul>
          <li>
            <a href="#" class="logo">
              <img src="images/Picture2.png" alt="" />
              <?php
                if ($_SESSION['role'] == 1): ?>
                  <span class="ADMIN">ADMIN</span>
                <?php elseif ($_SESSION['role'] == 2):?>
                    <span class="MANAGER" style="font-size: 26px;">MANAGER</span>
                <?php elseif ($_SESSION['role'] == 3) : ?>
                  <span class="STAFF">STAFF</span>

              <?php endif ?>

            </a>
          </li>
          <!-- **********************************Admin******************************************************** -->

          <?php if($_SESSION['role']==1): ?>
          <li>
            <a href="dashboard.php">
              <img class="dashlogo" src="images/icon/dashboard.png" alt="" />
              <span class="nav-item">DASHBOARD</span>
            </a>
          </li>
          <!-- creating TASKS -->
          <li>
            <a href="createtask.php" onclick="createTask()">
              <img
                class="dashlogo"
                src="images/icon/create.png"
                alt=""
              />
              <span class="nav-item">CREATE TASKS</span>
            </a>
          </li>

           <!-- view TASKS -->
           <li>
            <a href="viewtaskadmin.php" >
              <img
                class="dashlogo"

                src="images/icon/prioritize1.png"
                alt=""
              />
              <span class="nav-item">view TASKS</span>
            </a>
          </li>

          <li>
            <a href="adduser.php" onclick="">
              <img
                class="dashlogo"

                src="images/icon/adduser.png"
                alt=""
              />
              <span class="nav-item">ADD-Users</span>
            </a>
          </li>

          <li>
            <a href="listuser.php" onclick="">
              <img
                class="dashlogo"

       src="images/icon/shortlist.png"
                alt=""
              />
              <span class="nav-item">list-Users</span>
            </a>
          </li>

          <li>
            <a href="notice.php" onclick="">
              <img
                class="dashlogo"

                src="images/icon/leave.png"
                alt=""
              />
              <span class="nav-item">Notes</span>
            </a>
          </li>


          <li>
            <a href="sendnotice.php" onclick="">
              <img
                class="dashlogo"

                src="images/icon/note.png"
                alt=""
              />
              <span class="nav-item">Send Notes</span>
            </a>
          </li>


          <!-- ***********************************************Manager************************************************** -->
          <?php elseif ($_SESSION['role'] == 2):?>
            <li>
            <a href="dashboard.php">
              <img class="dashlogo" src="images/icon/dashboard.png" alt="" />
              <span class="nav-item">DASHBOARD</span>
            </a>
          </li>
          <!-- creating TASKS -->
          <li>
            <a href="createtask.php" onclick="createTask()">
              <img
                class="dashlogo"
                src="images/icon/create.png"
                alt=""
              />
              <span class="nav-item">CREATE TASKS</span>
            </a>
          </li>

           <!-- view TASKS -->
           <li>
            <a href="viewtask.php" >
              <img
                class="dashlogo"

                src="images/icon/prioritize1.png"
                alt=""
              />
              <span class="nav-item">view TASKS</span>
            </a>
          </li>
          <li>
            <a href="listuser.php" onclick="">
              <img
                class="dashlogo"

                src="images/icon/shortlist.png"
                alt=""
              />
              <span class="nav-item">list-Users</span>
            </a>
          </li>
          <li>
            <a href="notice.php" onclick="">
              <img
                class="dashlogo"

                src="images/icon/leave.png"
                alt=""
              />
              <span class="nav-item">Notes</span>
            </a>
          </li>


          <li>
            <a href="sendnotice.php" onclick="">
              <img
                class="dashlogo"

                src="images/icon/note.png"
                alt=""
              />
              <span class="nav-item">Send Notes</span>
            </a>
          </li>


<!-- *****************************Staff******************************************************** -->
            <?php elseif ($_SESSION['role'] == 3) : ?>
              <li>
            <a href="dashboard.php">
              <img class="dashlogo" src="images/icon/dashboard.png" alt="" />
              <span class="nav-item">DASHBOARD</span>
            </a>
          </li>
          <li>
            <a href="viewtask.php" >
              <img
                class="dashlogo"

                src="images/icon/prioritize1.png"
                alt=""
              />
              <span class="nav-item">view TASKS</span>
            </a>
          </li>
          <li>
            <a href="notice.php" onclick="">
              <img
                class="dashlogo"

                src="images/icon/leave.png"
                alt=""
              />
              <span class="nav-item">Notes</span>
            </a>
          </li>


              <?php endif ?>



        </ul>

<div class=" nav-item logout-div">

<div><img src="images/icon/logout.png" alt="" width="40px"></div>
<div class="logt">
  <form method="POST"">
  <button class="nav-item logout" type="logout" value="logout" name="logout" >Logout</button>
</form>
</div>
</div>





      </nav>