<?php 

session_start();

if(isset($_POST['submit']) && isset($_FILES['img'])){

    $img_name = $_FILES['img']['name'];
    $tmp_name = $_FILES['img']['tmp_name'];
    $error = $_FILES['img']['error'];

    if($error === 0) {
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);

        $new_img_name = uniqid("IMG-",true).'.'.$img_ex_lc;
        $img_upload_path = 'images/'.$new_img_name;
        move_uploaded_file($tmp_name, $img_upload_path);

        $_SESSION["image"] = $new_img_name;

        header("Location: homepage.php");        

    } else {
        $em = "unknown error occurred!";
        header("Location: uploadPage.php?error=$em");
    }

} else {
    header("Location: uploadPage.php");
}

?>