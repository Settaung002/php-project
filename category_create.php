<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ctegory Create</title>
    <link rel="icon" href="static/favicon.ico">
    <?php include('components/css.php'); ?>
</head>

<body>

    <?php include('components/header.php'); ?>
    <?php include('components/navbar.php'); ?>

    <?php 
    
    error_reporting(1);
    include 'components/connection.php';
    $name = $_POST['name'];
    $icon = $_FILES['icon']['name'];
    $submit = $_POST['submit'];

    if(isset($submit)){
        move_uploaded_file($_FILES['icon']['tmp_name'], 'images/category/'. $icon);
        $data = "INSERT INTO categories(name,icon) VALUES('$name','$icon')";
        $connection->query($data);
        header('location:shop.php');
    }

    ?>

    <!-- register form start  -->

    <div class="register-form">
        <form method="POST" enctype="multipart/form-data">

            <h3>Catrgory Create Form</h3>
            <input type="text" name="name" placeholder="Enter your category name"  class="box" required>
            <input type="file" name="icon" class="box" required>
            <input type="submit" name="submit" value="Create Now" class="btn">
            
        </form>
    </div>

    <!-- register form end  -->

    <?php include('components/footer.php'); ?>
    <?php include('components/js.php'); ?>

</body>

</html>