 <?php
 
session_start();
include ('../controller/UserController.php');

if( $_SERVER ['REQUEST_METHOD'] == 'POST'){

    if(!empty($_POST['title']) && !empty($_POST['description']) && !empty($_FILES['image']['name']) && !empty($_POST['price']))
    {
        $path=$_FILES['image']['tmp_name'];
        $destination='../images/'.$_FILES['image']['name'];

        move_uploaded_file($path,$destination);

        storeCourse($_POST['title'],$_POST['description'],$_FILES['image']['name'],$_POST['price']);
        
    }
}
?>

<?php include('../master/header.php') ?>

<div class="container">
    <div class="row mt-4">

        <form action="" method="POST" enctype='multipart/form-data'>
             <h2 class="text-center text-primary "> Add Course </h2>
        
        <div class="mb-3 mt-4">
             <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="title" name='title'>
        </div>

        <div class="mb-3">
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Description" name='description'></textarea>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text"> price </span>
            <input type="number" class="form-control" aria-label="Amount (to the nearest dollar)" name='price'>
            <span class="input-group-text"> .00$ </span>
        </div>

        <div class="input-group mb-3">
        <input type="file" class="form-control" id="inputGroupFile02" name='image'>
        <label class="input-group-text" for="inputGroupFile02">Upload</label>
        </div>

    <div/>
     <button class="btn btn-success mt-2"style="font-size:25px; color:white">Save</button>

     </form>
</div>


<?php include('../master/footer.php') ?>

