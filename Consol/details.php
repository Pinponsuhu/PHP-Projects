<?php 
       include('./config.php');

       if(isset($_GET['ID'])){
        $id = mysqli_real_escape_string($conn,$_GET['ID']);
        $sql = "SELECT * FROM suggestions WHERE id ='$id'";

        $result = mysqli_query($conn,$sql);

        $suggestion = mysqli_fetch_all($result,MYSQLI_ASSOC);
       }
       if(isset($_POST['delete'])){
              $id = $_GET['ID'];
              $sql = "DELETE FROM suggestions WHERE id = '$id'";
              mysqli_query($conn,$sql);
              header('location: admin_page.php');
       }
?>
<!DOCTYPE html>
<?php include('./includes/header.php'); ?>
<main class="px-14 text-center w-screen">
       <?php foreach($suggestion as $ion){ ?>
       <h1 class="text-center font-medium uppercase text-3xl mt-14"><?php echo $ion['title']?> - <?php echo$ion['project'] ?></h1>
       <p class=""><?php echo $ion['message'] ?></p>
       <p class="text-right">created at : <?php echo $ion['created_at'] ?></p>
       <form action="" method="post">
       <input type="hidden" name="id_to_delete" value="">
        <button class="px-4 py-3 bg-yellow-400 text-gray-800 rounded-md block my-3" name="delete">Delete</button>
        </form>
       <?php } ?>
</main>
<?php
    include('./includes/footer.php');
?>