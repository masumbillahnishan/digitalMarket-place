

<?php

if (isset($_POST['cancel'])) {
    header("Location:shopping.php");
}

if (isset($_POST['buy'])) {
    include "connection.php";

    $name=$_POST['name'];
    $address=$_POST['address'];
    $number=$_POST['number'];
    $email=$_POST['email'];
    header("Location:index.php");
}
    ?>
 


