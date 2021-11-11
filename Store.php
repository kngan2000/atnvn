<?php
    include_once("connection.php");
?>
<body>
    <table width="500" border="1" >
        <tr>
                <th><strong>Store ID</strong></th>
                <th><strong>Store Name</strong></th>
                <th><strong>Address</strong></th>
                <th><strong>Phone</strong></th>
        </tr>
        <tbody>
        <?php
            $id=1;
            $result=pg_query($conn,"Select * from store");
            while($row=pg_fetch_array($result,NULL, PGSQL_ASSOC))
            {
            ?>
			<tr>
              <td><?php echo $row["storeid"];?></td>
              <td><?php echo $row["storename"];?></td>
              <td><?php echo $row["address"];?></td>
              <td><?php echo $row["phonenumber"];?></td>
            </tr>
            <?php $id++;}?>
            </tbody>
    </table>
</body>