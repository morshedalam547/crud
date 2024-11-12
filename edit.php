<?php
require("connection.php");
require("helper.php");
// hello word
if (isset($_POST['editproduct'])) {
    foreach ($_POST as $key => $value) {
        $_POST[$key] = mysqli_real_escape_string($con, $value);
    }
    if (file_exists($_FILES['image']['tmp_name']) || is_uploaded_file($_FILES['image']['tmp_name'])) {
        $query = "SELECT * FROM products WHERE id =$_POST[editpid]";
        $result = mysqli_query($con, $query);
        $fetch = mysqli_fetch_assoc($result);

        image_remove($fetch['image']);

        $imgpath = image_upload($_FILES['image']);

        $update = "UPDATE `products` SET `name`='$_POST[name]',`price`='$_POST[price]',
        `description`='$_POST[desc]',`image`= '$imgpath' WHERE 'id'='$_POST[editpid]'";

    } else {
        $update = "UPDATE `products` SET `name`='$_POST[name]',`price`='$_POST[price]',
        `description`='$_POST[desc]' WHERE 'id'='$_POST[editpid]'";
    }

    if (mysqli_query($con, $update)) {
        header("location: index.php?success=update");
    } else {
        header("location: index.php?alert=update_failed");
    }
}