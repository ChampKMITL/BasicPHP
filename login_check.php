<?php
    include 'condb.php';
    session_start();



    //$username = $_POST['username'];
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    //$username = $_POST['username'];
    //$password = $_POST['password'];
    


    //เข้ารหัสแบบ sha512
    $password = hash('sha512',$password);

    //เช็คข้อมูลที่ login
    $sql = "SELECT * FROM user 
                WHERE username='$username' and password = '$password' ";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    //status User
    $status = $row['status'];
    //set ค่าใน session
    if($row > 0){
        $_SESSION["username"]= $row["username"];
        $_SESSION["pw"]= $row["password"];
        $_SESSION["firstname"]= $row["firstname"];
        $_SESSION["lastname"]= $row["lastname"];

        //check user
        if($status == '0'){
            //Is user
            $show = header("location:index.php");
        }
        else if($status == '1'){
            //Is admin
            $show = header("location:admin.php");
        }
        //check user

    }else{
        //$_SESSION["Error"] = "<p> $username  Your Username or Password is invalid!! </p>";
        $_SESSION["Error"] = "<p> Your Username or Password is invalid!! </p>";
        //echo "<script>alert('username หรือ pasword ไม่ถูกต้อง');</script>";
        
        $show = header("location:login.php");
    }
    echo $show;

?>