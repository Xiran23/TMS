<?php 
include('config.php'); 

$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

//check the error from last connefction made 

if(mysqli_connect_errno()){
    echo "failed to connect  "; 
}
// else { 
//     echo "connected ";
// }


?>