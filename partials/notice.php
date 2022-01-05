<?php
include '_dbconnect.php';
               $username=$_SESSION['username'];
               $sql2 = "SELECT * FROM `users` WHERE username ='$username'";
               $result2 = mysqli_query($conn, $sql2);
               $row2 = mysqli_fetch_assoc($result2);
               
       ?>
    <div class="card right mt-3 shadow-lg" style="width: 30%;  float: right; right: 15px; position:fixed;">
        <div class="card-body text-center">
            <img src="<?php echo $row2['profile'];?>" alt="" style="max-width: 250px; max-height=250px; border-radius: 50%;">
        </div>
        <div class="FullName">
            <h4><strong><?php echo $row2['name'];?></strong></h4>
        </div>
        <div class="mt-2">
            <h6> <?php echo $row2['year'];?></h6>
            <h6 style="color: rgb(124, 124, 124);">
                <?php echo $row2['who'];?>
            </h6>
        </div>
        <div class="card right mt-3 mb-3" style="width: 82%; background-color: purple; color: white;">
            <div class="card-body text-center">
                <h4><strong>Rules</strong></h4>
                <ul>
                    <li>No Spamming</li>
                    <li>No Self promotion</li>
                    <li>Sometghing else</li>
                    <li>bvmvnm</li>
                    <li>bmbmb </li>

                </ul>
            </div>
        </div>
    </div>