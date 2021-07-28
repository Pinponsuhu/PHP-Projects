<?php 
  session_start();
  if(isset($_POST['signIn'])){
    include('./includes/config.php');
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    if($num > 0){
    $row = mysqli_fetch_assoc($result);
    $_SESSION['id'] = $row['id'];
    $id = $_SESSION['id'];
    header('location: admin_page.php');
    echo "<script>alert('$id')</script>";
    }else{
      header('location: login.php');
      echo mysqli_error($conn);
    }
  }
?>
<!DOCTYPE html>
<?php 
include('./includes/header.php');
?>
<main class="mt-24">
  <h1 class="text-2xl text-yellow-500 text-center font-medium">Sign in as an admin</h1>
  <form action="" class="mt-6 md:px-32 text-gray-800 lg:px-48" method="post">
    <div class="md:flex justify-between gap-x-4 items-center">
    <input type="email" name="email" id="" class="md:w-80 w-72 py-3 px-3 rounded-lg block mx-auto mb-3 md:mb-0" placeholder="Email address">
    <input type="password" name="password" id="" class="md:w-80 w-72 py-3 px-3 rounded-lg block mx-auto" placeholder="Password">
    </div>
    <button name="signIn" class="text-center bg-yellow-500 border-l-2 border-l-white w-24 mt-4 rounded-lg mx-auto py-3 block">Sign in</button>
  </form>
</main>