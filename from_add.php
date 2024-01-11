


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>เพิ่มข้อมูล</title>
</head>
<body>

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-sm-6"> 
            <div class="h3 text-center alert-success mb-3 mt-4" role="alert">สมัครสมาชิก</div>   
                <form method="POST" action="insert_member.php" >
                    <label  >ชื่อ :</label><br>
                        <input class="form-control" name="fname" type="text" placeholder="กรอกชื่อ" aria-label="Name" required><br>
                    <label >นามสกุล :</label><br>
                        <input class="form-control" name="lname" type="text" placeholder="กรอกนามสกุล" aria-label="Surname"  required><br>
                    <label >เบอร์โทร :</label><br>
                        <input class="form-control" name="tel" type="number" placeholder="กรอกเบอร์โทร" aria-label="Tel" required><br>
                        
                        <div class="text-center">
                            <input type="submit" class="btn btn-info " value="เพิ่มข้อมููล">
                            <a href="show_member.php" class="btn btn-danger ">ยกเลิก</a>
                        </div>        
                </form>
            </div>
        </div>        
    </div>

    
</body>
</html>