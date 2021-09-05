
<?php
session_start();
include('../controller/authController.php');
if($_SERVER['REQUEST_METHOD']=='POST'){
    if( !empty($_POST['email']) && !empty($_POST['password'])){
        if(!loginStud($_POST['email'],$_POST['password'])){
            echo"Email or password is incorrect";
         }
         else{
             $_SESSION['student']=$_POST['email'];
              header('location:index.php');
           }
 }
}
?>

<?php include('../master/header.php') ?>
<div class="container mt-5">
    <h2 class="text-info text-center"> Sign in </h2>
      <!-- <h4> </h4> -->
    <div class="row">
        <form action="" class="form-group col-md-8 offset-2 mt-4" method='POST'>
            <input name="email" type="email" class="form-control mt-2" placeholder='email'>
            <input name="password" type="password" class="form-control mt-2" placeholder='password'>
            <button class="btn btn-info form-control mt-2" style="color:white">Log in</button>

            <button class="btn btn-warning form-control mt-2"  > 
            <a href="register.php"style="text-decoration:none;color:white" >Sign up </a>  
            </button>

        </form>
    </div>
</div>

<?php include('../master/footer.php')?>

