<?php
    include 'condb.php';

    $idmenmber = $_GET["id"];


    $sql = "DELETE FROM member WHERE id = '$idmenmber' ";

    $result = mysqli_query($conn,$sql);
    if($result){
        echo"<script>alert('ลบข้อมูล สำเร็จ');</script>";
        echo"<script>window.location=('show_member.php');</script>";
    }else{
        echo"Error : " . $sql . "<br>" . mysqli_error($conn);
        echo"<script>alert('Found');</script>";
    }    

    mysqli_close($conn);

?>