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
        .container {
            margin: auto;
            width: 60%;
            padding-top: 5%;
        }
    </style>
    </head>

    <body>
        <div class="container">
            <h1 style="text-align: center;">Register successfully!</h1>
            <a href="index.html">Go back to login page.</a>
        </div>
    </body>
</html>