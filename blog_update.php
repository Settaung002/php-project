<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Blog Update </title>
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
    $data = "SELECT * FROM blogs WHERE id =$id";
    $raw_data = $connection->query($data);
    $old_data = mysqli_fetch_array($raw_data);

    $title = $_POST['title'];
    $image = $_FILES['image']['name'];
    $description = $_POST['description'];
    $author = $_POST['author'];
    $submit = $_POST['submit'];

    $old_image = $old_data['image'];
    $new_image = $_FILES['image']['name'];

    if(isset($submit)){
        if($new_image){
            if(file_exists('images/blog/' .$old_image)){
                unlink('images/blog/' .$old_image);
            }
             move_uploaded_file($_FILES['image']['tmp_name'], 'images/blog/'. $image);
        }else{
            $image = $old_image;
        }
       
        $data = " UPDATE blogs SET title='$title', image='$image', 
        description='$description', author='$author' WHERE id =$id ";
        $connection->query($data);
        header('location:blog.php');
    }

    ?>

    <div class="register-form">
        <form method="POST" enctype="multipart/form-data">

            <h3>Blog Update Form</h3>

            <input type="text" name="title" value= "<?php echo $old_data['title'] ?>" placeholder="Enter your title"  class="box" required>
            <textarea name="description" placeholder="Enter your description" class="box" required> </textarea>
            <input type="text" name="author" value= "<?php echo $old_data['author'] ?>" placeholder="Enter your tilte"  class="box" required>
            <input type="file" name="image" class="box" >
            <input type="submit" name="submit" value="Create Now" class="btn">
            
        </form>
    </div>

    <!-- register form end  -->

    <?php include('components/footer.php'); ?>
    <?php include('components/js.php'); ?>

</body>

</html>