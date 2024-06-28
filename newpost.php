<?php
session_start();
    include("include/connect.php");
    include("include/header.php");



    if(isset($_POST['add'])){
        $pTitle=$_POST['title'];
        $pCat=$_POST['catagory'];
        $pContent=$_POST['content'];
        $pAuthor=$_SESSION['name'] ;
        
        if(empty($pTitle)||empty($pContent)){
            echo"<div class='alert alert-danger text-center'>الرجاء ملء الحقل ادناه </div>";
        }elseif($pContent>10000){
            echo"محتوى المنشور كبير جدا";
        }else{
            if(isset($_FILES['postImage'])){
                $imageName=$_FILES['postImage']['name'];
                $imageTmp=$_FILES['postImage']['tmp_name'];
                $imageType=$_FILES['postImage']['type'];
                $imageSize=$_FILES['postImage']['size'];
                $imageError=$_FILES['postImage']['error'];
                $ext='uploads/postimages/';
                $mmm=rand(0,1000).basename($imageName);
                $ext=$ext.$mmm;
                move_uploaded_file($imageTmp,$ext);
                $sql="INSERT INTO `posts`(`postTitle`, `postCat`,`postImage`,`postContent`,`postAuthor`) VALUES ('$pTitle','$pCat','$ext','$pContent','$pAuthor')";
                $result=mysqli_query($conn,$sql);
                if($result){echo "<div class='alert alert-success text-center'>تم اضافة المنشور بنجاح  </div>";}
                else{echo"<div class='alert alert-danger text-center'>حدث خطأ  </div>";}

            }
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

            <!------------------------>
            <div class="col-md-10" id="main-area">
                <div class="tit"><button class="btn btn-custom2">اضف مقال جديد</button></div>
                <div class="add-category">
                    <form action="" method="POST" enctype="multipart/form-data"> 
                        <div class="form-group">
                            <label for="title">عنوان المقال</label>
                            <input type="text" name="title" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="cate">التصنيف</label>
                            <select class=" form-control" name='catagory' id="cate">
                                <?php
                                $query="SELECT * FRoM catagories";
                                $res=mysqli_query($conn,$query);
                                while($row=mysqli_fetch_assoc($res)){
                                ?>
                                <option>
                                    <?php  echo $row['catagoryName']; ?>
                                </option>

                                <?php 
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="image">صورةالمقالة</label>
                            <input type="file" id="image" class="form-control" name="postImage">
                            
                        </div>

                        <div class="form-group">
                            <label for="content">نص المقال</label>
                            <textarea class="form-control area" style="height:150px;" name="content"></textarea>
                        </div>

                        <button class=" btn btn-custom form-control" name="add">نشر المقالة</button>
                    </form>
                </div>
            </div>
            <!------------------------>
        </div>
    </div>
</div>
            <!----end content--------->
            <!----jquery and bootstrap.js--------->
    <?php
        include("include/footer.php");
    ?>