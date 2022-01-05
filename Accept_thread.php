
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Accept</title>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/main.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="script.js"></script>
</head>

<body>
    <?php
   include 'partials/header.php';
  ?>
     <div class="container mt-5">
       <div class="row">
       <div class="col-4">
        <a class="btn btn-default btn-sm" href="mainAdmin.php"><button style="background-color:purple; border:purple" type="button submit" name="back" class="btn btn-danger"><i class="fa fa-arrow-circle-left" aria-hidden="true"> Back</i></button>
</a>
        </div>
        <div class="col-4">
        <h2>Accept Threads</h2>
        </div>
        <div class="col-4">
            
        </div>
       </div>

        <div class="container">
            
<?php
include 'partials/_dbconnect.php';
            $query = "SELECT * FROM threads WHERE status = 'pending' ORDER BY sno ASC";
            $result = mysqli_query($conn, $query);
            while($row = mysqli_fetch_array($result)){
        ?>
            <div class="card mt-4 shadow-lg" style="width: 97%; left: 15px;">
                <div class="card-body">
                    <div class="cardtop" style="background-color: rgb(228, 228, 228); display: flex; border-radius: 50px;">
                        <img src="logo.jpeg" alt="" style="width: 40px; border-radius: 50%;">
                        <h6 class="mt-2 ml-2">Mayur Gurav</h6>

                    </div>
                    <?php 
                    if($row['img']=='postImage/'){
                        echo $row['post'];
                         echo $row['dt'];
                      
                    }
                    else{
                        ?>
                    <img src="<?php echo $row['img'];?>" class="img-top" height="400px" width="800px"><br>
                    <?php  echo $row['post'];?><br>
                    <?php echo $row['dt'];?>

                    <?php }?>

                    <?php echo $row['post'];?> <br>
                    <div class="text-center btn-group">
                                         
                                            <form action="/WTE3/Accept_Thread.php" method="POST">
                                            </button>
                                            <input type="hidden" name="sno" value="<?php echo $row['sno'];?>" />
                                            <button type="button submit" name="approve" value="approve" class="btn btn-success"><i class="fa fa-check-circle" aria-hidden="true">Accept</i></button>
                                            <button type="button submit" name="deny" value="Deny" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Deny</button>

                                        </form>
                                          </div>
                </div>
            </div>
            <?php } ?>
            <?php


if(isset($_POST['approve'])){
    $sno = $_POST['sno'];

    $select = "UPDATE threads SET status = 'approved' WHERE sno = '$sno'";
    $result = mysqli_query($conn, $select);

    echo '<script type = "text/javascript">';
    echo 'alert("User Approved!");';
    echo 'window.location.href = "Accept_Thread.php"';
    echo '</script>';
}

if(isset($_POST['deny'])){
    $sno = $_POST['sno'];

    $select = "DELETE FROM threads WHERE sno = '$sno'";
    $result = mysqli_query($conn, $select);

    echo '<script type = "text/javascript">';
    echo 'alert("User Denied!");';
    echo 'window.location.href = "Accept_Thread.php"';
    echo '</script>';
}
?>
</html>