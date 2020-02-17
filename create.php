<?php 

require_once("config.php");

$prodName = $_POST['prodName'];
$prodBrand = $_POST['prodBrand'];
$prodDescription = $_POST['prodDescription'];
$prodProvider = $_POST['prodProvider'];
$authorName = $_POST['authorName'];
$prodAmount = $_POST['prodAmount'];
$prodUnit = $_POST['prodUnit'];
$prodPrice = $_POST['prodPrice'];
$prodResource = $_POST['prodResource'];

$sql = "INSERT INTO PRODUCT (prodName, prodBrand, prodDescription, prodProvider, authorName, prodAmount, prodUnit, prodPrice, prodResource) VALUES ('$prodName', '$prodBrand', '$prodDescription', '$prodProvider', '$authorName', '$prodAmount', '$prodUnit', '$prodPrice', '$prodResource');";

if ($link->query($sql)) {
    echo"<script language='javascript' type='text/javascript'>alert('Product successfully registered!');window.location.href='index.php'</script>";
} else {
  echo"<script language='javascript' type='text/javascript'>alert('This product could not be registered.');window.location.href='index.php'</script>";
}
?>