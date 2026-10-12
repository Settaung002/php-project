<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Update</title>
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

    $id =$_GET['id'];
    $data = "SELECT * FROM teams WHERE id=$id";
    $raw_data = $connection->query($data);
    $old_data = mysqli_fetch_array($raw_data);
    
    $name = $_POST['name'];
    $position = $_POST['position'];
    $submit = $_POST['submit'];

    $old_profiles = $old_data['profiles'];
    $new_profiles = $_FILES['profiles']['name'];

    if(isset($submit)){
        if($new_profiles){
            $profiles = $new_profiles;
            if(file_exists('images/profiles/' .$old_profiles)){
                unlink('images/profiles/' .$old_profiles);
            }
            move_uploaded_file($_FILES['profiles']['tmp_name'], 'images/profiles/' .$profiles);
        }else{
            $profiles = $old_profiles;
        }
        $data = "UPDATE teams SET name='$name', position='$position', profiles='$profiles' WHERE id=$id";
        $connection->query($data);
        header('location:team.php');
    }
    
    ?>

    <div class="register-form">
        <form method="POST" enctype="multipart/form-data">

            <h3>Team Update Form</h3>
            <input type="text" name="name"  value= "<?php echo $old_data['name'] ?>" placeholder="Enter the name"  class="box" required>
            <input type="text" name="positon"  value= "<?php echo $old_data['position'] ?>"  placeholder="Enter your postion"  class="box" required>
            <input type="file" name="profiles" class="box" required>
            <input type="submit" name="submit" value="Update Now" class="btn">
            
        </form>
    </div>

    <!-- register form end  -->

    <?php include('components/footer.php'); ?>
    <?php include('components/js.php'); ?>

</body>

</html>