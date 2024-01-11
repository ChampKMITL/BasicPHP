<?php
    include 'condb.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

    <title>Menu Product</title>
</head>

<body>
    <?php
    include 'menu.php';
    ?>


    <div class="container mt-3">
<!-- ------------------------------------Form search type----------------------------------------------------------- -->
    <form method="POST" action="sh_product.php">
<!-- ------------------------------------Form search type--------------------------------------------------------- -->
<!-- ------------------------------------start Row serach ------------------------------------------------- -->
        <div class="row">
            <div class="col-md-3" >
                <select class="form-select " name="key_type" aria-label="Default select example">
                    
<!-- ------------------------------------search type PHP----------------------- -->
                <?php
                $sql3 = "SELECT * FROM type_product GROUP BY type_name
                order by type_id ";
                $hand3 = mysqli_query($conn, $sql3);
                while ($row = mysqli_fetch_array($hand3)) {
//  -------------------------------------------- PHP------------------------------------------------------
                ?>
                    <option value="<?=$row['type_id']?>"><?=$row['type_name']?> </option>
                <?php 
                } 
                //mysqli_close($conn);
                ?>
                </select>              
            </div>
                <div class="col-3">
                    <h2>test</h2>
                    <button type="submit" name="btn1" class="btn btn-info">Search</button>
                    <button type="submit" name="btn2" class="btn btn-primary">ALL</button>
                </div>
        </div>
    </form>
<!-- ------------------------------------end row sreach----------------------- -->



        <div class="row">           <!-- ------------------------------------ROW Product----------------------- -->
            <!-- ------------------------------------PHP----------------------- -->
            <?php
            
            //แบ่งหน้าเพจ
            $perpage = 4; //ทีละ 4 row
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = 1;
            }
            $start = ($page - 1) * $perpage;

            //ค้นหาข้อมูลในช่องค้นหา
            $key_word = @$_POST['keyword']; //@ใส่เพราะถ้าไม่มีข้อมูลมาก็ไม่มีอะไร
            if ($key_word != "") {
                $sql = "SELECT * FROM product 
                            WHERE  pro_id='$key_word' or pro_name like '%$key_word%' or price <= '$key_word'
                            ORDER BY pro_id limit {$start},{$perpage}";
            } else {
                //show product แสดงข้อมูลปกติกรณีไม่ได้ค้นหา
                $sql = "SELECT * FROM product ORDER BY pro_id limit {$start},{$perpage}";
            }

            //ค้นหาข้อมูลประเภท
            $keytype = @$_POST['key_type']; //@ใส่เพราะถ้าไม่มีข้อมูลมาก็ไม่มีอะไร
            if (isset($_POST['btn1'])) {
                //ไม่การเลือกประเภทแล้วกดค้นหา 
                $sql = "SELECT * FROM type_product WHERE type_id = '$keytype' 
                    order by pro_id ";
                
            } 
            elseif (isset($_POST['btn2']))
                {
                    //show product แสดงข้อมูลปกติกรณีไม่ได้ค้นหา หรือกดปุ่ม All
                $sql = "SELECT * FROM product ORDER BY pro_id limit {$start},{$perpage}";
                }
            
            
            

            // show product
            //$sql = "SELECT * FROM product ORDER BY pro_id limit {$start},{$perpage}";
            $hand = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($hand)) {
                $formatted_price = number_format($row['price'], 2, '.', ',');


            ?>
            <!-- ------------------------------------PHP----------------------------------------------- -->
                <div class="col-sm-3 mt-4">
                    <img src="image/<?= $row['image'] ?>" width="250" height="250" class="mt-4 p-2 my-3 border"> <br>
                    ID: <?= $row['pro_id'] ?> <br>
                    <h5 class="text-success"><?= $row['pro_name'] ?></h5>
                    ราคา :
                    <b class="text-danger"><?= $formatted_price ?> บาท</b> <br>
                    <a href="#" class="btn btn-success mt-2">Add</a>
                </div>
            <?php
            }
            //mysqli_close($conn);//close db
            ?>
        </div> <!-- end row -->
<!-- ------------------------------------PHP----------------------------------------------- -->
        <?php
        //นำข้อมูลมา
        $sql1 = "SELECT * FROM product";
        $result = mysqli_query($conn, $sql1);
        $total_record = mysqli_num_rows($result);
        $total_page = ceil($total_record / $perpage);
        ?>
<!-- ------------------------------------PHP----------------------------------------------- -->
        <nav aria-label="Page navigation example">
            <ul class="pagination mt-5 justify-content-center">
                <li class="page-item"><a class="page-link" href="sh_product.php?page=1">Previous</a></li>
                <!-- ------------------------------------PHP----------------------------------------------- -->
                <?php for ($i = 1; $i <= $total_page; $i++) { ?> <!-- loop page -->
                    <li class="page-item " aria-current="page"><a class="page-link" href="sh_product.php?page=<?= $i ?>"><?= $i ?></a></li>
                <?php } ?>
                <!-- ------------------------------------PHP----------------------------------------------- -->
                <li class="page-item"><a class="page-link" href="sh_product.php?page=<?= $total_page ?>">Next</a></li>
            </ul>
        </nav>
        <?php mysqli_close($conn); //close db 
        ?>
    </div> <!-- end container -->
</body>

</html>