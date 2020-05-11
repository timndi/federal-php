<?php include("app/includes/header.php"); ?>
<?php
// include("app/controllers/users.php");
// include(ROOT_PATH . "/app/controllers/users.php");
session_start();

unset($_SESSION["id"]);
unset($_SESSION["username"]);
unset($_SESSION["admin"]);
unset($_SESSION["message"]);
unset($_SESSION["type"]);
//below func will destroy session when user clicks logout button
session_destroy();

header("Location: " . BASE_URL . "/home.php");
