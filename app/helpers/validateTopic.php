<?php

function validateTopic($topic){

    $errors = array();

    if (empty($topic["name"])) {
      array_push($errors, "name is required !");
    }

  // $existingTopic = selectOne("topics", ["name" => $post["name"]]);
  // if ($existingTopic) {
  //   if (isset($post["update-topic"])&& $existingTopic["id"] != $post["id"]) {
  //     array_push($errors, "Name already exist !");
  //   }
  //   if (isset($post["add-topic"])) {
  //     array_push($errors, "Name already exist !");
  //   }
  // }

  $existingTopic = selectOne("topics", ["name" => $topic["name"]]);
  if ($existingTopic) {
    if (isset($topic["update-topic"])&& $existingTopic["id"] != $topic["id"]) {
      array_push($errors, "Name already exist !");
    }
    if (isset($topic["add-topic"])) {
      array_push($errors, "Name already exist !");
    }
  }

  return $errors;
}

// validate login section
