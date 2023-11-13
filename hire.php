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
                        <img src="photohire/ 3009185ac7f6ff47f25d94c909c00526d4cf.jpg" alt="">
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

        <?php



        echo '<section class="grid grid-cols-4 gap-4 mx-12 my-8 ">';

        include "connection.php";
        $sql = "SELECT * FROM `hire`";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $Name = $row["name"];
            $address = $row["address"];
            $number = $row["number"];
            $img = $row["image"];
            $sno = $row["sno"];
            $idh = $row["id"];



            echo '  <form action="" method="post">';

            echo '<div class="">';
            echo '    <div class="bg-white  rounded-lg p-4 w-80 h-64 border border-cyan-300 mb-4 flex items-center justify-center">';
            echo '<img src="' . 'photohire/' . $sno . $img . '"  class="object-cover w-full h-full rounded-lg">';
            echo '    </div>';
            echo '    <div class="mb-4">';
            echo '<input type="text" name="wname" value="' . 'Name:  ' . $Name  . '"><br> ';
            echo '<input type="text" name="waddress" value="' . 'address:  ' . $address  . '"><br>';
            echo '<input type="hidden" name="h_id" value="' . $idh . '">';
            echo '<input type="text" name="wnumber" value="' . 'contact:  0' . $number  . '">';
            echo '<input type="hidden" name="wsno" value="' . $sno . '">';
            echo '<input type="hidden" name="wimg" value="' . 'photohire/' . $sno . $img . '">';

            echo '    </div>';
            echo '    <div class="space-x-2">';

            echo '            <button type="submit" name="hire" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-300">Hire</button>';
            
            echo ' <button type="submit" name="profile" class="bg-gray-200 text-gray-700 py-2 px-4 rounded-md hover:bg-gray-300 focus:outline-none focus:ring focus:ring-gray-300">Profile</button>';

            echo '      </div>';
            echo ' </div>';
            echo '          </form>';
        }
        echo '  </section>';

        ?>




        <?php
        if (isset($_POST['hire'])) {
             $idh = $_POST['h_id'];
             $wsno = $_POST['wsno'];
             $namew=$_POST['namew'];
           


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
            echo '          <label for="address" class="text-gray-600  font-semibold">work Address</label>';
            echo '          <input required type="text" name="address"  id="address" placeholder="Enter your working address" class="input-field w-48">';
            echo '<input type="hidden" name="namew" value="' . $namew. '">';
            echo '        </div>';
            echo '        <div class="relative">';
            echo '          <label for="contact" class="text-gray-600 font-semibold">Contact Number</label>';
            echo '          <input required type="number" name="number"  id="contact" placeholder="Enter your contact number" class="input-field w-72">';

            echo '        </div>';
            echo '        <div class="relative">';
            echo '          <label for="email" class="text-gray-600 font-semibold">E-mail</label>';
            echo '          <input required type="email" name="email" id="email" placeholder="Enter your email" class="input-field">';
            echo '<input type="hidden" name="id" value="' . $idh . '">';
            echo '        </div>';
            echo '        <div class="flex justify-end mt-6 space-x-4">';
            echo '          <button type="submit" name="" class="h-12 w-24 bg-red-100 hover:bg-red-700"><a href="hire.php">Cancel</a></button>';
            echo '          <button type="submit" name="hireconfirm" class="h-12 w-24 bg-cyan-100 hover:bg-sky-700">HIRE</button>';
            echo '        </div>';
            echo '      </form>';

            echo '    </div>';
            echo '  </div>';
            echo '</div>';
        }



        if (isset($_POST['profile'])) {
            $Name = $_POST['wname'];
            $address = $_POST['waddress'];
            $number = $_POST['wnumber'];
            $sno = $_POST['wsno'];
            $img = $_POST['wimg'];

            include "connection.php";
            $sql= " SELECT * FROM `hire` WHERE sno='$sno'";
            $resultp = mysqli_query($conn, $sql);
            $getData = mysqli_fetch_assoc($resultp);

            $aboutp = $getData['about'];
            // $image = $getData['image'];
            $idh = $getData['id'];
            



            echo '       <div class="fixed inset-0 flex items-center justify-center z-50">';
            echo '  <div class="fixed inset-0 bg-black opacity-75"></div>';
            echo '  <div class="relative z-10 bg-white rounded-lg shadow-xl w-full max-w-screen-sm overflow-hidden">';


            echo '<div class="bg-cyan-500 py-4 px-6 text-white">';
            echo '<h2 class="text-2xl font-bold text-center" id="modal-title">Profile</h2>';
            echo '</div>';
            echo '<div class="p-6">';



            echo '<section class="mx-auto w-full h-11/12 bg-white border border-cyan-300 rounded-lg p-4 flex flex-col">';
            echo '<div class="flex w-full h-64 border border-cyan-300 mb-4">';
            echo '<div class="mt-8 ms-6 w-3/5 flex-auto">';
            echo '<p class="text-xl font-semibold">' . $Name . '</p>';
          
            echo '<input type="text" name="wsno" value="' . $image . '">';

            echo '<p class="text-gray-600">' . $address . '</p>';

            echo '<p class="text-gray-600">' .  $number . '</p>';
            echo ' </div>';
            echo '<div class="flex-auto">';
            echo '<img src="'.$img.'" class="flex items-end p-4 h-64 w-96  rounded-md">';
            echo '  </div>';
            echo '</div>';
            echo ' <div> <p class="text-xl font-semibold">About</p>';


            echo '    <p class="justify-center text-gray-600 w-4/5 h-16 ">' . $aboutp . '</p>';

            echo ' </div>';
            echo ' <div class="space-x-2">';
            echo ' <form action="" method="post">';
            echo '<input type="hidden" name="namew" value="'.$name.'">';
            echo ' <button type="submit" name="hire" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-300">Hire</button>';
            echo ' <button type="submit" name="back" class="bg-gray-200 text-gray-700 py-2 px-4 rounded-md hover:bg-gray-300 focus:outline-none focus:ring focus:ring-gray-300">Back</button>';
            echo '</form>';
            echo '    </div>';
            echo '</section>';


            echo '    </div>';
            echo '  </div>';
            echo '</div>';
        }
        ?>


        <?php
        if (isset($_POST['back'])) {
            header("Location:hire.php");
        }



        if (isset($_POST['hireconfirm'])) {
            $name = $_POST['name'];
            $namew = $_POST['namew'];
            $address = $_POST['address'];
            $number = $_POST['number'];
            $email = $_POST['email'];
            $id = $_POST['id'];


            include "connection.php";

            $sql = "INSERT INTO `hiredetails` (`id`, `name`, `address`, `number`, `email`) VALUES ('$id', '$name', '$address', '$number', '$email')";
            $result = mysqli_query($conn, $sql);
            if ($result) {

               
            echo '       <div class="fixed inset-0 flex items-center justify-center z-50">';
            echo '  <div class="fixed inset-0 bg-black opacity-75"></div>';
            echo '  <div class="relative z-10 bg-white rounded-lg shadow-xl w-full max-w-screen-sm overflow-hidden">';
    
    
            echo '    <div class="bg-cyan-500 py-4 px-6 text-white">';
            echo '      <h2 class="text-2xl font-bold text-center" id="modal-title">' . 'congratulation ! ' . $name . '</h2>';
            echo '    </div>';
            echo '    <div class="p-6">';
    
    
            // echo '<p class="text-center">'.'hire successfully,after a few time '.$namew. ' will contact with you'</p>';
            echo '<p class="text-center">'.'Hired successfully, after a short time our worker will contact with you.</p>';

    
            echo '      <form action="" method="post" class="flex flex-col gap-4">';
    
            echo '        <div class="flex justify-center mt-6 space-x-4">';
    
            echo '          <a class="h-12 w-24 bg-cyan-100 hover:bg-sky-700" href="hire.php"> <p class="text-center mt-2 text-lg ">OK</p></a>';
            echo '        </div>';
            echo '      </form>';
    
            echo '    </div>';
            echo '  </div>';
            echo '</div>';
            } else {
                echo "submit unsuccessfully---->" . mysqli_error($conn);
            }
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

</body>

</html>