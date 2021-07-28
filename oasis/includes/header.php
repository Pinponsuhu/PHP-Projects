<?php 

 ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oasis</title>
    <link rel="stylesheet" href="./styles/styles.css">
    <link rel="stylesheet" href="./cdn/tailwind.min.css">
    <script src="./js/script.js"></script>
</head>
<body class="text-gray-800 bg-gray-50">
<nav class="flex justify-between px-12 items-center bg-white shadow-md py-3">
    <h1 class="text-3xl font-bold text-gray-800">Oasis</h1>
    <ul class="justify-between text-lg hidden md:flex">
        <li><a href="#">Entertainment</a></li>
        <li class="mx-7"><a href="#">Sport</a></li>
        <li><a href="#">Politics</a></li>
        <li class="mx-7"><a href="#"></a>Lifestyle</li>
        <div class="" id="username">
            <li class="font-medium flex items-end" onclick="username()"><a href="#" class="flex items-end" ><?php echo $_SESSION['username'] ?><span class="transform font-bold ml-1 text-xl" id="carret">^</span></a></li>
        <ul class="font-normal absolute mt-2 bg-white px-3 py-4 rounded-md shadow-md hidden"  id="extra">
            <li><a href="#">Profile</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
</div>
    </ul>
    <h1 class="text-3xl md:hidden cursor-pointer font-bold" onclick="navDisp()" id="navBtn">⚍</h1>
</nav>

<div class="fixed h-screen hidden w-72 bg-gray-800 text-white top-0 left-0  text-2xl rounded-tr-2xl rounded-br-2xl" id="mobileNav">
<ul class="justify-between text-xl md:flex px-14 py-16">
        <li class=" mt-4"><a href="#">Entertainment</a></li>
        <li class=" mt-4"><a href="#">Sport</a></li>
        <li class=" mt-4"><a href="#">Politics</a></li>
        <li class=" mt-4"><a href="#"></a>Lifestyle</li>
        <li class=" mt-4 " onclick="username()"><a href="#" class="flex items-end" ><?php echo $_SESSION['username']; ?></a></li>
        <li class=" mt-4"><a href="logout.php">Logout</a></li>
    </ul>
</div>