<?php include("app/includes/header.php"); ?>

<?php
include(ROOT_PATH . "/app/controllers/users.php");

guestsOnly();
?>



<div class="auth-content container">

  <form action="register.php" method="post">
    <h2 class="form-title">Register</h2>

   <!-- form errors was here -->
   <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>

    <div class="">
      <label>Username</label>
      <input class="text-input" type="text" name="username" value="<?php echo "$username"; ?>" placeholder="Username">
    </div>
    <div class="">
      <label>Email</label>
      <input class="text-input" type="email" name="email" value="<?php echo "$email"; ?>" placeholder="Email" >
    </div>
    <div class="">
      <label>Password</label>
      <input class="text-input" type="password" name="password" value="<?php echo "$password"; ?>" placeholder="Password">
    </div>
    <div class="">
      <label>Confirm Password</label>
      <input class="text-input" type="password" name="passwordConf" value="<?php echo "$passwordConf"; ?>" placeholder="Confirm Password">
    </div>
    <div class="">
      <button type="submit" class="btn btn-lg btn-primary" name="register-btn">Register</button>
    </div>
    <p class="or-signin">Or <a href="./login.php">Sign in</a></p>
     <!-- <button class="btn btn-lg btn-outline-primary"><a href="login">Sign in</a></button> -->



  </form>
</div>


<!-- footer started here -->

<?php include("app/includes/footer.php"); ?>
