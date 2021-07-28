<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lasurecords</title>
    <link rel="stylesheet" href="./cdn/tailwind.min.css">
    <link rel="stylesheet" href="./cdn/style.css">
    <script src="./script/main.js"></script>
</head>
<body class="bg-gray-50 text-gray-800 items-center overflow-x-hidden overflow-y-hidden">
    <nav class="fixed flex justify-between bg-white relative py-4 px-12 shadow w-screen">
    <h1 class="text-3xl font-bold"><a href="./index.php">LASU Records</a></h1>
        <ul class="text-lg md:flex hidden  justify-between">
        <li><a href="./about.php" class="mr-8">About</a></li>
        <li><a href="./contact.php">Contact us</a></li>
        </ul>
        <li class="md:hidden flex text-3xl cursor-pointer items-center" onclick="disNav()" id="menu-btn">☲</li>
    </nav>
    <ul class="block w-screen fixed text-xl hidden px-8 bg-gray-800 text-gray-50 shadow rounded-br-md rounded-bl-md" id="nav">
        <li class="block border-b-2 bprder-gray-300 py-2"><a href="./about.php" class="mr-8">About</a></li>
        <li class="block py-2"><a href="./contact.php">Contact us</a></li>
        </ul>

   