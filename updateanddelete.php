<?php
include('config/db.php'); 

if(isset($_POST['delete'])){
    $taskid = $_POST['userid']; 
    // echo $taskid;
    $query = "DELETE from tasks where task_id = $taskid ";
    if(mysqli_query($conn,$query)){
        // echo "TASK DELTED";
        header("location:viewtaskadmin.php");

    }
    else {
        echo 'error'.mysqli_error($conn);
    }
}