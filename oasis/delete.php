<?php 
    include('./includes/config.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM blogs WHERE id = '$id'";
        mysqli_query($conn,$sql);
        header('location: admin.php');
    }
?>