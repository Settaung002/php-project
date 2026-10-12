<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Create</title>
    <link rel="icon" href="static/favicon.ico">
    <?php include('components/css.php'); ?>
</head>

<body>

    <?php include('components/header.php'); ?>
    <?php include('components/navbar.php'); ?>

    <!-- register form start  -->
     
    
    <?php 
    
    error_reporting(1);
    include 'components/connection.php';

    $id =$_GET['id'];
    $data = "SELECT * FROM categories WHERE id =$id";
    $raw_data = $connection->query($data);
    $old_data = mysqli_fetch_array($raw_data);

    $name = $_POST['name'];
    $icon = $_FILES['icon']['name'];
    $submit = $_POST['submit'];

    $old_icon = $old_data['icon'];
    $new_icon = $_FILES['icon']['name'];

    if(isset($submit)){
        if($new_icon){
            if(file_exists('images/category/' .$old_icon)){
                unlink('images/category/' .$old_icon);
            }
             move_uploaded_file($_FILES['icon']['tmp_name'], 'images/category/'. $icon);
        }else{
            $icon = $old_icon;
        }
       
        $data = "UPDATE categories SET name='$name', icon='$icon' WHERE id =$id";
        $connection->query($data);
        header('location:shop.php');
    }

    ?>

    <div class="register-form">
        <form method="POST" enctype="multipart/form-data">

            <h3>Category Update Form</h3>
            <input type="text" name="name" value="<?php echo $old_data['name']; ?>" placeholder="Enter your category name" class="box" required>
            <input type="file" name="icon" class="box">
            <input type="submit" name="submit" value="Update Now" class="btn">
        </form>
    </div>

    <!-- register form end  -->

    <?php include('components/footer.php'); ?>
    <?php include('components/js.php'); ?>

</body>

</html>