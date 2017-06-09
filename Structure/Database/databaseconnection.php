<?php
/**
 * Created by PhpStorm.
 * User: jonto
 * Date: 6/9/2017
 * Time: 3:40 PM
 */

// used to connect to the database
$host = "localhost";
$db_name = "foodsite";
$username = "root";
$password = "";

try {
    $con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
}

// show error
catch(PDOException $exception){
    echo "Connection error: " . $exception->getMessage();
}