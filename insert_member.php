<?php
    include 'condb.php';

    $f_name = $_POST["fname"];
    $l_name = $_POST["lname"];
    $tel = $_POST["tel"];

    //เช็ค Username
    $check = "SELECT name FROM member WHERE name = '$f_name' ";
    $result = mysqli_query($conn,$check);

    if(mysqli_num_rows($result) > 0){
        echo mysqli_num_rows($result);
    }
    else{
        echo "เพิ่มข้อมูลได้";
    }

exit();

    $sql = "INSERT INTO member(name, surname, tel) VALUES('$f_name', '$l_name','$tel')";

    $result = mysqli_query($conn,$sql);
    if($result){
        echo"<script>alert('เพิ่มข้อมูลสำเร็จ');</script>";
        echo"<script>window.location=('show_member.php');</script>";
    }else{
        echo"<script>alert('found Page');</script>";
    }    

    mysqli_close($conn);

?>