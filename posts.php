<?php
    session_start();
    include("include/connect.php");
    include("include/header.php");
    echo $_SESSION['name'];
    ?>
            <!----start content--------->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2" id="side-area">
                            <h4>لوحة التحكم</h4>
                            <ul>
                                <li>
                                    <a href="catagories.php">
                                        <span><i class="fas fa-tags"></i></span>
                                        <span>التصنيفات</span>
                                    </a>
                                </li>
                                
                                <!---------articles--------->
                                <li data-toggle="collapse" href="#menu">
                                    
                                    <a href="#">
                                        <span><i class="far fa-newspaper"></i></span>
                                        <span>المقالات</span>
                                    </a>
                                </li>
                                <ul class="collapse" id="menu">
                                    <li>
                                        <a href="newpost.php">
                                            <span><i class="fas fa-edit"></i></span>
                                            <span>مقال جديد</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="posts.php">
                                            <span><i class="fas fa-th"></i></span>
                                            <span>كل المقالات</span>
                                        </a>
                                    </li>
                                </ul>

                            <!----end  articles--------->
                                <li>
                                    <a href="index.php" target="_blank">
                                        <span><i class="fas fa-window-restore"></i></span>
                                        <span>عرض الوقع</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="logout.php">
                                        <span><i class="fas fa-sign-out-alt"></i></span>
                                        <span>تسجيل الخروج</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <div class="col-md-10" id="main-area">
                            <!-- display posts -->
                            <table class="table">
                                    <tr style="color:#fff;background-color: var(--first-color)!important;">
                                        <th>رقم المقال</th>
                                        <th>عنوان المقال</th>
                                        <th>كاتب المقال</th>
                                        <th>صورة المقال</th>
                                        <th>تصنيف المقال</th>
                                        <th>تاريخ المقال</th>
                                        <th>تعديل المقال</th>
                                        <th>حذف المقال</th>
                                    </tr>  
                            <?php
                                $sql="SELECT * FROM `posts`WHERE postAuthor='$_SESSION[name]' ORDER BY postDate DESC;;";
                                $res=mysqli_query($conn,$sql);
                                $no=0;
                                while($row=mysqli_fetch_assoc($res)){
                                    $no++;
                                    ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $row['postTitle']; ?></td>
                                        <td><?php echo $row['postAuthor']; ?></td>
                                        <td><?php echo"<img src='$row[postImage]' width='100px' height='80px'>";  ?></td>
                                        <td><?php echo $row['postCat']; ?></td>
                                        <td><?php echo $row['postDate']; ?></td>
                                        <td><a href="editpost.php?id=<?php echo $row['idpost']; ?>&title=<?php echo $row['postTitle']; ?>&catagory=<?php echo $row['postCat']; ?>&image=<?php echo $row['postImage']; ?>&content=<?php echo $row['postContent']; ?>" class="btn btn-custom" name="delete">تعديل المقال</a></td>
                                        <td><a href="deletpost.php?id=<?php echo $row['idpost']; ?>" class="btn btn-custom" name="delete">حذف المقال</a></td>
                                        </tr> 

                                    
                            <?php        
                                }
                            ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <!----end content--------->
        <!----jquery and bootstrap.js--------->
        <?php
        include("include/footer.php");
    ?>