<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="./static/img/comp.ico">
    <title>Checkout GCOMP</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Cart list</h2>
                        <a href="create.html" class="btn btn-success pull-right">Add New Product</a>
                    </div>
                    <?php

                    
                    // Error handling
                    ini_set('display_errors', 1);
                    ini_set('display_startup_errors', 1);
                    error_reporting(E_ALL);


                    // Include config file
                    require_once ("config.php");
                    

                    $sql = "SELECT * FROM PRODUCTS";
                    if($result = pg_query($link, $sql)){
                        if(pg_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Product Name</th>";
                                        echo "<th>Product Description</th>";
                                        echo "<th>Price</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = pg_fetch_array($result)){
                                    print_r($result);
                                    echo "<tr>";
                                        echo "<td>" . $row['_id'] . "</td>";
                                        echo "<td>" . $row['prodName'] . "</td>";
                                        echo "<td>" . $row['prodDescription'] . "</td>";
                                        echo "<td>" . $row['prodPrice'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='read.php?_id=". $row['_id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='delete.php?_id=". $row['_id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";

                            pg_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. ";
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