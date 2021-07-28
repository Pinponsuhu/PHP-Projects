<?php 
    session_start();
    include('./includes/config.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM blogs WHERE id = '$id'";
        $blog = mysqli_query($conn,$sql);
        $rows = mysqli_fetch_assoc($blog);
        print_r($rows);
    }
    if(isset($_POST['update'])){
        $title = $_POST['title'];
        $message = $_POST['blogMessage'];
        $category = $_POST['category'];
        $image = $_FILES['image']['size'];
        print_r($image);
        if($image <= 0){
            echo "<script>alert('shazam')</script>";
        $id = $_GET['id'];
        $sql = "UPDATE blogs SET title = '$title', message = '$message', category = '$category' WHERE id ='$id'";
         mysqli_query($conn,$sql);
         header('location: admin.php');
        }else{
    $fileName = $_FILES['image']['name'];
    $fileTmp = $_FILES['image']['tmp_name'];
    $fileSize = $_FILES['image']['size'];
    $fileType = $_FILES['image']['type'];
    $user = $_SESSION['username'];
    $ext = explode('.',$fileName);
    $actualExt = strtolower(end($ext));
    $allowedExt = ['jpg','jpeg','png','ico'];
            if(in_array($actualExt,$allowedExt)){
                $newName = './blogImg/'.uniqid('') . '.' .$actualExt;
                move_uploaded_file($fileTmp,$newName);
                $id = $_GET['id'];
        $sql = "UPDATE blogs SET title = '$title', message = '$message', category = '$category', image_path ='$newName' WHERE id ='$id'";
                if(mysqli_query($conn,$sql)){
                    $popup = "up";
                    header('location: admin.php');
                }
        }
    }
}
    ?>
    <!DOCTYPE html>
<?php include('./includes/header.php') ?>
<h1 class="text-3xl text-center text-gray-400 my-4">Edit a blog</h1>
    <form action="" method="post" class="w-80 md:w-96 mx-auto" enctype="multipart/form-data">
        <input type="text" required name="title" id="" class="w-full px-3 block bg-gray-800 placeholder-white text-white py-3 rounded-lg my-2" placeholder="Blog title" value="<?php echo $rows['title']; ?>">
        <textarea name="blogMessage" required id="" cols="30" rows="4" placeholder="Blog message" class="w-full px-3 resize-none block bg-gray-800 placeholder-white text-white py-3 rounded-lg my-2"><?php echo $rows['message'] ?></textarea>
        <select name="category"  id="" class="w-full px-3 resize-none block bg-gray-800 placeholder-white text-white py-3 rounded-lg my-2" value="<?php echo $rows['category'] ?>">
            <option value="Entertainment">Entertainment</option>
            <option value="Sports">Sports</option>
            <option value="Lifestyle">Lifestyle</option>
            <option value="Politics">Politics</option>
        </select>
        <input type="file" name="image" id=""  class="w-full px-3 resize-none block bg-gray-800 placeholder-white text-white py-3 rounded-lg my-2" value="<?php echo $rows['image_path']; ?>">
        <input type="submit" name="update" value="Update" class="block w-28 mx-auto text-center text-white rounded-lg bg-gray-800 py-3">
    </form>
    <?php if(isset($popup)){?>
    <div class="fixed w-screen top-0 h-screen overflow-hidden z-50 bg-black bg-opacity-60" id="popUp">
        <div class="w-80 mt-28 md:w-96 rounded-lg text-white bg-green-600 mx-auto px-12 py-8">
            <h1 class="text-white text-3xl font-bold text-center">Done</h1>
            <button class="w-12 h-12 block my-4 rounded-full bg-white text-gray-800" onclick="hidePopUp()">Ok</button>
        </div>
    </div>
    <?php } ?>
</body>
</html>