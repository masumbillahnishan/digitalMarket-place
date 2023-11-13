<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include "connection.php";

    $name = $_POST["name"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $type = $_POST["type"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirm_password"];



    $ck = "SELECT email FROM `account` where email='$email'";
    $ckr = mysqli_query($conn, $ck);
    $check = mysqli_num_rows($ckr);
    if ($check) {


        echo '       <div class="fixed inset-0 flex items-center justify-center z-50">';
        echo '  <div class="fixed inset-0 bg-black opacity-75"></div>';
        echo '  <div class="relative z-10 bg-white rounded-lg shadow-xl w-full max-w-screen-sm overflow-hidden">';


        echo '    <div class="bg-cyan-500 py-4 px-6 text-white">';
        echo '      <h2 class="text-2xl font-bold text-center" id="modal-title">' . 'sorry ! ' . $name . '</h2>';
        echo '    </div>';
        echo '    <div class="p-6">';


        echo '<p class="text-center">Your email already exist</p>';

        echo '      <form action="" method="post" class="flex flex-col gap-4">';

        echo '        <div class="flex justify-center mt-6 space-x-4">';

        echo '          <a class="h-12 w-24 bg-cyan-100 hover:bg-sky-700" href="creataccount.php"> <p class="text-center mt-2 text-lg ">OK</p></a>';
        echo '        </div>';
        echo '      </form>';

        echo '    </div>';
        echo '  </div>';
        echo '</div>';
    } else if ($_POST["password"] != $_POST["confirm_password"]) {



        echo '       <div class="fixed inset-0 flex items-center justify-center z-50">';
        echo '  <div class="fixed inset-0 bg-black opacity-75"></div>';
        echo '  <div class="relative z-10 bg-white rounded-lg shadow-xl w-full max-w-screen-sm overflow-hidden">';


        echo '    <div class="bg-cyan-500 py-4 px-6 text-white">';
        echo '      <h2 class="text-2xl font-bold text-center" id="modal-title">' . 'sorry ! ' . $name . '</h2>';
        echo '    </div>';
        echo '    <div class="p-6">';


        echo '<p class="text-center">your confirm password doesnt match</p>';

        echo '      <form action="" method="post" class="flex flex-col gap-4">';

        echo '        <div class="flex justify-center mt-6 space-x-4">';

        echo '          <a class="h-12 w-24 bg-cyan-100 hover:bg-sky-700" href="creataccount.php"> <p class="text-center mt-2 text-lg ">OK</p></a>';
        echo '        </div>';
        echo '      </form>';

        echo '    </div>';
        echo '  </div>';
        echo '</div>';
    } else {


        if ($type == 'worker') {
            $sql = "INSERT INTO `hire` ( `name`, `id`, `address`, `email`, `number`, `about`, `image`) VALUES ( '$name ', '0', '$address', '$email', '0', 'e', 'e');
        ";
            $result =   mysqli_query($conn, $sql);
        }

        $sql1 = "INSERT INTO `account`( `name`,`address`, `email`, `password`,  `type`) VALUES ('$name','$address', '$email','$password','$type')";

        $result1 = mysqli_query($conn, $sql1);
        if ($result &&  $result1) {



            echo '       <div class="fixed inset-0 flex items-center justify-center z-50">';
            echo '  <div class="fixed inset-0 bg-black opacity-75"></div>';
            echo '  <div class="relative z-10 bg-white rounded-lg shadow-xl w-full max-w-screen-sm overflow-hidden">';


            echo '    <div class="bg-cyan-500 py-4 px-6 text-white">';
            echo '      <h2 class="text-2xl font-bold text-center" id="modal-title">' . 'HI ! ' . $name . '</h2>';
            echo '    </div>';
            echo '    <div class="p-6">';


            echo '<p class="text-center">You Successfully create an account</p>';


            echo '        <div class="flex justify-center mt-6 space-x-4">';

            echo '          <a class="h-12 w-24 bg-cyan-100 hover:bg-sky-700" href="login.php"> <p class="text-center mt-2 text-lg ">OK</p></a>';
            echo '        </div>';


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
    <script type="text/javascript">
        function validateEmail() {
            var email = document.getElementById("email").value;
            var gmailPattern = /^[a-zA-Z0-9._-]+@gmail\.com$/;
            var submitButton = document.getElementById("submit");

            if (email.match(gmailPattern)) {
            
                submitButton.disabled = false;
            } else {
              
                submitButton.disabled = true;
            }
        }
    </script>
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
                        <button class="flex-auto"><a href="">
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


        <form action="" method="post">
            <section class="w-96 mx-auto p-6 bg-white border-2 border-teal-300 rounded-lg shadow-md my-12">
                <h2 class="text-2xl font-bold text-teal-500 text-center mb-6">Create Account</h2>
                <form>
                    <div class="grid grid-cols-1 gap-4">
                        <div>
                            <label for="name" class="text-teal-500">Name</label>
                            <input required class="input-field" type="text" name="name" id="name" placeholder="Enter your name">
                        </div>
                        <div>
                            <label for="email" class="text-teal-500">Email</label>
                            <input onkeyup="validateEmail()" class="input-field" type="email" name="email" id="email" placeholder="Enter your email">
                        </div>
                        <div>
                            <label for="address" class="text-teal-500">Address</label>
                            <input class="input-field" type="text" name="address" id="address" placeholder="Enter your address">
                        </div>
                        <div>
                            <label for="type" class="text-teal-500">Type (buy/seller/worker)</label>
                            <input required class="input-field" type="text" name="type" id="type" placeholder="Type buy/seller/worker">
                        </div>
                        <div>
                            <label for="password" class="text-teal-500">Password</label>
                            <input required class="input-field" type="password" name="password" id="password" placeholder="Choose password">
                        </div>
                        <div>
                            <label for="confirm_password" class="text-teal-500">Confirm Password</label>
                            <input class="input-field" type="password" name="confirm_password" id="confirm_password" placeholder="Confirm password">
                        </div>
                    </div>
                    <div class="mt-6">
                        <button class="w-full py-2 px-4 bg-teal-500 text-white rounded-md hover:bg-teal-600 focus:outline-none focus:ring" id="submit" disabled type="submit">
                            SUBMIT
                        </button>
                    </div>
                </form>
                <div class="mt-2 text-center">
                    <p>Already have an account? <a href="login.php" class="text-teal-500 hover:underline">Login</a></p>
                </div>
            </section>


        </form>




        
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