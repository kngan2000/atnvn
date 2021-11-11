<?php

// Nếu là sự kiện đăng ký thì xử lý
if (isset($_POST['submit'])) {

    //Nhúng file kết nối với database
    include_once('connection.php');


    //Lấy dữ liệu
    $stid     = $_POST['txtstoreid'];
    $stname   = $_POST['txtstorename'];
    $stadd       = $_POST['txtaddress'];
    $stphone       = $_POST['txtphone'];
    $result = pg_query($conn, "INSERT INTO public.store(storeid,storename,address,phonenumber) 
    VALUES ({$stid},'{$stname}','{$stadd}','{$stphone}')");

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
    <title>Store</title>
</head>
<body>
<h3>Add Store</h3>
    <form action="" method="POST">
        <table>
            <tr>
                <td>Store ID: </td>
                <td><input type="text" name="txtstoreid"></tr>
            </tr>
            <tr>
                <td>Store Name: </td>
                <td><input type="text" name="txtstorename"></tr>
            </tr>
            <tr>
                <td>Address: </td>
                <td><input type="text" name="txtaddress"></tr>
            </tr>
            <tr>
                <td>Phone Number: </td>
                <td><input type="text" name="txtphone"></tr>
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