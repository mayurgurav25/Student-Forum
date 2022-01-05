<?php
include '_dbconnect.php';
               $username=$_SESSION['username'];
               $sql2 = "SELECT * FROM `users` WHERE username ='$username'";
               $result2 = mysqli_query($conn, $sql2);
               $row2 = mysqli_fetch_assoc($result2);
               
       ?>
<div class="card left mt-3 shadow-lg " style="width: 67%; left: 15px;">
        <button type="button" class="btn" style="border-radius: 50px; height: 40px; background-color: rgb(228, 228, 228); color: black;" data-toggle="modal" data-target="#exampleModal">
           <p style="float: left;">Post</p>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Post</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
                    </div>
                    <div class="modal-body">
                        <div class="container px-4 py-5 mx-auto">
                            <div class="row d-flex justify-content-center">
                                <div class="card">
                                    <div class="row"> <img class="profile-pic mr-3" src="<?php echo $row2['profile'];?>">
                                        <div class="flex-column">
                                            <h3 class="mb-0 font-weight-normal"><?php echo $_SESSION['username']?></h3>
                                        </div>
                                    </div>
                                    <form name='post'action="/WTE3/mainAdmin.php" method="post" enctype="multipart/form-data">
                                        <div class="alert-dismissible alert alert-success" id="postSaveMsg" style="display:none"></div>
                                    <div class="row px-3 form-group"> 
                                        <textarea class="text-muted bg-light mt-4 mb-3" name="post" id="post" placeholder="Hi <?php echo $row2['name']?>, what's on your mind today?"></textarea>
                                        <?php
                                        $datetime = date("Y/m/d h:i:sa");
                                        ?>
                                        <input type="hidden" name="published_date" value='<?php echo $datetime;?>'>
                                     </div>
                                    <div class="row px-3">
                                        <div class="container mb-3">
                                            <div class="row">
                                                <input type="file" name="img" class="upld-file">
                                            </div>
                                        </div>
                                        <button type="submit" name="submit" value="submit" style="color: purple; border-radius: 25px;" class="btn btn-primary bg-white btn-md mb-3 mt-3">Submit</button>
                                        </form>
                                      </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="list mt-3 ">
            <ul style="display: flex; list-style: none; ">
                <li style=" background-color: rgb(228, 228, 228); padding: 5px 25px;  " data-toggle="modal" data-target="#exampleModal">
                    Photo
                </li>
                <li style="margin-left: 20px; text-decoration: none; background-color: rgb(228, 228, 228); padding: 5px 25px; " data-toggle="modal" data-target="#exampleModal">Video</li>
                <li style="margin-left: 20px; background-color: rgb(228, 228, 228); padding: 5px 25px; " data-toggle="modal" data-target="#exampleModal">Document</li>
            </ul>
        </div>


    </div>