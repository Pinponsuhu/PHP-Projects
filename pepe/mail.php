<?php 
    include('./includes/config.php');
    session_start();
    $id = $_GET['id'];
    $sql = "SELECT * FROM applicants WHERE id = '$id'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail</title>
    <link rel="stylesheet" href="./style/tailwind.min.css">
</head>
<body>
    <h1 class="">You've been invited for an interview</h1>
    <p><?php echo $row['full_name']; ?></p>
</body>