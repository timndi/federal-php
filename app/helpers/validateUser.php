<?php
  $errors = array();
function validateUser($user){

    $errors = array();

    if (empty($user["username"])) {
      array_push($errors, "Username is required");
    }
    if (empty($user["email"])) {
      array_push($errors, "Email is required");
    }
    if (empty($user["password"])) {
      array_push($errors, "Password is required");
    }

    if ($user["passwordConf"] !== $user["password"]){
      array_push($errors, "Passwords do not match");
    }



  $existingUser = selectOne("users", ["email" => $user["email"]]);

  if ($existingUser) {
    if (isset($user["update-user"])&& $existingUser["id"] != $user["id"]) {
      array_push($errors, "Email already exist !");
    }
    if (isset($user["create-admin"])) {
      array_push($errors, "Email already exist !");
    }

  }
///// direct below was my idea, it throws error if a new user uses exiting email
  $existingUser =selectOne("users", ["email" == $user["email"]]);
    if ($existingUser) {
       array_push($errors, "User with this email already exist !");
    }

  return $errors;
}

// $existingUser =selectOne("users", ["email" == $user["email"]]);
//   if ($existingUser) {
//      array_push($errors, "User with this email already exist !");
//   }
//
//   return $errors;
// }



function validateLogin($user){

    $errors = array();

    if (empty($user["email"])) {
      array_push($errors, "email is required");
    }

    if (empty($user["password"])) {
      array_push($errors, "Password is required");
    }

  return $errors;
}
