<?php 
    include('./includes/config.php');
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM applicants WHERE id = '$id'";
        mysqli_query($conn,$sql);
        $sql = "SELECT * FROM applicants WHERE id = '$id'";
        $result = mysqli_query($conn,$sql);
        $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
        $file_path = $rows['file_path'];
        unlink($file_path);
        echo "<script>alert('$file_path')</script>";
        header('location: admin_page.php');
    }
?>