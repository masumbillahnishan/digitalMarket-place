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
        <div>
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





    <main>
     
        <section class=" ">


            <div class="container mx-auto  p-6">
                <h1 class="text-2xl text-center font-semibold text-gray-800 mb-4">Website Statistics</h1>

                <div class="flex gap-24 mx-36">
                    <div class="bg-white border border-cyan-300 rounded-lg shadow-md  p-6 mb-4">
                        <h2 class="text-xl font-semibold text-gray-700 mb-3">Type of Products</h2>
                        <p class="text-gray-600">Total Products: <?php echo getTotalProducts(); ?></p>
                    </div>
                    <div class="bg-white border border-cyan-300 rounded-lg shadow-md p-6 mb-4">
                        <h2 class="text-xl font-semibold text-gray-700 mb-3">Sell Products</h2>
                        <p class="text-gray-600">Total Products: <?php echo getTotalSellProducts(); ?></p>
                    </div>

                    <div class="bg-white border border-cyan-300 rounded-lg shadow-md p-6 mb-4">
                        <h2 class="text-xl font-semibold text-gray-700 mb-3">Accounts</h2>
                        <p class="text-gray-600">Total Accounts: <?php echo getTotalAccounts(); ?></p>
                    </div>

                    <div class="bg-white border border-cyan-300 rounded-lg shadow-md p-6">
                        <h2 class="text-xl font-semibold text-gray-700 mb-3">Workers</h2>
                        <p class="text-gray-600">Total Workers: <?php echo getTotalWorkers(); ?></p>
                    </div>
                </div>
            </div>

            <?php


            // Functions to retrieve statistics (replace with your actual data retrieval logic)
            function getTotalProducts()
            {
                include "connection.php";
                $sql = "SELECT COUNT(*) AS account_count FROM product";

                $result = $conn->query($sql);

                if ($result) {
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $accountCount = $row["account_count"];
                    } else {
                        echo "No accounts found.";
                    }
                } else {
                    echo "Error: " . $conn->error;
                }
                return  $accountCount; // Replace with the actual number of products
            }




            function getTotalAccounts()
            {
                include "connection.php";
                $sql = "SELECT COUNT(*) AS account_count FROM account";

                $result = $conn->query($sql);

                if ($result) {
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $accountCount = $row["account_count"];
                    } else {
                        echo "No accounts found.";
                    }
                } else {
                    echo "Error: " . $conn->error;
                }
                return $accountCount; // Replace with the actual number of accounts
            }

            function getTotalWorkers()
            {
                include "connection.php";
                $sql = "SELECT COUNT(*) AS account_count FROM hire";

                $result = $conn->query($sql);

                if ($result) {
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $accountCount = $row["account_count"];
                    } else {
                        echo "No accounts found.";
                    }
                } else {
                    echo "Error: " . $conn->error;
                }
                return $accountCount; // Replace with the actual number of workers
            }
            function getTotalSellProducts()
            {
                include "connection.php";
                $sql = "SELECT COUNT(*) AS account_count FROM buy";

                $result = $conn->query($sql);

                if ($result) {
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $accountCount = $row["account_count"];
                    } else {
                        echo "No accounts found.";
                    }
                } else {
                    echo "Error: " . $conn->error;
                }
                return $accountCount; // Replace with the actual number of workers
            }
            ?>
   <section class="text-center mt-12 pt-8">
            <p class="text-4xl font-semibold ">Accounts</p>
        </section>
        </section>


        <?php
        session_start();

        if (!isset($_SESSION['email'])) {

            header("Location: login.php");
            exit();
        }
        $userEmail = $_SESSION['email'];


        include "connection.php";


        $email = $userEmail;
        ?>


        <?php

        echo '<section class="scrollshopping bg-white bg-opacity-60 p-8 rounded-lg shadow-md h-64 border-2 border-cyan-300 mx-24 my-12">';
        include "connection.php";
        $sqlG = "SELECT * FROM `account` where type='admin'";
        $ck = mysqli_query($conn, $sqlG);

        if ($ck) {
            echo '<h1 class="text-4xl font-bold text-center mb-6">Admin account</h1>';
            echo '<div class="grid grid-cols-3 gap-4 font-bold text-red-600">';

            echo '<p class="mx-auto">Name</p>';
            echo '<p class="mx-auto">Address</p>';

            echo '<p class="mx-auto">Email</p>';
            echo '</div>';

            while ($row = mysqli_fetch_assoc($ck)) {

                $Name = $row["name"];
                $add = $row["address"];

                $mail = $row["email"];

                echo '<div class="grid grid-cols-3 gap-4">';

                echo '<p class="mx-auto">' . $Name . '</p>';
                echo '<p class="mx-auto">' . $add . '</p>';

                echo '<p class="mx-auto">' . $mail . '</p>';
                echo '</div>';
            }
        } else {
            echo "Submit Unsuccessfully - " . mysqli_error($conn);
        }
        echo '</section>';
        ?>
        <?php

        echo '<section class="scrollshopping bg-white bg-opacity-60  p-8 rounded-lg shadow-md h-64 border-2 border-cyan-300 mx-24 my-12">';
        include "connection.php";
        $sqlG = "SELECT * FROM `account` where type='seller'";
        $ck = mysqli_query($conn, $sqlG);

        if ($ck) {
            echo '<h1 class="text-4xl font-bold text-center mb-6">seller account</h1>';
            echo '<div class="grid grid-cols-3 gap-4 font-bold text-red-600">';

            echo '<p class="mx-auto">Name</p>';
            echo '<p class="mx-auto">Address</p>';

            echo '<p class="mx-auto">Email</p>';
            echo '</div>';

            while ($row = mysqli_fetch_assoc($ck)) {

                $Name = $row["name"];
                $add = $row["address"];

                $mail = $row["email"];

                echo '<div class="grid grid-cols-3 gap-4">';

                echo '<p class="mx-auto">' . $Name . '</p>';
                echo '<p class="mx-auto">' . $add . '</p>';

                echo '<p class="mx-auto">' . $mail . '</p>';
                echo '</div>';
            }
        } else {
            echo "Submit Unsuccessfully - " . mysqli_error($conn);
        }
        echo '</section>';
        ?>
        <?php

        echo '<section class="scrollshopping bg-white bg-opacity-60  p-8 rounded-lg shadow-md h-64 border-2 border-cyan-300 mx-24 my-12">';
        include "connection.php";
        $sqlG = "SELECT * FROM `account` where type='worker'";
        $ck = mysqli_query($conn, $sqlG);

        if ($ck) {
            echo '<h1 class="text-4xl font-bold text-center mb-6">worker account</h1>';
            echo '<div class="grid grid-cols-3 gap-4 font-bold text-red-600">';

            echo '<p class="mx-auto">Name</p>';
            echo '<p class="mx-auto">Address</p>';

            echo '<p class="mx-auto">Email</p>';
            echo '</div>';

            while ($row = mysqli_fetch_assoc($ck)) {

                $Name = $row["name"];
                $add = $row["address"];

                $mail = $row["email"];

                echo '<div class="grid grid-cols-3 gap-4">';

                echo '<p class="mx-auto">' . $Name . '</p>';
                echo '<p class="mx-auto">' . $add . '</p>';

                echo '<p class="mx-auto">' . $mail . '</p>';
                echo '</div>';
            }
        } else {
            echo "Submit Unsuccessfully - " . mysqli_error($conn);
        }
        echo '</section>';
        ?>
        <?php

        echo '<section class="scrollshopping bg-white bg-opacity-60  p-8 rounded-lg shadow-md h-64 border-2 border-cyan-300 mx-24 my-12">';
        include "connection.php";
        $sqlG = "SELECT * FROM `account` where type='buy'";
        $ck = mysqli_query($conn, $sqlG);

        if ($ck) {
            echo '<h1 class="text-4xl font-bold text-center mb-6">customer account</h1>';
            echo '<div class="grid grid-cols-3 gap-4 font-bold text-red-600">';

            echo '<p class="mx-auto">Name</p>';
            echo '<p class="mx-auto">Address</p>';

            echo '<p class="mx-auto">Email</p>';
            echo '</div>';

            while ($row = mysqli_fetch_assoc($ck)) {

                $Name = $row["name"];
                $add = $row["address"];

                $mail = $row["email"];

                echo '<div class="grid grid-cols-3 gap-4">';

                echo '<p class="mx-auto">' . $Name . '</p>';
                echo '<p class="mx-auto">' . $add . '</p>';

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