<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"]; 

    // $sql = "Select * from users where username='$username' AND password='$password'";
    $sql = "Select * from users where username='admin@gmail.com' AND status = 'approved'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        while($row=mysqli_fetch_assoc($result)){
            if (password_verify($password, $row['password'])){ 
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
              
                header("location: mainAdmin.php");
            } 
            else{
                $showError = "Invalid Credentials";
               
            }
        }
        
    } 
    else{
        $showError = "Invalid Credentials";
    }
}
    
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="CSS/login.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/main.css">
    <script src="script.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
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
                    <a class="btn btn-default btn-sm" href="first.html"><button style="background-color:purple; border:purple" type="button submit" name="back" class="btn btn-danger"><i class="fa fa-arrow-circle-left" aria-hidden="true"> Back</i></button>

        </a>


                </div>
                <div class="text-center">
                    <h2>Login</h2><br>
                </div>
            </div>

    
    <div class="text-center">
    <?php
    if($login){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in
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
    <div class="login text-center">
        
        <form name='login' action="/WTE3/loginAdmin.php" method="POST" onsubmit="return validate()">

            <ul>

                <li><input type="text" placeholder="Enter User Id" name="username" size="12" class="form-control lg mb-3 mt-4" /></li>
                <li><input type="password" placeholder="Enter Password" name="password" size="12" class="form-control lg" /></li>
                <button type="submit" name="submit" value="submit" style="color: purple; border-radius: 25px;" class="btn btn-primary bg-white btn-md mb-3 mt-3">Submit</button>
            </ul>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>

   