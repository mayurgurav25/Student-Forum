<div class="parent">
    <?php
            $query = "SELECT * FROM threads WHERE status='approved' ORDER BY sno DESC";
            $result = mysqli_query($conn, $query);
            
            while($row = mysqli_fetch_array($result)){
            
            $post_userid=  $row['post_userid'];    
            $query2 = "SELECT * FROM users Where username='$post_userid'";
            $result2 = mysqli_query($conn, $query2);
            $row2 = mysqli_fetch_array($result2)
        ?>
        <li id="colorful">
            <div class="card mt-4 shadow-lg" style="width: 97%; left: 15px;">
                <div class="card-body">
                    <div class="cardtop" style="background-color: rgb(228, 228, 228); display: flex; border-radius: 50px;">
                    <img src="<?php echo $row2['profile'];?>" class="img-thumbnail" height="30px" width="40px" style="border-radius: 50%;">
                        <h6 class="mt-2 ml-2"><?php echo $row2['name']?></h6>

                    </div>
                    <?php 
                    if($row['img']=='postImage/'){
                        echo $row['post'];
                      
                    }
                    else{
                        ?>
                        <img src="<?php echo $row['img'];?>" class="img-thumbnail" height="400px" width="400px">
                        <?php  echo $row['post'];?>

                   <?php }?>
                    
                   <div class="time" style="float:right;">
                   
                   <p style="font-size:12px; position:absolute;right:10px;bottom:0px;" class="text-muted"><?php  echo $row['dt'];?>
</p>

                   </div>
                </div>
        </li>
        <?php
            }
            ?>



        </div>