<?php
include_once('functions/all.php');
if(isset($_POST["phone"])){
  $cust_set = search_by_phone($_POST["phone"]);
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $companyname; ?> - Search By Phone</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery-3.4.1.min.js" charset="utf-8"></script>
    <script src="js/bootstrap.js" charset="utf-8"></script>
  </head>
  <body>
    <?php include_once('functions/header.php'); ?>
    <div class="container">
        <div class="row">
          <h1 class="display-1">Search By Phone</h1>
        </div>
        <div class="row">
          <form class="form-inline" action="search_by_phone.php" method="post">
            <div class="form-group mx-sm-3 mb-2">
              <label for="phone" class="mr-2">Phone Number</label>
              <input type="text" class="form-control" id="phone" name="phone" value="<?php if(isset($_POST["phone"])) {echo $_POST["phone"];} ?>">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Search</button>
            <a href="customers.php" class="btn btn-secondary mb-2 ml-2">Back</a>
          </form>
          <?php if(isset($_POST["phone"])){  ?>
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
        <?php } else {  ?>
          <h1 class="display-2">No Customers to show</h1>
        <?php } ?>
        </div>
    </div>
  </body>
</html>
