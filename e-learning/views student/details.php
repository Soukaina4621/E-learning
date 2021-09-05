<?php
 session_start();


 include('../controller/UserController.php');

 $courses = showCourse($_GET['id']);

  if (isset($_POST['course_id']))

  {

      addToFavourites($_POST['course_id'],$_SESSION['student_id']);

      header('location:favoris.php');
    }
 

    $value=checkFavouriteCourse($_GET['id']);
 ?>


<?php include('../master/header.php') ?>

  
<div class="container mt-5">
    <h1 class="text-center text-success ">Courses</h1>
    <div class="row">
    
    <?php foreach($courses as $course) : ?>
      
     
            <!-- class="card" style="width: 18rem; -->
   <div class="card col-md-4" ">
  <img src=<?php echo "../images/".$course['photo'] ?> class= "card-img-top" alt="...">
  <div class="card-body">
  


         <?php if(!empty($_SESSION['student']) && !$value){?>

         
     <form action="" method="post">
     <input type="hidden" value="<?php echo $course['id'] ?>" name="course_id">
    <button class="btn btn-danger"><i class="fas fa-heart" style="font-size:30px"></i></button>
     </form>

         <?php } ?>

    <h5 class="card-title" ><?php echo $course['title'] ?></h5>
    <p class="card-text"><?php echo $course['description'] ?></p>

    </div>
  
  <ul class="list-group list-group-flush">
    <li class="list-group-item" style="color:orange"> Price : <?php echo $course['price']?> .00$ </li>
  <div class="card-body">
    <a href="#" class="card-link" style="text-decoration:none;">take course!</a>
  </div>
</div>
 <?php endforeach ?>
 <div class="commentgdj mt-2">
     <h2> Comments</h2>
     <textarea class="form-control" placeholder= "leave a comment" id="floatingTextarea"></textarea>
     </div>
    </div>
    </div>
 

<?php include('../master/footer.php') ?>