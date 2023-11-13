<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="sell_product.css">
</head>

<body>
    <header>
    <div >
            <nav class="bg-slate-800  text-white subpixel-antialiased text-2xl w-fit h-18  flex w-screen fixed">
                <div class="flex-auto  mx-6">
                    <div class="flex">
                        <a class="flex-auto my-6" href="index.php">
                            <div class="    ">HOME</div>
                        </a>
                        <a class="flex-auto my-6" href="admin.php">
                            <div class="    ">accounts and Statistics</div>
                        </a>
                        <a class="flex-auto my-6" href="notification.php">
                            <div class="    ">Sell information</div>
                        </a>
                      

                    </div>

                </div>
                <div class="flex mx-12 ">
                    <div class="flex">
                        <button class="flex-auto"><a href="login.php"> <div class=" my-6  ">LOGIN</div></a>
                           
                        </button>
                    </div>
                </div>
            </nav>
            <div class="h-20">
            </div>
        </div>
    </header>
<main>
   


<?php
echo '<section class="scrollshopping bg-white bg-opacity-60  p-8 rounded-lg shadow-md h-full border-2 border-cyan-300 mx-16 my-12">';
include "connection.php";
$sqlG = "SELECT * FROM `buy` ORDER BY sno DESC";
$ck = mysqli_query($conn, $sqlG);

if ($ck) {
    echo '<h1 class="text-4xl font-bold text-center mb-6">Sell information</h1>';
    echo '<div class="grid grid-cols-6 gap-3 font-bold text-red-600">';
    echo '<p class="mx-auto">Product Name</p>';
    echo '<p class="mx-auto">seller id</p>';
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
        $id= $row["id"];

        echo '<div class="grid grid-cols-6 gap-3">';
        echo '<p class="mx-auto">' . $productName . '</p>';
        echo '<p class="mx-auto">' . $id . '</p>';
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
































    <footer class="h-48 bg-slate-300 w-fit w-screen">
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