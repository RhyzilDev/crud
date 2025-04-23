<?php

require_once("dbConnection.php");

if (isset($_POST['update'])) {
    
    $id = mysqli_real_escape_string($mysqli, $_POST['id']);
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    $address = mysqli_real_escape_string($mysqli, $_POST['address']);
    $class = mysqli_real_escape_string($mysqli, $_POST['class']);
    $phone = mysqli_real_escape_string($mysqli, $_POST['phone']);
    
    if (empty($name) || empty($address) || empty($class) || empty($phone)) {
        if (empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if (empty($address)) {
            echo "<font color='red'>Address field is empty.</font><br/>";
        }
        
        if (empty($class)) {
            echo "<font color='red'>Class field is empty.</font><br/>";
        }
        
        if (empty($phone)) {
            echo "<font color='red'>Phone field is empty.</font><br/>";
        }
    } else {
        
        $result = mysqli_query($mysqli, "UPDATE users SET `name` = '$name', `address` = '$address', `class` = '$class', `phone` = '$phone' WHERE `id` = $id");
        
        
        if ($result) {
            echo "<p><font color='green'>Data updated successfully!</font></p>";
            echo "<a href='index.php'>View Result</a>";
        } else {
            echo "<p><font color='red'>Error updating data: " . mysqli_error($mysqli) . "</font></p>";
        }
    }
}
?>
