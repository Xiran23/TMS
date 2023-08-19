<?php include('config/db.php'); ?>
<?php
$taskid = $_POST['taskid'];
if (isset($_POST['submit'])) {
    $title = $_POST['tname'];
    $description = $_POST['tdesc'];
    $subdate = $_POST['subdate'];
    $employee_id = $_POST['empid'];
    $priority = $_POST['priority'];

    $updateQuery = "UPDATE tasks SET title = '$title', description = '$description', due_date = '$subdate', user_id = '$employee_id', task_priority = '$priority' WHERE task_id = $taskid";

    if (mysqli_query($conn, $updateQuery)) {
        echo '<script> alert("Task Updated Successfully"); </script>';
        echo " <script>window.location.href = 'viewtaskadmin.php'</script>";
    } else {
        echo "Error updating task: " . mysqli_error($conn);
    }
}
?>