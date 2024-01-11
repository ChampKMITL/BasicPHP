<!-- บังคับ login มาก่อน -->
<?php
    session_start();
    if(!isset($_SESSION["username"])){ //ถ้ามีค่าว่างให้ทำอะไร โดยเอาค่าจากฐานข้อมูลมาเช็ค $_SESSION ที่ใน login_check
        //ใน if นี้หมายถึง $_SESSION["username"] เกิดการว่างเพราะไม่ได้ login ผ่านเข้ามา จึงให้กลับไปที่หน้า login
        header("location:login.php");

    }
?>
<!-- บังคับ login มาก่อน -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <title>Menu Index</title>
</head>
<body>
    <?php 
        include 'menu.php';
    ?>

    <div class="container mt-4 ">
    <div class="alert alert-info mt-3" role="alert">
                    <?php 
                        if(isset($_SESSION["firstname"])){
                            echo"<h3><div class='text-success'>";
                                echo"Wecome" . " " .  $_SESSION["firstname"] . " " . $_SESSION["lastname"] ;
                                echo"</div></h3>";
                        }
                        
                    ?> 
                    <h3>Type User : User</h3>
                    
                </div>
                <?php 
                        // if(isset($_SESSION["firstname"])){
                        //     echo"<h3><div class='text-success'>";
                        //         echo  $_SESSION["firstname"] . " " . $_SESSION["lastname"] ;
                        //     echo"</div></h3>";
                        // }
                    ?>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aspernatur qui maxime iusto alias dignissimos odio numquam doloribus rerum nisi repudiandae, eaque quis neque, minima harum ipsa facilis necessitatibus ullam culpa!</p>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>

</body>
</html>