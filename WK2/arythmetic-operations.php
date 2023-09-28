<?php
                $n1=10;
                $n2=2;
                $sum_result=$n1+$n2;
                $sub_result=$n1-$n2;
                $mul_result=$n1*$n2;
                $div_result=$n1/$n2;
                $mod_result=$n1%$n2;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Operations</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    <h1 class="w3-container w3-pink w3-padding w3-margin w3-center">Arithmetic Operations in PHP</h1>
    <div class ="w3-center w3-margin">
        <p>
            <div class="w3-container w3-third w3-cell">Sum: </div>
            <div class="w3-container w3-third w3-cell"><?php echo $n1?> + <?php echo $n2?> = </div>
            <div class="w3-container w3-third w3-cell"><?php echo $sum_result?></div>
        </p>
        <p>
            <div class="w3-container w3-third w3-cell">Subtraction: </div>
            <div class="w3-container w3-third w3-cell"><?php echo $n1?> - <?php echo $n2?> = </div>
            <div class="w3-container w3-third w3-cell"><?php echo $sub_result?></div>
        </p>
        <p>
            <div class="w3-container w3-third w3-cell">Multiplication: </div>
            <div class="w3-container w3-third w3-cell"><?php echo $n1?> * <?php echo $n2?> = </div>
            <div class="w3-container w3-third w3-cell"><?php echo $mul_result?></div>
        </p>
        <p>
            <div class="w3-container w3-third w3-cell">Division: </div>
            <div class="w3-container w3-third w3-cell"><?php echo $n1?> / <?php echo $n2?> = </div>
            <div class="w3-container w3-third w3-cell"><?php echo $div_result?></div>
        </p>
        <p>
            <div class="w3-container w3-third w3-cell">Modulus: </div>
            <div class="w3-container w3-third w3-cell"><?php echo $n1?> % <?php echo $n2?> = </div>
            <div class="w3-container w3-third w3-cell"><?php echo $mod_result?></div>
        </p>
    </div>
</body> 
</html> 