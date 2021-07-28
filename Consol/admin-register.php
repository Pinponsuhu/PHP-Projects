<?php
    if(isset($_POST['submit'])){
        $password = md5($_POST['password']);
        $Cpassword = md5($_POST['Cpassword']);
        if($password == $Cpassword){
            include('./config.php');
            $depart = $_POST['department'];
            $sql = "INSERT INTO admin_login(department,password) VALUES ('$depart','$password')";
            mysqli_query($conn,$sql);
        }else{
            echo "<script>alert('Password does not match')</script>";
        }
    }
?>
<!DOCTYPE html>
<?php
    include('./includes/header.php');
?>
<main>
    <h1>Register an administrator</h1>
    <form action="" class="mt-6 grid md:grid-cols-2 gap-x-8 md:px-40 px-16" method="POST">
    <input type="text" name="department"  class="mb-3 rounded-md bg-yellow-50 py-3 px-2" required id="" placeholder="Department">
    <input type="password" name="password"  class="mb-3 rounded-md bg-yellow-50 py-3 px-2" required id="" placeholder="Password">
    <input type="password" name="Cpassword" id="" class="mb-3 rounded-md bg-yellow-50 py-3 px-2 md:w-80 mx-auto md:col-span-2" placeholder="Confirm Password">
    <input type="submit" value="Submit" name="submit" class="md:col-span-2 bg-green-400 rounded-md px-5 py-3 w-24 mx-auto block text-center text-gray-100">
    </form>
</main>

<?php
    include('./includes/footer.php');
?>