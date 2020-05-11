
<?php
include("path.php");
include(ROOT_PATH ."/app/database/db.php");

$posts = "";
$postsTitle ="Recent News";

if (isset($_GET["t_id"])) {
  $posts = getPostsByTopicId($_GET["t_id"]);
  $postsTitle = "You searched for posts under '".$_GET['name']."'";
}
else if (isset($_POST["search-term"])) {
  $postsTitle = "You searched for '".$_POST['search-term']."'";
  $posts = searchPosts($_POST["search-term"]);
}else {
  $posts = getPublishedPosts();
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">



    <title>The Federal News</title>


    <link rel="stylesheet" href="assets/bootstrap/bootstrap.css">

    <!-- fontwasome link -->
    <script src="https://kit.fontawesome.com/8bc1abc9f1.js" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="assets/css/all.css"> -->

    <link rel="stylesheet" href="assets/css/styles.css">
      <!-- <link rel="stylesheet" href="assets/admin-css/admin.css"> -->

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
<?php include("app/includes/messages.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/topicController.php"); ?>


<!-- page wrapper section -->
    <div class="page-wrapper">

      <div class="post-slider">
        <h1 class="slider-title">Trending News</h1>
        <i class="fas fa-chevron-left prev"></i>
        <i class="fas fa-chevron-right next"></i>

        <div class="post-wrapper">

          <?php foreach ($posts as $key => $post): ?>
            <div class="post">
              <img class="slider-image" src="<?php echo BASE_URL . "/assets/images/" . $post["image"]; ?>" alt="">
              <div class="post-info">
                <h6><a href="single.php?id=<?php echo $post["id"]; ?>"><?php echo $post["title"]; ?></a></h6>
                <i class="far fa-user date-author-color">Author: <?php echo $post["username"]; ?></i>
                &nbsp;
                <i class="far fa-calendar date-author-color"><?php echo date("F j, Y",strtotime($post["created_at"])); ?></i>
              </div>
            </div>
          <?php endforeach; ?>


          </div>

        </div>

      </div>


      <!-- <div class="content clearfix"> -->

      <div class="row">
        <div class="col-lg-8">
          <div class="main-content">

            <h2 class="recent-post-title"><?php echo $postsTitle ?></h2>

            <!-- foreach ($posts as $key => $post): ?> -->
          <?php foreach ($posts as $post): ?>
              <div class="post">
              <img class="post-image" src="<?php echo BASE_URL . "/assets/images/" . $post["image"]; ?>" alt="">
              <div class="post-preview">
                <h3><a href="single.php?id=<?php echo $post["id"]; ?>"><?php echo $post["title"]; ?></a></h3>
                <i class="far fa-user date-author-color">Author: <?php echo $post["username"]; ?></i>
                &nbsp;
                <i class="far fa-calendar date-author-color"><?php echo date("F j, Y",strtotime($post["created_at"])); ?></i>
                <p class="preview-text">
                  <?php echo html_entity_decode (substr($post["body"], 0, 100) . "..."); ?>
                </p>
                <a href="single.php?id=<?php echo $post["id"]; ?>" class="btn btn-outline-danger read-more" href="././single.php">Read More</a>
              </div>
            </div>
            <?php endforeach; ?>


          </div>

        </div>

        <div class="col-md-4">
          <div class="sidebar">
            <div class="section search">
              <h2 class="section-title">Search</h2>
              <form action="home.php" method="post">
                <input type="text" name="search-term" class="text-input" placeholder="search">
              </form>
            </div>

            <div class="section topic">
              <h2 class="section-title">Topics</h2>
              <ul>
                <?php foreach ($topics as $key => $topic): ?>
                  <li><a href="<?php echo BASE_URL ."/home.php?t_id=".$topic["id"]."&name=".$topic["name"]; ?>"><?php echo $topic["name"]; ?></a></li>
                <?php endforeach; ?>
              </ul>
            </div>


          </div>
        </div>
      </div>



      </div>

<?php include("app/includes/footer.php"); ?>
