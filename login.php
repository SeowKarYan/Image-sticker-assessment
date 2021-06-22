<?php

if(isset($_POST['login'])) {
		
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    include_once("config.php"); 
            
    $result = mysqli_query($mysqli, "SELECT * FROM user WHERE email = '".$email."' AND password = '".$password."'");

    $rowcount = mysqli_num_rows($result);

    mysqli_free_result($result);

    if($rowcount == 1) {
        header("Location:homepage.php");
    }
    else {
        header("Location:login.php?message=loginfail");
    }
}
else{
    include("index.html");

    if(isset($_GET['message']) && $_GET['message'] == "loginfail") 
	{
		echo '<script>document.getElementById("login_alert").innerHTML = "Wrong Username or Password!";</script>';
	}
}

?>