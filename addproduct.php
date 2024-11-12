<?php

require("connection.php");
require("helper.php");

if (isset($_POST['addproduct'])) {
    foreach ($_POST as $key => $value) {
        $_POST[$key] = mysqli_real_escape_string($con, $value);
    }

    $imgPath = image_upload($_FILES['image']);


    echo "<img src='$imgPath' width='$width' height='$height' alt='image'>";

    $query = "INSERT INTO `products`( `name`, `price`, `description`, `image`) 
   VALUES ('$_POST[name]','$_POST[price]','$_POST[description]','$imgPath')";

    if (mysqli_query($con, $query)) {
        header("location:index.php?success=added");
    }
} else {
    header("location:index.php?alert=add_failed");
}