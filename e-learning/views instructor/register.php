<?php
session_start();

 include('../controller/authController.php');



   if($_SERVER['REQUEST_METHOD']=="POST")
   {
       if(!empty($_POST['name'])&& !empty($_POST['email']) && !empty($_POST['password']) && !empty($_FILES['photo']['name']) && !empty($_POST['bio']))
       {
          if( !registerInst($_POST['name'],$_POST['email'],$_POST['password'],$_FILES['photo']['name'],$_POST['bio']))
          {
              echo 'Existing record';
          } 
          else {

        $path = $_FILES['photo']['tmp_name']; 

        $destination = 'pictures/'.$_FILES['photo']['name'];

        move_uploaded_file ($path,$destination);

            $_SESSION['instructor'] = $_POST['email'];

            header('location: ../views student/index.php');
           
          }
       }
   }
?>
<?php include('../master/header.php') ?>
<div class="container mt-5">
    <h2 class="text-danger text-center"> Sign up </h2>
    <div class="row">
        <form action="" class="form-group mt-3 " method='POST' enctype='multipart/form-data'>
            <input name='name' placeholder='name' type="text" class="form-control mt-2">
            <input name="email"  placeholder='email' type="email" class="form-control mt-3">
            <input  name="password" placeholder='password' type="password" class="form-control mt-3">
            <input type="file" class="form-control  mt-3" id="inputGroupFile02" name='photo'>
            
            
            <div class="mb-3">
            <textarea class="form-control mt-3" id="exampleFormControlTextarea1" rows="3" placeholder="bio" name='bio'></textarea>
             </div>
            <button class="btn btn-success mt-2"> Save </button>
        </form>
    </div>
</div>

<?php include('../master/footer.php') ?>
