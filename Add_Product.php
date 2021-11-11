<?php
//liên kết bảng category
$sql_category = "SELECT * FROM public.category";
$query_category = pg_query($conn, $sql_category);

// lấy dữ liệu
if (isset($_POST['btnAdd'])) {

    //Nhúng file kết nối với database 
    include_once('connection.php');

    $proid   = $_POST['txtID'];
    $proname = $_POST['txtName'];
    $price      = $_POST['txtPrice'];
    $quantity      = $_POST['txtQty'];
    $procate      = $_POST['cateid'];
    $proimage      = $_FILES['Image'];
    $description      = $_POST['txtShort'];

    copy($proimage['tmp_name'], "image/" . $proimage['name']);
    $filePic = $proimage['name'];
    $result = pg_query($conn, "INSERT INTO public.product(productid,productname,price,quantity,categoryid,image,shortdes)
    VALUES({$proid},'{$proname}','{$price}','{$quantity}',{$procate},'{$filePic}','{$description}')"); 

    if ($result) {
        echo "Successfully!.";

    } else
        echo "Có lỗi xảy ra trong quá trình thêm mới. <a href='?page=add_product'>Again</a>";
}
?>

<div class="container"> 
    <h2>Adding new Product</h2>

    <form id="frmProduct" name="frmProduct" method="POST" enctype="multipart/form-data" action="" class="form-horizontal" role="form">
        <div class="form-group">
            <label for="txtTen" class="col-sm-2 control-label">Product ID(*): </label>
            <div class="col-sm-10">
                <input type="text" name="txtID" id="txtID" class="form-control" placeholder="Product ID" value='' />
            </div>
        </div>
        <div class="form-group">
            <label for="txtTen" class="col-sm-2 control-label">Produc tName(*): </label>
            <div class="col-sm-10">
                <input type="text" name="txtName" id="txtName" class="form-control" placeholder="Product Name" value='' />
            </div>
        </div>

        <div class="form-group">
            <label for="lblGia" class="col-sm-2 control-label">Price(*): </label>
            <div class="col-sm-10">
                <input type="text" name="txtPrice" id="txtPrice" class="form-control" placeholder="Price" value='' />
            </div>
        </div>

        <div class="form-group">
            <label for="lblSoLuong" class="col-sm-2 control-label">Quantity(*): </label>
            <div class="col-sm-10">
                <input type="number" name="txtQty" id="txtQty" class="form-control" placeholder="Quantity" value="" />
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-2 control-label">Category ID(*): </label>
            <div class="col-sm-10">
                <select class="form-control" name="cateid">
                    <?php
                    while ($row_category = pg_fetch_assoc($query_category)) { ?>
                        <option value="<?php echo $row_category['categoryid']; ?>"> <?php echo $row_category['categoryname'] ?></option>}
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="sphinhanh" class="col-sm-2 control-label">Image(*): </label>
            <div class="col-sm-10">
                <input type="file" name="Image" id="txtImage" class="form-control" value="" />
            </div>
        </div>

        <div class="form-group">
            <label for="lblShort" class="col-sm-2 control-label">Description(*): </label>
            <div class="col-sm-10">
                <input type="text" name="txtShort" id="txtShort" class="form-control" placeholder="Short description" value='' />
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-primary" name="btnAdd" id="btnAdd" value="Add New" />
                <input type="button" class="btn btn-primary" name="btnIgnore" id="btnIgnore" value="Ignore" onclick="window.location='product.php'" />
            </div>
        </div>
    </form>
</div>