<?php
session_start();

?>
<?php
   
    include("header.php");
?>
<html>
    <head>
        <title>My Retail Site</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

       
    </head>
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
        <center class="center">
            <div class="card">
                <div class="container-fluid login">
                <h3>Sign Up below!</h3><br>
                <form class="form-3 login-form" action="" method="POST">
                    <input type="text" name="name" placeholder="Name" id="name"/><br>
                    <input type="text" name="email" placeholder="EMAIL" id="email"/><br>
                    <input type="text" name="address1" placeholder="Address" id="address1"/><br>
                    <input type="text" name="username" placeholder="Username" id="username"/><br>
                    <input type="password"  name="password" placeholder="Password" id="password"/>
                    <input type="password"  name="confirmpassword" placeholder="Confirm Password" id="confirmpassword"/>
                    <br><br>
                    <input type="submit" class="submit" name="submit" value="SIGN UP">
                    <p>Already a user? <a href="login.php">Head to login?</a></p>
                </form><br>
            </div>
        </center>
    </body>
    
</html>


