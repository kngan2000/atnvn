
<?php
    //Xử lý đăng nhập
if (isset($_POST['submit'])) {
    //Kết nối tới database
    include_once('connection.php');

    //Lấy dữ liệu nhập vào
    $username = $_POST['username'];
    $password = $_POST['password'];

    //Kiểm tra tên đăng nhập có tồn tại không
    $result = pg_query($conn, "SELECT username, password, state FROM public.user WHERE username='{$username}'");
    if (pg_num_rows($result) == 0) {
        echo "Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }

    //Lấy mật khẩu trong database ra
    $row = pg_fetch_array($result);

    //So sánh 2 mật khẩu có trùng khớp hay không
    if ($password != $row['password']) {
        echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }

    if (pg_num_rows($result) == 1) {
        $_SESSION["username"] = $username;
        $_SESSION["admin"] = $row['state'];
        echo"Successfully!";
        echo '<meta http-equiv="refresh" content="0;URL=index.php"/>';
    } else {
        echo "You loged in fail!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Log in</title>
</head>

<body>
   
    <h3>Log in</h3>
    <form action="" method="POST">
    <table>
        <tr>
            <td>Username: </td>
            <td><input type="text" name="username"></td>
        </tr>
        <tr>
            <td>Password: </td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td colspan="2">
                <button type="submit" name="submit">Login</button>
                <button type="reset">Reset</button>
            </td>
        </tr>
    </table>
</form>

</body>

</html>

