<?php

$DB_USER="root";
$DB_PASSWORD="";
$DB_DATABASE="details";
$DB_HOST="localhost";

// define (DB_USER, "root");
// define (DB_PASSWORD, "");
// define (DB_DATABASE, "details");
// define (DB_HOST, "localhost");

$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_DATABASE);
  // echo "<script>console.log( 'Debug Objects: " . $mysqli . "' );</script>";
?>
