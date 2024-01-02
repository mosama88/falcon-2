<?php


$conn =  mysqli_connect ("localhost","root","","falcon");

if(!$conn){
    echo "" . mysqli_connect_error($conn);
}else{
    // echo "Database Is Working" . "<br>";
}


