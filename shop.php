<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="icon" href="static/favicon.ico">
    <?php include('components/css.php'); ?>
</head>

<body>

    <?php include('components/connection.php'); ?>

    <?php include('components/header.php'); ?>

    <?php include('components/navbar.php');
    error_reporting(1);
    ?>

    <!-- heading section start -->

    <section class="heading">
        <h3>our shop</h3>
        <p><a href="index.php">home</a> / <span>shop</span></p>
    </section>

    <!-- heading section end -->


    <!-- category section start -->

    <section class="category">
        <h1 class="title"> <span>our categories</span>
            <button onclick="window.location.href='category_create.php'" class="btn title-btn">Add new category</button>
        </h1>

        <div class="box-container">

            <?php

            $data = "SELECT * FROM categories ORDER BY id ASC";
            $raw_data = $connection->query($data);
            $counter = 1;

            while (list($id, $name, $icon, $created_at)
                = mysqli_fetch_array($raw_data)
            ) {
            ?>

                <div class="box">

                    <div class="icons">
                        <a href="category_update.php?id=<?php echo $id ?>" class="ri-edit-line"></a>
                        <a href="delete.php?id=<?php echo $id ?> &type=category" class="ri-delete-bin-line"></a>
                    </div>

                    <img src="images/category/<?php echo $icon ?>" alt="">
                    <h3><?php echo $name ?></h3>

                </div>

            <?php
                $counter++;
            }

            ?>

        </div>
    </section>

    <!-- category section end -->


    <!-- products section start -->

    <section class="products">
        <h1 class="title"> <span>our products</span>
            <button onclick="window.location.href='product_create.php'" class="btn title-btn">Add new product</button>
        </h1>

        <div class="box-container">

            <?php

            $data = "SELECT * FROM products ORDER BY id ASC";
            $raw_data = $connection->query($data);
            $counter = 1;

            while (list($id, $name, $price, $image, $quantity, $created_at)
                = mysqli_fetch_array($raw_data)
            ) {
            ?>

                <div class="box">

                    <div class="icons">
                        <a href="product_update.php?id=<?php echo $id; ?>" class="ri-edit-line"></a>
                        <a href="delete.php?id=<?php echo $id ?> &type=product" class="ri-delete-bin-line"></a>
                    </div>
                    <div class="image">
                        <img src="images/products/<?php echo $image ?>" alt="">
                    </div>
                    <div class="content">
                        <div class="price">$<?php echo $price ?></div>
                        <h3><?php echo $name ?></h3>
                        <div class="stars">
                            <span> <?php echo $quantity ?> </span>
                        </div>
                    </div>

                </div>

            <?php
                $counter++;
            }
            ?>

        </div>

    </section>

    <!-- products section end -->

    <?php include('components/footer.php'); ?>

    <?php include('components/js.php'); ?>

</body>

</html>