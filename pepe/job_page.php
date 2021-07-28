<?php
if (isset($_POST['submit'])) {
    include('./includes/config.php');
    $gender = mysqli_real_escape_string($conn,$_POST['gender']);
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $phoneNumber = mysqli_real_escape_string($conn,$_POST['phoneNumber']);
    $date = mysqli_real_escape_string($conn,$_POST['dateOfBirth']);
    $jobPosition =  mysqli_real_escape_string($conn,$_POST['jobPosition']);
    $qualification = mysqli_real_escape_string($conn,$_POST['qualification']);
    $cv = $_FILES['cv'];
    $cvName = $_FILES['cv']['name'];
    $cvSize = $_FILES['cv']['size'];
    $cvTmp = $_FILES['cv']['tmp_name'];
    $ext = explode('.',$cvName);
    $actualExt = strtolower(end($ext));
    $allowExt = ['doc','docx'];
    $dir = "./files/";
    echo "<script>alert('$cvName')</script>";
    if(in_array($actualExt,$allowExt)){
        if($cvSize < 1000000){
            if($jobPosition == 0){
                echo "<script>alert('Select a Job position')</script>";
            }else{
                if($gender == 0){
                    echo "<script>alert('Select a gender')</script>";
                }else{
                    if($qualification == 0){
                        echo "<script>alert('Select your qualification')</script>";
                    }else{
                        // 
                        $newName = $dir . uniqid(''). '.' . $actualExt;
                        $sql = "INSERT INTO applicants (full_name,email,phone_number,gender,qualification,date_of_birth,file_path,job_position) VALUES ('$fullName','$email','$phoneNumber','$gender','$qualification','$date','$newName','$jobPosition')";
                        if(mysqli_query($conn,$sql)){
                            move_uploaded_file($cvTmp,$newName);
                            echo "alert('done')" . mysqli_error($conn);
                        }else{
                         echo "fuck" . mysqli_error($conn);
                        }
                    }
                }
            }
        }else{
            echo "<script>alert('File is greater than 1MB')</script>";
        }
    }else{
        echo "<script>alert('File format is invalid')</script>";
    }
    // echo "<script>alert('$cv')</script>";
}
?>
<!DOCTYPE html>
<?php
include('./includes/header.php');
?>
<main>
    <div class="mt-24">
        <h1 class="font-bold text-2xl text-center text-yellow-500 mb-2">Job Application Screening Form</h1>
        <p class="text-white text-center px-10 md:px-24">The Lagos State Ministry of Science and Technology has vacancies in the following Job positions: Network Administrator, Database Administrator, Software Developer, Software Test Engineer (STE), Programmer Analyst, Web Developer, Information Technology Specialist, Applicants are required to fill out the form below.</p>
    </div>
    <form action="" method="post"  enctype="multipart/form-data">
    <div class="md:flex mt-8 md:justify-around md:px-36 items-center gap-x-4 px-12 mx-auto">
        <div>
            <input type="text" name="fullName" class="mt-2 block mx-auto md:mx-0 w-80 py-3 px-3 text-gray-800 capitalize bg-white rounded-lg" id="" required placeholder="Full name">
            <input type="email" class="mt-2 mx-auto md:mx-0 block w-80 py-3 px-3 text-gray-800 bg-white rounded-lg lowercase" name="email" id="" required placeholder="Email address">
            <input type="number" class="mt-2 mx-auto md:mx-0 block w-80 py-3 px-3 text-gray-800 bg-white rounded-lg" name="phoneNumber" id="" required placeholder="Phone number" minlength="11" maxlength="11">
            <p class="text-sm text-yellow-500 text-center md:text-left block  mb-2 mt-1">(Date of birth)</p>
            <input type="date" class="mt-2 block mx-auto md:mx-0 w-80 py-3 px-3 text-gray-800 bg-white rounded-lg" name="dateOfBirth" id="" required>
        </div>
        <div>
            <select class="block py-3 mx-auto md:mx-0 mt-2 rounded-lg w-80 px-3 bg-white text-gray-800" name="gender" required>
                <option value="0">-- Select Gender --</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <select class="block py-3 mx-auto md:mx-0 mt-2 rounded-lg w-80 px-3 bg-white text-gray-800" name="jobPosition" required>
                <option value="0">-- Preferred Job Position --</option>
                <option value="Database Administrator">Database Administrator</option>
                <option value="Software Developer">Software Developer </option>
                <option value="Software Test Engineer (STE)">Software Test Engineer (STE)</option>
                <option value="Programmer Analyst">Programmer Analyst</option>
                <option value="Web Developer">Web Developer</option>
                <option value="Information Technology Specialist">Information Technology Specialist</option>
                <option value="Network Administrator">Network Administrator</option>
            </select>
            <select class="block mx-auto md:mx-0 mt-2 py-3 rounded-lg w-80 px-3 bg-white text-gray-800" required name="qualification">
        <option value="0">-- Select Qualification --</option>
        <option value="Bachelor's Degree">Bachelor's Degree</option>
        <option value="Master's Degree">Master's Degree</option>
        <option value="Doctor of Philosopher(PhD)">Doctor of Philosopher(PhD)</option>
        </select>
        <p class="text-sm mx-auto md:mx-0 text-yellow-400 mt-1 text-center md:text-left mb-2">(Soft copy of your CV in docx or doc format)</p>
        <input name="cv" class="mt-2 mx-auto md:mx-0 block py-3 rounded-lg w-80 px-3 bg-white text-gray-800" required type="file">
        </div>
    </div>
        <button name="submit" class="block py-3 mx-auto rounded-lg col-span-2 w-24 px-3 bg-yellow-500 mt-4 text-gray-800">Submit</button>
    </form>
</main>
</body>

</html>