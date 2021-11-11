<?php
    include_once("connection.php");
?>
<body>
    <table width="500" border="1" >
        <tr>
                <th><strong>Product ID</strong></th>
                <th><strong>Product Name</strong></th>
                <th><strong>Price</strong></th>
                <th><strong>Quantity</strong></th>
                <th><strong>Category ID</strong></th>
                <th><strong>Image</strong></th>
                <th><strong>Description</strong></th>

        </tr>
        <tbody>
        <?php
            $id=1;
            $result=pg_query($conn,"Select * from product");
            while($row=pg_fetch_array($result,NULL, PGSQL_ASSOC))
            {
            ?>
			<tr>
              <td><?php echo $row["productid"];?></td>
              <td><?php echo $row["productname"];?></td>
              <td><?php echo $row["price"];?></td>
              <td><?php echo $row["quantity"];?></td>
              <td><?php echo $row["categoryid"];?></td>
              <td>
                    <img src="image/<?php echo $row["image"]; ?>" style="height: 100px; width: 100px;">
              </td>
              <td><?php echo $row["shortdes"];?></td>
            </tr>
            <?php $id++;}?>
            </tbody>
    </table>
</body>