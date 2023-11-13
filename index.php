<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
</head>

<body class="bg-slate-100">
    <header>
        <div>
            <nav class="bg-slate-800  text-white subpixel-antialiased text-2xl w-fit h-18  flex w-screen fixed">
                <div class="flex-auto  mx-6">
                    <div class="flex">
                        <a class="flex-auto my-6 " href="index.php">
                            <div class="  hover:bg-sky-700   ">HOME</div>
                        </a>
                        <a class="flex-auto my-6" href="factory.php">
                            <div class="  hover:bg-sky-700   ">FACTORY</div>
                        </a>
                        <a class="flex-auto my-6" href="shopping.php">
                            <div class="   hover:bg-sky-700  ">SHOPPING</div>
                        </a>
                        <a class="flex-auto my-6" href="hire.php">
                            <div class="  hover:bg-sky-700   ">HIRE</div>
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




    


    
        <div class="p-12  h-screen">
            <a href="shopping.php">
                <div class="h-3/6 text-center border rounded-lg border-double border-x-slate-700 bg_shopping">
                    <div class="w-fit  w-screen">

                        <p class="mt-32 text-4xl">SHOP</p>

                    </div>
                </div>
            </a>
            <div class="w-fit flex w-screen h-3/6 text-center gap-2 mt-2">
                <a class="flex-auto w-6/12 border rounded-lg border-double border-x-slate-700  bg_factory" href="factory.php">
                    <div >

                        <p class="mt-32 text-4xl">FACTORY</p>

                    </div>
                </a>
                <a class="flex-auto w-6/12 me-24 border rounded-lg border-double border-x-slate-700  bg_hire" href="hire.php">
                    <div >

                        <p class="mt-32 text-4xl">HIRE</p>

                    </div>
                </a>
            </div>
        </div>
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