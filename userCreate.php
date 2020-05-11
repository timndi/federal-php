<?php include("app/includes/adminHeader.php"); ?>
<?php
include(ROOT_PATH . "/app/controllers/users.php");
adminOnly();
?>

<div class="admin-wrapper">

    <div class="left-sidebar">
      <?php include("app/includes/sidebarAdmin.php"); ?>
   </div>

    <div class="admin-content">
     <div class="button-group">
       <a class="btn btn-lg btn-dark" href="<?php echo BASE_URL . '/userCreate.php' ?>">Add User</a>
       <a class="btn btn-lg btn-dark" href="<?php echo BASE_URL . '/userAdmin.php' ?>">Manage Users</a>
     </div>

     <div class="content">
         <h2 class="page-title">Add User</h2>

         <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>

         <form action="userCreate.php" method="post">

           <div class="">
             <label>Username</label>
             <input class="text-input" type="text" name="username" value="<?php echo $username; ?>" >
           </div>
           <div class="">
             <label>Email</label>
             <input class="text-input" type="email" name="email"value="<?php echo $email; ?>">
           </div>
           <div class="">
             <label>Password</label>
             <input class="text-input" type="password" name="password" value="<?php echo $password; ?>">
           </div>
           <div class="">
             <label>Confirm Password</label>
             <input class="text-input" type="password" name="passwordConf" value="<?php echo $passwordConf; ?>">
           </div>

           <div class="">

             <?php if (isset($admin) && $admin == 1): ?>
               <label>
                 <input type="checkbox" name="admin" checked>
                 Admin
               </label>
             <?php else: ?>
               <label>
                 <input type="checkbox" name="admin">
                 Admin
               </label>
             <?php endif; ?>


           </div>

           <div class="">
             <button type="submit" name="create-admin" class="btn btn-lg btn-dark">Add User</button>
           </div>
         </form>
     </div>
    </div>

</div>


<?php include("app/includes/adminFooter.php"); ?>
