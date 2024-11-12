<?php

$con= mysqli_connect("localhost","root","","crud");

if(mysqli_connect_errno()){
    die("Cannot Connect to DataBase".mysqli_connect_errno());
}



define("UPLOAD_SRC",$_SERVER['DOCUMENT_ROOT']."/project/crud/uploads/");

define("FETCH_SRC","http://localhost/project/crud/uploads/");



























// <?php
// function resizeImage($file, $newWidth, $newHeight) {
//     // Load the original image
//     $sourceImage = imagecreatefromjpeg($file);
//     list($width, $height) = getimagesize($file);

//     // Create a new empty image with desired dimensions
//     $resizedImage = imagecreatetruecolor($newWidth, $newHeight);

//     // Resize the image
//     imagecopyresampled($resizedImage, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

//     // Save the resized image
//     imagejpeg($resizedImage, "resized_$file");

//     // Free up memory
//     imagedestroy($sourceImage);
//     imagedestroy($resizedImage);
// }

// // Usage
// resizeImage("original_image.jpg", 200, 150);

//




// <?php
// $imagePath = "path/to/image.jpg";
// $width = 300;
// $height = 200;

// echo "<img src='$imagePath' width='$width' height='$height' alt='Image'>";
// 



// <?php
// $maxWidth = 800;
// $maxHeight = 600;

// if (isset($_FILES['image'])) {
//     $imageSize = getimagesize($_FILES['image']['tmp_name']);
//     $width = $imageSize[0];
//     $height = $imageSize[1];

//     if ($width > $maxWidth || $height > $maxHeight) {
//         echo "Image exceeds maximum dimensions of $maxWidth x $maxHeight pixels.";
//     } else {
//         move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $_FILES['image']['name']);
//         echo "Image uploaded successfully!";
//     }
// }



?>
































