<?php
//connecting to the db

$con =mysqli_connect("localhost","root","", "pub");

if(!$con){
    die('Could not connect: ' .mysqli_connect_error());
}

?>