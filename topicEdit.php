<?php include("app/includes/adminHeader.php"); ?>
<?php
include(ROOT_PATH . "/app/controllers/topicController.php");
// include(ROOT_PATH . "/app/controllers/users.php");
adminOnly();
?>


<div class="admin-wrapper">

    <div class="left-sidebar">
      <ul>
        <?php include("app/includes/sidebarAdmin.php"); ?>
    </div>

    <div class="admin-content">
     <div class="button-group">
       <a class="btn btn-lg btn-dark" href="<?php echo BASE_URL . '/topicCreate.php' ?>">Add Topic</a>
       <a class="btn btn-lg btn-dark" href="<?php echo BASE_URL . '/topic.php' ?>">Manage Topics</a>
     </div>

     <div class="content">
         <h2 class="page-title">Edit Topic</h2>
         <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>

         <form action="topicEdit.php" method="post">
           <input type="hidden" name="id" value="<?php echo $id; ?>" >
           <div class="">
             <label for="">Name</label>
             <input type="text" name="name" value="<?php echo $name; ?>" class="text-input">
           </div>
           <div class="">
             <label for="">Description</label>
             <textarea name="description" id="body"> <?php echo $description; ?></textarea>
           </div>

           <div class="">
             <button type="submit" name="update-topic" class="btn btn-lg btn-dark">Update Topic</button>
           </div>
         </form>
     </div>
    </div>

</div>




<?php include("app/includes/adminFooter.php"); ?>
