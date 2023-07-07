<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="styledash.css" /> -->
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            outline: none;
            border: none;
            text-decoration: none;
            box-sizing: border-box;
            font-family: "Noto Sans JP", sans-serif;
        }

        body {
            background: #d9d9d9;
            min-height: 100vh;
        }

        header {
            /* display: none; */
            background: #0d47a1;
            height: 50px;
            text-align: center;
            display: flex;
            justify-content: space-around;
            position: fixed;

            padding: 10px;
            width: 100%;

        }
  
nav{
    background:#ffffff;
    margin-top: 50px;
    padding-top: 30px;
    position: fixed;
    left: 0;
    width: 250px;
    height: 100%;
    transition: 0.5s;
    transition-property: left;
    font-family: 'Noto Sans JP', sans-serif;
font-family: 'Roboto', sans-serif;
}



.right-div{
    margin-left: 250px;
    /* background-image: url(images/photoes3.jpg);
    background-repeat: no-repeat ;
    background-size: cover; */
    height: 100vh;
    width: 100%;
    margin-top: 50px;
    position: fixed;
    background-color: rgb(255, 233, 233);
    transition: 0.5s;
}
    </style>
</head>

<body>

    <header>
        <label>USER: CHIRAN</label>
        <label>Email:</label>
    </header>
    <nav>
        <ul>
            <li>
                <a href="#" class="logo">
                    <img src="images/Picture2.png" alt="" />
                    <span class="ADMIN">ADMIN</span>
                </a>
            </li>

            <li>
                <a href="dashboard.php" onclick="Opensection('main-dashboard')">
                    <img class="dashlogo" src="images/icon/dashboard.png" alt="" />
                    <span class="nav-item">DASHBOARD</span>
                </a>
            </li>
            <!-- creating TASKS -->
            <li>
                <a href="createtask.php" onclick="createTask()">
                    <img class="dashlogo" src="images/icon/update.png" alt="" />
                    <span class="nav-item">CREATE TASKS</span>
                </a>
            </li>

            <!-- view TASKS -->
            <li>
                <a href="#" onclick="viewTask()">
                    <img class="dashlogo" src="images/icon/update.png" alt="" />
                    <span class="nav-item">view TASKS</span>
                </a>
            </li>

            <li>
                <a href="adduser.php" onclick="">
                    <img class="dashlogo" src="images/icon/update.png" alt="" />
                    <span class="nav-item">ADD-Users</span>
                </a>
            </li>
            <li>
                <a href="adduser.php" onclick="">
                    <img class="dashlogo" src="images/icon/update.png" alt="" />
                    <span class="nav-item">list-Users</span>
                </a>
            </li>
            <li>
                <a href="#" class="logout">
                    <form method="POST">
                        <input type="submit" value="logout" name="logout"><label></label>
                    </form>
                    <!-- 
              <span class="nav-item"> -->
                    <!-- Logout -->
                    </span>
                </a>
            </li>
        </ul>
    </nav>


    <div class="right-div">
        <h1>HEY</h1>


        <div class="Section">
            <!-- ******************************** -->



            <!-- ******************************** -->


        </div>

        <!-- ************************************************************************************************************************************************************* -->






    </div>

</body>

</html>