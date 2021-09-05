
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
      
     
            <!-- class="card" style="width: 18rem; -->
    <div class="card col-md-4" ">
  <img src=<?php echo "../images/".$course['photo'] ?> class= "card-img-top" alt="...">
  <div class="card-body">
  
    <!-- <form action="" method="post">
       <input type="hidden" value="<php echo $course['id'] ?>" name="course_id">
    <button class="btn btn-danger">
      <i class="fas fa-heart" style="font-size:30px"></i>
    </button>
    </form> -->

    <h5 class="card-title" ><?php echo $course['title'] ?></h5>
    <!-- <p class="card-text"><?php echo $course['description'] ?></p> -->

    </div>
  
  <ul class="list-group list-group-flush">
    <li class="list-group-item" style="color:orange"> Price : <?php echo $course['price']?> .00$ </li>
  <div class="card-body">
    <a href="details.php?id=<?php echo $course['id']?>" style="color:orange;text-decoration:none" class="card-link">details</a>
    <a href="#" class="card-link" style="text-decoration:none;">take course!</a>
  </div>
</div>
 <?php endforeach ?>

    </div>
    </div>
   

<?php include('../master/footer.php') ?>