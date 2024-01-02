<?php
require_once '../db/connect.php';
require_once '../handler/handelproduct-creat.php';
require_once '../handler/validation.php';
session_start();
// seesion Of Error And Success
$errors = [];
$success = [];

//connection Data Base
$conn =  mysqli_connect ("localhost","root","","falcon");
if(!$conn){
    echo mysqli_connect_error($conn);
}

// upload file












// Check POST Mehtod
if($_SERVER ['REQUEST_METHOD'] == "POST" && isset ($_POST['name'])){
    $name = trim(htmlspecialchars(htmlentities($_POST['name'])));
    $price = trim(htmlspecialchars(htmlentities($_POST['price'])));
    $discount = trim(htmlspecialchars(htmlentities($_POST['discount'])));
    $fileToUpload = $_FILES['fileToUpload'];
    $description = trim(htmlspecialchars(htmlentities($_POST['description'])));
    $chooseCategory = trim(htmlspecialchars(htmlentities($_POST['chooseCategory'])));


   


// Start Validation INPUT Name
if (requierdVal($name)){
    $errors []= "Must Be Write Product Name";
} elseif (!minVal($name, 3)){
    $errors []= "Name Of Product Must Be More Than 3 Charcters";
}elseif (!maxVal($name, 80)){
    $errors []= "Name Of Product Must Be less Than 80 Charcters";
}else{
    $_SESSION ['success'] = $success;
    $success [] = "Data Added Successfully";
}
// END Validation INPUT Name

// Start Validation INPUT Description
if (requierdVal($description)){
    $errors []= "Must Be Write Product Description";
} elseif (!minVal($description, 3)){
    $errors []= "Description Of Product Must Be More Than 3 Charcters";
}else{
    $_SESSION ['success'] = $success;
}
// END Validation INPUT Name
    $sql = "INSERT INTO `products`(`product_name`,`product_price`,`product_discount`,`image`,`description`,`category_id`) VALUES ('$name', '$price', '$discount','$fileToUpload','$description', '$chooseCategory')";
//GO
    $result = mysqli_query($conn, $sql);
// Check Error Insert
    if(mysqli_affected_rows($conn) ==1){
        $_SESSION ['success'] = $success;
        $success [] = "Data Added Successfully";

    }else {
        $_SESSION ['errors'] = $errors;

        
        die;   
    }

    // rdirection
    header("location: ../product-create.php");


}


//  Validation For error and success 
if(empty($errors)){

    //  Validation Error 
}else{
    $_SESSION ['errors'] = $errors;
    die;    
}


























//  // Validation $_Files['image']
//  $target_dir = "/assets/img/uploadImage//";
//  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
//  $uploadOk = 1;
//  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
//  // Check if image file is a actual image or fake image
//  if(isset($_POST["submit"])) {
//    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//    if($check !== false) {
//      echo "File is an image - " . $check["mime"] . ".";
//      $uploadOk = 1;
//    } else {
//      echo "File is not an image.";
//      $uploadOk = 0;
//    }
//  }