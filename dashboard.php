<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styledash.css" />
    <link rel="stylesheet" href="responsive.css">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="swiper/swiper-bundle.min.css" />

    <style>

     .swiper-wrapper {
        margin-left: 0 !important;  /*if it works no touching   */
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
          <div class="card swiper-slide">
            <div class="employee">
              <img
                class="e-logo"
                src="images/profile/p6.jpg"
                alt="Employee Image"
              />
              <div class="e-text">
                <h2 class="employee-name">Manik lama</h2>
                <h6 class="employee-post">Marketing</h6>
              </div>
            </div>
            <div class="e-description">
              <p>
                Lorem ipsum dolor sit amet consectetur. hello my name is manik
                lama currently doing bachelor in southwestern stsate clz
              </p>
            </div>
          </div>

          <div class="card swiper-slide">
                <div class="employee">
                  <img
                    class="e-logo"
                    src="images/profile/p2.jpg"
                    alt="Employee Image"
                  />
                  <div class="e-text">
                    <h2 class="employee-name">Manik lama</h2>
                    <h6 class="employee-post">Ui designer</h6>
                  </div>
                </div>
                <div class="e-description">
                  <p>
                    Lorem ipsum dolor sit amet consectetur. Lorem ipsum, dolor
                    sit amet consectetur adipisicing elit.
                  </p>
                </div>
              </div>


              <div class="card swiper-slide">
                <div class="employee">
                  <img
                    class="e-logo"
                    src="images/profile/p2.jpg"
                    alt="Employee Image"
                  />
                  <div class="e-text">
                    <h2 class="employee-name">Manik lama</h2>
                    <h6 class="employee-post">Ui designer</h6>
                  </div>
                </div>
                <div class="e-description">
                  <p>
                    Lorem ipsum dolor sit amet consectetur. Lorem ipsum, dolor
                    sit amet consectetur adipisicing elit.
                  </p>
                </div>
              </div>

              <div class="card swiper-slide">
                <div class="employee">
                  <img
                    class="e-logo"
                    src="images/profile/p2.jpg"
                    alt="Employee Image"
                  />
                  <div class="e-text">
                    <h2 class="employee-name">Manik lama</h2>
                    <h6 class="employee-post">Ui designer</h6>
                  </div>
                </div>
                <div class="e-description">
                  <p>
                    Lorem ipsum dolor sit amet consectetur. Lorem ipsum, dolor
                    sit amet consectetur adipisicing elit.
                  </p>
                </div>
              </div>

          <!-- Rest of the slide content -->

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
