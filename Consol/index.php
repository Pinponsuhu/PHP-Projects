<?php 
       include('./config.php');
       if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $project = $_POST['project'];
        $message = $_POST['message'];
        $sql = "INSERT INTO suggestions(title,project,message) VALUES ('$title','$project','$message')";
        if(mysqli_query($conn,$sql)){
            echo "<script> alert('Suggestion sent')</script>";
        }
       }
?>
<!DOCTYPE html>
<?php
    include('./includes/header.php');

?>
<main class="mt-6">
    <h1 class="text-center font-medium text-2xl">Write a suggestion</h1>
    <form action="index.php" class="mt-6 grid md:grid-cols-2 gap-x-8 md:px-40 px-16" method="POST">
    <input type="text" name="title" placeholder="Suggestion title" class="mb-3 rounded-md bg-yellow-50 py-3 px-2" required>
    <input type="text" name="project" placeholder="Project name" class="mb-3 rounded-md bg-yellow-50 py-3 px-2" required>
    <textarea name="message" id="" cols="30" rows="6" placeholder="Write suggestion here" class="md:col-span-2 mb-5 bg-white rounded-md px-2 py-3" required></textarea>
    <input type="submit" value="Submit" name="submit" class="md:col-span-2 bg-green-400 rounded-md px-5 py-3 w-24 mx-auto block text-center text-gray-100">
    </form>
</main>
    
<?php
    include('./includes/footer.php');
?>