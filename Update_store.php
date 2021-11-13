<?php

//get id
$id = $_GET['id'];

//lấy thông tin
$result = pg_query($conn, "SELECT* FROM public.store WHERE storeid='{$id}'");
$row = pg_fetch_assoc($result);

// Nếu là sự kiện đăng ký thì xử lý
if (isset($_POST['addnew'])) {

    //Nhúng file kết nối với database
    include_once('connection.php');

    //Lấy dữ liệu từ file 
    $storeid   = $_POST['txtId'];
    $storename = $_POST['txtName'];
    $storeaddress = $_POST['txtStoreAddress'];
    $phone      = $_POST['txtPhone'];

    $result = pg_query($conn, "UPDATE public.store SET storeid='{$storeid}',storename='{$storename}',address='{$storeaddress}',phonenumber= '{$phone}'
    WHERE storeid='{$storeid}'");

    if ($result) {
        echo "Success";
        echo '<meta http-equiv="refresh" content="0;URL=?page=store"/>';
    } else
        echo "Erorr!!!. <a href='?page=store'>Again</a>";
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
</head>

<body>
    <div class="container">
        <form action="" method="POST">
            <div class="form-group">
                <label for="exampleInput">Store ID</label>
                <input type="text" name="txtId" class="form-control" id="exampleInput" readonly aria-describedby="" placeholder="CH1" value="<?php echo $row['storeid'] ?>" readonly>
            </div>
            <div class="form-group">
                <label for="exampleInput">Store Name</label>
                <input type="text" name="txtName" class="form-control" id="exampleInput" aria-describedby="" placeholder="CH1" value="<?php echo $row['storename'] ?>">
            </div>
            <div class="form-group">
                <label for="example">Store Address</label>
                <input type="text" name="txtStoreAddress" class="form-control" id="exampleInput" placeholder="Can Tho" value="<?php echo $row['address'] ?>">
            </div>
            <div class="form-group">
                <label for="exampleInput">Store Phone</label>
                <input type="text" name="txtPhone" class="form-control" id="exampleInput" aria-describedby="emailHelp" placeholder="0980000..." value="<?php echo $row['phonenumber'] ?>">
            </div>
            <button type="submit" name="addnew" class="btn btn-primary">Update</button>
            <button type="reset" class="btn btn-primary" value="Submit">Reset</button>
        </form>
    </div>
</body>

</html>