<?php

// Nếu là sự kiện đăng ký thì xử lý
if (isset($_POST['submit'])) {

    //Nhúng file kết nối với database
    include_once('connection.php');


    //Lấy dữ liệu
    $cateid     = $_POST['txtcategoryid'];
    $catename   = $_POST['txtcategoryname'];
    $des        = $_POST['txtdescription'];
    $result = pg_query($conn, "INSERT INTO public.category(categoryid,categoryname,description) VALUES ({$cateid},'{$catename}','{$des}')");

    if ($result) {
        echo "Successfully!.";

    } else
        echo "Erorr!. <a href='index.php'>Thử lại</a>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Category</title>
</head>
<body>
<h3>Add Category</h3>
    <form action="" method="POST">
        <table>
            <tr>
                <td>Category ID: </td>
                <td><input type="text" name="txtcategoryid"></tr>
            </tr>
            <tr>
                <td>Category Name: </td>
                <td><input type="text" name="txtcategoryname"></tr>
            </tr>
            <tr>
                <td>Description: </td>
                <td><input type="text" name="txtdescription"></tr>
            </tr>
            <tr>
                <td colspan="2">
                <button type="submit" name="submit">Submit</button>
                <button type="reset">Reset</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>