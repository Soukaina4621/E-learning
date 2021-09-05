<?php
include('../controller/UserController.php');
  $courses=getCourse();

$course = showCourse ($_GET['id']);

if($_SERVER['REQUEST_METHOD'] =='POST')
{
  if(!empty($_POST['title']) && !empty($_POST['description']) && !empty($_FILES['image']['name']) && !empty( $_POST['price']))
  {
     
     updateCourse($_GET['id'],$_POST['title'],$_POST['description'],$_FILES['image']['name'],$_POST['price']);
      $path=$_FILES['image']['tmp_name'];
      $destination='../images/'.$_FILES['image']['name'];
      move_uploaded_file($path,$destination);

     

      header('location:../views student/index.php');
  }
}
?>
<?php include('../master/header.php') ?>

<div class="container">
    <div class="row mt-4">

        <form action="" method="POST" enctype="multipart/form-data">
             <h2 class="text-center text-primary ">Add Course </h2>
        
        <div class="mb-3 mt-4">
             <input name="title" value="<?php echo $course['title'] ?>" type="text" class="form-control" id="exampleFormControlInput1" >
        </div>

        <div class="mb-3">
            <textarea name="description"  class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="edit description"><?php echo $course['description'] ?></textarea>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">price</span>
            <input name=" price" value="<?php echo $course['price'] ?>" placeholder="edit price" type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
            <span class="input-group-text">.00$</span>
        </div>

        <div class="input-group mb-3">
        <input name="image"  type="file" class="form-control" id="inputGroupFile02">
        </div>

    <div/>
     <button class="btn btn-success mt-2">Save</button>

     </form>
</div>


<?php include('../master/footer.php') ?>

