<?php
session_start();
if(!isset($_SESSION['matricNo'])){
    header('location:login.php');
}
?>
<!DOCTYPE html>
<?php
include('./includes/header.php');
?>
<main class="px-12 mt-6 overflow-x-hidden">
    <h1 class="w-20 text-center mb-4 border-b-4 border-gray-800 pb-1 text-2xl font-medium text-gray-800">About</h1>
    <p class="text-lg text-gray-800">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis eum odit eligendi minus, perferendis suscipit odio. Tempore, facere praesentium numquam iste eius neque porro voluptatum cumque hic aliquid nostrum quas corporis magnam, labore ullam distinctio consectetur sapiente architecto! Dignissimos, vel atque quisquam, reprehenderit repellendus error tenetur provident corporis modi aliquam dolore ullam, itaque obcaecati magnam commodi explicabo! Neque accusamus perspiciatis alias dolor laudantium. Nulla eum iste voluptates a amet? Voluptas nostrum natus architecto vitae distinctio ab nesciunt, delectus dolore repudiandae quae deserunt soluta dicta alias possimus debitis. Recusandae, non? Numquam odit quo voluptatibus architecto perspiciatis sint. Explicabo, excepturi!  Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt nemo, illum odio assumenda ex ipsum? Repellat ut consectetur, sunt ducimus facilis vel deserunt ad debitis quo omnis eveniet laboriosam quisquam neque eos saepe dolorem esse nemo iusto magnam tempora, earum ipsum praesentium. Quibusdam aliquam error saepe assumenda, facere repudiandae? Voluptates.</p>
</main>
<?php
include('./includes/footer.php');
?>