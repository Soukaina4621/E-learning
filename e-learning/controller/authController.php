<?php 

include('../config/db.php');


$pdo=new PDO(ROOT,USERNAME,PASSWORD);

// **********************instructor******************************************


function checkInst ($name,$email)
{
    global $pdo;

    if($pdo)
    
    {
        $query='SELECT *from instructors where email=:email or name=:name';
    
        $statement=$pdo->prepare($query);
    
        $statement->execute([
            ':name'=>$name,
            ':email'=>$email,
        ]);
    
        $result=$statement->fetchAll();

        return  count($result)==1 ? true : false;
    }
}


function registerInst($name,$email,$password,$photo,$bio)
{
    global $pdo;
    if($pdo)
    {
       if(!checkInst($name,$email))
       {
        $query='INSERT INTO instructors (name,email,password,photo) values(:name,:email,:password,:photo,:bio)';
    
        $statement=$pdo->prepare($query);
    
        $statement->execute([
            ':name'=>$name,
            ':email'=>$email,
            ':password'=>$password,
            ':photo'=>$photo,
            ':bio'=>$bio,

        ]);
    
        return true;
       }
        return false;

    }

}
function loginInst ($email,$password)
{
    global $pdo;

    if($pdo)
    {

        $query='SELECT *from instructors where email=:email and password=:password';
    
        $statement=$pdo->prepare($query);
    
        $statement->execute([
            ':email'=>$email,
            ':password'=>$password,
        ]);
    
        $result=$statement->fetchAll();

        return  count($result)==1 ? true : false;
    }
}

// **********************************************************student***************************************************************

function checkStud($name,$email)
{
    global $pdo;

    if($pdo)
    
    {
        $query='SELECT *from students where email=:email or name=:name';
    
        $statement=$pdo->prepare($query);
    
        $statement->execute([
            ':name'=>$name,
            ':email'=>$email,
        ]);
    
        $result=$statement->fetchAll();

        return  count($result)==1 ? true : false;
    }
}
function registerStud ($name,$email,$password,$photo,$bio)
{
    global $pdo;
    if($pdo)
    {
       if(!checkStud($name,$email))
       {
        $query='INSERT INTO students (name,email,password,photo,bio) values(:name,:email,:password,:photo,:bio)';
    
        $statement=$pdo->prepare($query);
    
        $statement->execute([
            ':name'=>$name,
            ':email'=>$email,
            ':password'=>$password,
            ':photo'=>$photo,
            ':bio'=>$bio,
        ]);
    
        return true;
       }
        return false;

    }

}



function loginStud ($email,$password)
{
    global $pdo;

    if($pdo)
    {

        $query='SELECT *from students where email=:email and password=:password';
    
        $statement=$pdo->prepare($query);
    
        $statement->execute([
            ':email'=>$email,
            ':password'=>$password,
        ]);
    
        $result=$statement->fetchAll();

        return  count($result)==1 ? true : false;
    }
}