<?php
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
    $quantity = $_POST['quantity'];

    $filename = $_FILES["file"]["name"];

    $tempName = $_FILES["file"]["tmp_name"];
    $folder = "photo/" .$id. $filename;
    include "connection.php";
    $sql = "INSERT INTO `product` (`email`, `id`, `productname`, `productdetails`, `price`, `image`,`count`) VALUES ('$email', '$id', '$pName', '$details', '$price', '$filename','$quantity')";

    mysqli_query($conn, $sql);
    if (move_uploaded_file($tempName, $folder)) {
      
        echo '       <div class="fixed inset-0 flex items-center justify-center z-50">';
            echo '  <div class="fixed inset-0 bg-black opacity-75"></div>';
            echo '  <div class="relative z-10 bg-white rounded-lg shadow-xl w-full max-w-screen-sm overflow-hidden">';


            echo '    <div class="bg-cyan-500 py-4 px-6 text-white">';
            echo '      <h2 class="text-2xl font-bold text-center" id="modal-title">Product Add</h2>';
            echo '    </div>';
            echo '    <div class="p-6">';
echo' <p>thank you ! product add successfully done</p>';           
            echo '        <div class="flex justify-end mt-6 space-x-4">';
            echo '          <button type="done" name="" class="h-12 w-24 bg-red-100 hover:bg-red-700"><a href="productadd.php">ok</a></button>';
           
            echo '        </div>';
      

            echo '    </div>';
            echo '  </div>';
            echo '</div>';

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

    <style>
        body {
            background-image: url(bg2.jpg);
            background-size: cover;
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
                            <div class="    ">sell information</div>
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



        <section class=" backdrop-opacity-60 backdrop-grayscale bg-white/60 p-8 rounded-lg shadow-md w-96 h-96 border border-2 border-cyan-300 mx-auto my-12">


            <form action="productadd.php" method="post" enctype="multipart/form-data">
                <h1 class="text-4xl font-bold text-center mb-6">Add a Product</h1>
                <div class="grid gap-4">
                    <input  required type="text" name="product_name" placeholder="Product Name" class="input-field">
                    <input required type="text" name="product_details" placeholder="Product Details" class="input-field">
                    <input type="number" name="product_price" placeholder="Product Price" class="input-field">
                    <input required type="number" name="quantity" placeholder="Quantity" class="input-field">
                    <input required type="file" name="file" id="file" value="" class="input-field">
                </div>
                <div class="mt-6">
                    <button type="submit" name="submit" class="w-full py-2 px-4 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring">Submit</button>
                </div>
            </form>
        </section>















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