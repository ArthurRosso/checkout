<?php

// Error handling
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check existence of id parameter before processing further
if(isset($_GET["_id"]) && !empty(trim($_GET["_id"]))){
    // Include config file
    require_once ("config.php");
    
    // Prepare a select statement
    $sql = "SELECT * FROM PRODUCTS WHERE _id = $_GET["_id"]";

    $result = pg_query($link, $sql);
    
    if(pg_num_rows($result) == 1){
        $row = pg_fetch_assoc($result);
                
        // Retrieve individual field value
        $prodname = $row['prodname'];
        $prodbrand = $row['prodbrand'];
        $proddescription = $row['proddescription'];
        $prodprovider = $row['prodprovider'];
        $authorname = $row['authorname'];
        $prodamount = $row['prodamount'];
        $produnit = $row['produnit'];
        $prodprice = $row['prodprice'];
        $prodresource = $row['prodresource'];
    } else{
        echo"<script language='javascript' type='text/javascript'>alert('URL doesn\'t contain valid id parameter. Redirect to error page');window.location.href='error.html'</script>";
        exit();
    }
            
} else{
    echo"<script language='javascript' type='text/javascript'>alert('Oops! Something went wrong. Please try again later.');window.location.href='index.php'</script>";
}
    
// Close connection
pg_close($link);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="./static/img/comp.ico">
    <title>Checkout GCOMP - View Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>View Record</h1>
                    </div>
                    <div class="form-group">
                        <label>Product Name</label>
                        <p class="form-control-static"><?php echo $row["prodname"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Product Brand</label>
                        <p class="form-control-static"><?php echo $row["prodbrand"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Product Description</label>
                        <p class="form-control-static"><?php echo $row["proddescription"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Product Provider</label>
                        <p class="form-control-static"><?php echo $row["prodprovider"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Author Name</label>
                        <p class="form-control-static"><?php echo $row["authorname"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Amount</label>
                        <p class="form-control-static"><?php echo $row["prodamount"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Unit of Measurement</label>
                        <p class="form-control-static"><?php echo $row["produnit"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <p class="form-control-static"><?php echo $row["prodprice"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Resource</label>
                        <p class="form-control-static"><?php echo $row["prodresource"]; ?></p>
                    </div>
                    <p><a href="index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>