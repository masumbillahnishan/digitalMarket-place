<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "project";

    // Create a database connection
    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $email = $_POST['email'];
    $password = $_POST['password'];


    $sql = "SELECT * FROM account WHERE email = '$email' and PASSWORD='$password' and type='admin'";
   
    $sql2 = "SELECT * FROM account WHERE email = '$email' and PASSWORD='$password' and type='seller'";
    $sql3 = "SELECT * FROM account WHERE email = '$email' and PASSWORD='$password' and type='buy'";
    $sql4 = "SELECT * FROM account WHERE email = '$email' and PASSWORD='$password' and type='worker'";
    if($sql){
        $result=mysqli_query($conn,$sql);
        $check=mysqli_num_rows($result);
      
    }
    if($sql2){
        $result=mysqli_query($conn,$sql2);
        $check1=mysqli_num_rows($result);
      
    }
    if($sql3){
        $result=mysqli_query($conn,$sql3);
        $check2=mysqli_num_rows($result);
      
    }
    if($sql4){
        $result=mysqli_query($conn,$sql4);
        $check3=mysqli_num_rows($result);
      
    }

   

    if ($check) {
     session_name("login");
        session_start();
        $_SESSION['email'] = $email;
        
    
     
        header("Location: admin.php");
        exit();
    } 



    else if ($check1) {
     
        session_start();
        $_SESSION['email'] = $email;
        
    
     
        header("Location: productadd.php");
        exit();
    } 
   else if ($check2) {
     
        session_start();
        $_SESSION['email'] = $email;
        
    
     
        header("Location: notification_customer.php");
        exit();
    } 
   else if ($check3) {
     
        session_start();
        $_SESSION['email'] = $email;
        
    
     
        header("Location:hire_dashboard.php");
        exit();
    } 
    else {
       
        echo '       <div class="fixed inset-0 flex items-center justify-center z-50">';
        echo '  <div class="fixed inset-0 bg-black opacity-75"></div>';
        echo '  <div class="relative z-10 bg-white rounded-lg shadow-xl w-full max-w-screen-sm overflow-hidden">';


        echo '    <div class="bg-cyan-500 py-4 px-6 text-white">';
        echo '      <h2 class="text-2xl font-bold text-center" id="modal-title">' . 'sorry ! ' . $name . '</h2>';
        echo '    </div>';
        echo '    <div class="p-6">';


        echo '<p class="text-center">email or password incorrect</p>';

        echo '      <form action="" method="post" class="flex flex-col gap-4">';

        echo '        <div class="flex justify-center mt-6 space-x-4">';

        echo '          <a class="h-12 w-24 bg-cyan-100 hover:bg-sky-700" href="login.php"> <p class="text-center mt-2 text-lg ">OK</p></a>';
        echo '        </div>';
        echo '      </form>';

        echo '    </div>';
        echo '  </div>';
        echo '</div>';
    }

    $conn->close();
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
     
        <form action="login.php" method="post">
            <section class="flex justify-center items-center h-screen">
                <div class="bg-white mx-auto p-8 rounded-lg shadow-md w-80">
                    <div class="text-center mb-6">
                        <p class="text-4xl font-bold">LOGIN</p>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block mb-2">Email:</label>
                        <input required class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300" type="email" name="email" id="email" placeholder="Please enter your Email">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block mb-2">Password:</label>
                        <div class="relative">
                            <input class="w-full px-3 py-2 pr-10 border rounded-md focus:outline-none focus:ring focus:border-blue-300" type="password" name="password" id="password" placeholder="Enter your password">
                            <input type="checkbox" name="show_password" id="show_password" class="absolute top-1/2 right-2 transform -translate-y-1/2 cursor-pointer">
                        </div>
                    </div>
                    <div class="mb-6">
                        <button class="w-full py-2 px-4 bg-cyan-500 text-white rounded-md hover:bg-cyan-600 focus:outline-none focus:ring" type="submit">
                            Login
                        </button>
                    </div>
                    <div class="text-center">
                        <button>
                            <a href="creataccount.php" class="text-blue-500 hover:underline">Create Account</a>
                        </button>
                    </div>
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