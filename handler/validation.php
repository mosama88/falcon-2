<?php


// function DiscountProduct($price, $discount){
//     $totalPrice = $price + ($price * $discount);
//     return $totalPrice;
// }

// Function For Empty Input
function requierdVal($input){
    if(!empty ($input)){
       return false; 
}else{
   return true;
}
}

// sanitizeinput
function sanitizeinput($value){
$str = trim(htmlentities(htmlspecialchars($value)));
    return $str;
}return false;


// Function For length Input
function minVal($input, $lenght){
    if(strlen($input) < $lenght ){
        return false;
    }   
    return true;
}

// Function For length Input
function maxVal($input, $lenght){
    if(strlen($input) > $lenght ){
    return false;
}    
    return true;
}


