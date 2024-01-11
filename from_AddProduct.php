<?php
    session_start();
    include 'condb.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>

    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- sw2alte -->
    <script src="package/dist/sweetalert2.all.min.js"></script>

</head>
<body>
    <div class="container">
        <div class="row">
                <div class="col-sm-6">
                    <form name="form1" method="post" action="insert_product.php" enctype="multipart/form-data">
                        <div class="h3 text-center alert-primary mb-3 mt-4 " role="alert">เพิ่มรายการสินค้า</div>
                            
                        <label>ชื่อสินค้า : </label><br>
                            <input type="text" name="pname" class="form-control" placeholder="ชื่อสินค้า...." required><br>
                        
                            <label>ประเภทสินค้า : </label><br>
                            <select class="form-select" name="typeID" >
                                <?php  
                                    $sql = "SELECT * FROM type   ";
                                    $hand = mysqli_query($conn,$sql);
                                    

                                    while($rowT = mysqli_fetch_array($hand)){
                                ?>
                                    <option value="<?=$rowT['type_id']?>"><?=$rowT['type_name']?></option>
                                <?php } 
                                        mysqli_close($conn);//close connect
                                ?>                           
                            </select> <br>

                            <label>ราคา : </label><br>
                                <input type="number" name="price" class="form-control" placeholder="ราคาสินค้า...." required><br>
                            <label>จำนวน : </label><br>
                                <input type="number" name="num" class="form-control" placeholder="จำนวนสินค้า...." required><br>
                            <label>รูปภาพ : </label><br>
                                <input type="file" name="file1" accept="image/*" required><br><br>

                            <button type="submit" class="btn btn-success">submit</button>
                            <a href="show_product.php"  class="btn btn-danger" type="reset" >Cancel</a>
                                
                    </form>
                </div>
        </div>
    </div>


</body>
</html>

<?php
    if(isset($_SESSION['success'])){ ?>
    <script>
            Swal.fire({
        icon: 'success',
        text:'The Internet?'
    })
    </script>
<?php 
    unset($_SESSION['success']);
} ?>