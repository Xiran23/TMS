<?php

include('config/db.php');

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    $sql = "DELETE FROM notices WHERE notice_id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('Location: notice.php'); // Redirect to the dashboard after successful deletion
        exit();
    } else {
        die(mysqli_error($conn));
    }
}
