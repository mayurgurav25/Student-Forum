<?php
include 'partials/_dbconnect.php';
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CSS/approve_ogin.css">
        <link rel="stylesheet" href="CSS/style.css">

        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <title>Approve login</title>

    </head>
<style>
    .card{
        border-top:5px solid white;

    }
    .card:hover {
    /* transform: scale(1.05); */
    border-top:5px solid purple;
}
</style>
    <body>
        <div class="center">
            <div class="topnav" id="myTopnav">
                <div class="conainer">
                    <a href="#home" class="active"><img src="logo.jpeg" alt=""></a>

                    <div class="name container ml-5">
                        <h1>College Forum</h1>
                        <h4>Fr. Conceicao Rodrigues College of Engineering</h4>

                    </div>
                </div>

            </div>
            <div class="container mt-5">
                <div class="float-left">
                    <a class="btn btn-default btn-sm" href="mainAdmin.php"><button style="background-color:purple; border:purple" type="button submit" name="back" class="btn btn-danger"><i class="fa fa-arrow-circle-left" aria-hidden="true"> Back</i></button>

        </a>


                </div>
                <div class="text-center">
                    <h2>Approve Logins</h2><br>

                </div>
            </div>



            <div class="logins">
                <div class="container">
                    <div class="row">
                        <?php
            $query = "SELECT * FROM users WHERE status = 'pending' ORDER BY sno ASC";
            $result = mysqli_query($conn, $query);
            while($row = mysqli_fetch_array($result)){
        ?>


                            <div class="col-sm-12 col-md-3">


                                <div class="card shadow-lg mb-5">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <img src="<?php echo $row['profile'];?>" class="img-thumbnail" height="200px" width="200px">
                                            <h5><strong><?php echo $row['name'];?></strong></h5>
                                            <p class="text-muted">
                                                <?php echo $row['who'];?>
                                            </p>
                                        </div>
                                        <div class="info">
                                            <p><strong>Username:</strong> <br>
                                                <?php echo $row['username'];?>
                                            </p>
                                            <p><strong>Department:</strong><br>
                                                <?php echo $row['department'];?>
                                            </p>
                                            <p><strong>Year:</strong><br>
                                                <?php echo $row['year'];?>
                                            </p>
                                            <!-- Button trigger modal -->
                                          <div class="text-center btn-group">
                                         
                                            <form action="/WTE3/Approve_login.php" method="POST">
                                            <button type="button" class="btn btn-primary mb- mr-2" style="background-color:purple;border:purple;" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Document
                                            </button>
                                            <input type="hidden" name="sno" value="<?php echo $row['sno'];?>" />
                                            <button type="button submit" name="approve" value="approve" class="btn btn-success"><i class="fa fa-check-circle" aria-hidden="true">Accept</i></button>
                                            <button type="button submit" name="deny" value="Deny" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Deny</button>

                                        </form>
                                          </div>

                                            <!-- Modal -->
                                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel"><?php echo $row['doc'];?></h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <img src="<?php echo $row['document'];?>">

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary">Understood</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            </a>



                                        </div>



                                    </div>
                                </div>

                            </div>



                            <?php
            }
            ?>
                    </div>
                </div>
            </div>
        </div>
        <?php


if(isset($_POST['approve'])){
    $sno = $_POST['sno'];

    $select = "UPDATE users SET status = 'approved' WHERE sno = '$sno'";
    $result = mysqli_query($conn, $select);

    echo '<script type = "text/javascript">';
    echo 'alert("User Approved!");';
    echo 'window.location.href = "Approve_login.php"';
    echo '</script>';
}

if(isset($_POST['deny'])){
    $sno = $_POST['sno'];

    $select = "DELETE FROM users WHERE sno = '$sno'";
    $result = mysqli_query($conn, $select);

    echo '<script type = "text/javascript">';
    echo 'alert("User Denied!");';
    echo 'window.location.href = "Approve_login.php"';
    echo '</script>';
}
?>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
           

    </html>