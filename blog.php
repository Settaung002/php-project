<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="icon" href="static/favicon.ico">
    <?php include('components/css.php'); ?>
</head>

<body>

    <?php
    // session_start();

    // if (!isset($_SESSION['username'])) {
    //     header('Location: login.php');
    //     exit();
    // }
    ?>

    <?php include('components/connection.php'); ?>

    <?php include('components/header.php'); ?>


    <?php include('components/navbar.php'); ?>

    <!-- heading section start -->

    <section class="heading">
        <h3>our shop</h3>
        <p><a href="index.php">home</a> / <span>blog</span></p>
    </section>

    <!-- heading section end -->

    <!-- blog section start -->

    <section class="blog">
        <h1 class="title"> <span>our blogs</span>
            <button onclick="window.location.href='blog_create.php'" class="btn title-btn">Add new blog</button>
        </h1>

        <div class="box-container">

            <?php
            error_reporting(1);
            include 'components/connection.php';
            $data = "SELECT * FROM blogs ORDER BY id ASC";
            $raw_data = $connection->query($data);
            $counter = 1;

            while (list($id, $title, $image, $description, $author, $created_at)
                = mysqli_fetch_array($raw_data)
            ) {

            ?>

                <div class="box">
                    <div class="image">
                        <img src="images/blog/<?php echo $image ?>" alt="">
                    </div>
                    <div class="content">
                        <h3><?php echo $title ?></h3>
                        <p><?php echo $description ?></p>
                        <a href="blog_update.php?id=<?php echo $id ?>" class="btn">Update</a>
                        <a href="delete.php?id=<?php echo $id ?> &type=blog" class="btn">Delete</a>
                        <div class="icons">
                            <a href="#"> <i class="fas fa-calendar"></i> <?php echo $created_at ?></a>
                            <a href="#"> <i class="fas fa-user"></i> <?php echo $author ?></a>
                        </div>
                    </div>
                </div>

            <?php
                $counter++;
            }
            ?>

        </div>
    </section>

    <!-- blog section end -->

    <?php include('components/footer.php'); ?>

    <?php include('components/js.php'); ?>

</body>

</html>