<?php
session_start();
?>
<html>
    <head>
        <title>My Retail Site</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!--bootstrap-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     
    </head>
    <?php
    include("header.php");
    ?>
    <style>
        form p a {
            color: blue;
            text-decoration: underline;
        }
       
        .login {
            background-color: white;
            color: #000000;
            border: 10px solid white;
        }
        .login h3 {
            font-size: 1.8em;
        }
        .login form input[type="text"], input[type="password"], input[type="submit"] {
            color: black;
            outline: 0;
            width: 85%;
            border: 0;
            padding: 15px;
            border: 2px solid black;
            box-sizing: border-box;
            font-size: 14px;
            margin: 0 0 15px;
            font-weight: bold;
        }
        .center {
            width: 400px;
            padding: 10% 0 0 0;
            margin: auto;
            font-weight: bold;
        }
        .submit {
            color: black;
            background-color: lightgray;
        }
        .submit:hover {
            color: #ffffff;
            background-color: dimgray;
        }
        .card {
            /* Add shadows to create the "card" effect */
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
        }
    </style>
    <body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "retail";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);
echo $password;
// Check connection

if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$check="DESCRIBE customer";

if(mysqli_query($conn,$check)){

if(isset($_POST['submit']))
{ // Fetching variables of the form which travels in URL
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    //storind the data in your database
    $sql= "SELECT * FROM customer WHERE username = '$username' and password = '$password'";
    $result=mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result))
    {
      if(isset($row))
      {

        $_SESSION['user'] = $row['userid'];
      
        if('user'== $row['user'])
        {
          echo '<script> window.location.href="products.php";</script>';
        }
        else
        {
          echo '<script> window.location.href="addproduct.php";</script>';
         }
      }
   }  
}
}
$conn->close();
?>

        
        <center class="center">
            <div class="card">
            <div class="container-fluid login">
                <h3>Welcome to My Retail!</h3><br>
                <form class="form-3 login-form" action="" method="POST">
                    <input type="text" name="username" placeholder="Username" id="username"/>
                    <input type="password"  name="password" placeholder="Password" id="password"/>
                    <div class="row">
                        <input type="checkbox" name="remember" id="remember"/>
                        &nbsp;&nbsp;&nbsp;
                        <label>Remember me</label>
                    </div>
                    <input type="submit" class="submit" name="submit" value="LOGIN">
                    
                    <p>Not registered? <a href="registeration1.php">Create an account</a></p>
                </form><br>
            </div>
        </center>
    </body>

</html>