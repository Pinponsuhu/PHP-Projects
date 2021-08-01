<?php 
if(isset($_GET['id'])){
echo "<script>alert('Shaba')</script>";
 include('./includes/config.php');
 $id = $_GET['id'];
 $sql = "DELETE FROM systems WHERE id = '$id'";
 mysqli_query($conn,$sql);
 header('location: admin.php');
}else{
    header('location: login.php');
}
?>