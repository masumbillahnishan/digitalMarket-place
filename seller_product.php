<?php
// session_name("login");
session_start();

if (!isset($_SESSION['email'])) {

    header("Location: login.php");
    exit();
}
$userEmail = $_SESSION['email'];


include "connection.php";


$email = $userEmail;

$sql = "SELECT * FROM account WHERE email = '$email' ";
$result = mysqli_query($conn, $sql);
$getData = mysqli_fetch_assoc($result);

$name = $getData['name'];
$address = $getData['address'];
$id = $getData['id'];


if (isset($_POST['submit'])) {
    $pName = $_POST['product_name'];
    $details = $_POST['product_details'];
    $price = $_POST['product_price'];

    $filename = $_FILES["file"]["name"];
    $tempName = $_FILES["file"]["tmp_name"];
    $folder = "photo.php/" . $filename;
    include "connection.php";
    $sql = "INSERT INTO `product` (`email`, `id`, `productname`, `productdetails`, `price`, `image`) VALUES ('$email', '$id', '$pName', '$details', '$price', '$filename')";

    mysqli_query($conn, $sql);
    if (move_uploaded_file($tempName, $folder)) {
        echo "<h3>  Image uploaded successfully!</h3>";
    } else {
        echo "<h3>  Failed to upload image!</h3>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="sell_product.css">

    <style>
        body {
            background-image: url(bg2.jpg);
            background-size: cover;
        }

        .weight {
            width: 60%;
        }
    </style>
</head>

<body class="">
    <header>
        <div>
            <nav class="bg-slate-800  text-white subpixel-antialiased text-2xl w-fit h-18  flex w-screen fixed">
                <div class="flex-auto  mx-6">
                    <div class="flex">
                        <a class="flex-auto my-6" href="index.php">
                            <div class="    ">HOME</div>
                        </a>
                        <a class="flex-auto my-6" href="productadd.php">
                            <div class="    ">product Add</div>
                        </a>
                        <a class="flex-auto my-6" href="seller_product.php">
                            <div class="    ">Product</div>
                        </a>
                        <a class="flex-auto my-6" href="seller_notification.php">
                            <div class="    ">Sell Information</div>
                        </a>

                    </div>

                </div>
                <div class="flex mx-12 ">
                    <div class="flex">
                        <button class="flex-auto"><a href="login.php">
                                <div class=" my-6  ">LOGIN</div>
                            </a>

                        </button>
                    </div>
                </div>
            </nav>
            <div class="h-20">
            </div>
        </div>
    </header>




    <main class="flex mx-auto">



        <section class=" backdrop-opacity-60 backdrop-grayscale bg-white/60 p-8 rounded-lg shadow-md w-96 h-96 border border-2 border-cyan-300 mx-auto my-12">
            <div class="text-center">
                <h1 class="text-2xl font-semibold text-cyan-700 mb-4">Seller Information</h1>
            </div>

            <div class="p-4">
                <div class="mb-4 flex">
                    <label class="block text-gray-700 font-semibold" for="seller-name">Seller Name:</label>
                    <p class="text-gray-800 border border-2 border-cyan-500 px-4" id="seller-name"><?php echo $name; ?></p>
                </div>

                <div class="mb-4 flex">
                    <label class="block text-gray-700 font-semibold" for="seller-address">Seller Address:</label>
                    <p class="text-gray-800  border border-2 border-cyan-500 px-4" id="seller-address"><?php echo $address; ?></p>
                </div>

                <div class="mb-4 flex">
                    <label class="block text-gray-700 font-semibold" for="seller-email">Seller Email:</label>
                    <p class="text-gray-800  border border-2 border-cyan-500 px-4" id="seller-email"><?php echo $userEmail; ?></p>
                </div>
                <div class="flex">
                    <label class="block text-gray-700 font-semibold" for="seller-id">Seller ID:</label>
                    <p class="text-gray-800  border border-2 border-cyan-500 px-4" id="seller-id"><?php echo $id; ?></p>
                </div>
            </div>
        </section>

        
        
    

        <?php
        echo '<section class="scrollshopping bg-white bg-opacity-60 backdrop-grayscale p-8  rounded-lg shadow-md h-96 border-2 border-cyan-300 mx-auto my-12">';
        // session_name("sno");
        // session_start();
        // $_SESSION['sno']=$sno;



        $sqlG = "SELECT * FROM `product` where id='$id'";
        $ck = mysqli_query($conn, $sqlG);
        
        if ($ck) {
            echo '<h1 class="mt-2 text-4xl font-bold text-center mb-6">Product Details</h1>';
            echo '<div class="mt-2 grid grid-cols-6 gap-4 font-bold text-red-600">';
            echo '<div class="mt-2 mx-auto">Product Name</div>';
            echo '<div class="mt-2 mx-auto">Product Details</div>';
            echo '<div class="mt-2 mx-auto">Price</div>';
            echo '<div class="mt-2 mx-auto">QUANTITY</div>';
            echo '</div>';
       
            while ($row = mysqli_fetch_assoc($ck)) {
                $productName = $row["productname"];
                $details = $row["productdetails"];
                $price = $row["price"];
                $count = $row["count"];
                $sno = $row["sno"];
                echo' <div class="">';
                echo'<form action="" method="post" >';
                echo '<div class="mt-2 grid grid-cols-6 gap-4">';
                echo '<div class="mt-2 mx-auto">' . $productName . '</div>';
                echo '<div class="mt-2 mx-auto">' . $details . '</div>';
                echo '<input type="hidden" name="sno" value="' . $sno . '">';
                echo '<div class="mt-2 mx-auto">' . $price . '</div>';
                echo '<div class="mt-2 mx-auto">' . $count. '</div>';
                echo '<div class="mt-2 mx-auto"><button class="bg-red-500 text-white px-2 py-1 rounded" type="submit" name="delete">Delete</button></div>';
                echo '<div class="mt-2 mx-auto"><button class="bg-red-500 text-white px-2 py-1 rounded" type="submit" name="update">UPDATE</button></div>';
                echo '</div>';
                echo'</div>';
                echo'</form>';
            }
           
        } else {
            echo "Submit Unsuccessfully - " . mysqli_error($conn);
        }
        
        echo '</section>';
        ?>
      
<?php
if (isset($_POST['delete'])) {
   echo $sno = $_POST['sno'];
    echo '       <div class="fixed inset-0 flex items-center justify-center z-50">';
    echo '  <div class="fixed inset-0 bg-black opacity-75"></div>';
    echo '  <div class="relative z-10 bg-white rounded-lg shadow-xl w-full max-w-screen-sm overflow-hidden">';


    echo '    <div class="bg-cyan-500 py-4 px-6 text-white">';
    echo '      <h2 class="text-2xl font-bold text-center" id="modal-title">Delete confirmation</h2>';
    echo '    </div>';
    echo '    <div class="p-6">';
        echo'<form action="" method="post" >';
    echo '<input type="text" name="sno" value="' . $sno . '">';
    
    echo '        <div class="flex justify-end mt-6 space-x-4">';
    echo '          <button type="submit" name="" class="h-12 w-24 bg-red-100 hover:bg-red-700"><a href="seller_product.php">Cancel</a></button>';
    echo '          <button type="submit" name="deleteconfirm" class="h-12 w-24 bg-cyan-100 hover:bg-sky-700">confirm</button>';
    echo '        </div>';
    echo '      </form>';

    echo '    </div>';
    echo '  </div>';
    echo '</div>';

 
    


}

?>



<?php
if (isset($_POST['update'])) {
    include "connection.php"; // Make sure to include your connection file.

    echo $sno = $_POST['sno'];
    $sqlu = "SELECT * FROM `product` where sno='$sno'";
    $cku = mysqli_query($conn, $sqlu);
    $rowu = mysqli_fetch_assoc($cku);
    $count = $rowu["count"];
    $productdetails=$rowu["productdetails"];
    if ($rowu) {
        echo '
        <div class="fixed inset-0 flex items-center justify-center z-50">
            <div class="fixed inset-0 bg-black opacity-75"></div>
            <div class="relative z-10 bg-white rounded-lg shadow-xl w-full max-w-screen-sm overflow-hidden">
                <div class="bg-cyan-500 py-4 px-6 text-white">
                    <h2 class="text-2xl font-bold text-center" id="modal-title">UPDATE QUANTITY</h2>
                </div>
                <div class="p-6">
                    <form action="" method="post">
                        <input type="hidden" name="sno" value="' . $sno . '">
                        <input class=" border border-2 border-cyan-300" type="text" name=" productdetails" value="' .  $productdetails . '">
                  
                        <!-- Place the <p> tag here -->
                   
                        <input type="number" class="border ms-48 border-2 border-cyan-300" value="' . $count . '" name="newQuantity" placeholder="New Quantity" required>
                        <div class="flex justify-end mt-6 space-x-4">
                            <button type="button" class="h-12 w-24 bg-red-100 hover-bg-red-700"><a href="seller_product.php">Cancel</a></button>
                            <button type="submit" name="updateQuantity" class="h-12 w-24 bg-cyan-100 hover-bg-sky-700">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>';
    } else {
        echo "Error fetching data - " . mysqli_error($conn);
    }
}
?>
<?php
if(isset($_POST['updateQuantity'])){
  $sno=$_POST['sno'];
$newQuantity=$_POST['newQuantity'];
$newproductdetails=$_POST['productdetails'];

include"connection.php";

$sql="UPDATE `product` SET `productdetails` = '$newproductdetails', `count` = '$newQuantity' WHERE `product`.`sno` = $sno";

$result = mysqli_query($conn, $sql);

if($result){
    echo '       <div class="fixed inset-0 flex items-center justify-center z-50">';
    echo '  <div class="fixed inset-0 bg-black opacity-75"></div>';
    echo '  <div class="relative z-10 bg-white rounded-lg shadow-xl w-full max-w-screen-sm overflow-hidden">';


    echo '    <div class="bg-cyan-500 py-4 px-6 text-white">';
    echo '      <h2 class="text-2xl font-bold text-center" id="modal-title">' . 'congratulation ! ' . $name . '</h2>';
    echo '    </div>';
    echo '    <div class="p-6">';


    echo '<p class="text-center">UPDATE successfully</p>';

    echo '      <form action="" method="post" class="flex flex-col gap-4">';

    echo '        <div class="flex justify-center mt-6 space-x-4">';

    echo '          <a class="h-12 w-24 bg-cyan-100 hover:bg-sky-700" href="seller_product.php"> <p class="text-center mt-2 text-lg ">OK</p></a>';
    echo '        </div>';
    echo '      </form>';

    echo '    </div>';
    echo '  </div>';
    echo '</div>';
    
}

else{
    echo '<script>alert("failed")</script>'; 
    echo $sno;
    echo $newQuantity;
    echo $newQuantity;

}


}


?>

<?php
   if(isset($_POST['deleteconfirm'])){
   echo $sno = $_POST['sno'];
    include"connection.php";
   $sqld="DELETE FROM `product` WHERE `product`.`sno` = '$sno'";
   $result=mysqli_query($conn,$sqld);
   if($result){
       echo" failed to delete";
       echo $sno = $_POST['sno'];
   }
   
   

}
?>





    </main>




























    <footer class="h-48  w-fit w-screen">
        <div class="bg-slate-700 text-white subpixel-antialiased text-2xl border rounded-2xl border-double border-x-slate-700 flex h-48 text-center mx-12">
            <div class="pt-6 flex-auto">
                <p>DEVELOPER</p>
                <div class="text-xl text-teal-100">
                    <p>Masum Billah</p>
                    <p>Mahbuba Sharmin</p>
                    <p>Sunzida Moontaha</p>
                    <p>Maliha Tasnim</p>
                </div>
            </div>
            <div>
                <button class="flex-auto"><a href="admin.php">
                        <div class=" my-6 ms-4  ">Admin</div>
                    </a></button> <br>
                <button class="flex-auto"><a href="productadd.php">
                        <div class=" my-6 ms-4  ">Seller</div>
                    </a></button>


            </div>
            <div class="pt-6 flex-auto">
                <p>ABOUT</p>
                <p class="text-lg text-teal-100">Bangladesh Army University of Science and Technology</p>
            </div>
        </div>
    </footer>

</body>

</html>