<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="./static/img/comp.ico">

    <title>Checkout GCOMP - View Record</title>

    <!-- Bootstrap core CSS -->
    <link href="./static/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./static/form-validation.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <div class="container">
                            <div class="row justify-content-between">
                                <div class="col-4">
                                    <h2 class="pull-left">Read Record</h2>
                                </div>
                                <div class="col-4">
                                    <p><a href="index.php" class="btn btn-primary pull-right">Back</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php

                    // Error handling
                    ini_set('display_errors', 1);
                    ini_set('display_startup_errors', 1);
                    error_reporting(E_ALL);

                    $_id = $_GET["_id"];

                    // Check existence of id parameter before processing further
                    if (isset($_GET["_id"]) && !empty(trim($_id))) {
                        // Include config file
                        require_once("config.php");

                        // Prepare a select statement
                        $sql = "SELECT * FROM PRODUCTS WHERE _id = $_id";

                        $result = pg_query($link, $sql);

                        if (pg_num_rows($result) == 1) {
                            $row = pg_fetch_assoc($result);

                            echo "<div class='form-group'><label><b>Product Name</b></label><p class='form-control-static'>" . $row['prodname'] . "</p></div>";
                            echo "<div class='form-group'><label><b>Product Brand</b></label><p class='form-control-static'>" . $row['prodbrand'] . "</p></div>";
                            echo "<div class='form-group'><label><b>Product Description</b></label><p class='form-control-static'>" . $row['proddescription'] . "</p></div>";
                            echo "<div class='form-group'><label><b>Product Provider</b></label><p class='form-control-static'>" . $row['prodprovider'] . "</p></div>";
                            echo "<div class='form-group'><label><b>Author Name</b></label><p class='form-control-static'>" . $row['authorname'] . "</p></div>";
                            echo "<div class='form-group'><label><b>Amount</b></label><p class='form-control-static'>" . $row['prodamount'] . "</p></div>";
                            echo "<div class='form-group'><label><b>Unit of Measurement</b></label><p class='form-control-static'>" . $row['produnit'] . "</p></div>";
                            echo "<div class='form-group'><label><b>Price</b></label><p class='form-control-static'>" . $row['prodprice'] . "</p></div>";
                            echo "<div class='form-group'><label><b>Resource</b></label><p class='form-control-static'>" . $row['prodresource'] . "</p></div>";
                            echo "<div class='form-group'><label><b>Actions</b></label><p class='form-control-static'><a href='update.php?_id=". $row['_id'] ."' title='Edit Record' data-toggle='tooltip'>Edit</a></p><p class='form-control-static'><a href='delete.php?_id=". $row['_id'] ."' title='Delete Record' data-toggle='tooltip'>Delete</a></p></div>";
                        } else {
                            echo "<script language='javascript' type='text/javascript'>alert('URL doesn\'t contain valid id parameter. Redirect to error page');window.location.href='error.html'</script>";
                            exit();
                        }
                    } else {
                        echo "<script language='javascript' type='text/javascript'>alert('Oops! Something went wrong. Please try again later.');window.location.href='index.php'</script>";
                    }

                    // Close connection
                    pg_close($link);

                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>