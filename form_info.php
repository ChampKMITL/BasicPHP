<?php
//ทดสอบการเพิ่มข้อมูลเข้ามาดู
    include 'condb.php';

        $userid = $_POST['userid']; 
        echo $userid;

        
    $sql =  "SELECT * FROM member WHERE id = '$userid'  "; 
    $result = mysqli_query($conn,$sql);
    while( $row = mysqli_fetch_array($result) ){
    ?>

<table border="0" width ='100%'>
    <tr>
        <!-- <td width = "200"><img src="image/<?php echo$row['photo']; ?>"> -->
        <td style="padding: 20px;">
        <p>Name : <?php echo$row['name']; ?> </p><hr>
        <!-- <h4> <?=$row['id']?> </h4> -->
        <p>Surname : <?php echo$row['surname']; ?> </p>
        <p>Tel : <?php echo$row['tel']; ?> </p>
        </td>
    </tr>

</table>

<?php } ?>