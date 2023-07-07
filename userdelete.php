<?php
 include('config/db.php');

if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];


    $sql = "delete from `users` where id = $id";
    $result = mysqli_query($conn,$sql);

    if($result){
        header('location:list_user.php');
    } else {
        die(mysqli_error($conn));
    }
}

?>