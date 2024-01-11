<?php
    include 'condb.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- dataTable -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>


    <title>show product</title>
</head>
<body>
    <div class="container">
        <div class="h3 text-center alert-info mb-3 mt-4 " role="alert">รายการสินค้า</div>
            <a href="from_AddProduct.php" class="btn btn-success mb-4">เพิ่มสินค้า</a>
    <table  id="mytable"  class="display table table-striped table-hover table-bordered text-center mb-3" style="width:100%" >
        <thead>
            <tr>
                <th>ลำดับ</th>
                <th>รหัสสินค้า</th>
                <th>ชื่อสินค้า</th>
                <th>ประเภท</th>
                <th>ราคา</th>
                <th>จำนวน</th>
                <th>รูปภาพ</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
            
        <tbody> 
                    <?php
                        $sql = "SELECT * FROM product,type WHERE product.type_id = type.type_id  ";
                        $result = mysqli_query($conn,$sql);
                        
                        //แสดงเลขที่แถว
                        $count = 0;
                        //loop
                        while($row = mysqli_fetch_array($result)){
                            $count++
                    ?>   
            <tr>
                <td><?=$count?></td>
                <td><?=$row["pro_id"]?></td>
                <td><?=$row["pro_name"]?></td>
                <td><?=$row["type_id"]?></td>
                <td><?=$row["price"]?></td>
                <td><?=$row["amount"]?></td>
                <td><img src="image/<?=$row["image"]?>" width="120px" height="100px"> </td>
                <td><a href="from_editProduct.php?id=<?=$row["pro_id"]?> " class="btn btn-warning "  >Edit</a></td>
                <td><a href="delete_member.php?id=<?=$row["pro_id"]?> " class="btn btn-danger " onclick="Del(this.href);return false;">Delete</a></td>
            </tr>
                    <?php } ?>
        </tbody>
        
        <?php  
            mysqli_close($conn); //close db
        ?>

    </table>
        
    </div>

    <script type='text/javascript'>
            $(document).ready(function(){
                $('.editinfo').click(function(){
                    var pid = $(this).data('id');
                    $.ajax({
                        url: 'from_editProduct.php',
                        type: 'post',
                        data: {id: pid},
                        success: function(response){ 
                            $('.modal-body').html(response); 
                            $('#empModal').modal('show'); 
                        }
                    });
                });
            });
            </script>
        </div>
        
        <div class="modal fade" id="empModal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">User Info</h4>
                            <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>
                        <div class="modal-body">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
        </div>
        
        
        <script>
            $(document).ready(function () {
                $('#mytable').DataTable({
                    pageLength : 5,
                    lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']]
                    
                });
            });
        </script>
</body>
</html>