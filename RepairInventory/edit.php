<?php 
session_start();
if(!isset($_SESSION['id'])){
    header('location: admin.php');
}else{
if(isset($_GET['id'])){
    include('./includes/config.php');
    $id = $_GET['id'];
    $sql = "SELECT * FROM systems where id ='$id'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    if(isset($_POST['edit'])){
        $brand = $_POST['brand'];
        $submitted_to = $_POST['submitted_to'];
        $serial_No = $_POST['serial_No'];
        $submitted_by = $_POST['submitted_by'];
        $submitted_from = $_POST['submitted_from'];
        $sql = "UPDATE systems SET system_SN = '$serial_No', brand = '$brand', ICT_personnel = '$submitted_to',brought_in_by ='$submitted_by',department = '$submitted_from' WHERE id ='$id'";
        mysqli_query($conn,$sql);
        header('location: admin.php');
    }
}
}
?>
<!DOCTYPE html>
<?php include('./includes/header.php') ?>
<main>
<div id="addForm" class="mt-4">
        <h1 class="text-2xl md:text-3xl font-bold text-center text-blue-500 mb-3">Add new System</h1>
        <form action="" method="post" class="w-80 md:w-96 mx-auto">
            <label class="text-md font-medium mb-2 block">Serial Number</label>
            <input type="text" name="serial_No" id="" class="px-3 py-3 w-full block bg-gray-100 border-b-2 border-blue-500 rounded-lg" placeholder="Serial number" value="<?php echo $row['system_SN'] ?>">
            <label class="text-md font-medium mb-2 block mt-1">Brand</label>
            <input type="text" name="brand" id="" class="px-3 py-3 w-full block bg-gray-100 border-b-2 border-blue-500 rounded-lg" placeholder="Brand" value="<?php echo $row['brand'] ?>">
            <label class="text-md font-medium mb-2 block mt-1">Submtted to</label>
            <input type="text" name="submitted_to" id="" class="px-3 py-3 w-full block bg-gray-100 border-b-2 border-blue-500 rounded-lg" placeholder="ICT personnel" value="<?php echo $row['ICT_personnel'] ?>">
            <label class="text-md font-medium mb-2 block mt-1">Submtted By</label>
            <input type="text" name="submitted_by" id="" class="px-3 py-3 w-full block bg-gray-100 border-b-2 border-blue-500 rounded-lg" placeholder="Submitted by" value="<?php echo $row['brought_in_by'] ?>">
            <label class="text-md font-medium mb-2 block mt-1">Submtted From</label>
            <input type="text" name="submitted_from" id="" class="px-3 py-3 w-full block bg-gray-100 border-b-2 border-blue-500 rounded-lg" placeholder="Owner of device" value="<?php echo $row['department'] ?>">
            <div class="flex justify-center">
            <button class="w-24 rounded-lg bg-blue-500 text-white font-medium mx-auto block mt-3 mr-3 shadow-md py-3" name="edit">Submit</button>
            </div>
        </form>
</div>
</main>