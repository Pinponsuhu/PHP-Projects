<?php
    session_start();
    if(isset($_SESSION['id'])){
        include('./includes/config.php');
        $sql = "SELECT * FROM systems";
        $result = mysqli_query($conn,$sql);
        
        $result_per_page = 10;
        $number_of_result = mysqli_num_rows($result);
        
        $number_of_pages = ceil($number_of_result / $result_per_page);
        if(!isset($_GET['page'])){
            $page =1;
        }else{
            $page = $_GET['page'];
        }
         $starting_limit = ($page -1)*$result_per_page;
         $sql = "SELECT * FROM systems LIMIT " . $starting_limit . ',' . $result_per_page;
         $result = mysqli_query($conn,$sql);
         $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);

         if(isset($_POST['add'])){
            $serialNo = $_POST['serial_No'];
            $brand = $_POST['brand'];
            $submitted_to = $_POST['submitted_to'];
            $submitted_by = $_POST['submitted_by'];
            $submitted_from = $_POST['submitted_from'];
            $date_submitted = date("Y-m-d");
            $sql = "INSERT INTO systems (system_SN,brand,date_created,ICT_personnel,brought_in_by,department) VALUES ('$serialNo','$brand','$date_submitted','$submitted_to','$submitted_by','$submitted_from')";
            mysqli_query($conn,$sql);
            header('location:admin.php');
         }
    }else{
        header('location: index.php');
    }
?>
<!DOCTYPE html>
<?php 
    include('./includes/header.php');
?>
<main class="mt-20 px-6 w-screen" id="results">
    <div class="mb-6 w-screen">
    <h1 class="text-blue-500 ml-12">Page <?php echo $page?> of <?php echo $number_of_pages?></h1>
    <h1 class="text-center text-blue-500 font-bold text-3xl mb-6">System Inventory</h1>
    <div class="flex items-center">
    <h1><a href="logout.php" class="ml-4 w-24 rounded-lg py-2 px-4 bg-blue-700 text-white font-medium text-center mb-4">Logout</a></h1>
    <button onclick="clsResults()" class="py-2 bg-green-500 w-16 text-white font-medium rounded-lg ml-3 hover:bg-green-600">Add</button>
    </div>
    </div>
    <div class=" overflow-x-scroll" id="table">
    <table class="w-screen rounded-lg">
        <tr class="">
            <th class="text-center py-3 text-md bg-blue-500 text-white">Serial Number</th>
            <th class="text-center py-3 text-md bg-blue-500 text-white">Brand</th>
            <th class="text-center py-3 text-md bg-blue-500 text-white">Submitted on</th>
            <th class="text-center py-3 text-md bg-blue-500 text-white">Submitted to</th>
            <th class="text-center py-3 text-md bg-blue-500 text-white">Submitted by</th>
            <th class="text-center py-3 text-md bg-blue-500 text-white">Submiited from</th>
        </tr>
        <?php foreach($rows as $row){ ?>
        <tr class="py-3 mt-2 px-3">
            <td class="text-center py-3 px-2 text-md bg-blue-100 capitalize text-gray-800"><?php echo $row['system_SN'] ?></td>
            <td class="text-center py-3 px-2 text-md bg-gray-100 text-gray-800 uppercase"><?php echo $row['brand'] ?></td>
            <td class="text-center py-3 px-2 text-md bg-blue-100 text-gray-800"><?php echo $row['date_created'] ?></td>
            <td class="text-center py-3 px-2 text-md bg-gray-100 text-gray-800 capitalize"><?php echo $row['ICT_personnel'] ?></td>
            <td class="text-center py-3 px-2 text-md bg-blue-100 text-gray-800 capitalize"><?php echo $row['brought_in_by'] ?></td>
            <td class="text-center py-3 px-2 text-md bg-gray-100 capitalize text-gray-800"><?php echo $row['department'] ?></td>
            <td><a href="edit.php?id=<?php echo $row['id'] ?>" class="border-2 bg-green-600 px-3 text-white font-medium py-2 border-green-500">Edit</a></td>
            <td><a href="./delete.php?id=<?php echo $row['id'] ?>" class="border-2 bg-red-600 px-3 text-white font-medium py-2 border-red-500">Delete</a></td>
        </tr>

        <?php } ?>
    </table>
    </div>
    <div class="flex justify-center mx-auto mt-12">
    <?php
        for($page=1;$page<= $number_of_pages;$page++){
            echo '<a href="admin.php?page=' . $page . '" class="block px-4 py-2 bg-blue-500 rounded-md font-medium mx-1 text-white">' . $page . '</a>';
        }
    
    ?>
    </div>
</main>
<div id="addForm" class="mt-4 hidden">
        <h1 class="text-2xl md:text-3xl font-bold text-center text-blue-500 mb-3">Add new System</h1>
        <form action="" method="post" class="w-80 md:w-96 mx-auto">
            <label class="text-md font-medium mb-2 block">Serial Number</label>
            <input type="text" name="serial_No" id="" class="px-3 py-3 w-full block bg-gray-100 border-b-2 border-blue-500 rounded-lg" placeholder="Serial number">
            <label class="text-md font-medium mb-2 block mt-1">Brand</label>
            <input type="text" name="brand" id="" class="px-3 py-3 w-full block bg-gray-100 border-b-2 border-blue-500 rounded-lg" placeholder="Brand">
            <label class="text-md font-medium mb-2 block mt-1">Submtted to</label>
            <input type="text" name="submitted_to" id="" class="px-3 py-3 w-full block bg-gray-100 border-b-2 border-blue-500 rounded-lg" placeholder="ICT personnel">
            <label class="text-md font-medium mb-2 block mt-1">Submtted By</label>
            <input type="text" name="submitted_by" id="" class="px-3 py-3 w-full block bg-gray-100 border-b-2 border-blue-500 rounded-lg" placeholder="Submitted by">
            <label class="text-md font-medium mb-2 block mt-1">Submtted From</label>
            <input type="text" name="submitted_from" id="" class="px-3 py-3 w-full block bg-gray-100 border-b-2 border-blue-500 rounded-lg" placeholder="Owner of device">
            <div class="flex justify-center">
            <button class="w-24 rounded-lg bg-blue-500 text-white font-medium mx-auto block mt-3 mr-3 shadow-md py-3" name="add">Submit</button>
            <button onclick="showResults()" class="w-24 rounded-lg bg-green-500 text-white font-medium mx-auto block mt-3 shadow-md py-3">Close</button>
            </div>
        </form>
</div>
</body>
</html>