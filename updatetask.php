<?php
include('config/db.php');

$taskid = $_POST['taskid'];


$selectTask = "SELECT * FROM tasks WHERE task_id = $taskid";
$result = mysqli_query($conn, $selectTask);
$details = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styledash.css">
    <link rel="stylesheet" href="responsive.css">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="swiper/swiper-bundle.min.css" />

    <title>Edit Task</title>
</head>

<body>

    <?php include('inc/header.php'); ?>

    <div class="container">
        <div class="create_form">
            <form class="create_task" method="POST" action="updatetaskphp.php" name="myForm" onsubmit="return validateForm()">
                <div class="input-group">
                    <label for="tname">Title:</label>
                    <input type="text" name="tname" value="<?php echo $details['title']; ?>" type="text">
                    <input type="hidden" value="<?php echo $taskid ?>" name="taskid">
                </div>

                <div class="create_employe">
                    <div class="input-group">
                        <label for="emp">Employee:</label>
                        <select name="emp" placeholder="please enter the title"
                            onchange="populateInputField()" id="emp">
                            <option hidden selected>Select employee...</option>
                            <?php
                            $employees = $conn->query("SELECT * FROM users");
                            while ($employee = $employees->fetch_assoc()) {
                                $firstname = $employee['username'];
                                $id = $employee['id'];
                                $role = $employee['role'];
                                if ($role == 3) {
                                    echo "<option value='$id'>$firstname</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="id">
                        <label for="emp">Employee_ID:</label>
                        <input name="empid" type="text" id="myInputField" readonly>
                    </div>
                </div>

                <div class="create_employe">
                    <div class="input-group">
                        <div>
                            <label for="subdate">Submission Date:</label>
                            <input type="datetime-local" name="subdate"
                                value="<?php echo date('Y-m-d\TH:i:s', strtotime($details['due_date'])); ?>">
                        </div>
                    </div>

                    <div class="input-group">
                        <label for="priority">Priority:</label>
                        <select name="priority">
                            <option value="1" <?php if ($details['task_priority'] == 1) echo 'selected'; ?>>Low</option>
                            <option value="2" <?php if ($details['task_priority'] == 2) echo 'selected'; ?>>Medium</option>
                            <option value="3" <?php if ($details['task_priority'] == 3) echo 'selected'; ?>>High</option>
                        </select>
                    </div>
                </div>

                <div class="input-group">
                    <label for="tdesc">Description:</label>
                    <textarea name="tdesc"
                        placeholder=""><?php echo $details['description']; ?></textarea>
                </div>

                <input type="submit" value="Update" name="submit" id="submit">
            </form>
        </div>
    </div>

</body>

<script src="js/index.js"></script>
<script src="ajax/ajax.js"></script>

<script>
    function populateInputField() {
        var dropdown = document.getElementById("emp");
        var selectedOptions = Array.from(dropdown.selectedOptions).map(option => option.value);
        var inputField = document.getElementById("myInputField");
        inputField.value = selectedOptions.join(", ");
    }

    function validateForm() {
        var title = document.forms["myForm"]["tname"].value;
        var empID = document.forms["myForm"]["empid"].value;
        var subdate = document.forms["myForm"]["subdate"].value;
        var tdesc = document.forms["myForm"]["tdesc"].value;

        if (title == "") {
            alert("Title must be filled out");
            return false;
        }

        if (empID == "") {
            alert("Employee ID must be filled out");
            return false;
        }

        if (subdate == "") {
            alert("Submission date must be filled out");
            return false;
        }

        if (tdesc == "") {
            alert("Description must be filled out");
            return false;
        }
    }
</script>


</html>

