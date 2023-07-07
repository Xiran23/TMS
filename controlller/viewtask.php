



<?php 
include('inc/header.php');

      include('inc/nav.php'); 
      ?>
<title>View Task</title>
  </head>
  <body>
    <!-- **************************************************** -->
  <div class="container">

<!-- ******************************************** -->
<div>
    <h1> Creating TASKS</h1>
 
    <?php foreach($tasks  as $task ): ?>

        
        <div >
            <h3><?php echo $task['title']; ?></h3>
                
                <?php echo $task['task_id'] ?>

                <h1>Description</h1>
                <?php echo $task['description']; ?>

                <h4>SUBMITTION DATE</h4>
                <?php echo $task['due_date']; ?>

                <button>UPDATE</button>
                
                <button>DELETE</button>
        </div>


</div>
<?php endforeach; ?>
</div>

