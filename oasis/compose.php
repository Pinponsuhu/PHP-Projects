<?php
session_start();
if(isset($_POST['submit'])){
    include('./includes/config.php');
    $title = $_POST['title'];
    $message = $_POST['blogMessage'];
    $category = $_POST['category'];
    $image = $_FILES['image'];
    $fileName = $_FILES['image']['name'];
    $fileTmp = $_FILES['image']['tmp_name'];
    $fileSize = $_FILES['image']['size'];
    $fileType = $_FILES['image']['type'];
    $user = $_SESSION['username'];
    $ext = explode('.',$fileName);
    $actualExt = strtolower(end($ext));
    $allowedExt = ['jpg','jpeg','png','ico'];
    if($fileSize < 500000){
        if(in_array($actualExt,$allowedExt)){
            $newName = './blogImg/'.uniqid('') . '.' .$actualExt;
            move_uploaded_file($fileTmp,$newName);
            $sql = "INSERT INTO blogs (user,title,message,category,image_path) VALUES ('$user','$title','$message','$category','$newName')";
            if(mysqli_query($conn,$sql)){
                $popup = "up";
                header('location: admin.php');
            }
        }
    }else{
        echo "<script>alert('File too large')</script>";
    } 
}
?>
<!DOCTYPE html>
<?php include('./includes/header.php') ?>
<h1 class="text-3xl text-center text-gray-400 my-4">Write a blog</h1>
    <form action="compose.php" method="post" class="w-80 md:w-96 mx-auto" enctype="multipart/form-data">
        <input type="text" required name="title" id="" class="w-full px-3 block bg-gray-800 placeholder-white text-white py-3 rounded-lg my-2" placeholder="Blog title">
        <textarea name="blogMessage" required id="" cols="30" rows="4" placeholder="Blog message" class="w-full px-3 resize-none block bg-gray-800 placeholder-white text-white py-3 rounded-lg my-2"></textarea>
        <select name="category"  id="" class="w-full px-3 resize-none block bg-gray-800 placeholder-white text-white py-3 rounded-lg my-2">
            <option value="Entertainment">Entertainment</option>
            <option value="Sports">Sports</option>
            <option value="Lifestyle">Lifestyle</option>
            <option value="Politics">Politics</option>
        </select>
        <input type="file" name="image" required id=""  class="w-full px-3 resize-none block bg-gray-800 placeholder-white text-white py-3 rounded-lg my-2">
        <input type="submit" name="submit" value="Submit" class="block w-28 mx-auto text-center text-white rounded-lg bg-gray-800 py-3">
    </form>
    <?php if(isset($popup)){?>
    <div class="fixed w-screen top-0 h-screen overflow-hidden z-50 bg-black bg-opacity-60" id="popUp">
        <div class="w-80 mt-28 md:w-96 rounded-lg text-white bg-green-600 mx-auto px-12 py-8">
            <h1 class="text-white text-3xl font-bold text-center">Done</h1>
            <button class="w-12 h-12 block my-4 rounded-full bg-white text-gray-800" onclick="hidePopUp()">Ok</button>
        </div>
    </div>
    <?php }?>
</body>

</html>