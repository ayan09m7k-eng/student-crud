<?php
require "connection.php";
    $message = "";

    if(isset($_POST["submit"])){
        if(!file_exists("uploads")){
            mkdir("uploads", 0777, true);
        }

    $name = $_POST["name"];
    $email = $_POST["email"];
    // $password = $_POST["password"];{}
    $ownImage = time()."_".$_FILES["ownImage"]["name"];
    $ownImage_temp = $_FILES["ownImage"]["tmp_name"];
    $ownImage_type = $_FILES["ownImage"]["type"];
    $ownImage_size = $_FILES["ownImage"]["size"];

    $marksheet = time()."_".$_FILES["marksheet"]["name"];
    $marksheet_temp = $_FILES["marksheet"]["tmp_name"];
    $marksheet_type = $_FILES["marksheet"]["type"];
    $marksheet_size = $_FILES["marksheet"]["size"];

    $marksheet2 = time()."_".$_FILES["marksheet2"]["name"];
    $marksheet2_temp = $_FILES["marksheet2"]["tmp_name"];
    $marksheet2_type = $_FILES["marksheet2"]["type"];
    $marksheet_2size = $_FILES["marksheet2"]["size"];

    $sign = time()."_".$_FILES["sign"]["name"];
    $sign_temp = $_FILES["sign"]["tmp_name"];
    $sign_type = $_FILES["sign"]["type"];
    $sign_size = $_FILES["sign"]["size"];



    // if($ownImage_type && $marksheet_type && $marksheet2_type && $sign_type!= "image/jpeg" && "image/png")
    //     $message = "Only JPG and Png images Are allowed";

    if (
    ($ownImage_type != "image/jpeg" && $ownImage_type != "image/png") or
    ($marksheet_type != "image/jpeg" && $marksheet_type != "image/png") ||
    ($marksheet2_type != "image/jpeg" && $marksheet2_type != "image/png") ||
    ($sign_type != "image/jpeg" && $sign_type != "image/png")
) {
    $message = "Only JPG and PNG images are allowed";
}

    

    elseif($ownImage_size > 2097152 &&
        $marksheet_size > 2097152 &&
        $marksheet2_size > 2097152 &&
        $sign_size > 2097152
    )
      {  
            $message = "Maximum Size Of image must be 2MB";
        }
    else{
        move_uploaded_file($ownImage_temp,"uploads/" .$ownImage);
        move_uploaded_file($marksheet_temp,"uploads/" .$marksheet);
        move_uploaded_file($marksheet2_temp,"uploads/" .$marksheet2);
        move_uploaded_file($sign_temp,"uploads/" .$sign);


        $sql = "INSERT INTO students (name, email, photo1, photo2, photo3, photo4)
        VALUES
        ('$name','$email','$ownImage','$marksheet','$marksheet2','$sign')";
        if(mysqli_query($conn, $sql)){
            $message = "Resigtered Sucessfully";
        }
        else{
            $message = "Unable To Register Yourself";
        }
    }
    }
?>