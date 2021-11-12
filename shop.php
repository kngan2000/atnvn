<?php
include_once("connection.php");
?>
<body>
    <div class="container">
        <table width="100%" border="4">
            <tr>
                <th><strong>Product Name</strong></th>
                <th><strong>Price</strong></th>
                <th><strong>Image</strong></th>
                <th><strong>Description</strong></th>
                <th><strong>Function</strong></th>

            </tr>
            <tbody>
                <?php
                $id = 1;
                $result = pg_query($conn, "Select * from product");
                while ($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)) {
                ?>
                    <tr>
                        <td><?php echo $row["productname"]; ?></td>
                        <td><?php echo $row["price"]; ?></td>
                        <td>
                            <img src="image/<?php echo $row["image"]; ?>" style="height: 100px; width: 100px;">
                        </td>
                        <td><?php echo $row["shortdes"]; ?></td>
                        <td><button>Buy</button></td>
                    </tr>
                <?php $id++;
                } ?>
            </tbody>
        </table>
    </div>
</body>