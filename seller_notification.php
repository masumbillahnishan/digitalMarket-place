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
echo '<section class="bg-white bg-opacity-60 backdrop-grayscale p-8 rounded-lg shadow-md h-96 border-2 border-cyan-300 mx-auto my-12">';
$sqlG = "SELECT * FROM `buy` where id='$id'";
$ck = mysqli_query($conn, $sqlG);

if ($ck) {
    echo '<h1 class="text-4xl font-bold text-center mb-6">Sell information</h1>';
    echo '<div class="grid grid-cols-5 gap-4 font-bold text-red-600">';
    echo '<p class="mx-auto">Product Name</p>';
    echo '<p class="mx-auto">Customer Name</p>';
    echo '<p class="mx-auto">Address</p>';
    echo '<p class="mx-auto">Contact Number</p>';
    echo '<p class="mx-auto">Email</p>';
    echo '</div>';

    while ($row = mysqli_fetch_assoc($ck)) {
        $productName = $row["product_name"];
        $cName = $row["name"];
        $add = $row["address"];
        $num = $row["number"];
        $mail = $row["email"];

        echo '<div class="grid grid-cols-5 gap-4">';
        echo '<p class="mx-auto">' . $productName . '</p>';
        echo '<p class="mx-auto">' . $cName . '</p>';
        echo '<p class="mx-auto">' . $add . '</p>';
        echo '<p class="mx-auto">' . $num . '</p>';
        echo '<p class="mx-auto">' . $mail . '</p>';
        echo '</div>';
    }
} else {
    echo "Submit Unsuccessfully - " . mysqli_error($conn);
}
echo '</section>';
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