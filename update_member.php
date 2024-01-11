<?php
    include 'condb.php';

    $idmenmber = $_POST['id'];
    $f_name = $_POST['fname'];
    $l_name = $_POST['lname'];
    $tel = $_POST['tel'];


    $sql = "UPDATE member set name='$f_name', surname='$l_name', tel='$tel'  WHERE id = '$idmenmber' ";
    $result = mysqli_query($conn,$sql);
    if($result){
        echo"<script>alert('อัปเดตข้อมูลสำเร็จ ID: $idmenmber');</script>";
        echo"<script>window.location=('show_member.php');</script>";
    }else{
        echo"Error : " . $sql . "<br>" . mysqli_error($conn);
        echo"<script>alert('Found');</script>";
    }    

    mysqli_close($conn);

?>