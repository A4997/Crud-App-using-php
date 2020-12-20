<?php
include_once('functions/all.php');
$cinfo = view_customer($_GET["cid"]);
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title><?php echo $companyname; ?> - View Customer Profile</title>
     <link rel="stylesheet" href="css/bootstrap.css">
     <script src="js/jquery-3.4.1.min.js" charset="utf-8"></script>
     <script src="js/bootstrap.js" charset="utf-8"></script>
   </head>
   <body>
    <?php include_once('functions/header.php'); ?>
    <table border="1">
      <tr>
        <td>Customer Name</td>
        <td>Customer Phone</td>
        <td>Customer Email</td>
        <td>Customer Address</td>
        <td>Customer City</td>
      </tr>
      <tr>
        <td><?php echo $cinfo["cname"]; ?></td>
        <td><?php echo $cinfo["cphone"]; ?></td>
        <td><?php echo $cinfo["cemail"]; ?></td>
        <td><?php echo $cinfo["caddress"]; ?></td>
        <td><?php echo $cinfo["ccityid"]; ?></td>
      </tr>
    </table>
    <a href="customers.php" class="btn btn-secondary">Back</a>
  </body>
</html>
