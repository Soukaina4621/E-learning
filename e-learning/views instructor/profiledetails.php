<!-- search for a form where u put values from the instructors array/ $_instructor['name']... -->
<?php
session_start();
include('../controller/UserController.php');

if(!empty($_SESSION['instructor']))
{
    getInstructor($_SESSION['instructor']);

    $_SESSION['instructor_id']=$CurrentInstructorsinfo["id"];
}
?>
<?php include('../master/header.php') ?>
<h1>Hello Instructor!</h1>
<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">

    <?php foreach($instructors as $instructor) : ?>

    <div class="col-md-4">
      <img src=<?php echo "./pictures/".$instructor['photo'] ?>class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"> <?php echo $instructor['name']?> </h5>
        <p class="card-text"><?php echo $instructor['email'] ?></p>
        <p class="card-text"><?php echo $instructor['bio'] ?></p>
        <p class="card-text"><small class="text-muted">edit</small></p>
      </div>

     <?php endforeach ?>

    </div>
  </div>
</div>
<?php include('../master/footer.php') ?>
