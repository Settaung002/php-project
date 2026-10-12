<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Create</title>
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
    $title = $_POST['title'];
    $image = $_FILES['image']['name'];
    $description = $_POST['description'];
    $author = $_POST['author'];
    $submit = $_POST['submit'];

    if(isset($submit)){
        move_uploaded_file($_FILES['image']['tmp_name'], 'images/blog/'. $image);
        $data = "INSERT INTO blogs(title,image,description,author) VALUES('$title','$image','$description','$author')";
        $connection->query($data);
        header('location:blog.php');
    }

    ?>

    <div class="register-form">
        <form method="POST" enctype="multipart/form-data">

            <h3>Blog Create Form</h3>
            <input type="text" name="title" placeholder="Enter your title"  class="box" required>
            <textarea name="description" placeholder="Enter your description" class="box" required></textarea>
            <input type="text" name="author" placeholder="Enter your author"  class="box" required>
            <input type="file" name="image" class="box" required>
            <input type="submit" name="submit" value="Create Now" class="btn">
            
        </form>
    </div>

    <!-- register form end  -->

    <?php include('components/footer.php'); ?>
    <?php include('components/js.php'); ?>

</body>

</html>