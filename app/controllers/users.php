<?php
// include("path.php");
// include("app/includes/header.php");
// include(ROOT_PATH ."/app/database/db.php");
include(ROOT_PATH . "/app/helpers/middleware.php");
include(ROOT_PATH . "/app/helpers/validateUser.php");


$table = "users";

$admin_users= selectAll($table);

$errors = array();
$id = "";
$username = "";
$admin = "";
$email = "";
$password = "";
$passwordConf = "";


function loginUser($user){
  $_SESSION["id"] = $user["id"];
  $_SESSION["username"] = $user["username"];
  $_SESSION["admin"] = $user["admin"];
  $_SESSION["message"] = "You are now logged in to the admin page !";
  $_SESSION["type"] = "success";
 // after login success, user wil be redirected to homepage
 if ($_SESSION["admin"]) {
   header("Location: " . BASE_URL . "/dashboard.php");
 } else {
   header("Location: " . BASE_URL . "/home.php");
 }
  exit();
}

if (isset($_POST["register-btn"]) || isset($_POST["create-admin"])){
 // below we call validateuser func which we have already defined in validateuser.php
    $errors = validateUser($_POST);

if (count($errors)===0) {
    unset($_POST["register-btn"], $_POST["passwordConf"], $_POST["create-admin"]);
    $_POST["password"] = password_hash($_POST["password"], PASSWORD_DEFAULT);

      if (isset($_POST["admin"])) {
        $_POST["admin"] = 1;
        $user_id = create($table, $_POST);
        $_SESSION["message"] = "Admin user created successfully !";
        $_SESSION["type"] = "success";
        header("Location: " . BASE_URL . "/userAdmin.php");
        exit();
      } else {
        $_POST["admin"] = 0;
        $user_id = create($table, $_POST);
        $user = selectOne($table, ["id" => $user_id]);
        // below func takes the users info below after user login success and then redirects user to home page
        // loginUser func hasalready been defined at d top
        loginUser($user);
      }
  }else {
    $username = $_POST["username"];
    $admin = isset($_POST["admin"])?1:0;
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordConf = $_POST["passwordConf"];
  }
}

if (isset($_POST["update-user"])) {
  adminOnly();
  $errors = validateUser($_POST);

if (count($errors)===0) {
  $id = $_POST["id"];
  unset($_POST["passwordConf"], $_POST["update-user"], $_POST["id"]);
  $_POST["password"] = password_hash($_POST["password"], PASSWORD_DEFAULT);

      $_POST["admin"] = isset($_POST["admin"])?1:0;
      $user_id = update($table, $id, $_POST);
      $_SESSION["message"] = "Admin user updated successfully !";
      $_SESSION["type"] = "success";
      header("Location: " . BASE_URL . "/userAdmin.php");
      exit();

}else {
  $username = $_POST["username"];
  $admin = isset($_POST["admin"])?1:0;
  $email = $_POST["email"];
  $password = $_POST["password"];
  $passwordConf = $_POST["passwordConf"];
}
}

if (isset($_GET["id"])) {
  $user = selectOne($table, ["id" =>$_GET["id"]]);

  $id = $user["id"];
  $username = $user["username"];
  $admin = $user["admin"];
  $email = $user["email"];
}


if (isset($_POST["login-btn"])) {
  // dd($_POST);
  $errors = validateLogin($_POST);

  if (count($errors)===0) {
    $user = selectOne($table,["email" => $_POST["email"]]);
    if ($user && password_verify($_POST["password"], $user["password"])) {
      // below func takes the users info below after user login success and then redirects user to home or admin page
      // loginUser func hasalready been defined at d top
      loginUser($user);

    } else {
      array_push($errors, "invalid password or username !");
    }
  }
  $email = $_POST["email"];
  $password = $_POST["password"];
}

if (isset($_GET["delete_id"])) {
  adminOnly();
  $count = delete($table, $_GET["delete_id"]);
  $_SESSION["message"] = "Admin user deleted !";
  $_SESSION["type"] = "success";
  header("Location: " . BASE_URL . "/userAdmin.php");
  exit();
}
