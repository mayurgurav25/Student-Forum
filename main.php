
<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}

?>
<?php
    include 'partials/_dbconnect.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';
    $post = $_POST["post"];
    $username =$_SESSION['username'];
    $imagename = $_FILES["img"]["name"];
    $imagetempname = $_FILES["img"]["tmp_name"];
    $folderimg = 'postImage/'.$imagename;
    $sql =" INSERT INTO `threads` (`post`, `dt`,`sno`,`img`,`username`) VALUES ('$post', current_timestamp(), '$sno', '$folderimg',$username)";
    $result = mysqli_query($conn, $sql);
    if (move_uploaded_file($imagetempname, $folderimg))  {
        $msg = "document uploaded successfully";
    }else{
        $msg = "Failed to upload document";
    }
}

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
    <title>Welcome -<?php echo $_SESSION['username']?></title>

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
        <div class="dropdown">
            <!-- three dots -->
            <ul class="dropbtn icons btn-right showLeft" onclick="showDropdown()">
                <li></li>
                <li></li>
                <li></li>
            </ul>
            <!-- menu -->
            <div id="myDropdown" class="dropdown-content" style="position: relative;">
                <a href="logout.php">Sign-Out</a>
            </div>
        </div>

    </div>
   
   <?php
    include 'partials/notice.php';
   include 'partials/postArea.php'; ?>
    <table>
        <tr>
            <td>
                <td style="width: 90.9%;">
                    <hr style="height: 2px; background-color: rgb(0, 0, 0); color: rgb(3, 2, 2);">
                    <td>
                        <select>
                            <option>   Sort</option>
                            <option>Most Likes</option>
                        </select>
                    </td>
                </td>
            </td>
        </tr>
    </table>
    <?php
include 'partials/Threads.php';?>




        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js " integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj " crossorigin="anonymous "></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js " integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp " crossorigin="anonymous "></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js " integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/ " crossorigin="anonymous "></script>
    -->
</body>

</html>