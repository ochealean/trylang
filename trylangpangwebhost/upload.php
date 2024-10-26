<?php
include_once("connect.php");
if($_POST["submit"])
{
    $fullname = $_POST["fullname"];
    $fileName = $_FILES["image"]["name"];
    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedTypes = array("jpg", "jpeg", "png", "gif");
    $tempName = $_FILES["image"]["tmp_name"];
    $targetPath = "images/".$fileName;
    if(in_array($ext, $allowedTypes))
    {
        if(move_uploaded_file($tempName, $targetPath))
        {
            $query = "INSERT INTO images(name, filename) VALUES ('$fullname', '$fileName')";
            if(mysqli_query($conn, $query)){
                echo"image uploaded";
            }else{
                echo"cant upload";
            }

        }else{

        }
    }
}
?>