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
            $sql = "INSERT INTO `users` (`year`, `department`, `who`, `username`, `document`, `password`, `dt`, `sno`, `name`, `status`, `profile`,`doc`) VALUES ('$year', '$department', '$who', '$username', '$folderdoc', '$hash', current_timestamp(), '$sno', '$name', 'pending', '$folderprof', '$folderdoc');";
            $result = mysqli_query($conn, $sql);
            echo '<script type  = "text/javascript">';
        echo 'alert("Your account is now pending for approval!");';
        echo 'window.location.href = "register.php"';
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
    <!DOCTYPE html>
    <html>

    <head>
        <title>Register</title>
        <link rel="stylesheet" type="text/css" href="CSS/register.css">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <link rel="stylesheet" href="CSS/style.css">
        <link rel="stylesheet" href="CSS/main.css">
        
        <script src="script.js"></script>
        <script src="ClientValidation.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>

    <body>
    

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
                    <a class="btn btn-default btn-sm" href="first.html"><button style="background-color:purple; border:purple" type="button submit"  name="back" value="Deny" class="btn btn-danger"><i class="fa fa-arrow-circle-left" aria-hidden="true"> Back</i></button>

        </a>
                </div>
                <div class="text-center">
                <?php
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created and you can login
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    ?>
                </div>
                <div class="text-center">
                    <h2>Register</h2><br>

                </div>
            </div>
        <div class="login text-center mb-5">
            <form name='registration'action="/WTE3/register.php" method="post" onsubmit="return validateregister();" enctype="multipart/form-data">
                <ul>
                    <div class="row mb-3 mt-5"> 
                        <div class="col-sm-12 col-md-6">
                            <li><input type="text" placeholder="Enter Your Full Name" name="name" id="fullname" size="12" class="form-control lg " /></li>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <li><select class="form-select" name="year" id="year" aria-label="Default select example">
  <option value="">Select Class</option>
  <option value="First Year">First Year</option>
  <option value="Second Year">Second Year</option>
  <option value="Third Year">Third Year</option>
  <option value="Fourth Year">Fourth Year</option>
  <option value="Not Applied">Not Applied</option>
 
  
</select></li>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 col-md-6">
                            <li><select class="form-select" name="department" id="department" aria-label="Default select example">
                            <option value="">Select Department</option>
                            <option value="Computer Engineering">Computer Engineering</option>
                            <option value="Information Technology">Information Technology</option>
                            <option value="Electronics and Computer Science">Electronics and Computer Science</option>
                            <option value="Mechanical Engineering">Mechanical Engineering</option>
                            <option value="AI and Data Science">AI and Data Science</option>
                            <option value="Science and Humanities">Science and Humanities</option>
                            <option value="Not Applied">Not Applied</option>
                           
                            
                          </select></li>
                        </div>
                        <div class="col-sm-12 col-md-6">

                            <li><select class="form-select" name="who" id="who" aria-label="Default select example">
                                <option value="">Who are you</option>
                                <option value="Teacher">Teacher</option>
                                <option value="Students">Students</option>
                                <option value="Alumni">Alumni</option>
                              </select></li>

                        </div>
                    </div>
                    <div class="row mb-3">

                        <div class="col-sm-12 col-md-6">
                            <li><input type="text" placeholder="Enter Your E-Mail Id" name="username" id="username" size="12" class="form-control lg" /></li>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <li><input type="passwrd" placeholder="Create password" name="password" id="password" size="12" class="form-control lg" /></li>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 col-md-6">
                            <li><select class="form-select" name="doc" id="doc" aria-label="Default select example">
                            <option value="">Select Document</option>
                            <option value="College Id">College Id</option>
                            <option value="Marksheet">Marksheet</option>
                            <option value="Other">Other</option>
                          </select></li>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <li><input type="" placeholder="Enter Password Again" name="cpassword" id="cpassword" size="12" class="form-control lg" /></li>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col text-white" style="border-right:2px solid white">
                           <h6>Upload Image for Profile Picture</h6>
                        <input type="file" name="profile" id="profile" class="upld-file text-white"><br>

                        </div>
                        <div class="col text-white">
                        <h6>Upload Image of Valid Document for Verification</h6>
                        <input type="file" name="document" id="document" class="upld-file text-white" value="" />

                        </div>
                    </div>

                    <button type="submit" name="submit" value="submit" style="color: purple; border-radius: 25px;" class="btn btn-primary bg-white btn-md mb-3 mt-3">Submit</button>
                    <li><a style="color: white;text-decoration: none;" href="register.html">Already have account? Login here</a></li>
                </ul>
            </form>
        </div>
        <script>
            $(".upld-file").change(function(event) {



                var ev = event.target;

                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = imageIsLoaded;
                    reader.readAsDataURL(this.files[0]);
                }

                function imageIsLoaded(e) {
                    $(ev).parent().siblings('.fea-img').attr("src", e.target.result);

                };
            });
        </script>
         <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </body>

    </html>