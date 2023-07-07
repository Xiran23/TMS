<!-- view task -->
<?php
require "config/db.php";

//fetch query

$query = "SELECT *FROM tasks ";

$result = mysqli_query($conn, $query);

$tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styledash.css" />
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="swiper avoid/swiper-bundle.min.css" />
    <link rel="stylesheet" href="responsive.css">
    <script src="swiper avoid/swiper-bundle.min.js"></script>
    <title>Dashbord</title>
  </head>
  <body>

    <?php include "inc/header.php"; ?>

    <div class="container">

    <section class="dashviewtask">

    <div class="sort-buttons">
         <button class="button-small"  style=" background-color:#ff9999;" id="sort-high">High Priority</button>
            <button class="button-small" style=" background-color:#ffffb3;" id="sort-medium">Medium Priority</button>
           <button  class="button-small" style=" background-color:#b3ffb3;" id="sort-low">Low Priority</button>
            <button class="button-small" id="sort-all">All Tasks</button>
   </div>




   <section class="tasks">
    <!-- ******************************** -->
    <?php foreach ($tasks as $task): ?>
      <?php
      //  print_r($task);
       ?>





     <div class="t-card ">

              <div class="task-text-contents">


            <div class="task-title">
                <h2 class="task-no"><?php echo $task["title"]; ?></h2>
           <p class="task-description"><?php echo $task["description"]; ?></p>
               </div>
               <div class="task-priority">
            <h2 class="task-no" id="priority"><?php echo $task["task_priority"]; ?></h2>
               </div>

                      </div>

              <div class="task-buttons">
              <div class="task-assigned-employee"><img src="images/icon/user-logo.png" alt="logo" width="30"> <span>
                <?php echo $task["user_id"]; ?></span>   </div>
              <span class="task-progress"><?php echo $task['status']; ?></span> <br>
              <span class="task-progress"><?php echo date('Y-m-d', strtotime($task['created_at'])); ?></span> <br>
              <span class="task-progress"><?php echo date('H:i:s', strtotime($task['created_at'])); ?></span> <br>
              
              <span class="task-progress"><?php echo date('Y-m-d', strtotime($task['due_date'])); ?></span> <br>
              <span class="task-progress"><?php echo date('H:i:s', strtotime($task['due_date'])); ?></span> <br>


              <input type="text" id="startDate" value="<?php echo $task['created_at']; ?>">
              <input type="text" id="endDate"value="<?php echo $task['due_date']; ?>">
              <span class="task-progress"><?php echo $task['created_at']; ?></span> <br>
              <span type="hidden"class="task-progress"><?php echo $task['due_date']; ?></span> <br>


              <div class="remaining-time" data-start-date="<?php echo $task['created_at']; ?>" data-end-date="<?php echo $task['due_date']; ?>"></div>


              <!-- <span class="task-issued-date">//Issued date//</span> -->
              </div>

            </div>



            
            <?php endforeach; ?>

            <script>
  var remainingTimeElements = document.getElementsByClassName("remaining-time");

  function updateRemainingTime() {
    var now = new Date();

    for (var i = 0; i < remainingTimeElements.length; i++) {
      var startDate = new Date(remainingTimeElements[i].dataset.startDate);
      var endDate = new Date(remainingTimeElements[i].dataset.endDate);
      var remainingTime = endDate - now;

      if (remainingTime > 0) {
        var days = Math.floor(remainingTime / (1000 * 60 * 60 * 24));
        var hours = Math.floor((remainingTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);

        remainingTimeElements[i].innerHTML = "Remaining Time: " + days + "d " + hours + "h " + minutes + "m " + seconds + "s";
      } else {
        remainingTimeElements[i].innerHTML = "Time's Up!";
      }
    }
  }

  setInterval(updateRemainingTime, 1000);
  updateRemainingTime();
</script>
          </section>


            </section>

<!-- ************************************************************************************************************************************************************* -->








</body>

<script>
  console.log("hey");



var taskBlocks = document.getElementsByClassName('t-card');
for (var i = 0; i < taskBlocks.length; i++) {
  var taskBlock = taskBlocks[i];
  // var priority = taskBlock.getElementById('priority').textContent;
  var priority = taskBlock.querySelector('#priority').textContent;

  switch (priority) {
    case '1':
      taskBlock.classList.add('low-priority');
      break;
    case '2':
      taskBlock.classList.add('medium-priority');
      break;
    case '3':
      taskBlock.classList.add('high-priority');
      break;
    default:
      break;
  }
}

// taskBlocks.classList.add('task-blockrt');



  console.log(priority);


  function showAllTasks() {
    for (var i = 0; i < taskBlocks.length; i++) {
      var taskBlock = taskBlocks[i];
      taskBlock.style.display = 'flex';
    }
  }


  function sortTasksByPriority(priority) {
    for (var i = 0; i < taskBlocks.length; i++) {
      var taskBlock = taskBlocks[i];
      var taskPriority = taskBlock.querySelector('#priority').textContent;

      if (taskPriority === priority) {
        taskBlock.style.display = 'flex';
      } else {
        taskBlock.style.display = 'none';
      }
    }
  }

  var sortHighButton = document.getElementById('sort-high');
  sortHighButton.addEventListener('click', function() {
    sortTasksByPriority('3');
  });

  var sortMediumButton = document.getElementById('sort-medium');
  sortMediumButton.addEventListener('click', function() {
    sortTasksByPriority('2');
  });

  var sortLowButton = document.getElementById('sort-low');
  sortLowButton.addEventListener('click', function() {
    sortTasksByPriority('1');
  });

  var sortAllButton = document.getElementById('sort-all');
  sortAllButton.addEventListener('click', function() {
    showAllTasks();
  });

  document.addEventListener("DOMContentLoaded", function() {
    var swiper = new Swiper(".mySwiper", {
      direction: "vertical",
      slidesPerView: "5",
      spaceBetween: 10,
      scrollbar: {
        el: ".swiper-scrollbar",
        draggable: true,
      },
    });
  });



  var startDate =document.getElementById("startDate").value;
  var endDate =document.getElementById("endDate").value;
  // var startDate = new Date(startDate);
  // var timeDiff = endDate.getTime()
  console.log(startDate);
  console.log(endDate);
function calculateRemanindTime(){

}


</script>

<!-- Swiper JS -->

 <script src="swiper/swiper-bundle.min.js"></script>
<!-- <script src="js/jquery-3.7.0.min.js"></script>
<script src="js/index.js"></script>
<script src="ajax/ajax.js"></script> --> 

<!-- Initialize Swiper -->


</html>
