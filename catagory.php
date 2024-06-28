<?php
  
    include("include/connect.php");
    include("public/header.php");
    ?>
    <!-----------start content------------->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <?php
                        $cat=$_GET['catagory'];
                        $sql="SELECT * FROM `posts` WHERE postCat='$cat' ORDER by 	idpost DESC;";
                        $r=mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_assoc($r)){
                    ?>
                     <div class="post">
                        <div class="post-image"><img src="<?php echo $row['postImage']; ?>"></div>
                        <div class="post-title"><h4><a href="post.php?id=<?php echo $row['idpost']; ?>"><?php echo $row['postTitle'];  ?></a></h4></div>
                        <div class="post-details">
                            <p class="post-info">
                                <span><i class="fas fa-user"></i><?php echo $row['postAuthor']; ?></span>
                                <span><i class="far fa-calendar-alt"></i><?php echo $row['postDate']; ?></span>
                                <span><i class="fas fa-tags"></i><?php echo $row['postCat']; ?></span>
                            </p>
                            <p class="postContent">
                                <?php
                                echo $row['postContent'];
                                ?>
                            </p>
                        </div>       
                    </div>
                    <?php
                    }
                    ?>
                   
                </div>
                
                    <!--------------------العمود الثاني 3---------------------->
                    <!-------------------- start catagories---------------------->
                <div class="col-md-3">
                    <div class="catagories">
                        <h4>التصنيفات</h4>
                        <ul>
                            <?php
                            $sql="SELECT * FROM `catagories` ORDER BY id DESC ";
                            $res=mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_assoc($res)){
                            ?>

                            <li><a href="catagory.php?catagory=<?php echo $row['catagoryName']; ?>">
                                <span><i class="fas fa-tags"></i></span>
                                <span><?php echo $row['catagoryName']; ?></span>
                            </a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                    <!-------------------- end catagories---------------------->
                    <!-------------------- start latest post---------------------->
                    <div class="last-posts">
                        <h4>احدث المنشورات</h4>
                        <ul>
                            <?php 
                            $sqll="SELECT * FROM `posts` ORDER BY 'idpost'  DESC LIMIT 3";
                            $r=mysqli_query($conn,$sqll);
                            while($row=mysqli_fetch_assoc($r)){
                                ?>
                            <li>
                                <a href="post.php?id=<?php echo $row['idpost']; ?>">
                                    <span class="span-image"><img src="<?php echo $row['postImage']; ?>"></span>
                                    <span><?php echo $row['postTitle'];?></span>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <!-------------------- end latest post---------------------->
                </div>
            </div>
        </div>
    </div>

    <?php
    include("public/footer.php");
    ?>