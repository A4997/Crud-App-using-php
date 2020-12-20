<?php
include_once('functions/all.php');
if(isset($_POST["cid"])){
  update_customer($_POST);
}
if(isset($_GET["cid"])){
  $customer = view_customer($_GET["cid"]);
}
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title><?php echo $companyname; ?> - Edit Customer</title>
     <link rel="stylesheet" href="css/bootstrap.css">
     <script src="js/jquery-3.4.1.min.js" charset="utf-8"></script>
     <script src="js/bootstrap.js" charset="utf-8"></script>
   </head>
   <body>
     <?php include_once('functions/header.php'); ?>
     <div class="container">
       <div class="row">
         <h1 class="display-1">Edit Customer</h1>
       </div>
       <form action="update_customer.php" method="post">
         <div class="form-group">
           <input type="hidden" name="cid" id="cid" value="<?php echo $customer["cid"]; ?>" class="form-control">
         </div>
         <div class="form-group">
           <label for="cname">Customer Name</label>
           <input type="text" name="cname" id="cname" value="<?php echo $customer["cname"]; ?>" class="form-control">
         </div>
         <div class="form-group">
           <label for="cphone">Customer Phone</label>
           <input type="text" name="cphone" id="cphone" value="<?php echo $customer["cphone"]; ?>" class="form-control">
         </div>
         <div class="form-group">
           <label for="caddress">Customer Address</label>
           <input type="text" name="caddress" id="caddress" value="<?php echo $customer["caddress"]; ?>" class="form-control">
         </div>
         <div class="form-group">
           <label for="cemail">Customer Email</label>
           <input type="text" name="cemail" id="cemail" value="<?php echo $customer["cemail"]; ?>" class="form-control">
         </div>
         <div class="form-group">
           <label for="ccity">Customer City</label>
           <input type="text" name="ccity" id="ccity" value="<?php echo $customer["ccityid"]; ?>" class="form-control">
         </div>
         <button type="submit" class="btn btn-primary">Update</button>
         <a href="customers.php" class="btn btn-secondary">Back</a>
       </form>
     </div>
   </body>
 </html>
