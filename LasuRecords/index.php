<?php 
    session_start();
if(isset($_SESSION['matricNo'])){
    $matricNo = $_SESSION['matricNo'];
    include('./includes/config.php');
    $sql = "SELECT * FROM std_user WHERE matric_no = '$matricNo'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    if(isset($_GET['logout'])){
        session_destroy();
        header('location:login.php');
    }
   
}else{
    header('location: login.php');
}

?>
<!DOCTYPE html>
<?php
    include('./includes/header.php');
?>
<main class="grid lg:grid-cols-3 md:grid-cols-2 md:gap-x-6 lg:gap-x-0 px-12 items-center">
    <h1 class="font-medium text-center text-2xl uppercase col-span-3 my-1">Student information</h1>
<img src="<?php echo $row['image_path']?>" class="hidden md:grid col-span-1 md:w-full md:h-96 rounded-full md:rounded-none mx-auto mt-6 object-cover shadow-md" alt="">
<div class="w-80 md:col-span-1 lg:col-span-2 mx-auto mt-3">
<img src="<?php echo $row['image_path']?>" class=" block md:hidden w-36  h-36  rounded-full md:rounded-none mx-auto mt-4 object-cover shadow-md" alt="">
    <p class="text-lg"><label class="font-medium mr-4" for="">Firstname:</label><?php echo $row['firstname'] ?></p>
    <p class="text-lg"><label class="font-medium mr-4" for="">Lastname:</label><?php echo $row['lastname'] ?></p>
    <p class="text-lg"><label class="font-medium mr-4" for="">Faculty:</label><?php echo $row['faculty'] ?></p>
    <p class="text-lg"><label class="font-medium mr-4" for="">Department:</label><?php echo $row['department'] ?></p>
    <p class="text-lg"><label class="font-medium mr-4" for="">Date of birth:</label><?php echo $row['date_of_birth'] ?></p>
    <p class="text-lg"><label class="font-medium mr-4" for="">Level:</label><?php echo $row['level'] ?></p>
</div>
<form action="" method="get" class="col-span-3 mt-2">
<button name="logout" class=" py-3 block w-28 rounded-md text-gray-50 bg-gray-800">logout</button>
</form>
</main>
<?php
    include('./includes/footer.php');
?>