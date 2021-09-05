
 <?php 
 session_start();

 include('../controller/UserController.php');

  $courses=getCourse();

  if (isset($_POST['title']))
  {
      $courses =  searchCourse ($_POST['title']);
  }
  
  if (isset($_POST['id']))
  {
      deleteCourse($_POST['id']);

      header('location:index.php');
    }

 ?>
<?php include('../master/header.php') ?>


<div class="container mt-5">
    <h1 class="text-center text-success ">Courses</h1>
    <form action="" class="form-group" method="POST">
        <input type="text" class="form-control shadow active" name="title" placeholder="find course..">
        <button class="btn btn-info my-2" style="color:white">search</button>
    </form>
    
    <div class="row">
    
    <?php foreach($courses as $course) : ?>
      
         
    <div class="card col-md-4">
    <img src= <?php echo "../images/".$course['photo'] ?> class="card-img-top" alt="...">
    <div class="card-body">
            <h5 class="card-title">Title : <?php echo $course['title'] ?></h5>
            <div class="content">
                <h6 class="card-subtitle mb-2 text-muted">Description : <?php echo $course['description'] ?></h6>
                <h6 class="card-subtitle mb-2 text-muted">Price :  <?php echo $course['price'] ?>.00$</h6>
                <form action="" method="post" class="d-flex justify-content-end">
                    <input type="hidden" name="id" value="<?php echo $course['id'] ?>">
                      <button class="btn "><i class="fa fa-trash" style="color:red;"></i></button>
                      <button class="btn"><a href="../views instructor/editCourse.php?id=<?php echo $course['id'] ?>" style="color:#42B4D6" ><i class="fa fa-edit"></i></a></button> 
                </form>
            </div>
            </div>
            </div>
            
 <?php endforeach ?>

    </div>
    </div>
   

<?php include('../master/footer.php') ?>