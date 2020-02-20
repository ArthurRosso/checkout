<?php

// Error handling
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/* Attempt to connect to PostgreSQL database */
$host = "ec2-3-229-210-93.compute-1.amazonaws.com";
$port = "5432";
$dbname = "d4t5dfjn1fje71";
$user = "yqiffimujhschw";
$passwd = "2daf879fd5d1a935951c7b287723b563a11f16043b01fcc616e0fa5566805ad0";
$con_string = "host=$host port=$port dbname=$dbname user=$user password=$passwd sslmode=require";
$link = pg_connect($con_string);
 
// Check connection
if($link === false){
    echo ("Could not connect");
}

$select = "CREATE TABLE IF NOT EXISTS PRODUCTS ( 
    _id SERIAL PRIMARY KEY, 
    prodname VARCHAR (255) NOT NULL, 
    prodbrand VARCHAR (255) NOT NULL, 
    proddescription VARCHAR (255) NOT NULL, 
    prodprovider VARCHAR (255) NOT NULL, 
    authorname VARCHAR (255) NOT NULL, 
    prodamount INTEGER NOT NULL, 
    produnit VARCHAR (255) NOT NULL, 
    prodprice NUMERIC (8, 2) NOT NULL, 
    prodresource VARCHAR (255) NOT NULL,
    prodimage TEXT
)";
pg_query($link, $select);

?>