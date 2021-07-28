<?php
    
if(isset($_POST['submit'])){
    session_start();
    include('./includes/config.php');
    $matricNo = $_POST['matricNo'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM std_user WHERE matric_no ='$matricNo' AND password = '$password'";
    $result = mysqli_query($conn,$sql);
    $num_row = mysqli_num_rows($result);
    echo $num_row;
     if($num_row > 0){
        $_SESSION['matricNo'] = $matricNo;
        header('location: index.php');
    }else{
        echo "<script>alert('Invalid credentials')</script>";
    } 
}
?>
<!DOCTYPE html>
<?php
    include('./includes/header.php');
?>
    <main class="grid md:grid-cols-2">
    <div class="px-12 py-16 hidden md:grid">
        <object data="./assets/undraw_authentication_fsn5.svg" class="w-full h-full" type=""></object>
    </div>
    <div>
    <form action="" class="w-96 mx-auto" method="post">
    <h1 class="text-gray-800 text-3xl font-medium my-8 text-center">Login to view pages</h1>
    <input type="number" name="matricNo" id="" class="block my-2 rounded-md bg-gray-300 text-gray-800 px-4 w-full py-4" placeholder="Matric nimber">
    <input type="password" name="password" id="" class="block my-2 rounded-md bg-gray-300 text-gray-800 px-4 w-full py-4" placeholder="Password">
    <input type="submit" value="Login" name="submit" class="block my-2 rounded-full bg-gray-800 text-gray-200 w-32 mx-auto mt-6 py-3  text-center">
    </form>
    </main>

<?php
    include('./includes/footer.php');
?>