<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Create</title>
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
    $name =$_POST ['name'];
    $position =$_POST ['position'];
    $profiles =$_FILES['profiles']['name'];
    $submit =$_POST['submit'];
    if (isset($submit)){
        move_uploaded_file($_FILES['profiles']['tmp_name'],'images/profiles/' .$profiles);
        $data = "INSERT INTO teams(name,position,profiles) VALUES ('$name', '$position', '$profiles')";
        $connection->query($data);
        header('location:team.php'); 
    }
    
    ?>

    <div class="register-form">
        <form method="POST" enctype="multipart/form-data">

            <h3>Team Create Form</h3>
            <input type="text" name="name" placeholder="Enter team name"  class="box" required>
            <input type="text" name="position" placeholder="Enter position"  class="box" required>
            <input type="file" name="profiles" class="box" required>
            <input type="submit" name="submit" value="Create Now" class="btn">
            
        </form>
    </div>

    <!-- register form end  -->

    <?php include('components/footer.php'); ?>
    <?php include('components/js.php'); ?>

</body>

</html>