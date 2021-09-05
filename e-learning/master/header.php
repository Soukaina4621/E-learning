<?php 
if(isset($_POST['logout']))
{
  session_destroy();
  header('location: ../views instructor/login.php');
}
if(isset($_POST['logout']))
{
  session_destroy();
  header('location: ../views student/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="../style/index.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous"> -->
<title> E-learning </title>
</head>

<body>
<!--  -->
<nav class="navbar navbar-expand-lg" style="background-color:#3DC8E9">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link" href="../views student/index.php"><i class="fas fa-home" style="font-size :30px; color: #FFC83D"></i></a>

        <?php if(empty($_SESSION['instructor']) && empty($_SESSION['student'])): ?>
        <a class="nav-link" href="../views instructor/login.php"> <i class="fas fa-chalkboard-teacher" style="font-size:25px; color:#FFC83D"></i></a>
        <a class="nav-link" href="../views student/login.php"> <i class="fas fa-user-graduate" style="font-size:25px; color:#FFC83D"></i></i> </a>
        <?php endif ?> 
        

       <?php if(!empty($_SESSION['instructor'])): ?>
        <a class="nav-link" href="../views instructor/courseForm.php"style="font-size:25px; color:#FFC83D"> <i class="fas fa-plus-square" style="font-size:25px; color:#FFC83D"></i>Create </a>
        <a class="nav-link" href="../views instructor/index.php"style="font-size:25px;color:#FFC83D"> Mycourse </a>
        <a class="nav-link" href="../views instructor/profileDetails.php"style="font-size:25px; color:#FFC83D"> Profile</a>
        <?php endif ?>
         
        
        
        <?php if(!empty($_SESSION['student'])): ?>
        <a class="nav-link" href="../views student/profileDetails.php"style="font-size:20px; color:white"><i class="fas fa-user-circle"style="font-size:25px; color:#FFC83D"> </i>Profile</a>
        <a class="nav-link" href="../views student/favoris.php" style="font-size:20px; color:white"> <i class="fas fa-hand-holding-heart" style="font-size:25px; color:#FFC83D"></i>favourites</a>
        <?php endif ?>
        
      </div>

      <?php if(!empty($_SESSION['instructor']) || !empty($_SESSION['student']) ): ?>
        <form action="" method="post" class="">
          <input type="hidden" name="logout"></input>
         <button class="btn btn-warning" ><i class="fas fa-sign-out-alt"style="font-size:15px; color:blue"> Log out </i></button>
        </form>
      <?php endif ?>
       

    </div>
  </div>
</nav>
        <!-- <a class="nav-link" href="profiledetails.php">My profile</a> -->
