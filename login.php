<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

    <title>Login</title>
</head>
<body>
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-5 badge bg-light text-dark">             
                <div class="alert alert-info mt-3" role="alert">
                    <h3>Login</h3>
                </div>
                <form method="POST" action="login_check.php">
                    <input type="text" name="username" class="form-control" required placeholder="username"><br>
                    <input type="password" name="password" class="form-control" required placeholder="password"><br>
                    
                    <?php
                        if(isset($_SESSION["Error"])){
                            //login check ส่งข้อความกลับมาที่  $_SESSION แล้ว แสเงเป็นสีตัวอักษร
                            echo"<div class='text-danger'>";
                                echo  $_SESSION["Error"];
                            echo"</div>";
                            //กรณีให้ alert แล้วกลับไปที่ login ใหม่
                            //echo"<script>alert('username หรือ pasword ไม่ถูกต้อง');</script>";
                        }
                    ?>
                    <input type="submit" name="submit" class="btn btn-primary" value="เข้าสู่ระบบ">
                    <a type="reset" href="login.php" name="cancel" class="btn btn-danger" > ยกเลิก</a> <br> <br>
                    <a class="btn btn-success  " href="form_register.php">สมาชิกใหม่</a>
                </form>
            </div>
        </div>
        
    </div>
</body>
</html>