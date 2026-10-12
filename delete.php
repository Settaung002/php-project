<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
    <link rel="icon" href="static/favicon.ico">
    <?php include('components/css.php'); ?>
</head>

<body>

    <?php include('components/header.php'); ?>
    <?php include('components/navbar.php'); ?>
    <?php

    include('components/connection.php');

    $id = $_GET['id'];
    $type = $_GET['type'];

    $submit = $_POST['submit'];

    if (isset($submit)) {

        // PRODUCT
        if ($type == 'product') {

            $data = "SELECT * FROM products WHERE id=$id";
            $raw_data = $connection->query($data);
            $old_data = mysqli_fetch_array($raw_data);

            $old_image = $old_data['image'];

            if (file_exists('images/products/' . $old_image)) {
                unlink('images/products/' . $old_image);
            }

            $data = "DELETE FROM products WHERE id=$id";
            $connection->query($data);

            header('location:shop.php');
            exit();
        }


        // CATEGORY
        elseif ($type == 'category') {

            $data = "SELECT * FROM categories WHERE id=$id";
            $raw_data = $connection->query($data);
            $old_data = mysqli_fetch_array($raw_data);

            $old_icon = $old_data['icon'];

            if (file_exists('images/category/' . $old_icon)) {
                unlink('images/category/' . $old_icon);
            }

            $data = "DELETE FROM categories WHERE id=$id";
            $connection->query($data);

            header('location:shop.php');
            exit();
        }


        // SERVICE
        elseif ($type == 'service') {

            $data = "SELECT * FROM service WHERE id=$id";
            $raw_data = $connection->query($data);
            $old_data = mysqli_fetch_array($raw_data);

            $old_icon = $old_data['icon'];

            if (file_exists('images/service_icon/' . $old_icon)) {
                unlink('images/service_icon/' . $old_icon);
            }

            $data = "DELETE FROM service WHERE id=$id";
            $connection->query($data);

            header('location:about.php');
            exit();
        }


        // TEAM
        elseif ($type == 'team') {

            $data = "SELECT * FROM teams WHERE id=$id";
            $raw_data = $connection->query($data);
            $old_data = mysqli_fetch_array($raw_data);

            $old_image = $old_data['profiles'];

            if (file_exists('images/teams/' . $old_image)) {
                unlink('images/teams/' . $old_image);
            }

            $data = "DELETE FROM teams WHERE id=$id";
            $connection->query($data);

            header('location:team.php');
            exit();
        }
        

         // BLOG
        elseif ($type == 'blog') {

            $data = "SELECT * FROM blogs WHERE id=$id";
            $raw_data = $connection->query($data);
            $old_data = mysqli_fetch_array($raw_data);

            $old_image = $old_data['image'];

            if (file_exists('images/blog/' . $old_image)) {
                unlink('images/blog/' . $old_image);
            }

            $data = "DELETE FROM blogs WHERE id=$id";
            $connection->query($data);

            header('location:blog.php');
            exit();
        }
    }

    ?>


    <main class="delete-modal">

        <form method="POST">
            <div class="delete-box">
                <i class="ri-error-warning-line"></i>
                <h3>Are you sure?</h3>
                <p>Do you really want to delete this?</p>
                <div class="delete-buttons">
                    <button type="submit" name="submit" class="btn title-btn"> Yes </button>
                    <a href="javascript:history.back()" class="btn title-btn"> No</a>
                </div>
            </div>
        </form>

    </main>

    <?php include('components/footer.php'); ?>
    <?php include('components/js.php'); ?>

</body>

</html>