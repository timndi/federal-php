<?php include("app/includes/header.php"); ?>
<?php
// include("app/controllers/users.php");
include(ROOT_PATH . "/app/controllers/users.php");
guestsOnly();
?>

<div class="auth-content container">
  <form action="login.php" method="post">
    <h2 class="form-title">Login</h2>

    <!-- form errors was here -->
    <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>

    <div class="">
      <label>Username</label>
      <input class="text-input" type="email" name="email" value="<?php echo "$email"; ?>" placeholder="User email"">
    </div>
    <div class="">
      <label>Password</label>
      <input class="text-input" type="password" name="password" value="<?php echo "$password"; ?>" placeholder="Password">
    </div>

    <div class="">
      <button type="submit" class="btn btn-lg btn-dark" name="login-btn">Login</button>
    </div>
    <p class="or-signin">Or <a href="././register.php" >Sign up</a></p>
     <!-- <button class="btn btn-lg btn-outline-primary"><a href="login">Sign up</a></button> -->

  </form>
</div>

<?php include("app/includes/footer.php"); ?>
