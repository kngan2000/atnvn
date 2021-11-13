<?php
//get id
$id = $_GET['id'];

//lấy thông tin
$result = pg_query($conn, "SELECT* FROM public.category WHERE categoryid='{$id}'");
$row = pg_fetch_assoc($result);

// Nếu là sự kiện update thì xử lý
if (isset($_POST['update'])) {

    //Nhúng file kết nối với database
    include_once("connection.php");

    //Lấy dữ liệu từ file 
    $cateid   = $_POST['txtCateid'];
    $catename = $_POST['txtCatename'];
    $des      = $_POST['txtDes'];

    $result = pg_query($conn, "UPDATE public.category SET categoryid='{$cateid}',categoryname='{$catename}',description='{$des}'
    WHERE categoryid='{$cateid}'");

    if ($result) {
        echo "Success.";
        echo '<meta http-equiv="refresh" content="0;URL=?page=category_management"/>';
    } else
        echo "Erorr!!!. <a href='?page=category_management'>Again</a>";
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
                <label for="exampleInput">Category ID</label>
                <input type="text" name="txtCateid" class="form-control" id="exampleInput" aria-describedby="" placeholder="xe123" value="<?php echo $row['categoryid'] ?>">
            </div>
            <div class="form-group">
                <label for="example">Category Name</label>
                <input type="text" name="txtCatename" class="form-control" id="exampleInput" placeholder="Kieu Ngan company" value="<?php echo $row['categoryname'] ?>">
            </div>
            <div class="form-group">
                <label for="exampleInput">Description</label>
                <input type="text" name="txtDes" class="form-control" id="exampleInput" aria-describedby="emailHelp" placeholder="..." value="<?php echo $row['description'] ?>">
            </div>
            <button type="submit" name="update" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-primary" value="Submit">Reset</button>
        </form>
    </div>
</body>

</html>