<?php
include_once('functions/all.php');
if(isset($_POST["username"])){
  $user = view_user_by_username($_POST["username"]);
  //Check if Username exists
  if(isset($user["username"]) && $user["username"] != ""){
    //Check if password is correct
    if (password_verify($_POST["password"], $user["password"])) {
      header("Location: index.php");
    } else {
      //$error = "Username or Password is incorrect";
      $error = "Password is incorrect";
    }
    //END Check if password is correct
  } else {
    //$error = "Username or Password is incorrect";
    $error = "Username is incorrect";
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $companyname; ?> - Sign in to Your Account</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery-3.4.1.min.js" charset="utf-8"></script>
    <script src="js/bootstrap.js" charset="utf-8"></script>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <h1 class="display-2">Sign in to Your Account</h1>
      </div>
      <div class="">
        <form action="sign-in.php" method="post">
          <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" class="form-control" value="<?php if(isset($_POST["username"])){ echo $_POST["username"]; } ?>">
            <?php if(isset($error)){ ?>
              <p class="alert alert-danger mt-2"><?php echo $error; ?></p>
            <?php } ?>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control">
            <?php if(isset($error)){ ?>
              <p class="alert alert-danger mt-2"><?php echo $error; ?></p>
            <?php } ?>
          </div>
          <button type="submit" class="btn btn-primary">Sign in</button>
          <p class="text-center">Don't have an account? <a href="sign-up.php">Create Account</a></p>
        </form>
      </div>
    </div>
  </body>
</html>
