<?php
function image_upload($img)
{
    $tmp_loc = $img['tmp_name'];
    $new_name = random_int(11111, 99999) . $img['name'];

    $new_loc = UPLOAD_SRC . $new_name;


    if (!move_uploaded_file($tmp_loc, $new_loc)) {
        header("location: index.php?alert=img_upload");
        exit;
    } else {
        return $new_name;
    }

}
// var_dump($unlink);
// die;

function image_remove($img)
{
    if (!unlink(UPLOAD_SRC . $img)) {
        header("location: index.php?alert=img_rem_fail");
        exit;
    } else {
        echo "not deleted";
    }
}

?>