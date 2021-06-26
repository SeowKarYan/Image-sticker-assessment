<?php

	if(isset($_POST['register'])) {
		
		$email = $_POST['email'];
		$password = md5($_POST['password']);

		include_once("config.php"); 
				
		$result = mysqli_query($mysqli, "INSERT INTO user(email,password) VALUES('$email','$password')");
	}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Register Successful</title>
        <style>
        body{
            background-color:#E3F2FD;
        } 

        .container {
            margin: auto;
            margin-top: 2%;
            width: 60%;
            padding: 3% 10% 3% 10%;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            background-color:white;
        }

        a {
            display: block;
            text-decoration: none;
            text-align: center;
            background-color: #4CAF50;
            color: white;
            padding: 10px;
        }

        a:hover {
            background-color: #1B5E20;
        }
    </style>
    </head>

    <body>
        <div class="container">
            <h1 style="text-align: center;">Register successfully!</h1><br><br>
            <a href="index.html">Go back to login page.</a>
        </div>
    </body>
</html>