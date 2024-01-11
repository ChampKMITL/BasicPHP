<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <title>Register User</title>
</head>
<body>
    <div class="container">
            
                
            <div class="row justify-content-center">
                <div class="col-md-6  bg-light text-dark">             
            <div class="alert alert-success mt-3 text-center" role="alert">
                <h3>สมัครสมาชิก</h3>
            </div>
            <br>
            <form method="POST" action="insert_register.php">
                <h4>ชื่อ : </h4>
                    <input type="text" name="firstname" class="form-control" required>
                <br>
                <h4>นามสกุล : </h4>
                    <input type="text" name="lastname" class="form-control" required>
                <br>
                <h4>เบอร์โทร : </h4>
                    <input type="number" name="phone"  class="form-control" required>
                <br>
                <h4>Username : </h4>
                    <input type="text" name="username" maxlength="10" class="form-control" required>
                <br>
                <h4>Password : </h4>
                    <input type="password" name="password" maxlength="10" class="form-control" required>
                <br>
                <div class="text-center">
                    <input type="submit" name="submit" class="btn btn-primary" value="บันทึก">
                    <a type="reset" href="login.php" name="cancel" class="btn btn-danger" > ยกเลิก</a><br> <br>

                    <a class="btn btn-success " href="login.php">Login</a>
                </div>
            </form>
            </div>                  
        </div>
    </div>
</body>
</html>