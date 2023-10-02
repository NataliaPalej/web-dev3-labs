<?php

	//$dsn='mysql:host=localhost;dbname=cars';
try {
    $dsn='mysql:host=127.0.0.1:3306;dbname=cars';
    $username='root';
    $password='';
    $db=new PDO($dsn, $username, $password);
    echo "<p>You are connected to database!</p>";
} catch (pdoException $ex) {
    $error_message=$ex->getMessage();
    echo "<p>An error occured while connecting to the database: $error_message</p>";
}
	
	
	
	
	

?>