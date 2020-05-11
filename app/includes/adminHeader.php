<?php
include("path.php");
include(ROOT_PATH ."/app/database/db.php");
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">



    <title>The Federal News</title>


<link rel="stylesheet" href="assets/bootstrap/bootstrap.css">
    <!-- fontwasome link -->
    <!-- <script src="https://kit.fontawesome.com/8bc1abc9f1.js" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="assets/css/all.css">

    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/admin-css/admin.css">

  </head>
  <body>
    <header>
      <a class="logo" href="<?php echo BASE_URL . '/home.php' ?>">
        <h1 class="logo-text"><span class="logo-text-span">The</span> Federal News</h1>
      </a>
    <!-- add fontawsome style here -->
      <i class="fa fa-bars" menu-toggle></i>
      <ul class="nav">
        <li><a href="./">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Services</a></li>

        <?php if (isset($_SESSION["id"])): ?>
          <li>
            <a href="#">
            <i class="fa fa-user"></i>
             <?php echo $_SESSION['username']; ?>
             <!-- <img class="chevron-logo" src="img\chevron-icon.png" alt=""> -->
             <i class="fas fa-chevron-down" style="font-size: .8em"></i>
           </a>
           <ul>
             <!-- below direct code makes d dashbord to appear on user hover and only if user is admin user -->
             <?php if (($_SESSION["admin"])): ?>
               <li><a href="<?php echo BASE_URL . '/dashboard.php' ?>">Dashboard</a></li>
             <?php endif; ?>
             <li><a class="logout" href="<?php echo BASE_URL . '/logout.php' ?>">Logout</a></li>
           </ul>
         </li>
        <?php else: ?>
            <li><a href="<?php echo BASE_URL . '/register.php' ?>">Sign Up</a></li>
            <li><a href="<?php echo BASE_URL . '/login.php' ?>">Login</a></li>
        <?php endif; ?>

        <!-- <li><a href="#"> <img class="user-nav-icon" src="img/user-icon.jpg" alt="user-icon"> Peace Timothy</a> -->

               <!-- <i class="fas fa-chevron-down" style="font-size: .8em"></i> -->
      </ul>
    </header>
