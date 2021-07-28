<?php 
   $conn =  mysqli_connect("localhost","root","","oasis");
   if(!$conn){
       echo "<script>alert('shazam')<?script>";
   }
?>