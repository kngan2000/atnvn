<?php
    include_once("connection.php");
?>
<body>
    <table width="500" border="1" >
        <tr>
                <th><strong>Category ID</strong></th>
                <th><strong>Category Name</strong></th>
                <th><strong>Description</strong></th>
        </tr>
        <tbody>
        <?php
            $id=1;
            $result=pg_query($conn,"Select * from category");
            while($row=pg_fetch_array($result,NULL, PGSQL_ASSOC))
            {
            ?>
			<tr>
              <td><?php echo $row["categoryid"];?></td>
              <td><?php echo $row["categoryname"];?></td>
              <td><?php echo $row["description"];?></td>
            </tr>
            <?php $id++;}?>
            </tbody>
    </table>
</body>