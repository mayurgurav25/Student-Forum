<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';
    $name = $_POST["name"];
    $year = $_POST["year"];
    $department = $_POST["department"];
    $who = $_POST["who"];
    $username = $_POST["username"];
    $doc = $_POST["doc"];
    $sno = $_POST["sno"];
    
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    
    $documentname = $_FILES["document"]["name"];
    $documenttempname = $_FILES["document"]["tmp_name"];
    $profilename = $_FILES["profile"]["name"];
    $profiletempname = $_FILES["profile"]["tmp_name"];
    $folderdoc = 'documen/'.$documentname;
    $folderprof = 'profile/'.$profilename;
    // $file = $_POST["file"];
    // $exists=false;

    // Check whether this username exists
    $existSql = "SELECT * FROM `users` WHERE username = '$username'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        // $exists = true;
        $showError = "Username Already Exists";
    }
    else{
        // $exists = false; 
        if(($password == $cpassword)){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`year`, `department`, `who`, `username`, `document`, `password`, `dt`, `sno`, `name`, `status`, `profile`,`doc`) VALUES ('$year', '$department', 'teacher', '$username', '$folderdoc', '$hash', current_timestamp(), '$sno', '$name', 'approved', '$folderprof', '$folderdoc');";
            $result = mysqli_query($conn, $sql);
            echo '<script type  = "text/javascript">';
        echo 'alert("New teacher is added");';
        echo 'window.location.href = "addteachers.php"';
        echo '</script>';
        if (move_uploaded_file($documenttempname, $folderdoc))  {
            $msg = "document uploaded successfully";
        }else{
            $msg = "Failed to upload document";
      }
      if (move_uploaded_file($profiletempname, $folderprof))  {
        $msgg = "Image uploaded successfully";
    }else{
        $msgg = "Failed to upload image";
  }
  
            if ($result){
                $showAlert = true;
            }
        }
        else{
            $showError = "Passwords do not match";
        }
    }
    
}
    
?>
    <?php
include 'partials/_dbconnect.php';

?>
        <!doctype html>
        <html lang="en">

        <head>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <!-- Bootstrap CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
            <link rel="stylesheet" href="CSS/style.css">
            <link rel="stylesheet" href="CSS/main.css">
            <script src="script.js"></script>
            <title>Hello, world!</title>
        </head>


        <body>

            <!-- Load an icon library to show a hamburger menu (bars) on small screens -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
                <div class="row">
                    <div class="col-4">
                        <a class="btn btn-default btn-sm" href="mainAdmin.php"><button
                        style="background-color:purple; border:purple" type="button submit" name="back"
                        class="btn btn-danger"><i class="fa fa-arrow-circle-left" aria-hidden="true"> Back</i></button>
                </a>
                    </div>
                    <div class="col-4">
<h2>Add Teachers</h2>
                    </div>
                    <div class="col-4">

                    </div>
                </div>
                <div class="card right mt-3 shadow-lg" style="width: 30%;  float: right; right: 15px;">
                    <div class="card-body text-center">
                        <h4 style="color: purple;"><strong>Added Teachers</strong></h4>
                    </div>
                    <?php
            $query = "SELECT * FROM users WHERE who = 'teacher' ORDER BY sno ASC";
            $result = mysqli_query($conn, $query);
            while($row = mysqli_fetch_array($result)){
        ?>
                        <div class="FullName mb-4" style="border-radius: 50px;">
                            <img src="  <?php echo $row['profile'];?>"class="img-thumbnail" height="200px" width="200px" alt="" style="width: 40px; position: absolute;left:67px; ">
                            <h4><strong>
                            

                        <?php echo $row['name'];?>
                    </strong></h4>
                        </div>

                        <?php }?>

                </div>
                <form name='registration' action="/WTE3/addteachers.php" class="text-center" method="post" enctype="multipart/form-data">

                    <div class="card right mt-5 shadow-lg" style="width: 40%;  float: left; left: 205px; background-color: purple; color: white;">
                       


                        <div class="mb-3 mt-3">

                            <input type="text" id="disabledTextInput" name="name" class="form-control lg mb-4" placeholder="Enter Full Name" style="border-radius: 50px; width: 500px; height: 45px;">
                            </di`v>
                            <div class="mb-3">
                                <select id="disabledSelect" class="form-select" name="department" style="border-radius: 50px; width: 500px; height: 45px;">
                            <option>Select Department</option>
                            <option>Computer Engineering</option>
                            <option>Electronics and Computer Science Engineering.</option>
                            <option>Information Technology</option>
                            <option>Mechnaical Engineering</option>
                            <option>AI and Data Science</option>
                            <option>Science and Humanities</option>
                        </select>
                            </div>


                            <div class="mb-3">
                                <input type="text" id="disabledTextInput" class="form-control lg" name="username" placeholder="Enter E-Mail ID" style="border-radius: 50px; width: 500px; height: 45px;">
                            </div>


                            <div class="mb-3">
                                <input type="text" id="disabledTextInput" class="form-control lg" name="password" placeholder="Create Passward" style="border-radius: 50px; width: 500px; height: 45px;">
                            </div>
                            <div class="mb-3">
                                <input type="text" id="disabledTextInput" class="form-control lg" name="cpassword" placeholder="Enter Passward Again" style="border-radius: 50px; width: 500px; height: 45px;">
                            </div>
                            <div class="col text-white">
                                <h6>Upload Image for Profile Picture</h6>
                                <input type="file" name="profile" id="profile" class="upld-file text-white"><br>

                            </div>
                            <button type="submit" style="color: purple;" class="btn btn-primary bg-white btn-md mb-3">Submit</button>
                </form>
                </div>




                <!-- Optional JavaScript; choose one of the two! -->

                <!-- Option 1: Bootstrap Bundle with Popper -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js " integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj " crossorigin="anonymous "></script>

                <!-- Option 2: Separate Popper and Bootstrap JS -->
                <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js " integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp " crossorigin="anonymous "></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js " integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/ " crossorigin="anonymous "></script>
    -->
        </body>

        </html>