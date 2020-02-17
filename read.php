<?php
// Check existence of id parameter before processing further
if(isset($_GET["_id"]) && !empty(trim($_GET["_id"]))){
    // Include config file
    require_once "config.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM product WHERE _id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $_GET["_id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
                $prodName = $row['prodName'];
                $prodBrand = $row['prodBrand'];
                $prodDescription = $row['prodDescription'];
                $prodProvider = $row['prodProvider'];
                $authorName = $row['authorName'];
                $prodAmount = $row['prodAmount'];
                $prodUnit = $row['prodUnit'];
                $prodPrice = $row['prodPrice'];
                $prodResource = $row['prodResource'];
            } else{
                echo"<script language='javascript' type='text/javascript'>alert('URL doesn\'t contain valid id parameter. Redirect to error page');window.location.href='error.php'</script>";
                exit();
            }
            
        } else{
            echo"<script language='javascript' type='text/javascript'>alert('Oops! Something went wrong. Please try again later.');window.location.href='index.php'</script>";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
} else{
    echo"<script language='javascript' type='text/javascript'>alert('URL doesn\'t contain valid id parameter. Redirect to error page');window.location.href='error.php'</script>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
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
                        <p class="form-control-static"><?php echo $row["prodName"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Product Brand</label>
                        <p class="form-control-static"><?php echo $row["prodBrand"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Product Description</label>
                        <p class="form-control-static"><?php echo $row["prodDescription"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Product Provider</label>
                        <p class="form-control-static"><?php echo $row["prodProvider"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Author Name</label>
                        <p class="form-control-static"><?php echo $row["authorName"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Amount</label>
                        <p class="form-control-static"><?php echo $row["prodAmount"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Unit of Measurement</label>
                        <p class="form-control-static"><?php echo $row["prodUnit"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <p class="form-control-static"><?php echo $row["prodPrice"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Resource</label>
                        <p class="form-control-static"><?php echo $row["prodResource"]; ?></p>
                    </div>
                    <p><a href="index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>