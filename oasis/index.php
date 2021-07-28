<?php 
    session_start();
    if(!isset($_SESSION['email'])){
        header('location:signin.php');
    }else{
        include('./includes/config.php');
        $email = $_SESSION['email'];
        $sql = "SELECT * FROM blogs";
        $result = mysqli_query($conn,$sql);
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
?>
<!DOCTYPE html>
<?php 
    include('./includes/header.php');
?>
<main class="px-12">
    <section class="">
    <h1 class="text-2xl text-gray-500 my-5">Recent Blogs</h1>
    <div class="grid lg:grid-cols-4 md:grid-cols-3 grid-cols-1 md:gap-x-8 lg:gap-x-0 mx-auto">
  <?php foreach($rows as $row){ ?> 
        <div class="my-2 72 mx-auto md:col-span-1 py-5 rounded-lg bg-gray-800 shadow-md pb-4 md:mr-16">
            <img src="<?php echo $row['image_path'] ?>" class="rounded-tr-lg mx-auto md:w-60 w-64 rounded-tl-lg" alt="">
            <h2 class="text-2xl font-medium text-center mt-3 text-gray-50 mb-2 px-4"><?php echo $row['title'] ?></h2>
            <p class="text-gray-800 bg-gray-50 px-4 ml-7 rounded-full w-40 text-center"><?php echo $row['category'] ?></p>
        </div>   
        <?php } ?>
    </div>
    
</main>
<?php 
    include('./includes/footer.php');
?>
