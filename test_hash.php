<?php

$pass = "123";
echo "DB Pass in PLain:" . $pass;
$newpass = password_hash($pass, PASSWORD_BCRYPT);
echo "<br>";
echo "DB Pass hashed:" . $newpass;



$trypass = "123";
$newtrypass = password_hash($trypass, PASSWORD_BCRYPT);
echo "<br>";
echo "Form Pass in Plain:" . $trypass;
echo "<br>";
echo "Form Pass hashed:" . $newtrypass;
echo "<br>";
/*
if($newpass == $newtrypass){
  echo "Welcome";
} else {
  echo "Password is incorrect";
}
*/
if(password_verify($trypass, $newpass)){
  echo "Welcome";
} else {
  echo "Password is incorrect";
}


 ?>
