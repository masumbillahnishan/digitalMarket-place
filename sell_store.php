<?php
if (isset($_POST['submit'])) {
   
    include "connection.php";


    $email = $userEmail;
    $name = $_POST['product_name'];
    $details = $_POST['product_details'];
    $price = $_POST['product_price'];

    $filename = $_FILES["myfile"]["name"];
    $tempName = $_FILES["myfile"]["tmp_name"];
    $folder = "./image/" . $filename;
    $sql = "INSERT INTO `product` (`email`, `id`, `productname`, `productdetails`, `price`, `image`) VALUES ('$email', '$id', '$name', '$details', '$price', '$filename')";

    mysqli_query($conn, $sql);
    if (move_uploaded_file($tempName, $folder)) {
        echo "<h3>  Image uploaded successfully!</h3>";
    } else {
        echo "<h3>  Failed to upload image!</h3>";
    }
}




?>