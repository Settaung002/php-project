<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team</title>
    <link rel="icon" href="static/favicon.ico">
    <?php include('components/css.php'); ?>
</head>

<body>

    <?php include('components/connection.php'); ?>

    <?php include('components/header.php'); ?>


    <?php include('components/navbar.php'); ?>



    <!-- heading section start -->

    <section class="heading">
        <h3>our shop</h3>
        <p><a href="index.php">home</a> / <span>team</span></p>
    </section>

    <!-- heading section end -->

    <!-- team section start -->

    <section class="team">

        <h1 class="title"> 
            <span>our team</span> 
            <button onclick="window.location.href='team_create.php'" class="btn title-btn">Add new team</button>
        </h1>
    </h1>

        <div class="box-container">

        <?php 
        include 'components/connection.php';
        $data = "SELECT * FROM teams ORDER BY id ASC";
        $raw_data = $connection->query($data);
        $counter = 1;
        while (list($id, $name, $position, $profiles, $create_at)
            = mysqli_fetch_array($raw_data)){
       
        ?>
            <div class="box">
                <div class="share">
                    <a href="team_update.php?id=<?php echo $id ?>"  class="ri-edit-fill"></a>
                    <a href="delete.php?id=<?php echo $id ?> &type=team" class="ri-delete-bin-fill"></a>
                </div>
                <div class="image">
                    <img src="images/profiles/<?php echo $profiles ?>" alt="">
                </div>
                <div class="user">
                    <h3><?php echo $name ?></h3>
                    <span><?php echo $position ?></span>
                </div>
            </div>

            <?php 
                $counter++;
             }
            
            ?>

        </div>
    </section>

    <!-- team section end -->







    <?php include('components/footer.php'); ?>

    <?php include('components/js.php'); ?>

</body>

</html>