<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Create</title>
    <link rel="icon" href="static/favicon.ico">
    <?php include('components/css.php'); ?>
</head>

<body>

    <?php include('components/header.php'); ?>
    <?php include('components/navbar.php'); ?>

    <!-- register form start  -->

     <?php 
    error_reporting(1);
    include('components/connection.php');

    $title = $_POST['title'];
    $description = $_POST['description'];
    $icon = $_FILES['icon']['name'];
    $submit =$_POST['submit'];

    if(isset($submit)){
        move_uploaded_file($_FILES['icon']['tmp_name'],'images/services/' .$icon);
        $data = "INSERT INTO service(title,icon,description) VALUES ('$title','$icon','$description')";
        $connection->query($data);
        header('location:about.php');
    }

    ?>

    <div class="register-form">
        <form method="POST" enctype="multipart/form-data">

            <h3>Sevice Create Form</h3>
            <input type="text" name="title" placeholder="Enter your title"  class="box" required>
            <textarea name="description"  placeholder="Enter your description" class="box" required></textarea>
            <input type="file" name="icon" class="box" required>
            <input type="submit" name="submit" value="Create Now" class="btn">
            
        </form>
    </div>

    <!-- register form end  -->

    <?php include('components/footer.php'); ?>
    <?php include('components/js.php'); ?>

</body>

</html>