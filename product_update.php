<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Update</title>
    <link rel="icon" href="static/favicon.ico">
    <?php include('components/css.php'); ?>
</head>

<body>

    <?php include('components/header.php'); ?>
    <?php include('components/navbar.php'); ?>

    <?php 
    error_reporting(1);
    include('components/connection.php');

    $id = $_GET['id'];
    $data = "SELECT * FROM products WHERE id=$id";
    $raw_data = $connection->query($data);
    $old_data = mysqli_fetch_array($raw_data);

    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $submit =$_POST['submit'];

    $old_image = $old_data['image'];
    $new_image = $_FILES['image']['name'];

    if(isset($submit)){
        if ($new_image){
            $image = $new_image;
            if (file_exists('images/products/' . $old_image)){
                unlink('images/products/' . $old_image);
            }
            move_uploaded_file($_FILES['image']['tmp_name'],'images/products/'.$image );
        } else{
            $image = $old_image;
        }
        $data = "UPDATE  products set name='$name',price='$price',image='$image',quantity='$quantity' 
        WHERE id=$id";
        $connection->query($data);
        header('location:shop.php');
    }

    ?>

    <!-- register form start  -->

    <div class="register-form">
        <form method="POST" enctype="multipart/form-data">
            <h3>Product Update Form</h3>

            <input type="text" name="name" value="<?php echo $old_data['name'] ?>"
             placeholder="Enter your product name"  class="box" required>
            <input type="number" name="price" value="<?php echo $old_data['price'] ?>"
            placeholder="Enter your price"  class="box" required>
            <input type="number" name="quantity" value="<?php echo $old_data['quantity'] ?>"
            placeholder="Enter your quantity"  class="box" required>
            <input type="file" name="image" class="box" required>
            <input type="submit" name="submit" value="Update" class="btn">
        </form>
    </div>

    <!-- register form end  -->

    <?php include('components/footer.php'); ?>
    <?php include('components/js.php'); ?>

</body>

</html>