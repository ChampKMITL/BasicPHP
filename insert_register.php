
<!-- <script src="bootstrap/js/bootstrap.bundle.min.js"></script> -->
<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
<script src="jquery/jquery3.7.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
    include 'condb.php';
    //รับค่าตัวแปรจากไฟล์ register
    $fname = mysqli_real_escape_string($conn,$_POST['firstname']);
    $lname = mysqli_real_escape_string($conn,$_POST['lastname']);
    $phone = mysqli_real_escape_string($conn,$_POST['phone']);
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    //เข้ารหัสแบบ sha512
    $password = hash('sha512',$password);

    //คำสั่งเพิ่มข้อมูล status defult = 0 คือ user
    $sql = "INSERT INTO user(firstname, lastname, telephone, username, password,status) 
            VALUES('$fname', '$lname','$phone','$username','$password','0')";
    $result = mysqli_query($conn,$sql);

    if($result){

        // echo"<script>alert('เพิ่มผู้ใช้งานสำเร็จ');</script>";
        echo"<script>
            $(document).ready(function() {
                Swal.fire({
                    position: 'top',
                    icon: 'success',
                    title: 'เพิ่มข้อมูล $fname สำเร็จ',
                    showConfirmButton: false,
                    timer: 2000
                });
            });
        </script>";
        //echo"<script>window.location=('login.php');</script>";
        header("refresh:2; url =login.php");
    }
    else{
        echo "Error : " . $sql . "<br>" . mysqli_error($conn);
        echo"<script>alert('เพิ่มผู้ใช้งาน ไม่สำเร็จ');</script>";
        
    }

    //close DB
    mysqli_close($conn);
?>