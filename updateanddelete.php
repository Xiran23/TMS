<?php


include('config/db.php');
var_dump($_POST);  
$taskid = $_POST['userid'];
echo $taskid;
echo "1";

$taskid = $_POST['userid']; 
$query = "DELETE from tasks where task_id = $taskid ";
if(mysqli_query($conn,$query)){
    // echo "TASK DELTED";
    header("location:viewtaskadmin.php");
    
}
else {
    echo 'error'.mysqli_error($conn);
}

