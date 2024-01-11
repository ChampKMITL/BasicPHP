
<?php
    include 'condb.php';

    $proid = $_POST['proid'];
    $proname = $_POST['pname'];
    $typeid = $_POST['typeID'];
    $price = $_POST['price'];
    $amount = $_POST['amount'];
    $image = $_POST['txtimg'];


    //echo  $proid;


    //อัพโหลดรูปภาพ
    if (is_uploaded_file($_FILES['file1']['tmp_name'])) { // เช็คว่ามีการกดปุ่มอัปโหลกไฟล์ไหม
        $new_image_name = 'pro_'.uniqid().".".pathinfo(basename($_FILES['file1']['name']), PATHINFO_EXTENSION); //pro_ เป็นคำนำหน้าชื่อไฟล์ที่จาก ramdom
        $image_upload_path = "./image/".$new_image_name; //เก็บไว้ที่
        move_uploaded_file($_FILES['file1']['tmp_name'],$image_upload_path);
        } else {
        $new_image_name = "$image"; //อัปเดตกรณีไม่กด = ใช้รูปเดิม
        }

    // update 
    $sql = "UPDATE product SET 
    pro_name='$proname', 
    type_id ='$typeid', 
    price='$price',
    amount='$amount', 
    image ='$new_image_name'
    WHERE pro_id = '$proid' ";

    try{

        $result = mysqli_query($conn,$sql);
        if($result){
            echo"<script>alert('อัปเดตข้อมูลสินค้าสำเร็จ');</script>";
            echo"<script>window.location=('show_product.php');</script>";
        }else{
            echo"Error : " . $sql . "<br>" . mysqli_error($conn);
            echo"<script>alert('Found');</script>";
        }    

    
        //place code here that could potentially throw an exception
        }
    catch(Exception $e)
        {
        echo "Conn found : " . $e->getMessage();
    
        }

    mysqli_close($conn);



?>