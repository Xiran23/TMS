<?php
include('config/db.php');

$queryTasks = "SELECT COUNT(*) AS totalTasks FROM tasks";
$resultTasks = mysqli_query($conn, $queryTasks);
$rowTasks = mysqli_fetch_assoc($resultTasks);
$totalTasks = $rowTasks['totalTasks'];

$queryStaffs = "SELECT COUNT(*) AS totalStaffs FROM users WHERE role = 3";
$resultStaffs = mysqli_query($conn, $queryStaffs);
$rowStaffs = mysqli_fetch_assoc($resultStaffs);
$totalStaffs = $rowStaffs['totalStaffs'];

$queryNotices = "SELECT COUNT(*) AS totalNotices FROM notices";
$resultNotices = mysqli_query($conn, $queryNotices);
$rowNotices = mysqli_fetch_assoc($resultNotices);
$totalNotices = $rowNotices['totalNotices'];


$query = "SELECT * FROM users";

$result = mysqli_query($conn, $query);

$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styledash.css" />
    <link rel="stylesheet" href="responsive.css" />
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="swiper/swiper-bundle.min.css" />

    <style>
      .swiper-wrapper {
        margin-left: 15px !important;
      }
    </style>

    <title>Dashbord</title>
  </head>

  <body>
    <?php
    include('inc/header.php');
  ?>

    <div class="container">
      <div class="swiper mySwiper1">
        <div class="slide-container swiper-wrapper">
          <?php foreach ($users as $user): ?>
          <div class="card swiper-slide">
            <div class="employee">
              <img class="e-logo" src="uploads/<?php echo $user["profilepic"]; ?>"
              alt="Employee Image" />
              <div class="e-text">
                <h2 class="employee-name">
                  <?php echo $user["firstname"] . " " . $user["lastname"]; ?>
                </h2>
                <h6 class="employee-post">
                  <?php
              $role = $user["role"];
              switch ($role) {
                case 1:
                  echo "Admin";
                  break;
                case 2:
                  echo "Manager";
                  break;
                case 3:
                  echo "Staff";
                  break;
                default:
                  echo "Unknown";
                  break;
              }
              ?>
                </h6>
              </div>
            </div>
            <div class="e-description">
              <p>
                <?php echo $user["description"]; ?>
              </p>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="bottom-dash">
        <div class="dash-left">
          <div class="total">

          <div class="total-card">
              <div class="total-logo">
                <img src="images/icon/shortlist.png" width="90px" alt="" />
              </div>
              <div class="task-bottom">
                <div class="total-title">
                  <h5>Total Tasks</h5>
                </div>

                <div class="total-tasks">
                  <h1><?php echo $totalTasks; ?></h1>
                </div>
              </div>
            </div>


          </div>
          <div class="total">
            <div class="total-card">
              <div class="total-logo">
                <img src="images/icon/shortlist.png" width="90px" alt="" />
              </div>
              <div class="task-bottom">
                <div class="total-title">
                  <h5>Total Staffs</h5>
                </div>

                <div class="total-tasks">
                  <h1><?php echo $totalStaffs; ?></h1>
                </div>
              </div>
            </div>
          </div>

          <div class="total">

          <div class="total-card">
              <div class="total-logo">
                <img src="images/icon/shortlist.png" width="90px" alt="" />
              </div>
              <div class="task-bottom">
                <div class="total-title">
                  <h5>Total Notice</h5>
                </div>

                <div class="total-tasks">
                  <h1><?php echo $totalNotices; ?></h1>
                </div>
              </div>
            </div>
          </div>

          <div class="total">

          <div class="total-card">
              <div class="total-logo">
                <img src="images/icon/shortlist.png" width="90px" alt="" />
              </div>
              <div class="task-bottom">
                <div class="total-title">
                  <h5>Total Tasks</h5>
                </div>

                <div class="total-tasks">
                  <h1>10</h1>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="dash-right">
          <div class="graph">
            <div>
              <canvas id="myChart" style="width: 500px; height: 370px"></canvas>
            </div>

            <div>
              <h3 style="text-align: center; margin-top: 20px">
                Balance of staff and tasks
              </h3>
            </div>

            <script>
              const xValues = ["staff", "employee"];
              const yValues = [<?php echo $totalTasks; ?>, <?php echo $totalStaffs; ?>];
              const barColors = ["#b91d47", "#00aba9"];

              new Chart("myChart", {
                type: "pie",
                data: {
                  labels: xValues,
                  datasets: [
                    {
                      backgroundColor: barColors,
                      data: yValues,
                    },
                  ],
                },
                options: {
                  legend: {
                    position: "top",
                    align: "end",
                  },
                },
              });
            </script>
          </div>
        </div>
      </div>
    </div>

    <!-- Swiper JS -->
    <script src="swiper/swiper-bundle.min.js"></script>
    <script>
      var swiper1 = new Swiper(".mySwiper1", {
        slidesPerView: getSlidesPerView(),
        spaceBetween: 30,
        freeMode: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
      });

      function getSlidesPerView() {
        if (window.innerWidth <= 800) {
          return 1;
        } else if (window.innerWidth <= 1112) {
          return 2;
        } else {
          return 3;
        }
      }

      window.addEventListener("resize", function () {
        swiper1.params.slidesPerView = getSlidesPerView();
        swiper1.update();
      });
    </script>
  </body>
</html>
