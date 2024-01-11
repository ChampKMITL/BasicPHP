<?php
    session_start();
    include 'condb.php';

    

    $p_name = $_POST["pname"];
    $typeID = $_POST["typeID"];
    $price = $_POST["price"];
    $num = $_POST["num"];
    
    //อัพโหลดรูปภาพ
    if (is_uploaded_file($_FILES['file1']['tmp_name'])) { // เช็คว่ามีการกดปุ่มอัปโหลกไฟล์ไหม
        $new_image_name = 'pro_'.uniqid().".".pathinfo(basename($_FILES['file1']['name']), PATHINFO_EXTENSION); //pro_ เป็นคำนำหน้าชื่อไฟล์ที่จาก ramdom
        $image_upload_path = "./image/".$new_image_name; //เก็บไว้ที่
        move_uploaded_file($_FILES['file1']['tmp_name'],$image_upload_path);
        } else {
        $new_image_name = ""; //อัปเดตกรณีไม่กด = ใช้รูปเดิม
        }

    //คำสั่งเพิ่มข้อมูล สินค้า   
    $sql = "INSERT INTO product(pro_name,type_id, price, amount, image) 
        VALUES('$p_name','$typeID','$price','$num','$new_image_name')";

    $result = mysqli_query($conn,$sql);
    if($result){
        // echo"<script>alert('เพิ่มสินค้าสำเร็จ');</script>";
        // echo"<script>window.location=('show_product.php');</script>";
        $_SESSION['success'] = "successfully";
        //echo"<script>window.location='show_product.php'</script>";
        header( "location: from_AddProduct.php" );
        exit(0);
        
        
    }else{
        // echo"<script>alert('found Page');</script>";
        $_SESSION['error'] = "error";
    }    

    mysqli_close($conn);

?>