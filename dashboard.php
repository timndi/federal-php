<?php include("app/includes/adminHeader.php");
// include(ROOT_PATH . "/app/controllers/users.php");
?>
<?php
include(ROOT_PATH . "/app/controllers/postController.php");
adminOnly();
?>


<div class="admin-wrapper">

    <div class="left-sidebar">
      <?php include("app/includes/sidebarAdmin.php"); ?>
    </div>

    <div class="admin-content">


     <div class="content">

         <h2 class="page-title">Welcome To The News Dashboard</h2>

         <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

         <ul>
           <li class="btn btn-lg btn-outline-dark"><a href="<?php echo BASE_URL . '/post.php' ?>">Manage Posts</a></li>
           <li class="btn btn-lg btn-outline-dark"><a href="<?php echo BASE_URL . '/userAdmin.php' ?>">Manage Users</a></li>
           <li class="btn btn-lg btn-outline-dark"><a href="<?php echo BASE_URL . '/topic.php' ?>">Manage Topics</a></li>
         </ul>


     </div>
    </div>

</div>




<?php include("app/includes/adminFooter.php"); ?>
