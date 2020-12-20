<?php
include_once('functions/all.php');
if(isset($_POST["cname"])){
  new_customer($_POST);
}
$cities = show_cities();
?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title><?php echo $companyname; ?> - New Customer</title>
     <link rel="stylesheet" href="css/bootstrap.css">
     <script src="js/jquery-3.4.1.min.js" charset="utf-8"></script>
     <script src="js/bootstrap.js" charset="utf-8"></script>
   </head>
   <body>
     <?php include_once('functions/header.php'); ?>
     <div class="container">
       <div class="row">
         <h1 class="display-1">New Customer</h1>
       </div>
       <form action="new_customer.php" method="post">
         <div class="form-group">
           <label for="cname">Customer Name</label>
           <input type="text" name="cname" id="cname" class="form-control" value="<?php if(isset($_POST["cname"])){ echo $_POST["cname"];} ?>">
         </div>
         <div class="form-group">
           <label for="cphone">Customer Phone</label>
           <input type="text" name="cphone" id="cphone" class="form-control" value="<?php if(isset($_POST["cname"])){ echo $_POST["cphone"];} ?>">
         </div>
         <div class="form-group">
           <label for="caddress">Customer Address</label>
           <input type="text" name="caddress" id="caddress" class="form-control" value="<?php if(isset($_POST["cname"])){ echo $_POST["caddress"];} ?>">
         </div>
         <div class="form-group">
           <label for="cemail">Customer Email</label>
           <input type="text" name="cemail" id="cemail" class="form-control" value="<?php if(isset($_POST["cname"])){ echo $_POST["cemail"];} ?>">
           <?php if(isset($error)){ ?>
           <p class="alert alert-danger mt-1"><?php echo $error; ?></p>
            <?php } ?>
         </div>
         <div class="form-group">
           <label for="ccity">Customer City</label>
           <select class="form-control" name="ccity" id="ccity">
            <?php while($city = mysqli_fetch_assoc($cities)){  ?>
             <option value="<?php echo $city["cityid"]; ?>"><?php echo $city["cityname"]; ?></option>
            <?php } ?>
           </select>
         </div>
         <button type="submit" class="btn btn-success">Save</button>
         <a href="customers.php" class="btn btn-secondary">Back</a>
       </form>
     </div>
   </body>
 </html>
