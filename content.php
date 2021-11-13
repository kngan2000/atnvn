<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/slideshow.css">

</head>

<body>
    <div class="container">
        <div class="row">
            <?php
            $id = 1;
            $result = pg_query($conn, "Select * from public.product ORDER BY image LIMIT 9 ");
            while ($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)) {
            ?>
                <div class="col-12 col-sm-6 col-md-4">
                    <img src="image/<?php echo $row["image"]; ?>" style="height:300px">
                    <p><?php echo $row["productname"]; ?></p>
                    <p><?php echo $row["price"]; ?> VND</p>
                </div>
            <?php $id++;
            } ?>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>