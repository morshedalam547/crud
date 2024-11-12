<?php

require("connection.php");
require("helper.php");





if (isset($_GET['rem']) && $_GET['rem'] > 0) {
    $query = "SELECT * FROM products WHERE id = '$_GET[rem]'";
    $result = mysqli_query($con, $query);
    $fetch = mysqli_fetch_assoc($result);

    image_remove($fetch['image']);

    $query = "DELETE FROM products WHERE id = '$_GET[rem]'";
    if (mysqli_query($con, $query)) {
        header("location: index.php?success=removed");
    } else {
        header("location: index.php?alert=removed_failed");
    }
}







?>