<?php
if(isset($_POST["sc"])){
  $conn = mysqli_connect('localhost', 'root', '', 'amazon');
  $sc = $_POST["sc"];
  $field = $_POST["field"];
/*
  if($field == "cname"){
      $q = "SELECT customers.*, cities.cityname FROM customers, cities WHERE cities.cityid = customers.ccityid AND cname LIKE '%$sc%'";
  } elseif ($field == "cphone"){
      $q = "SELECT customers.*, cities.cityname FROM customers, cities WHERE cities.cityid = customers.ccityid AND cphone LIKE '%$sc%'";
  } elseif($field == "caddress"){
      $q = "SELECT customers.*, cities.cityname FROM customers, cities WHERE cities.cityid = customers.ccityid AND caddress LIKE '%$sc%'";
  } elseif($field == "cemail"){
      $q = "SELECT customers.*, cities.cityname FROM customers, cities WHERE cities.cityid = customers.ccityid AND cemail LIKE '%$sc%'";
  }
*/

  $q = "SELECT customers.*, cities.cityname FROM customers, cities WHERE cities.cityid = customers.ccityid AND $field LIKE '%$sc%'";

  $cust_set = mysqli_query($conn, $q);
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $companyname; ?> - Search By Field</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery-3.4.1.min.js" charset="utf-8"></script>
    <script src="js/bootstrap.js" charset="utf-8"></script>
  </head>
  <body>
    <?php include_once('functions/header.php'); ?>
    <div class="container">
        <div class="row">
          <h1 class="display-1">Search By Field</h1>
        </div>
        <div class="row">
          <form class="form-inline" action="search_by_field.php" method="post">
            <div class="form-group mx-sm-3 mb-2">
              <label for="sc" class="mr-2">Search for:</label>
              <input type="text" class="form-control" id="sc" name="sc" value="<?php if(isset($_POST["sc"])) {echo $_POST["sc"];} ?>">
              <select class="form-control ml-2" name="field">
                <option value="cname"
                <?php if(isset($_POST["field"]) && $_POST["field"] == "cname") { echo "SELECTED";} ?>
                >Name</option>
                <option value="cphone"
                <?php if(isset($_POST["field"]) && $_POST["field"] == "cphone") { echo "SELECTED";} ?>
                >Phone</option>
                <option value="caddress"
                <?php if(isset($_POST["field"]) && $_POST["field"] == "caddress") { echo "SELECTED";} ?>
                >Address</option>
                <option value="cemail"
                <?php if(isset($_POST["field"]) && $_POST["field"] == "cemail") { echo "SELECTED";} ?>
                >Email</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Search</button>
            <a href="customers.php" class="btn btn-secondary mb-2 ml-2">Back</a>
          </form>
          <?php if(isset($_POST["sc"])){  ?>
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
