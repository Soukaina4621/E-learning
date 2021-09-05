
<?php
session_start();
if(empty($_SESSION['student']))
{
  header('location:index.php');

}


include("../controller/UserController.php");

   if($_SERVER['REQUEST_METHOD']=='POST'){
       
    if(!empty($_POST['id'])){
    deleteFavouriteCourse($_POST['id']);
    }
  }
  if(!empty($_SESSION ['student'])){

        $currentStudent = getStudent ($_SESSION['student']);
        $FavouriteCourse = getFavouriteCourse ($currentStudent["id"]);

        $_SESSION['student_id']=$currentStudent["id"];
    }  

?>

<?php include('../master/header.php') ?>


<div class="container mt-5">
    <h1 class="text-center text-success ">Favourite Courses</h1>
  
    
    <div class="row">
    
    <?php foreach($FavouriteCourse as $course) : ?>
      
     
            <!-- class="card" style="width: 18rem; -->
    <div class="card col-md-4" ">
  <img src=<?php echo "../images/".$course['photo'] ?> class= "card-img-top" alt="...">
  <div class="card-body">
  
    

    <h5 class="card-title" ><?php echo $course['title'] ?></h5>
    <p class="card-text"><?php echo $course['description'] ?></p>

    </div>
  
  <ul class="list-group list-group-flush">
    <li class="list-group-item" style="color:orange"> Price : <?php echo $course['price']?> .00$ </li>
  <div class="card-body">
    <a href="#" class="card-link" style="text-decoration:none;">take course!</a>
  </div>
  <form action="" method="post" class="">
                    <input type="hidden" name="id" value="<?php echo $course['id'] ?>">
                      <button class="btn btn-danger "><i class="fa fa-trash"></i></button>
                </form>
</div>
 <?php endforeach ?>

    </div>
    </div>
   
<?php include('../master/footer.php') ?>

