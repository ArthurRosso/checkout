<?php

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