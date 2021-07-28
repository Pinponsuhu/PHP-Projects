<?php 
    include('./config.php');
    session_start();
    if(isset($_POST['submit'])){
        $department = $_POST['department'];
        $password = md5($_POST['password']);
        $sql = "SELECT * FROM admin_login WHERE department = '$department' AND password = '$password'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            echo "<script>alert('Login Successful')</script>";
            header('location:admin_page.php');
            $row = mysqli_fetch_assoc($result);
            $_SESSION['department'] = $row['department'];
        }
        else{
            echo "<script>alert('Login Unsuccessful')</script>";
        }
    }
    if(isset($_SESSION['department'])){
        header('location: admin_page.php');
    }
?>
<!DOCTYPE html>
<?php
    include('./includes/header.php');
?>
<main>
    <h1>Login as an administrator</h1>
    <form action="" class="mt-6 grid md:grid-cols-2 gap-x-8 md:px-40 px-16" method="POST">
    <input type="text" name="department"  class="mb-3 rounded-md bg-yellow-50 py-3 px-2" required id="" placeholder="Department">
    <input type="password" name="password"  class="mb-3 rounded-md bg-yellow-50 py-3 px-2" required id="" placeholder="Password">
    <input type="submit" value="Submit" name="submit" class="md:col-span-2 bg-green-400 rounded-md px-5 py-3 w-24 mx-auto block text-center text-gray-100">
    </form>
</main>

<?php
    include('./includes/footer.php');
?>