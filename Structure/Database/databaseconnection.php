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

// PAGINATION VARIABLES
// page is the current page, if there's nothing set, default is page 1
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// set records or rows of data per page
$records_per_page = 15;

// calculate for the query LIMIT clause
$from_record_num = ($records_per_page * $page) - $records_per_page;