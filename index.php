<?php
require("connection.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ML product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  </head>
<body class="bg-light">
    
<div class="container bg-dark text-light p-3 rounded my-4">
    <div class= "d-flex align-items-center justify-content-between px-3">
    <h2>
        <a href="index.php" class ="text-white text-decoration-none">
            <i class="bi bi-bar-chart-fill"></i> ML Product Store</a>
    </h2>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addproduct">
    <i class="bi bi-plus-lg"></i>Add Product</button> </div>
    
   </div>


<?php

   if(isset($_GET['alert']))
   {
    if($_GET['alert']=='img_upload')
    {
      echo<<<alert
    <div class=" container alert alert-danger alert-dismissible text-center" role="alert">
       <strong>image upload Failed! Server Down</strong>
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    alert;
      }
      if($_GET['alert']=='img_rem_fail')
      {
        echo<<<alert
      <div class=" container alert alert-danger alert-dismissible text-center" role="alert">
         <strong>image Removal Failed! Server Down</strong>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      alert;
        }
      if($_GET['alert']=='add_failed')
      {
        echo<<<alert
      <div class=" container alert alert-danger alert-dismissible text-center" role="alert">
         <strong>Cannot Add Product! Server Down</strong>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      alert;
        }
        if($_GET['alert']=='remove_failed')
      {
        echo<<<alert
      <div class=" container alert alert-danger alert-dismissible text-center" role="alert">
         <strong>Cannot Remove Product! Server Down</strong>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      alert;
        }
        if($_GET['alert']=='Update_failed')
      {
        echo<<<alert
      <div class=" container alert alert-danger alert-dismissible text-center" role="alert">
         <strong>Cannot update Product! Server Down</strong>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      alert;
        }
   }
   else if(isset($_GET['success']))
   {
    if($_GET['success']=='updated')
    {
      echo<<<alert
    <div class=" container alert alert-danger alert-dismissible text-center" role="alert">
       <strong>Product Updated</strong>
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    alert;
    }
    if($_GET['success']=='added')
    {
      echo<<<alert
    <div class=" container alert alert-success alert-dismissible text-center" role="alert">
       <strong>Product Added</strong>
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    alert;
    }
    if($_GET['success']=='removed')
    {
      echo<<<alert
    <div class=" container alert alert-danger alert-dismissible text-center" role="alert">
       <strong>Product removed</strong>
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    alert;
    }
   }
    ?>


   <div class="container mt-4 p-0">
    <table class="table table-hover text-center">
  <thead class="bg-dark text-light">
    <tr>
      <th width="10%" scope="col" class="rounded-start">Sr. No.</th>
      <th width="15%" scope="col">image</th>
      <th width="10%" scope="col">name</th>
      <th width="10%" scope="col">price</th>
      <th width="35%" scope="col">description</th>
      <th width="20%" scope="col" class="rounded-end">Action</th>
    </tr>
  </thead>
  <tbody class="bg-white">

    <?php
    $query="SELECT * FROM products";
    $result=mysqli_query($con,$query);

    $i=1;

      $fetch_src=FETCH_SRC;

    while($fetch=mysqli_fetch_assoc($result))
    {
    
      echo<<<product
      <tr class="align-middle">
        <th scope="row">$i</th>
        <td><img src="$fetch_src$fetch[image]" width="80px"></td>
        <td>$fetch[name]</td>
        <td>$$fetch[price]</td>
        <td>$fetch[description]</td>
        <td>
        <a href="?edit=$fetch[id]" class="btn btn-warning me-2"><i class="bi bi-pencil-square"></i></a>
        <button onclick="confirm_rem($fetch[id])" class="btn btn-danger"><i class="bi bi-trash"></i></button>
        </td>
      </tr>
      product;
      $i++;
    }
   ?>
    
  </tbody>
</table>
    </div>

<!--Create Add option start---->
<div class="modal fade" id="addproduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
   <form action="addproduct.php" method="POST" enctype="multipart/form-data">
   <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add product</h5>
      </div>
      <div class="modal-body">
        <div class="input-group mb-3">

    <span class="input-group-text">name</span>
    <input type="text" class="form-control" name="name" required>
    </div>
    <div class="input-group mb-3">
    <span class="input-group-text">price</span>
    <input type="number" class="form-control" name="price" min="1" required>
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text">description</span>
        <textarea class="form-control" name="desc" required></textarea>
    </div>

    <div class="input-group mb-3">
        <label class="input-group-text">image</label>
        <input type="file" class="form-control" name="image" accept=".jpg,.png,.svg" required>
    </div>
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-success" name="addproduct">Add</button>
      </div>
    </div>

   </form>
 
  </div>
</div>

<!--Create Add option End---->

<!--Update Edit option start---->

<div class="modal fade" id="editproduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
   <form action="edit.php" method="POST" enctype="multipart/form-data">
   <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit product</h5>
      </div>
      <div class="modal-body">
        <div class="input-group mb-3">

    <span class="input-group-text">name</span>
    <input type="text" class="form-control" name="name" id="editname" required>
    </div>
    <div class="input-group mb-3">
    <span class="input-group-text">price</span>
    <input type="number" class="form-control" name="price" id="editprice" min="1" required>
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text">description</span>
        <input class="form-control" name="desc" id="editdesc" required>
    </div>
    <img src="" id="editimg" width="100%" class="mb-3"> <br>

    <div class="input-group mb-3">
        <label class="input-group-text">image</label>
        <input type="file" class="form-control" name="image" accept=".jpg,.png,.svg">
    </div>
    <input type="hidden" name="editpid" id="editpid">
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-success" name="editproduct">Edit</button>
      </div>
    </div>
   </form>
   </div>
</div>

<?php


// var_dump("Before", $variable);

if (isset($_GET['edit']) && $_GET['edit']>0){

  $query="SELECT * FROM products WHERE id ='$_GET[edit]'";
  $result=mysqli_query($con,$query);
  $fetch=mysqli_fetch_assoc($result);
  // var_dump($fetch);
  // die;
  echo"

  <script>
  var editproduct = new bootstrap.Modal(document.getElementById('editproduct'), {
  keyboard: false
});
document.querySelector('#editname'). value='$fetch[name]';
document.querySelector('#editprice'). value='$fetch[price]';
document.querySelector('#editdesc'). value='$fetch[description]';
document.querySelector('#editimg'). src='$fetch_src$fetch[image]';
document.querySelector('#editpid'). value='$_GET[edit]';
editproduct.show();
   </script>
";
}
// var_dump("After", $variable);
?>
<!--Update EDIT option End---->

<script>
  function confirm_rem(id){
    if(confirm("Are you sure,you want to delete this item ?")){
      window.location.href="http://localhost/project/crud/delete.php?rem="+id;
    }
  }
</script> 
 
</body>
</html>