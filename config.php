<?php
# This function reads your DATABASE_URL config var and returns a connection
# string suitable for pg_connect. Put this in your app.
function pg_connection_string_from_database_url() {
    extract(parse_url($_ENV["DATABASE_URL"]));
    return "user=$user password=$pass host=$host dbname=" . substr($path, 1); # <- you may want to add sslmode=require there too
}
  
# Here we establish the connection. Yes, that's all.
$link = pg_connect(pg_connection_string_from_database_url());
// Check connection
if($link === false){
    echo ("Could not connect")
}

if($res = pg_query($link, "SELECT * FROM PRODUCTS")){

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