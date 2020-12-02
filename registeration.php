
<?php
session_start();
$userid=$_SESSION['user'];
?>
<?php
    include("database.php");
  
    $check="DESCRIBE customer";

if(mysqli_query($conn,$check)){

if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address1 = $_POST['address1'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    if($password != $confirmpassword)
    {
        echo "password incorrect";
    }
    else
    {
    //storind the data in your database
    $sql="INSERT into customer(
        name,email,address,user,username,password) 
        values ('$name','$email','$address1','user','$username','$password')";
    $query = mysqli_query($conn,$sql);
    
   
    //echo "Your add has been submited, you will be redirected to your account page in 5 seconds....";
    //header( "Refresh:5; url=viewproduct.php", true, 303);
 
    echo '<script> window.location.href="login.php";</script>';
    }
}
else{
    echo '<script> window.location.href="registeration.php";</script>';
    }
    
    }
    else{
    $sql = "CREATE TABLE customer(
    name VARCHAR(100),
    email VARCHAR(100),
    address VARCHAR(200),
    user VARCHAR(50);
    username VARCHAR(100),
    password VARCHAR(100)

)";
if(mysqli_query($conn, $sql)){
    echo "Table created successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

if(isset($_POST['submit'])){ 
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address1 = $_POST['address1'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    if($password != $confirmpassword)
    {
        echo "password incorrect";
    }
    else
    {
    //storind the data in your database
    $sql="INSERT into customer(
        name,email,address,username,password) 
        values ('$name','$email','$address1','user','$username','$password')";
    $query = mysqli_query($conn,$sql);
    
   
    //echo "Your add has been submited, you will be redirected to your account page in 5 seconds....";
    //header( "Refresh:5; url=viewproduct.php", true, 303);
 
    echo '<script> window.location.href="login.php";</script>';
    }
}
    else{
    echo '<script> window.location.href="registeration,php.php";</script>';
    }
}
$conn->close();
?>
