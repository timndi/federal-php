<?php

session_start();
require("connect.php");


function dd($value){ // will be deleted, was only used for testing
  echo "<pre>", print_r($value, true ),"</pre>";
  die();
}

function executeQuery($sql, $data){
  global $conn;
  $stmt = $conn->prepare($sql);
  $values = array_values($data);
  $types = str_repeat("s", count($values));
  $stmt -> bind_param($types, ...$values);
  $stmt->execute();
  return $stmt;
}


function selectAll($table, $conditions = []){
  global $conn;
  $sql = "SELECT * FROM $table";
  if (empty($conditions)) { // if users is empty, then perform below
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
  }else {
    // but if users not empty, then we will throw infos that match the conditions
     // $sql = "SELECT * FROM $table WHERE 'username'=>'tim' AND 'admin'=>1";
     $I = 0;
     foreach ($conditions as $key => $value) {
       if ($I===0) {
          $sql = $sql. " WHERE $key=?";
       }else {
         $sql = $sql. " AND $key=?";
       }
        $I++;
     }
     $stmt = executeQuery($sql, $conditions);
     $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
     return $records;
  }

}

// direct below is select ONE option
function selectOne($table, $conditions){
  global $conn;
  $sql = "SELECT * FROM $table";

     $I = 0;
     foreach ($conditions as $key => $value) {
       if ($I===0) {
          $sql = $sql. " WHERE $key=?";
       }else {
         $sql = $sql. " AND $key=?";
       }
        $I++;
     }

     $sql = $sql . " LIMIT 1";
     $stmt = executeQuery($sql, $conditions);
     $records = $stmt->get_result()->fetch_assoc();
     return $records;
}
// create section
function create($table, $data){
  global $conn;
  $sql= "INSERT INTO $table SET ";

  $I = 0;
  foreach ($data as $key => $value) {
    if ($I===0) {
       $sql = $sql. " $key=?";
    }else {
      $sql = $sql. ", $key=?";
    }
     $I++;
  }
  // dd($sql);
  $stmt = executeQuery($sql, $data);
  $id = $stmt->insert_id;
  return $id;
}

// right below is update function section
function update($table, $id, $data){
  global $conn;
  $sql= "UPDATE $table SET ";

  $I = 0;
  foreach ($data as $key => $value) {
    if ($I===0) {
       $sql = $sql. " $key=?";
    }else {
      $sql = $sql. ", $key=?";
    }
     $I++;
  }
  $sql = $sql . " WHERE id=?";
  $data["id"] = $id;
  $stmt = executeQuery($sql, $data);
  // $id = $stmt->insert_id;
  return $stmt->affected_rows;
}

// right below is delete function section
function delete($table, $id){
  global $conn;
  $sql= "DELETE FROM $table WHERE id=?";

  $stmt = executeQuery($sql, ["id" => $id]);
  return $stmt->affected_rows;
}

function getPublishedPosts(){
  global $conn;
  $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id=u.id WHERE p.published=?";

  $stmt = executeQuery($sql, ["published" =>1]);
  $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  return $records;
}

function getPostsByTopicId($topic_id){
  global $conn;
  $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id=u.id WHERE p.published=? AND topic_id=?";

  $stmt = executeQuery($sql, ["published" =>1, "topic_id"=>$topic_id]);
  $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  return $records;
}

function searchPosts($term){
  $match = "%" . $term . "%";
  global $conn;
  $sql = "SELECT
          p.*, u.username
          FROM posts AS p
          JOIN users AS u
          ON p.user_id=u.id
          WHERE p.published=?
          AND p.title LIKE ? OR p.body LIKE ? ";

  $stmt = executeQuery($sql, ["published" =>1, "title"=>$match, "body"=>$match]);
  $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  return $records;
}

// $conditions = [
/////// below is the last i commented on this page
// $data = [
//   "username" => "Ndi timo",
//   "admin" => 1,
//   "email" => "ndi@ng.ng",
//   "password" => "qwerty"
//
// ];
/////// Above is the last i commented on this page

// $users = selectOne("users", $conditions);
// $id = delete("users", 2);
// dd($id);
