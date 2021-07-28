<?php
    if(isset($_POST['submit'])){
        $image = $_FILES['image'];
        $title = $_POST['title'];
        $category = $_POST['category'];
        $articleMsg = $_POST['articleMsg'];
        echo "<script>alert('daddy')</script>";
        header('location:../index.php');
        
    }
?>