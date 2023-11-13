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

$sql2 = "SELECT * FROM hire WHERE email = '$email' ";
$result2 = mysqli_query($conn, $sql2);
$getData2 = mysqli_fetch_assoc($result2);

$phone = $getData2['number'];
$abouts = $getData2['about'];
$img = $getData2['image'];
$sno=$getData2['sno'];



if (isset($_POST['submit'])) {
    $number = $_POST['number'];
    $about = $_POST['about'];

    $filename = $_FILES["file"]["name"];

    $tempName = $_FILES["file"]["tmp_name"];
    $folder = "photohire/" .$sno. $filename;
    include "connection.php";
    $sql = "UPDATE `hire` SET `about` = '$about',`number`='$number',`image`='$filename',`id`='$id'  WHERE `hire`.`email` ='$email' and `name`='$name' and `address`='$address'";


    $result=mysqli_query($conn, $sql);
    if($result){
        echo "submit successfully---->";
    }
    else{
        echo "submit unsuccessfully---->" . mysqli_error($conn);

    }
    if (move_uploaded_file($tempName, $folder)) {
        echo "<h3>  Image uploaded successfully!</h3>";
    } else {
        echo "<h3>  Failed to upload image!</h3>";
        echo $filename;
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
                        <a class="flex-auto my-6" href="hire_notification.php">
                            <div class="    ">Notification</div>
                        </a>
                        <a class="flex-auto my-6" href="hire_dashboard.php">
                            <div class="    ">Profile</div>
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




    <main class="flex items-center justify-center h-screen">
        <section class="bg-white  p-8 rounded-lg shadow-md w-96 h-auto border-2 border-cyan-300 mx-auto my-12">
            <div class="text-center">
                <h1 class="text-2xl font-semibold text-cyan-700 mb-4">Worker Information</h1>
            </div>

            <div class="p-4">
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold" for="seller-name">Worker Name:</label>
                    <p class="text-gray-800 border-2 border-cyan-500 px-4 py-2" id="seller-name"><?php echo $name; ?></p>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold" for="seller-address">Worker Address:</label>
                    <p class="text-gray-800 border-2 border-cyan-500 px-4 py-2" id="seller-address"><?php echo $address; ?></p>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold" for="seller-email">Worker Email:</label>
                    <p class="text-gray-800 border-2 border-cyan-500 px-4 py-2" id="seller-email"><?php echo $userEmail; ?></p>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold" for="seller-phone">Phone:</label>
                    <p class="text-gray-800 border-2 border-cyan-500 px-4 py-2" id="seller-phone"><?php echo '0'.$phone; ?></p>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold" for="seller-about">About:</label>
                    <p class="text-gray-800 border-2 border-cyan-500 px-4 py-2 h-24" id="seller-about"><?php echo $abouts; ?></p>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold" for="seller-id">Worker ID:</label>
                    <p class="text-gray-800 border-2 border-cyan-500 px-4 py-2" id="seller-id"><?php echo $id; ?></p>
                </div>
            </div>
        </section>

        <section>
            <form action="hire_dashboard.php" method="post" enctype="multipart/form-data" class="mt-4 me-8">
                <input type="number" name="number" placeholder="Contact Number" class="w-full px-4 py-2 border-2 border-cyan-500 rounded-md mb-2">
                <input type="text" name="about" placeholder="About" class="w-full px-4 py-2 border-2 border-cyan-500 rounded-md mb-2">
                <input type="file" name="file" id="file" value="" class="input-field w-full px-4 py-2 border-2 border-cyan-500 rounded-md mb-2">
                <button type="submit" name="submit" class="w-full py-2 px-4 bg-cyan-500 text-white rounded-md hover:bg-cyan-600">Submit</button>
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