<?php
session_start();
    include('./includes/config.php');
    if(!isset($_SESSION['access'])){
        header('location: signin.php');
    }else{
        if($_SESSION['access'] < 0){
            header('location: index.php');
        }
    }
    $sql = "SELECT * FROM blogs";
        $result = mysqli_query($conn,$sql);
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<?php 
    include('./includes/header.php');
?>
<main>
    <h1 class="text-2xl font-medium ml-6 mt-5 mb-7">Active Blogs</h1>
    <?php foreach($rows as $row) {?>
    <div class="flex justify-between mb-4 items-center px-12">
        <div class="flex items-center">
        <img src="<?php echo $row['image_path'] ?>" alt="" class="w-24 h-24 rounded-lg mr-4">
        <h1 class="font-medium text-2xl"><?php echo $row['title'] ?></h1>
        </div>
        <div class="flex">
        <a href="edit.php?id=<?php echo $row['id'] ?>">Edit</a>
        <a href="delete.php?id=<?php echo $row['id'] ?>">Delete</a>
    </div>
    </div>
    <?php } ?>
</main>
<?php 
    include('./includes/write.php');
?>