<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="./static/img/comp.ico">

    <title>Checkout GCOMP - Edit Record</title>

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
                                    <h2 class="pull-left">Edit Record</h2>
                                </div>
                                <div class="col-4">
                                    <p><a href="index.php" class="btn btn-primary pull-right">Back</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form class="needs-validation" novalidate action="updateHandler.php" method="POST">
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
                                
                                echo "<input type='hidden' name='_id' value=" . $row['_id'] . ">";
                                echo "<div class='mb-3'><label for='prodname'>Product Name</label><input type='text' class='form-control' id='prodname' name='prodname' value='" . $row['prodname'] . "' required><div class='invalid-feedback'> Please, enter the name of what you need.</div></div>";
                                echo "<div class='mb-3'><label for='prodbrand'>Product Brand</label><input type='text' class='form-control' id='prodbrand' name='prodbrand' value='" . $row['prodbrand'] . "' required><div class='invalid-feedback'>Who made the product.</div></div>";
                                echo "<div class='mb-3'><label for='proddescription'>Product Description</label><textarea type='text' class='form-control' id='proddescription' name='proddescription' required>" . $row['proddescription'] . "</textarea><div class='invalid-feedback'>Explain what you need, with especifications and things like that.</div></div>";
                                echo "<div class='mb-3'><label for='prodprovider'>Product Provider</label><input type='text' class='form-control' id='prodprovider' name='prodprovider' value='" . $row['prodprovider'] . "' required><div class='invalid-feedback'>Where buy the product.</div></div>";
                                echo "<div class='mb-3'><label for='authorname'>Author Name</label><input type='text' class='form-control' id='authorname' name='authorname' value='" . $row['authorname'] . "' required><div class='invalid-feedback'>Who want the product? This information is very usefull 'cause is for who the researcher gonna ask.</div></div>";
                                echo "<div class='mb-3'><label for='prodamount'>Amount</label><input type='number' class='form-control' id='prodamount' name='prodamount' value='" . $row['prodamount'] . "' required><div class='invalid-feedback'>How much or how many (I don\'t know).</div></div>";
                                echo "<div class='mb-3'><label for='produnit'>Unit of Measurement</label><input type='text' class='form-control' id='produnit' name='produnit' value='" . $row['produnit'] . "' required><div class='invalid-feedback'>Liters or cubic centimeters or meters or packages.</div></div>";
                                echo "<div class='mb-3'><label for='prodprice'>Price</label><input type='number' class='form-control' id='prodprice' name='prodprice' value='" . $row['prodprice'] . "' required><div class='invalid-feedback'>Enter just the number.</div></div>";
                                echo "<div class='mb-3'><label for='prodresource'>Resource</label><input type='text' class='form-control' id='prodresource' name='prodresource' value='" . $row['prodresource'] . "' required><div class='invalid-feedback'>Who will pay for this.</div></div>";
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

                        <hr class="mb-4">

                        <button class="btn btn-primary btn-lg btn-block" type="submit">Send to checkout</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1" id="copyright"></p>
    </footer>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script>
        window.jQuery || document.write('<script src="./static/jquery/jquery-slim.min.js"><\/script>')
    </script>
    <script src="./static/popper.min.js"></script>
    <script src="./static/js/bootstrap.min.js"></script>
    <script src="./static/holder.min.js"></script>
    <script src="./static/form-validator.js"></script>
    <script>
        let today = new Date();
        let y = today.getFullYear();

        today = '&copy; GCOMP / LAPOL / UFRGS ' + y;
        document.getElementById("copyright").innerHTML = today;
    </script>
</body>

</html>