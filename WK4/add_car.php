<?php
# declare variables
$make = $_POST['make'];
$model = $_POST['model'];

// call connect.php file to allow connection
require_once 'connect.php';
// insert into the table the variables from form
$query="INSERT INTO car_details (make, model) VALUES ('$make', '$model')";
// execute the query above to insert into table
$insert_count=$db->exec($query);
// call car_details file to display results
require_once 'car_details.php';