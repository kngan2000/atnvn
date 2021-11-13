<?php
include_once("connection.php");

if (isset($_GET["function"]) == "del") {
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        pg_query($conn, "delete from category where categoryid='$id'");
    }
}
?>

<body>
    <table width="100%" border="3">
        <tr>
            <th><strong>Category ID</strong></th>
            <th><strong>Category Name</strong></th>
            <th><strong>Description</strong></th>
            <th><strong>Function</strong></th>
        </tr>
        <tbody>
            <?php
            $id = 1;
            $result = pg_query($conn, "Select * from category");
            while ($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)) {
            ?>
                <tr>
                    <td><?php echo $row["categoryid"]; ?></td>
                    <td><?php echo $row["categoryname"]; ?></td>
                    <td><?php echo $row["description"]; ?></td>
                    <td>
                        <button><a href="?page=Update_category&&id=<?php echo $row["categoryid"]; ?>">Edit</a></button>
                        <button><a href="?page=category_management&&function=del&&id=<?php echo $row["categoryid"]; ?>" onClick="return confirm ('Are you sure delete')">Delete</a></button>
                    </td>
                </tr>
            <?php $id++;
            } ?>
        </tbody>
    </table>
</body>