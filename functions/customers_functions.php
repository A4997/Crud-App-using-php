<?php
function show_customers(){
  global $conn;
  //Fetches data with City id
  //$q = "SELECT * FROM customers";
  //Fetches data with city name
  $q = "SELECT customers.*, cities.cityname FROM customers, cities WHERE cities.cityid = customers.ccityid";
  $cust_set = mysqli_query($conn, $q);
  return $cust_set;
}

function view_customer($id){
  global $conn;
  $cid = $id;
  $q = "SELECT * FROM customers WHERE cid = '$cid'";
  $custset = mysqli_query($conn, $q);
  // 0-indexed Array
  /*
  $cinfo = mysqli_fetch_row($custset);
  echo "<h1>Customer ID: " . $cinfo[0] . "</h1>";
  echo "<h1>Customer Name: " . $cinfo[1] . "</h1>";
  echo "<h1>Customer Phone: " . $cinfo[2] . "</h1>";
  echo "<h1>Customer Email: " . $cinfo[4] . "</h1>";
  */
  //Associative array
  $cinfo = mysqli_fetch_assoc($custset);
  //echo "<h1>Customer Name: " . $cinfo["cname"] . "</h1>";
  //echo "<h1>Customer Address: " . $cinfo["caddress"] . "</h1>";
  return $cinfo;
}

function delete_customer($id){
  global $conn;
  $cid = $id;
  $q = "DELETE FROM customers WHERE cid = '$cid'";
  mysqli_query($conn, $q);
  header("Location: customers.php");
}

function new_customer($custinfo = []){
    global $conn;
    //Preparing SQL Statement
    $cn = $custinfo["cname"];
    $cp = $custinfo["cphone"];
    $ca = $custinfo["caddress"];
    $email = $custinfo["cemail"];
    $city = $custinfo["ccity"];
    //Check if email exists
    /*
    $sql = "SELECT * FROM customers WHERE cemail = '$email'";
    $existed_cust = mysqli_query($conn, $sql);
    $noc =  mysqli_num_rows($existed_cust);
    if($noc > 0){
      $error = "This email already exists";
    } else {
    */
      $sql = "INSERT INTO customers (cname, cphone, caddress, cemail, ccityid) VALUES ('$cn', '$cp', '$ca', '$email', '$city')";
      //Executing the Query
      //mysqli_query(connection, sql statement);
      mysqli_query($conn, $sql);
      header("Location: customers.php");
    // }
}

function update_customer($custinfo = []){
  global $conn;
  $cid = $custinfo["cid"];
  $cn = $custinfo["cname"];
  $cp = $custinfo["cphone"];
  $ca = $custinfo["caddress"];
  $ce = $custinfo["cemail"];
  $cc = $custinfo["ccity"];

  $q = "UPDATE customers SET cname = '$cn', cphone = '$cp', caddress = '$ca', cemail = '$ce', ccityid = '$cc' WHERE cid = '$cid'";
  mysqli_query($conn, $q);
  header("Location: customers.php");
}

function search_by_phone($phone){
  global $conn;
  $sc = $phone;
  $q = "SELECT customers.*, cities.cityname FROM customers, cities WHERE cities.cityid = customers.ccityid AND cphone = '$sc'";
  $cust_set = mysqli_query($conn, $q);
  return $cust_set;
}
 ?>
