<?php
session_name("login");
session_start();

if (!isset($_SESSION['email'])) {

    header("Location: login.php");
    exit();
}
$userEmail = $_SESSION['email'];


$servername = "localhost";
$username = "root";
$password = "";
$database = "project";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$email = $userEmail;

$sql = "SELECT * FROM account WHERE email = '$email' ";
$result = mysqli_query($conn, $sql);
$getData = mysqli_fetch_assoc($result);

$name = $getData['name'];
$address = $getData['address'];



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <header>
        <div>
            <nav class="bg-slate-800  text-white subpixel-antialiased text-2xl w-fit h-18  flex w-screen fixed">
                <div class="flex-auto  mx-6">
                    <div class="flex">
                        <a class="flex-auto my-6" href="index.php">
                            <div class="    ">HOME</div>
                        </a>
                        <a class="flex-auto my-6" href="factory.php">
                            <div class="    ">FACTORY</div>
                        </a>
                        <a class="flex-auto my-6" href="shopping.php">
                            <div class="    ">SHOPPING</div>
                        </a>
                        <a class="flex-auto my-6" href="hire.php">
                            <div class="    ">HIRE</div>
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

    <!-- <section class="bg-white p-8 rounded-lg shadow-md w-96 h-96 border border-2 border-cyan-300 mx-auto my-12">
    <div class="text-center mb-4">
        <h2 class="text-2xl font-semibold text-cyan-600">Seller Information</h2>
    </div>

    <div class="space-y-4">
        <div>
            <p class="text-lg text-gray-800"><span class="font-semibold">Seller Name:</span> <?php echo $name; ?></p>
        </div>

        <div>
            <p class="text-lg text-gray-800"><span class="font-semibold">Seller Address:</span> <?php echo $address; ?></p>
        </div>

        <div>
            <p class="text-lg text-gray-800"><span class="font-semibold">Seller Email:</span> <?php echo $userEmail; ?></p>
        </div>
    </div>
</section> -->

<section class="bg-white p-8 rounded-lg shadow-md w-96 h-96 border border-2 border-cyan-300 mx-auto my-12">
    <div class="text-center">
        <h1 class="text-2xl font-semibold text-cyan-700 mb-4">Seller Information</h1>
    </div>

    <div class="p-4">
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold" for="seller-name">Seller Name:</label>
            <p class="text-gray-800" id="seller-name"><?php echo $name; ?></p>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold" for="seller-address">Seller Address:</label>
            <p class="text-gray-800" id="seller-address"><?php echo $address; ?></p>
        </div>

        <div>
            <label class="block text-gray-700 font-semibold" for="seller-email">Seller Email:</label>
            <p class="text-gray-800" id="seller-email"><?php echo $userEmail; ?></p>
        </div>
    </div>
</section>

       

        <section class="mx-auto">


            <form action="sell_store.php" method="post" class="bg-white p-8 rounded-lg shadow-md w-96 h-96 border border-2 border-cyan-300  my-12">
                <h1 class="text-4xl font-bold text-center mb-6">Add a Product</h1>
                <div class="grid gap-4">
                    <input type="text" name="product_name" placeholder="Product Name" class="input-field">
                    <input type="text" name="product_details" placeholder="Product Details" class="input-field">
                    <input type="number" name="product_price" placeholder="Product Price" class="input-field">
                    <input type="file" name="myfile" id="myfile" class="input-field">
                </div>
                <div class="mt-6">
                    <button type="submit" class="w-full py-2 px-4 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring">Submit</button>
                </div>
            </form>
        </section>


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