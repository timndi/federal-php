<?php
include("path.php");
include(ROOT_PATH ."/app/database/db.php");
include(ROOT_PATH . "/app/controllers/postController.php");


if (isset($_GET["id"])) {
  $post = selectOne("posts", ["id" => $_GET["id"]]);
}
$topics = selectAll("topics");
$posts = selectAll("posts", ["published"=>1]);

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
      <title><?php echo $post["title"]; ?>| Federal News</title>

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

<!-- copied header stopped here -->

<div class="page-wrapper">
  <!-- <div class="content clearfix"> -->
     <div class="row">
          <div class="col-md-8">
            <div class="main-content single-page">
               <h1 class="single-main-page-title"><?php echo $post["title"]; ?></h1>
            </div>
            <div class="single-main-page-content">
            <?php echo html_entity_decode($post["body"]); ?>
            </div>
          </div>

            <div class="col-md-4">
              <div class="sidebar sidebar-single">

                      <div class="section popular">
                        <h2 class="section-popular-title">Popular News</h2>
                        <?php foreach ($posts as $p): ?>
                          <div class="post-popular clearfix">
                            <img src="<?php echo BASE_URL ."/assets/images/". $p["image"]; ?>" alt="image">
                            <a href="#" class="popular-content-title"><h6><?php echo $p["title"]; ?></h6></a>
                          </div>
                        <?php endforeach; ?>
                      </div>


                            <div class="section topic single-topic-sidebar">
                              <h2 class="section-title">Topics</h2>
                              <ul>
                                <?php foreach ($topics as $topic): ?>
                                 <li><a href="<?php echo BASE_URL ."/home.php?t_id=".$topic["id"]."&name=".$topic["name"]; ?>"><?php echo $topic["name"]; ?></a></li>
                                <?php endforeach; ?>

                              </ul>
                            </div>

                  </div>
               </div>

      </div>

</div>


<div class="page-wrapper">
  <!-- <div class="content clearfix"> -->
     <div class="row">
       <div class="col-md-8">
         <div class="main-content single-page">
            <h1 class="single-main-page-title">This is the title of the Post</h1>
         </div>
         <div class="single-main-page-content">
           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              Excepteur sint occaecat cupidatat non proident, sunt in
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
               Excepteur sint occaecat cupidatat non proident, sunt in <br>
             Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
             Excepteur sint occaecat cupidatat non proident, sunt in
            </p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
               Excepteur sint occaecat cupidatat non proident, sunt in
               Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
               Excepteur sint occaecat cupidatat non proident, sunt in <br>
               Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
               Excepteur sint occaecat cupidatat non proident, sunt in
             </p>
         </div>
       </div>
                <div class="col-md-4">
                  <div class="sidebar sidebar-single">
                    <div class="section topic single-topic-sidebar">
                      <h2 class="section-title">Topics</h2>
                      <ul>
                        <li><a href="#">Poems</a></li>
                        <li><a href="#">Quotes</a></li>
                        <li><a href="#">Fiction</a></li>
                        <li><a href="#">Biography</a></li>
                        <li><a href="#">Motivation</a></li>
                        <li><a href="#">Inspiration</a></li>
                        <li><a href="#">Life lessons</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
      </div>

</div>



<!-- copied footer started here -->


<?php include("app/includes/footer.php"); ?>
