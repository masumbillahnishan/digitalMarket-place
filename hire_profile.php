<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    

<main>

<section class="mx-auto w-full h-11/12 bg-white border border-cyan-300 rounded-lg p-4 flex flex-col">
    <div class="flex w-full h-64 border border-cyan-300 mb-4">
        <div class="mt-8 ms-6 w-3/5 flex-auto">
            <p class="text-xl font-semibold">Name: Masum Billah</p>
            <p class="text-gray-600">Address: Birganj</p>
            <p class="text-gray-600">Contact Number: 01703635767</p>
        </div>
        <div class="flex-auto">
            <img src="../Arduino UNO Pinout Diagram.png" alt="Profile Image" class="flex items-end p-4 h-64 w-64 rounded-md">
        </div>
    </div>
    <div> <p class="text-xl font-semibold">About</p>

       
        <p class="justify-center text-gray-600 w-4/5 h-16 ">Address: Birganj</p>
    </div>
    <div class="space-x-2">
        <form action="" method="post">
        <button type="submit" name="hire" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-300">Hire</button>
        <button type="submit" name="back" class="bg-gray-200 text-gray-700 py-2 px-4 rounded-md hover:bg-gray-300 focus:outline-none focus:ring focus:ring-gray-300">Back</button>
        </form>
    </div>
</section>


<?php
        if (isset($_POST['back'])) {
            header("Location:hire.php");

        }

        ?>

</main>




</body>

</html>