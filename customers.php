<?php
include_once('functions/all.php');
$cust_set = show_customers();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $companyname; ?> - Customers List</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery-3.4.1.min.js" charset="utf-8"></script>
    <script src="js/bootstrap.js" charset="utf-8"></script>
  </head>
  <body>
    <?php include_once('functions/header.php'); ?>
    <div class="container">
        <div class="row">
          <h1 class="display-1">Customers List</h1>
        </div>
        <div class="row">
          <a href="new_customer.php" class="btn btn-success mb-3">New Customer</a>
          <a href="search_by_phone.php" class="btn btn-primary ml-2 mb-3">Search By Phone</a>
          <a href="search_by_name.php" class="btn btn-primary ml-2 mb-3">Search By Name</a>
          <a href="search_by_field.php" class="btn btn-primary ml-2 mb-3">Search By Field</a>
          <a href="search_dynamic.php" class="btn btn-primary ml-2 mb-3">Dynamic Search</a>
          <table class="table">
            <tr>
              <th>Customer Name</th>
              <th>Customer Phone</th>
              <th>Customer Address</th>
              <th>Customer Email</th>
              <th>Customer City</th>
              <th>Actions</th>
            </tr>
            <?php
            while($customer = mysqli_fetch_assoc($cust_set)){ ?>
              <tr>
                <td><?php echo $customer["cname"]; ?></td>
                <td><?php echo $customer["cphone"]; ?></td>
                <td><?php echo $customer["caddress"]; ?></td>
                <td><?php echo $customer["cemail"]; ?></td>
                <td><?php echo $customer["cityname"]; ?></td>
                <td>
                  <a class="btn btn-secondary" href="view_customer.php?cid=<?php echo $customer["cid"]; ?>">View</a>
                  <a class="btn btn-primary" href="update_customer.php?cid=<?php echo $customer["cid"]; ?>">Edit</a>
                  <a class="btn btn-danger" href="delete_customer.php?cid=<?php echo $customer["cid"]; ?>">Delete</a>
                </td>
              </tr>
          <?php } ?>
          </table>
        </div>
    </div>
  </body>
</html>
