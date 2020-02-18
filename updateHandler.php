<?php 


// Error handling
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once("config.php");

$_id = $_POST['_id'];

$prodname = $_POST['prodname'];
$prodbrand = $_POST['prodbrand'];
$proddescription = $_POST['proddescription'];
$prodprovider = $_POST['prodprovider'];
$authorname = $_POST['authorname'];
$prodamount = $_POST['prodamount'];
$produnit = $_POST['produnit'];
$prodprice = $_POST['prodprice'];
$prodresource = $_POST['prodresource'];

$sql = "UPDATE PRODUCTS SET prodname = '$prodname', prodbrand = '$prodbrand', proddescription = '$proddescription', prodprovider = '$prodprovider', authorname = '$authorname', prodamount = '$prodamount', produnit = '$produnit', prodprice = '$prodprice', prodresource = '$prodresource' WHERE _id =  '$_id';";

if (pg_query($link, $sql)) {
    echo"<script language='javascript' type='text/javascript'>alert('Product successfully edited!');window.location.href='index.php'</script>";
} else {
  echo"<script language='javascript' type='text/javascript'>alert('This product could not be edited.');window.location.href='index.php'</script>";
}
?>