<?php
    session_start();
    if(isset($_SESSION['id'])){
        include('./includes/config.php');
        $sql = "SELECT * FROM applicants";
        $result = mysqli_query($conn,$sql);
        
        $result_per_page = 2;
        $number_of_result = mysqli_num_rows($result);
        
        $number_of_pages = ceil($number_of_result / $result_per_page);
        if(!isset($_GET['page'])){
            $page =1;
        }else{
            $page = $_GET['page'];
        }
         $starting_limit = ($page -1)*$result_per_page;
         $sql = "SELECT * FROM applicants LIMIT " . $starting_limit . ',' . $result_per_page;
         $result = mysqli_query($conn,$sql);
         $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
    }else{
        header('location: login.php');
    }
?>
<!DOCTYPE html>
<?php 
    include('./includes/header.php');
?>
<main class="mt-24">
    <h1 class="text-yellow-500 ml-12">Page <?php echo $page?> of <?php echo $number_of_pages?></h1>
    <h1 class="text-center text-yellow-500 font-medium text-2xl mb-6">Admin page</h1>
    <div class="px-7">
    <table class="w-full rounded-lg">
        <tr class="">
            <th class="text-center py-3 text-md bg-yellow-500 text-gray-800">Full Name</th>
            <th class="text-center py-3 text-md bg-yellow-500 text-gray-800">Email</th>
            <th class="text-center py-3 text-md bg-yellow-500 text-gray-800">Phone Number</th>
            <th class="text-center py-3 text-md bg-yellow-500 text-gray-800">Gender</th>
            <th class="text-center py-3 text-md bg-yellow-500 text-gray-800">Qualification</th>
            <th class="text-center py-3 text-md bg-yellow-500 text-gray-800">Date of Birth</th>
            <th class="text-center py-3 text-md bg-yellow-500 text-gray-800">Aspiring Position</th>
        </tr>
        <?php foreach($rows as $row){ ?>
        <tr class="py-3 mt-2 px-3">
            <td class="text-center py-3 px-2 text-md bg-white capitalize text-gray-800"><?php echo $row['full_name'] ?></td>
            <td class="text-center py-3 px-2 text-md bg-gray-100 lowercase text-gray-800"><?php echo $row['email'] ?></td>
            <td class="text-center py-3 px-2 text-md bg-white text-gray-800"><?php echo $row['phone_number'] ?></td>
            <td class="text-center py-3 px-2 text-md bg-gray-100 text-gray-800"><?php echo $row['gender'] ?></td>
            <td class="text-center py-3 px-2 text-md bg-white text-gray-800"><?php echo $row['qualification'] ?></td>
            <td class="text-center py-3 px-2 text-md bg-gray-100 text-gray-800"><?php echo $row['date_of_birth'] ?></td>
            <td class="text-center py-3 px-2 text-md bg-white text-gray-800"><?php echo $row['job_position'] ?></td>
            <td><a href="approve.php?id=<?php echo $row['id'] ?>" class="border-2 py-2 px-3 bg-green-600 border-green-500 ml-1">Approve</a></td>
            <td><a href="delete.php?id=<?php echo $row['id'] ?>" class="border-2 bg-red-600 px-3 py-2 border-red-500 mx-1">Delete</a></td>
            <td><a href="<?php echo $row['file_path'] ?>" class="border-2 bg-blue-600 px-3 py-2 border-blue-500" download="">Download</a></td>
        </tr>

        <?php } ?>
    </table>
    </div>
</main>
<div class="flex justify-center mx-auto mt-12">
    <?php
        for($page=1;$page<= $number_of_pages;$page++){
            echo '<a href="admin_page.php?page=' . $page . '" class="block px-4 py-2 bg-white rounded-md font-medium mx-1 text-gray-800">' . $page . '</a>';
        }
    
    ?>
    </div>
</body>
</html>