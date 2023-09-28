<?php
 #variables
        $description = $_POST['description'];
        $price = $_POST['price'];
        $discount = $_POST['discount'];
        $discount_value = 0;
        $final_price = 0;
        
        if (is_numeric($price) && is_numeric($discount)) {
            $discount_value = ($price*$discount)/100;
            $final_price = "&euro;".number_format($price-$discount_value, 2);
            $discount_value = "&euro;".number_format($discount_value, 2);
            $price = "&euro;".number_format($price, 2);
        }
        else {
            echo "You must enter valid number";
        }     
?>

<!DOCTYPE html>
<html>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <head>
        <meta charset="UTF-8">
        <title>Discount Calculator</title>
    </head>
    <body>    
        <div class="w3-center w3-margin">
            <h1 class="w3-pink w3-center">Product Discount Calculator</h1>
        </div>
            <div class="w3-center w3-margin">
                <form action="display_discount.php" method="post">
                    <table class="w3-border w3-padding">
                        <tr>
                        <td class="w3-left">Product Description:</td>
                        <td><?php echo $description; ?></td>
                        </tr>
                        
                        <tr>
                        <td class="w3-left">List Price:</td>
                        <td><?php echo $price; ?></td>
                        </tr>
                        
                        <tr>
                            <td class="w3-left">Discount Percent: </td>
                            <td><?php echo $discount."%"; ?></td>
                        </tr>
                        
                        <tr>
                            <td class="w3-left">Discount Amount:</td>
                            <td> <?php echo $discount_value; ?></td>
                        </tr>
                        
                        <tr>
                            <td class="w3-left">Final Price:</td>
                            <td><?php echo $final_price; ?></td>
                        </tr>
                    </table>
                </form>
            </div>
    </body>
</html>


