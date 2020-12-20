<?php
function is_username_taken($un){
  global $conn;
  $sql = "SELECT * FROM users WHERE username = '$un'";
  $user_set = mysqli_query($conn, $sql);
  $nou = mysqli_num_rows($user_set);
  return $nou;
}

function new_user($un, $pass){
  global $conn;
  $newpass = password_hash($pass, PASSWORD_BCRYPT);
  $sql = "INSERT INTO users (username, password) VALUES ('$un', '$newpass')";
  mysqli_query($conn, $sql);
  header("Location: sign-in.php");
}

function view_user_by_username($un){
  global $conn;
  $sql = "SELECT * FROM users WHERE username = '$un'";
  $user_set = mysqli_query($conn, $sql);
  $user = mysqli_fetch_assoc($user_set);
  return $user;
}
 ?>
