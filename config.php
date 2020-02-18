<?php

// Error handling
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/* Attempt to connect to PostgreSQL database */
$host = "ec2-184-72-236-57.compute-1.amazonaws.com";
$port = "5432";
$dbname = "d1akuuj1dkvst3";
$user = "essqjadckawcxv";
$passwd = "228a4c2c945b06175a7ef73db1ae99737dc53aac98a383571b58794c0a4c56ae";
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
    prodresource VARCHAR (255) NOT NULL 
)";
pg_query($link, $select);

?>