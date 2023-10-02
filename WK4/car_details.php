<?php
try{
    // Dbname must be the name of the database, NOT the file name
    $dsn='mysql:host=127.0.0.1:3306;dbname=cars';
    $username='root';
    $password='';
    $db=new PDO($dsn, $username, $password);
    
    // Instead of the above, you can just use -> require_once 'connect.php';
    // And work off the connect file
    $query='SELECT * FROM car_details';
    $cars = $db->query($query);
} catch (Exception $ex) {
    $error_message=$ex->getMessage();
    echo "<p>An error occured while connecting to the database: $error_message</p>";
}
?>

<html>
    <head>
        <title>PHP - Database Example</title>
    </head>
    <body>
        <h1>This is Cars table</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Make</th>
                <th>Model</th>
            </tr>
            <?php foreach ($cars as $car) : ?>
            <tr>
                <td><?php echo $car['id'];?></td>
                <td><?php echo $car['make'];?></td>
                <td><?php echo $car['model'];?></td>
            </tr>
            <?php endforeach; ?>
        </table>  
    </body>
    
         
</html>
       

