<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

   include "connection.php";

    $name = $_POST["name"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $type=$_POST["type"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirm_password"];
    if($password!=$confirmpassword){
        
     echo '<script>alert("password and confirm password doesnt match")</script>'; 
     header("Location:login.php");
    }
    $ck="SELECT email FROM `account` where email='$email'";
    $ckr= mysqli_query($conn, $ck);
    if($ckr){
        echo '<script>alert("Email is already in use.")</script>';
        header("Location:login.php");
    }
    else{
    // $ckrdata = mysqli_fetch_assoc($ckr);

    if($type=='worker'  ){
        $sql="INSERT INTO `hire` ( `name`, `id`, `address`, `email`, `number`, `about`, `image`) VALUES ( '$name ', 'No data', '$address', '$email', 'No data', 'No data', 'No data');
        ";
        $result1 = mysqli_query($conn, $sql);

        $sql1 = "INSERT INTO `account`( `name`,`address`, `email`, `password`,  `type`) VALUES ('$name','$address', '$email','$password','$type')";

        $result = mysqli_query($conn, $sql1);
        if ($result &&  $result1 ) {
    
       
            header("Location:login.php");
            
        } else {
            echo "submit unsuccessfully---->" . mysqli_error($conn);
        }
    }
 if($type=='buy' && $type=='seller'){
    $sql = "INSERT INTO `account`( `name`,`address`, `email`, `password`,  `type`) VALUES ('$name','$address', '$email','$password','$type')";

    $result = mysqli_query($conn, $sql);
    if ($result) {

   
        header("Location:login.php");
        echo '<script>alert("success")</script>';
    } else {
        echo "submit unsuccessfully---->" . mysqli_error($conn);
    }}
}

}


?>
