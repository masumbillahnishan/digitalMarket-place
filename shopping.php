<?php
include "connection.php";

if (isset($_POST['buy'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $count = $_POST['count'];
    $sno = $_POST['product_sno'];
    $quantity=$count-1;



    session_name("id");
    session_start();
    if (isset($_SESSION['data'])) {

        $data = $_SESSION['data'];
        $id = $data['id'];
        $productName = $data['name'];
        $price = $data['price'];

        include "connection.php";

        $sqlu = "UPDATE `product` SET  `count` = '$quantity' WHERE `product`.`sno` = '$sno'";
        $result2 = mysqli_query($conn, $sqlu);





        $sql = "INSERT INTO `buy` ( `id`, `name`, `product_name`, `address`, `number`, `email`) VALUES ('$id', '$name', '$productName', '$address', '$number', '$email ')";
        $result = mysqli_query($conn, $sql);
        if ($result && $result2) {

            echo '       <div class="fixed inset-0 flex items-center justify-center z-50">';
            echo '  <div class="fixed inset-0 bg-black opacity-75"></div>';
            echo '  <div class="relative z-10 bg-white rounded-lg shadow-xl w-full max-w-screen-sm overflow-hidden">';


            echo '    <div class="bg-cyan-500 py-4 px-6 text-white">';
            echo '      <h2 class="text-2xl font-bold text-center" id="modal-title">' . 'congratulation ! ' . $name . '</h2>';
            echo '    </div>';
            echo '    <div class="p-6">';


            echo '<p class="text-center">Buy successfully</p>';

            echo '      <form action="" method="post" class="flex flex-col gap-4">';

            echo '        <div class="flex justify-center mt-6 space-x-4">';

            echo '          <a class="h-12 w-24 bg-cyan-100 hover:bg-sky-700" href="shopping.php"> <p class="text-center mt-2 text-lg ">OK</p></a>';
            echo '        </div>';
            echo '      </form>';

            echo '    </div>';
            echo '  </div>';
            echo '</div>';
        } else {
            echo "submit unsuccessfully---->" . mysqli_error($conn);
        }
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
    <link rel="stylesheet" href="shopping.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
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
                        <div>
                            <button class="flex-auto"><a href="login.php">
                                    <div class=" my-6  ">LOGIN</div>
                                </a>

                            </button>
                        </div>

                    </div>
                </div>
            </nav>
            <div class="h-20">
            </div>
        </div>
    </header>


    <main>

        <!-- <section>
            <div class="flex mx-12 my-6 gap-2">
                <a class="flex-auto h-48 w-0.5 border rounded-tl-xl rounded-br-3xl bg-blue-100  bg_cloth  " href="">
                    <div>
                        <p class="">Cloth</p>
                    </div>
                </a>
                <a class="flex-auto h-48 w-0.5 border rounded-tl-xl rounded-br-3xl bg-blue-100  bg_cloth " href="">
                    <div>
                        <p class="">Cloth</p>
                    </div>
                </a>

                <a class="flex-auto h-48 w-0.5 border rounded-tl-xl rounded-br-3xl bg-blue-100  bg_cloth " href="">
                    <div>
                        <p class="">Cloth</p>
                    </div>
                </a>

                <a class="flex-auto h-48 w-0.5 border rounded-tl-xl rounded-br-3xl bg-blue-100  bg_cloth " href="">
                    <div>
                        <p class="">Cloth</p>
                    </div>
                </a>



            </div>
        </section> -->



        <?php
        echo ' <section class="grid grid-cols-4 gap-4 mx-12 my-8">';
        session_name("id");
        session_start();


        if (isset($_POST['button'])) {

            $selectedProductID = $_POST['product_id'];
            $selectedProductName = $_POST['product_name'];
            $selectedProductPrice = $_POST['product_price'];

            $ar = array(
                'id' => $selectedProductID,
                'name' => $selectedProductName,
                'price' => $selectedProductPrice,

            );

            $_SESSION['data'] = $ar;
        }

        $sql = "SELECT * FROM `product`ORDER BY sno DESC";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $productName = $row["productname"];
            $productDescription = $row["productdetails"];
            $price = $row["price"];
            $img = $row["image"];
            $id = $row["id"];
            $count = $row["count"];
            $sno=$row["sno"];

            echo '<form action="shopping.php" method="post" class="">';
            echo '<div class=" border border-2 p-4 rounded-lg shadow-lg h-100 w-80">';
            echo '<div class="h-48">';
            echo '<img src="' . 'photo/' . $id . $img . '" alt="Product Image" class="object-cover w-full h-full rounded-lg">';
            echo '</div>';
            echo '<div class="mt-2">';
            echo '<input readonly type="text" name="product_name" class="text-cyan-600" value="' . $productName  . '"> ';

            echo '<input readonly type="text" name="product_description" value="' . $productDescription . '">';


            echo '</div>';
            echo '<div class="mt-2">';
            echo '<input readonly type="text" name="product_price" value="' . 'price=' . $price . ' $">';
            echo '<input type="hidden" name="product_id" value="' . $id . '">';
            echo '<input type="hidden" name="product_sno" value="' . $sno . '">';
            echo '</div>';
            echo '<div class="mt-2  flex">';
            echo ' <div class="border border-2 cursor-not-allowed border-indigo-300 px-2 rounded-lg">';
            echo '<p >Available: </p>';
            echo '<input readonly class="ms-4 w-8" type="number" name="count" value="' . $count . '">';
            echo ' </div>';
            $disableButton = $count == 0 ? 'disabled' : '';

            echo '<button class="bg-blue-400 text-white px-4 py-2 mx-auto rounded-full hover:bg-blue-600 focus:outline-none focus:ring ms-36" name="button" type="submit" ' . $disableButton . '>BUY</button>';
            echo '</div>';
            echo '</div>';
            echo '</form>';
        }
        echo ' </section>';
        ?>








        <?php


        if (isset($_POST['button'])) {
            $count = $_POST['count'];
            $sno = $_POST['product_sno'];

            echo '       <div class="fixed inset-0 flex items-center justify-center z-50">';
            echo '  <div class="fixed inset-0 bg-black opacity-75"></div>';
            echo '  <div class="relative z-10 bg-white rounded-lg shadow-xl w-full max-w-screen-sm overflow-hidden">';


            echo '    <div class="bg-cyan-500 py-4 px-6 text-white">';
            echo '      <h2 class="text-2xl font-bold text-center" id="modal-title">Checkout</h2>';
            echo '    </div>';
            echo '    <div class="p-6">';
            echo '      <form action="" method="post" class="flex flex-col gap-4">';
            echo '        <div class="relative">';
            echo '          <label for="name" class="text-gray-600 font-semibold">Name</label>';
            echo '          <input required type="text" name="name"  id="name" placeholder="Enter your name" class="input-field">';
            echo '        </div>';
            echo '        <div class="relative">';
            echo '          <label for="address" class="text-gray-600 font-semibold">Delivery Address</label>';
            echo '          <input required type="text" name="address"  id="address" placeholder="Enter your delivery address" class="input-field">';
            echo '        </div>';
            echo '        <div class="relative">';
            echo '          <label for="contact" class="text-gray-600 font-semibold">Contact Number</label>';
            echo '          <input required type="number" name="number"  id="contact" placeholder="Enter your contact number" class="input-field">';
            echo '        </div>';
            echo '        <div class="relative">';
            echo '          <label for="email" class="text-gray-600 font-semibold">E-mail</label>';
            echo '          <input type="email" name="email" id="email" placeholder="Enter your email" class="input-field">';
            echo '<input readonly class="ms-4 w-8" type="number" name="count" value="' . $count . '">';
            echo '<input type="hidden" name="product_sno" value="' . $sno . '">';
            echo '        </div>';
            echo '        <div class="flex justify-end mt-6 space-x-4">';
            echo '          <button type="cancel" name="cancel" class="h-12 w-24 bg-red-100 hover:bg-red-700"><a href="shopping.php">Cancel</a></button>';
            echo '          <button type="submit" name="buy" class="h-12 w-24 bg-cyan-100 hover:bg-sky-700">Confirm</button>';
            echo '        </div>';
            echo '      </form>';
            echo '    </div>';
            echo '  </div>';
            echo '</div>';
        }
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




    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        let table = new DataTable('#myTable');
    </script>



</body>

</html>