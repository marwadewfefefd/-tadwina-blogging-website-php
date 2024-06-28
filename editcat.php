<?php
    session_start();
    include("include/connect.php");
    include("include/header.php");
$id=$_GET['id'];
$cata=$_GET['cata'];
    if(isset($_POST['add'])){
        $cName=$_POST['category'];
        if(empty($cName)){
             echo "<div class='alert alert-danger text-center'>حقل التصنيف فارغ  </div>";
        }
        else{
            $sql=" UPDATE `catagories` SET`catagoryName`= '$cName' WHERE id='$id';";
            $r=mysqli_query($conn,$sql);
            if($r){
                echo "<div class='alert alert-success text-center'>تم تعديل التصنيف بنجاح </div>";
            }
            else{echo "<div class='alert alert-danger text-center'>حدث خطأ  </div>";}
    }
}
    ?>
        <!----start content--------->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2" id="side-area">
                            <h4>لوحة التحكم</h4>
                            <ul>
                                <li>
                                    <a href="">
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
                            <div class="add-category">
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label for="category">تصنيف جديد</label>
                                        <input type="text" name="category" class="form-control" value="<?php echo $cata ;?>">
                                    </div>
                                    <button class=" btn btn-custom form-control" name="add">تعديل</button>
                                </form>
                            </div>
                            <!----------------Display catagories-------------------->
                           
                        </div>
                    </div>
                </div>
            </div>
        <!----end content--------->
        <!----jquery and bootstrap.js--------->
    <?php
        include("include/footer.php");
        
    ?>
