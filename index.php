<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="./static/img/comp.ico">

    <title>Checkout GCOMP</title>

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
                    <div class="page-header clearfix">
                        <div class="container">
                            <div class="row justify-content-between">
                                <div class="col-4">
                                    <h2 class="pull-left">Cart list</h2>
                                </div>
                                <div class="col-4">
                                    <a href="create.html" class="btn btn-success pull-right">Add New Product</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php


                    // Error handling
                    ini_set('display_errors', 1);
                    ini_set('display_startup_errors', 1);
                    error_reporting(E_ALL);


                    // Include config file
                    require_once("config.php");


                    $sql = "SELECT * FROM PRODUCTS";
                    if ($result = pg_query($link, $sql)) {
                        if (pg_num_rows($result) > 0) {
                            echo "<table class='table table-hover table-bordered'>";
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>#</th>";
                            echo "<th>Product Name</th>";
                            echo "<th>Product Description</th>";
                            echo "<th>Price</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while ($row = pg_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<th scope='row'><a href='read.php?_id=" . $row['_id'] . "' class='stretched-link'>" . $row['_id'] . "</a></th>";
                                echo "<td>" . $row['prodname'] . "</td>";
                                echo "<td>" . $row['proddescription'] . "</td>";
                                echo "<td>" . $row['prodprice'] . "</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";

                            pg_free_result($result);
                        } else {
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else {
                        echo "ERROR: Could not able to execute $sql. ";
                    }

                    // Close connection
                    pg_close($link);
                    ?>
                </div>
            </div>
        </div>
    </div>
    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1" id="copyright"></p>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
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