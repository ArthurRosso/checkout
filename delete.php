<?php

require_once ("config.php");

$_id = $_GET["_id"];
$sql = "DELETE FROM PRODUCTS WHERE _id = '$_id'";
    
if ($link->query($sql)) {
    echo"<script language='javascript' type='text/javascript'>alert('Product successfully deleted!');window.location.href='index.php'</script>";
} else {
    echo"<script language='javascript' type='text/javascript'>alert('This product could not be deleted.');window.location.href='index.php'</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="./static/img/comp.ico">
    <title>Checkout GCOMP - Delete Record</title>
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
                        <h1>Delete Record</h1>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger fade in">
                            <input type="hidden" name="_id" value="<?php echo trim($_GET["_id"]); ?>"/>
                            <p>Are you sure you want to delete this record?</p><br>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="index.php" class="btn btn-default">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>