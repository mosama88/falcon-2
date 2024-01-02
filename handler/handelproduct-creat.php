<?php
require_once '../db/connect.php';
require_once '../handler/handelproduct-creat.php';
require_once '../handler/validation.php';
session_start();
// seesion Of Error And Success


//connection Data Base
$conn =  mysqli_connect("localhost","root","","falcon");
if(!$conn){
    // echo mysqli_connect_error($conn);
}
// Check POST Mehtod
if($_SERVER ['REQUEST_METHOD'] == "POST" && isset ($_POST['name'])){
    $name = trim(htmlspecialchars(htmlentities($_POST['name'])));
    $price = trim(htmlspecialchars(htmlentities($_POST['price'])));
    $discount = trim(htmlspecialchars(htmlentities($_POST['discount'])));
    $fileToUpload = $_FILES['fileToUpload'];
    $description = trim(htmlspecialchars(htmlentities($_POST['description'])));
    $chooseCategory = trim(htmlspecialchars(htmlentities($_POST['chooseCategory'])));
    
    // Get Info from File Upload
    $fileToUploadName = $_FILES['fileToUpload']['name'];
    $fileToUploadType = $_FILES['fileToUpload']['type'];
    $fileToUploadFullPath = $_FILES['fileToUpload']['full_path'];
    $fileToUploadTmp = $_FILES['fileToUpload']['tmp_name'];
    $fileToUploadSize = $_FILES['fileToUpload']['size'];
    $fileToUploadErorr = $_FILES['fileToUpload']['error'];
    
    
    // Set Allowed File Ext
    $allowedExt = array("jpg","Jpeg","png");
    // Get File Ext
    $tmp = explode('.', $fileToUploadName);
    $fileUploadExt = strtolower(end($tmp));
    // Location Of File Upload
    $moveUpload = move_uploaded_file($fileToUploadTmp,$_SERVER['DOCUMENT_ROOT'] .'\Falcon\public\assets\img\uploadFiles\\'   . $fileToUploadName );
    
    
    // Validation For Empty File Uploaded
    if($fileToUploadErorr == 4){
        $errors []= "No File Chosen";
        // Validation For File Upload
    }elseif(! in_array($fileUploadExt,$allowedExt)){
        $errors []= "Your File Is Not Allowed Please Choose jpg Or Jpeg Or png";
    }elseif(!empty($moveUpload)){
        $errors []= "";
    }
    
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
    }
    //  Validation For error and success 
    if(!empty($errors)){
        $_SESSION ['errors'] = $errors;
        // rdirection
        header("location: ../product-create.php");
        die(); 
    }else{
          $_SESSION['error_method'] = "Not Allowed Method";
          header("location: ../product-create.php");
        die();
    }
    
}


