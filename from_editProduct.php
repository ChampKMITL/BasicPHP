<?php
    include 'condb.php';

    $idpro = $_GET["id"];
    

     //สินค้า    
    $sql =  "SELECT * FROM product WHERE pro_id  = '$idpro'  ";  
    $result = mysqli_query($conn,$sql);
    $rs = mysqli_fetch_array($result);
    $p_typeID = $rs['type_id'];
    //echo  $tid;

    //ประเภท
    // $sql2 =  "SELECT * FROM type WHERE type_id  = '$tid'  ";  
    // $result2 = mysqli_query($conn,$sql2);
    // $row2 = mysqli_fetch_array($result2);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>แก้ไขข้อมูลสินค้า</title>
</head>
<body>
    
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-sm-6"> 
            <div class="h3 text-center alert-info mb-3 mt-4" role="alert">แก้ไขข้อมูลสินค้า</div>   
                <form name="form1" method="POST" action="update_product.php" enctype="multipart/form-data" >
                    <label  >รหัสสินค้า :</label><br>
                        <input class="form-control" name="proid" type="text" value="<?=$rs["pro_id"]?>" readonly ><br>
                    <label  >ชื่อสินค้า :</label><br>
                        <input class="form-control" name="pname" type="text" value="<?=$rs["pro_name"]?>"  ><br>


                    <label >ประเภทสินค้า :</label><br>
                        <select class="form-select" name="typeID" ><br>
                            <?php 
                                $sql="SELECT * FROM type ORDER BY type_name";
                                $hand=mysqli_query($conn,$sql);
                                while($row=mysqli_fetch_array($hand)){
                                    $ttypeID = $row["type_id"];                              
                            ?>
                                <option value="<?=$row["type_id"]?>"<?php if($p_typeID==$ttypeID){echo "selected=selected"; } ?>>
                            <?=$row["type_name"]?></option>
                            <?php 
                            }
                            mysqli_close($conn);
                            ?>
                        </select>
                    
                    
                        <label>ราคา : </label><br>
                            <input type="number" name="price" class="form-control" value="<?=$rs["price"]?>"><br>
                    <label>จำนวน : </label><br>
                            <input type="number" name="amount" class="form-control" value="<?=$rs["amount"]?>" ><br>
                    <label>รูปภาพ : </label><br>
                            <img src="image/<?=$rs["image"]?>" width="120px" ><br><br>
                            <input type="file" name="file1" accept="image/*"> <br><br>
                            <input type="hidden" name="txtimg" class="form-control" value="<?=$rs["image"]?>"  ><br>

                        <div class="text-center">
                            <input type="submit" class="btn btn-info " value="อัปเดตสินค้า"  >
                            <a href="show_product.php" class="btn btn-danger ">ยกเลิก</a>
                        </div>        
                </form>
            </div>
        </div>        
    </div>
</body>
</html>

