
<?php
session_start();
 include('../controller/authController.php');


if($_SERVER['REQUEST_METHOD'] =='POST'){
    if( !empty($_POST['email']) && !empty($_POST['password'])){
        if(!loginInst($_POST['email'],$_POST['password'])){
            echo"Email or password is incorrect";
         }
         else{
             $_SESSION['instructor']=$_POST['email'];
              header('location: ../views student/index.php');
           }
 }
}
?>

<?php include('../master/header.php') ?>
<div class="container mt-5">
                                                    
    <h2 class="text-info text-center"> Sign in</h2> 
    <img class="loginInstPic"src="instructor.jpg" alt="">
    <!-- col-md-9 offset-2 -->
    <div class="row col-md-8 offset-2 ">
        <form action="" class="form-group mt-3" method='POST'>
            <input name="email" type="email" class="form-control mt-2" placeholder='email'>
            <input name="password" type="password" class="form-control mt-2" placeholder='password'>
            <button class=" btn btn-info form-control mt-2" style="color:white"> Log in </button>
            <button  class=" btn btn-warning form-control mt-2 " style="color:yellow"><a href="register.php" style="text-decoration:none; color:white">Sign up</a> </button>

        </form>
    </div>
</div>

<?php include('../master/footer.php') ?>





git init
git add .
git commit -m "first commit"
git branch -M main
git remote add origin git@github.com:Soukaina4621/Contact-form.git
git push -u origin main