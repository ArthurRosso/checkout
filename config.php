<?php
/* Attempt to connect to PostgreSQL database */
$con_string = "host=ec2-50-17-178-87.compute-1.amazonaws.com port=5432 dbname=d2tp2kgcaicg2g user=gjlnaecixevmhz password=e1c132e283ab992399c1ed7af356c64cb89f6092ad3dc6bd9b57cb66c6c44af9";
$link = pg_connect($con_string);
 
// Check connection
if($link === false){
    echo ("Could not connect")
}

$select = "SELECT * FROM PRODUCTS";
if($res = pg_query($link, $sql)){

} else {
    $select = "CREATE TABLE PRODUCTS ( 
        _id SERIAL PRIMARY KEY, 
        prodName VARCHAR (50) NOT NULL, 
        prodBrand VARCHAR (32) NOT NULL, 
        prodDescription VARCHAR (32) NOT NULL, 
        prodProvider VARCHAR (32) NOT NULL, 
        authorName VARCHAR (32) NOT NULL, 
        prodAmount INTEGER (32) NOT NULL, 
        prodUnit VARCHAR (32) NOT NULL, 
        prodPrice INTEGER (32) NOT NULL, 
        prodResource VARCHAR (32) NOT NULL 
    )"
    pg_query($link, $select);
}

?>