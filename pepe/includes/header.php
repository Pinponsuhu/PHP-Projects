<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application</title>
    <link rel="stylesheet" href="./style/tailwind.min.css">
    <link rel="stylesheet" href="./style/style.css">
    <script src="./script/script.js"></script>
</head>
<body class="bg-gray-800 text-gray-50">
    <nav class="flex justify-between items-center bg-white text-gray-800 fixed w-screen top-0 px-8 md:px-14">
        <div>
            <img src="./assest/one.jpeg" class="rounded-full w-24 h-16" alt="logo">
        </div>
        <div>
            <ul class="text-lg hidden md:flex justify-between">
                <li class="mr-12"><a href="index.php">Home</a></li>
                <li class="mr-12"><a href="./job_page.php">Jobs</a></li>
                <li><a href="./contact_page.php">Contact</a></li>
            </ul>
            <li class="md:hidden flex text-2xl cursor-pointer text-gray-800" id="menu-btn" onclick="disNav()">☲</li>
        </div>
    </nav>
    <ul class="fixed bg-gray-50 hidden py-3 -mt-8 px-8 text-lg text-gray-800 w-screen md:hidden block rounded-br-md rounded-bl-md" id="nav">
        <li class="mr-12 py-2 hover:bg-gray-700 hover:text-gray-50 px-8 rounded-md"><a href="index.php">Home</a></li>
        <li class="mr-12 py-2 hover:bg-gray-700 hover:text-gray-50 px-8 rounded-md"><a href="./job_page.php">Jobs</a></li>
        <li class="py-2  hover:bg-gray-700 hover:text-gray-50 px-8 rounded-md"><a href="./contact_page.php">Contact</a></li>
    </ul>