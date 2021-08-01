<?php 
  session_start();
  if(isset($_SESSION['id'])){
    header('location: admin.php');
}else{
  if(isset($_POST['login'])){
    include('./includes/config.php');
    $loginID = $_POST['loginID'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM admin_info WHERE LoginID = '$loginID' AND password = '$password'";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    if($num > 0){
    $row = mysqli_fetch_assoc($result);
    $_SESSION['id'] = $row['id'];
    $id = $_SESSION['id'];
    header('location: admin.php');
    }else{
      header('location: login.php');
    }
  }
}
?>
<!DOCTYPE html>
<?php include('./includes/header.php') ?>
<main class="mt-24">
    <form action="" class="shadow-md w-80 mt-14 md:w-96 mx-auto bg-blue-200 rounded-lg px-5 py-12" method="post">
        <label class="font-bold text-md block mb-2">Login ID</label>
        <input type="text" name="loginID" id="" class="w-full rounded-lg block border-b-2 border-blue-500 px-3 py-3" placeholder="Enter Login ID">
        <label class="font-bold text-md block mb-2 mt-2">Password</label>
        <input type="password" name="password" id="" class="w-full rounded-lg block border-b-2 border-blue-500 px-3 py-3" placeholder="Enter Password">
        <button class="w-20 rounded-lg block mx-auto bg-blue-500 text-white shadow-md py-3 mt-7" name="login">Login</button>
    </form>
</main>