<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hacking Lab</title>


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/index.css">
  <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
/>
</head>

<body>

  <div class="container-warp">

 <!-- ========== Start navbar ========== -->
<nav class="navbar navbar-expand-lg bg-navbar">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="../assets/logo.png" alt="Bootstrap" width="80" height="60">
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item mx-3">
          <a class="nav-link " aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item mx-3">
          <a class="nav-link" href="#">Change Lab</a>
        </li>
        <li class="nav-item mx-3">
          <a class="nav-link" href="#">Help</a>
        </li>
        <?php 
          session_start();

          if (isset($_SESSION['user'])) {
              // User is authenticated
              $user = $_SESSION['user'];
              echo '<li class="nav-item mx-3">';
              echo '<span class="nav-link">Hello, ' . htmlspecialchars($user['name']) . '!</span>';
              echo '</li>';
              echo '<li class="nav-item mx-3">';
              echo '<form action="logout.php" method="post">';
              echo '<button type="submit" class="btn btn-outline-light">Logout</button>';
              echo '</form>';
              echo '</li>';
          } else {
              // User is not authenticated
              echo '<li class="nav-item mx-3">';
              echo '<a class="nav-link" href="login.php">Login</a>';
              echo '</li>';
          }
        ?>
      </ul>
    </div>
  </div>
</nav>
<!-- ========== End navbar ========== -->





    <div class="home-backgourd-cover"></div>

    <!-- ========== Start main ========== -->
    <section class="main container-fluid d-flex align-items-center justify-content-center " id="main"
      style="margin-top: 60px; margin-bottom: 170px;">
      <div class="d-flex">
        <div>
          <img src="../assets/logo-main.svg" alt="" width="300" height="400">
        </div>
        <div class="d-flex align-items-center ml-3">
          <div class="d-flex-col">
            <h1 class="main-h1">Welcome to <span class="main-h1-span">கவசம்</span></h1>

            <p class="mt-3 main-p">Our platform offers real-world scenarios to test and enhance your cybersecurity
              skills.<br> Whether you're a beginner or an experienced professional, Kavasam is your go-to resource for
              all things cybersecurity.</p>

            <a href="./php/xss.php" class="btn btn-shin mt-3">Start a Challenge</a>

            <!-- <p class="mt-3">"Kavasam is an amazing platform. The challenges are engaging and I've learned so much." - User Testimonial</p> -->
          </div>

        </div>
      </div>
    </section>
    <!-- ========== End main ========== -->
    <hr class="kavasam-hr">

    <!-- ========== Start  about ========== -->
    <section class="main container-fluid about text-center  " style="margin-top: 60px; margin-bottom: 170px;">
      <h1 class="about-h1">About <span class="main-h1-span pt-2">Kavasam</span></h1>
      <p class="about-p mt-4 " style="padding-left: 300px;padding-right: 300px;">
        Welcome to Kavasam, your ultimate shield in the digital world. We provide a robust platform for cybersecurity
        enthusiasts to learn, practice, and master various aspects of cybersecurity. Our live practice labs offer
        real-world scenarios to test and enhance your skills. Whether you're a beginner looking to explore the field or
        an experienced professional seeking to stay on top of the latest threats, Kavasam is your go-to resource for all
        things cybersecurity.
      </p>
    </section>
    <!-- ========== End  about ========== -->

    <hr class="kavasam-hr">
    <!-- ========== Start challanges ========== -->

    <!-- Swiper -->
    <h1 class="about-h1 text-center">Explore <span class="main-h1-span pt-2">Kavasam Labs</span></h1>
  <div class="swiper mySwiper" style="margin-top: 60px; margin-bottom: 170px;  margin-left: 120px;">
    <div class="swiper-wrapper">
      <div class="swiper-slide" width="200px" height="300px">
        <img src="../assets/labthumline/sql.jpeg"  width="300px" height="300px"  />
        <div class="lab-card">
        <p class="labs-card-h1 p-3 ">Infiltrate the Database: SQL Injection</p>
        </div>
        
      </div>
      <div class="swiper-slide" width="200px" height="300px">
        <img src="../assets/labthumline/xss.jpeg"  width="300px" height="300px"/>
        <p class="labs-card-h1 p-3 ">Scripting Mayhem: Cross-Site Scripting</p>
      </div>
      <div class="swiper-slide" width="200px" height="300px">
        <img src="../assets/labthumline/bruteforce.jpeg" width="300px" height="300px" />
        <p class="labs-card-h1 p-3 ">Crack the Code: Brute Force Attack</p>
      </div>
      <div class="swiper-slide" width="200px" height="300px">
        <img src="../assets/labthumline/bfs.jpeg" width="300px" height="300px"/>
        <p class="labs-card-h1 p-3 ">Pathfinder: Breadth-First Search</p>
      </div>
    
    </div>
    <div class="swiper-pagination"></div>
  </div>


    <!-- ========== End challanges ========== -->
    
    <hr class="kavasam-hr">
    <section class="container-fluid  labtodo d-flex  align-items-center r" style="margin-top: 60px; margin-bottom: 170px;  margin-left: 120px;">
  <img src="../assets/labthumline/cyberhacker2.png" alt="" width="300" height="400">
  <div class="lab-description">
    <h2 class="about-h1">Live <span class="main-h1-span pt-2">Practice Machine</span></h2>
    <p class="main-p">In this section, you'll get hands-on experience with real-world cybersecurity challenges. <br>You'll learn how to exploit vulnerabilities, crack codes, and secure systems.<br> Each challenge is designed to teach you a specific skill or technique, so you can apply what you've learned to real-world situations.</p>
    <p class="main-p">Remember, the best way to learn cybersecurity is by doing. So roll up your sleeves and get started!</p>
    <a href="./php/xss.php" class="btn btn-shin mt-3">Start a Challenge</a>
  </div>
</section>
   <!-- ========== Start footer ========== -->
   <footer>
    <div class="container-fluid bg-footer px-3" style="padding-top: 40px; padding-bottom: 20px;  ">
      <div class="row">
        <div class="col-md-4">
          <img src="../assets/logo.png" alt="Kavasam" width="100" height="80">
          <p class="footer-p"><span class="main-h1-span pt-2 fw-bold">Kavasam</span> is your ultimate shield in the digital world. We provide a robust platform for cybersecurity enthusiasts to learn, practice, and master various aspects of cybersecurity.</p>
        </div>
        <div class="col-md-4">
          <h3 class="footer-h3">Quick Links</h3>
          <ul class="footer-ul">
            <li><a href="#">Home</a></li>
            <li><a href="#">Change Lab</a></li>
            <li><a href="#">Help</a></li>
          </ul>
        </div>
        <div class="col-md-4">
          <h3 class="footer-h3">Contact Us</h3>
          <p class="footer-p"><span class="main-h1-span pt-2 fw-bold">Kavasam</span> Cybersecurity Labs<br>1234 Cyber Street<br>Tamilnadu, India</p>
          <p class="footer-p">Email:harishkumarsp023@gmail.com</p>
        </div>
<p class="text-center developedby">👨‍💻 Developer by 😍💖Harishkumar N</p>
   </footer>
   
   <!-- ========== End footer ========== -->
   


  </div>
  <!-- <h1>Welcome to live Practice Machine</h1>
   
    <div class="card" style="width: 18rem;">
        <img src="./assets/labthumline/i2.jpeg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Xss Payload</h5>
            <a href="#" class="btn btn-primary">Try Xss</a>
            <a href="#" class="btn btn-primary">Learn Xss</a>
        </div>
    </div>  -->



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

 <!-- Initialize Swiper -->
 <script>
    var swiper = new Swiper(".mySwiper", {
      effect: "coverflow",
      // grabCursor: true,
      // centeredSlides: true,
      slidesPerView: "3",
      // coverflowEffect: {
      //   rotate: 50,
      //   stretch: 0,
      //   depth: 100,
      //   modifier: 1,
      //   slideShadows: true,
      // },
      // pagination: {
      //   el: ".swiper-pagination",
      // },
    });
  </script>

</html>