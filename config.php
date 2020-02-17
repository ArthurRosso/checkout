<?php

/* Attempt to connect to PostgreSQL database */
$host = "ec2-50-17-178-87.compute-1.amazonaws.com";
$port = "5432";
$dbname = "d2tp2kgcaicg2g";
$user = "gjlnaecixevmhz";
$passwd = "e1c132e283ab992399c1ed7af356c64cb89f6092ad3dc6bd9b57cb66c6c44af9";
$con_string = "host=$host port=$port dbname=$dbname user=$user password=$passwd sslmode=require";
$link = pg_connect($con_string);
 
// Check connection
if($link === false){
    echo ("Could not connect");
}

$select = "CREATE TABLE IF NOT EXISTS PRODUCTS ( 
    _id SERIAL PRIMARY KEY, 
    prodname VARCHAR (50) NOT NULL, 
    prodbrand VARCHAR (32) NOT NULL, 
    proddescription VARCHAR (32) NOT NULL, 
    prodprovider VARCHAR (32) NOT NULL, 
    authorname VARCHAR (32) NOT NULL, 
    prodamount INTEGER NOT NULL, 
    produnit VARCHAR (32) NOT NULL, 
    prodprice NUMERIC (8, 2) NOT NULL, 
    prodresource VARCHAR (32) NOT NULL 
)";
pg_query($link, $select);

?>