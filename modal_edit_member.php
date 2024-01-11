<?php
    include 'condb.php';

        $userid = $_POST['userid']; 
       // echo $userid ;

        
    $sql =  "SELECT * FROM member WHERE id = '$userid'  "; 
    $result = mysqli_query($conn,$sql);
    while( $row = mysqli_fetch_array($result) ){
    ?>
<form method="POST" action="update_member.php" >
                    <label  >รหัสสมาชิก :</label><br>
                        <input class="form-control" name="id" type="text" value="<?=$row["id"]?>" readonly ><br>
                    <label  >ชื่อ :</label><br>
                        <input class="form-control" name="fname" type="text" value="<?=$row["name"]?>"  ><br>
                    <label >นามสกุล :</label><br>
                        <input class="form-control" name="lname" type="text" value="<?=$row["surname"]?>"   ><br>
                    <label >เบอร์โทร :</label><br>
                        <input class="form-control" name="tel" type="number" value="<?=$row["tel"]?>"   ><br>
                        
                        <div class="text-center">
                            <input type="submit" class="btn btn-info " value="อัปเดต"  >
                            <a href="show_member.php" class="btn btn-danger ">ยกเลิก</a>
                        </div>        
                </form>

<?php } ?>


