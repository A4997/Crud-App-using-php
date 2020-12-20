<?php
include_once('functions/all.php');
if (isset($_POST["username"])) {
  $nou = is_username_taken($_POST["username"]);
  if($nou > 0){
    $error = "Username already taken";
  } else {
    new_user($_POST["username"], $_POST["password"]);
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $companyname; ?> - Create New Account</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery-3.4.1.min.js" charset="utf-8"></script>
    <script src="js/bootstrap.js" charset="utf-8"></script>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <h1 class="display-2">Create New Account</h1>
      </div>
      <div class="">
        <form action="sign-up.php" method="post">
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
          </div>
          <div class="form-group">
            <label for="confirmpassword">Confirm Password</label>
            <input type="password" name="confirmpassword" id="confirmpassword" class="form-control">
          </div>
          <button type="submit" class="btn btn-primary">Register</button>
          <p class="text-center">Already have an account? <a href="sign-in.php">Sign in</a></p>
        </form>
      </div>
    </div>
  </body>
</html>
