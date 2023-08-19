<?php

include('config/db.php');
// echo $_POST['deleteid'];

if (isset($_POST['deleteid'])) {
    $id = $_POST['deleteid'];

    $sql = "DELETE FROM notices WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('Location: notice.php');
        exit();
    } else {
        die(mysqli_error($conn));
    }
}
