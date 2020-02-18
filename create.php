<?php 


// Error handling
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once("config.php");

$prodname = $_POST['prodname'];
$prodbrand = $_POST['prodbrand'];
$proddescription = $_POST['proddescription'];
$prodprovider = $_POST['prodprovider'];
$authorname = $_POST['authorname'];
$prodamount = $_POST['prodamount'];
$produnit = $_POST['produnit'];
$prodprice = $_POST['prodprice'];
$prodresource = $_POST['prodresource'];

$sql = "INSERT INTO PRODUCTS (prodname, prodbrand, proddescription, prodprovider, authorname, prodamount, produnit, prodprice, prodresource) VALUES ('$prodname', '$prodbrand', '$proddescription', '$prodprovider', '$authorname', '$prodamount', '$produnit', '$prodprice', '$prodresource');";

if (pg_query($link, $sql)) {
    echo"<script language='javascript' type='text/javascript'>alert('Product successfully registered!');window.location.href='index.php'</script>";
} else {
  echo"<script language='javascript' type='text/javascript'>alert('This product could not be registered.');window.location.href='index.php'</script>";
}
?>