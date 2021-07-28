<?php
    session_start();
    if(!isset($_SESSION['department'])){
        header('location: admin-login.php');
    }
    else{
        include('./config.php');
        $sql = "SELECT * FROM suggestions";
        $result = mysqli_query($conn,$sql);
        $suggestions = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
   
?>
<!DOCTYPE html>
    <?php 
        include('./includes/header.php');
    ?>
<main class="px-7 grid md:grid-cols-3 gap-x-8">
<a href="logout.php" class="md:col-span-3 underline">Logout</a>
<p class="md:col-span-3 mb-5">You are logged in as a <?php echo $_SESSION['department']?> personnel</p>
<?php foreach($suggestions as $suggestion){?>
    <div class="px-4 py-8 bg-white rounded-md mb-4 col-span-1 shadow-md">
        <h2 class="text-xl font-medium mb-3"><?php echo $suggestion['title'] ?></h2>
        <?php foreach(explode(" " ,$suggestion['created_at']) as $ion){?>
        <p><?php echo $ion ?></p>
        <?php } ?>
        <a href="details.php?ID=<?php echo $suggestion['ID'] ?>">See all</a>
        
    </div>
<?php } ?>
</main>