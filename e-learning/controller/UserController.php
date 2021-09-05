<?php
include('../config/db.php');
$pdo= new  PDO (ROOT, USERNAME, PASSWORD);

function getCourse()
{
    global $pdo;
    if(!$pdo){
        echo'Error connection';
    }else{
        $query="SELECT *FROM courses ORDER BY DATE DESC";

        $statement=$pdo -> prepare($query);

        $statement-> execute();

        return $statement->fetchAll();
    }
}

function storeCourse ($title,$description,$image,$price,$instructor){
  global $pdo;
    if(!$pdo)
    {
        echo 'Error connection';
    }
    else{
        $query="INSERT INTO courses (title,description,photo,price,date,instructor_id) values(:title,:description,:photo,:price,:date,:instructor_id)";

        $statement=$pdo->prepare($query);

        $statement->execute([
            ':title'=>$title,
            ':description'=>$description,
            ':photo'=>$image,
            ':price'=>$price,
            ':date'=>date("Y-m-d H:i:s"),
            ':instructor_id'=>$instructor,

        ]); 
    }

}

function showCourse ($id)
{
    global $pdo;
    if(!$pdo)
    {
        echo 'Error Connection';
    }
    else{
        $query='SELECT *from courses where id=:id';
        $statement=$pdo->prepare($query);

        $statement->execute([
            ':id'=>$id
        ]);

        return $statement->fetchAll();
    }
}


function updateCourse ($id,$title,$description,$image,$price)
{
    global $pdo;
    if(!$pdo)
    {
        echo 'Error connection';
    }
    else{
        $query='UPDATE courses set title=:title,description=:description,photo=:photo,price=:price where id=:id';

        $statement=$pdo->prepare($query);

        $statement->execute([
            ':id'=>$id,
            ":title"=>$title,
            ":description"=>$description,
            ":photo"=>$image,
            ":price"=>$price,
            
        ]);

    }
}

function deleteCourse ($id)
{
    global $pdo;
    if(!$pdo)
    {
        echo 'Error connection';
    }
    else{
        $query='DELETE from courses where id=:id';
        $statement=$pdo->prepare($query);

        $statement->execute([
            ':id'=>$id
        ]);
    }
}

function searchCourse ($title){

    global $pdo;
    if(!$pdo)
    {
        echo 'Error connection';
    }
    else{
        $query="SELECT *FROM courses where title like :title";

        $statement=$pdo->prepare($query);

        $statement->execute([


            ':title'=>"$title%"

        ]);
        
        return $statement->fetchAll();
    }

}

// *****************************************Student's favouriteCourses **************************************************
function checkFavouriteCourse($id){
     global $pdo;
    

    
        $query='SELECT *from favourites WHERE course_id=:course_id';

        $statement=$pdo->prepare($query);

        $statement->execute([
            ':course_id'=>$id,
        ]);

        $result = $statement->fetchAll();
        
      return  count($result)==1 ? true : false;
    
}
function addToFavourites ($course_id,$student_id){

  global $pdo;
    if(!$pdo)
    {
        echo 'error';
    }
    else{
        $query= "INSERT INTO favourites (course_id, student_id) values(:course_id, :student_id)" ;

        $statement=$pdo->prepare($query);

        $statement->execute([

            ':course_id'=> $course_id,
            ':student_id'=> $student_id,

        ]);
        
    }
   
}


function getFavouriteCourse($id){
     global $pdo;
    

    
        $query='SELECT *from courses INNER JOIN favourites ON courses.id=favourites.course_id WHERE favourites.student_id=:student_id';

        $statement=$pdo->prepare($query);

        $statement->execute([
            ':student_id'=>$id,
        ]);

        return $statement->fetchAll();


    
}

function deleteFavouriteCourse ($id)
{
    global $pdo;
    if(!$pdo)
    {
        echo 'error';
    }
    else{
        $query='DELETE from favourites where id=:id';

        $statement=$pdo->prepare($query);

        $statement->execute([
            ':id'=>$id
        ]);
    }
}
// ****************************studentInfo*******************************
function getStudent($email){

 global $pdo;
    if(!$pdo)
    {
        echo 'error conexion';
    }
    else{
        $query="SELECT id,name,password,photo,bio FROM students WHERE email=:email";

        $statement=$pdo->prepare($query);

        $statement->execute([
            ':email'=>$email
        ]);

         return $statement->fetch();
         
    }

}
// ****************************InstructorInfo*******************************

function getInstructor($email){

 global $pdo;
    if(!$pdo)
    {
        echo 'error conexion';
    }
    else{
        $query="SELECT id ,name,password,photo,bio FROM  instructors WHERE email=:email";

        $statement=$pdo->prepare($query);

        $statement->execute([
            ':email'=>$email
        ]);

         return $statement->fetchAll();
    }

}
// ***********************comments******************************

function storeComment ($content,$course_id,$student_id){

  global $pdo;
    if(!$pdo)
    {
        echo 'error';
    }
    else{
        $query= "INSERT INTO comments (content,course_id, student_id) values(:content,:course_id, :student_id)" ;

        $statement=$pdo->prepare($query);

        $statement->execute([
            ':content'=> $content,
            ':course_id'=> $course_id,
            ':student_id'=> $student_id,

        ]);
        
    }
   
}
