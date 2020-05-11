<?php
// include(ROOT_PATH ."/app/database/db.php");
include(ROOT_PATH . "/app/helpers/middleware.php");
include(ROOT_PATH . "/app/helpers/validateTopic.php");

$table = "topics";
$errors = array();
$id = "";
$name = "";
$description = "";

$topics = selectAll($table);
  // dd($topics);

if (isset($_POST["add-topic"])){
  adminOnly();
  $errors = validateTopic($_POST);

 if (count($errors)===0) {
   unset($_POST["add-topic"]);
   // dd($_POST);
   $topic_id = create($table, $_POST);
   $_SESSION["message"] = "Topic created successfully";
   $_SESSION["type"] = "success";
   header("Location: " . BASE_URL . "/topic.php");
   exit();
 }else {
   $name = $_POST["name"];
   $description = $_POST["description"];;
 }

}

if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $topic = selectOne($table,["id" => $id]);
  $id = $topic["id"];
  $name = $topic["name"];
  $description = $topic["description"];
 }

 if (isset($_GET["del_id"])) {
   adminOnly();
   $id = $_GET["del_id"];
   $count = delete($table, $id);
   $_SESSION["message"] = "Topic successfully deleted !";
   $_SESSION["type"] = "success";
   header("Location: " . BASE_URL . "/topic.php");
   exit();
 }

if (isset($_POST["update-topic"])) {
  adminOnly();
  // dd($_POST);
  $errors = validateTopic($_POST);

 if (count($errors)===0) {
   $id = $_POST["id"];
   unset($_POST["update-topic"], $_POST["id"]);
   $topic_id = update($table, $id, $_POST);
   $_SESSION["message"] = "Topic successfully updated !";
   $_SESSION["type"] = "success";
   header("Location: " . BASE_URL . "/topic.php");
   exit();
 }else {
   $id = $_POST["id"];
   $name = $_POST["name"];
   $description = $_POST["description"];;
 }

}
