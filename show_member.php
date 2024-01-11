<?php
    include 'condb.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show</title>
    
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>



</head>
<body>

    
    <div class="container ">
    <div class="h3 text-center alert-success mb-3 mt-4 " role="alert">รายการสมาชิก</div>
    <a  class="insertmember btn btn-success mb-4">เพิ่มข้อมูล</a>
        <table  id="myTable"  class="display table table-striped table-hover table-bordered text-center" > 
        
        <thead>
            <tr>
                <th>ลำดับ</th>
                <th>ID</th>
                <th>NAME</th>
                <th>SURNAME</th>
                <th>TEL</th>
                <th>Info</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
            <?php
                $sql = "SELECT * FROM member";
                $result = mysqli_query($conn,$sql);
                
                //แสดงเลขที่แถว
                $count = 0;
                //loop
                while($row = mysqli_fetch_array($result)){
                    $count++
            ?>
        <tbody>    
            <tr>
                <td><?=$count?></td>
                <td><?=$row["id"]?></td>
                <td><?=$row["name"]?></td>
                <td><?=$row["surname"]?></td>
                <td><?=$row["tel"]?></td>
                <td><button data-id='<?php echo $row["id"]; ?>' class="userinfo btn btn-info "  >Info</button></td>
                <td><a data-id='<?=$row["id"];?>' class="useredit btn btn-warning "  >Edit</a></td>
                <!-- <td><a href="form_edit.php?id=<?=$row["id"]?> " class="useredit btn btn-warning "  >Edit</a></td> -->
                <td><a href="delete_member.php?id=<?=$row["id"]?> " class="btn btn-danger " onclick="Del(this.href);return false;">Delete</a></td>
            </tr>
                                                <?php } ?>
        </tbody>
        
        <?php  
        
            mysqli_close($conn); //close db
        ?>

    </table>
    <!-- start Modal -->
        <!-- Modal -->
            <div class="modal fade" id="memberModal" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" ></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                </div>
                <div class="modal-footer ">
                <div class="flex-container">
                    <!-- <button type="submit" class="btn btn-success text-left" >อัปเดต</button> -->
                </div>
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                    
                </div>
                </div>
            </div>
            </div>
    <!-- end Modal -->

    </div>
    <!-- script ajax call modal  -->
                <script type="text/javascript">
                    /*******************************************************info User******************************************** */
                    $(document).ready(function(){
                        $('.userinfo').click(function(){
                            var userid = $(this).data('id');
                            //alert(userid)
                            $.ajax({
                                url: 'form_info.php',
                                //url: 'modal_edit_member.php',
                                type: 'post',
                                data: {userid: userid},
                                success: function(response){
                                    $('.modal-body').html(response);
                                    $('#memberModal').modal('show');
                                }
                            })
                        });
                    });
    /*******************************************************Edit User******************************************** */
                    $(document).ready(function(){
                        $('.useredit').click(function(){
                            var userid = $(this).data('id');
                            //alert(userid)
                            $.ajax({
                                //url: 'form_info.php',
                                url: 'modal_edit_member.php',
                                type: 'post',
                                data: {userid: userid},
                                success: function(response){
                                    $('.modal-body').html(response);
                                    $('#memberModal').modal('show');
                                }
                            })
                        });
                    });
    /*******************************************************insert User******************************************** */
                    $(document).ready(function(){
                        $('.insertmember').click(function(){
                           // var userid = $(this).data('id');
                            //alert(userid)
                            $.ajax({
                                //url: 'form_info.php',
                                url: 'modal_insert_member.php',
                                type: 'post',
                                //data: {userid: userid},
                                success: function(response){
                                    $('.modal-body').html(response);
                                    $('#memberModal').modal('show');
                                }
                            })
                        });
                    });
                </script>


</body>
</html>

<script language="JavaScript">
        function Del(mypage){
            var agree=confirm("ยืนยันการลบ");
            if(agree){
                window.location=mypage;
            }
        }
           
</script>

