<?php
    session_start();
    include("include/connect.php");
    include("include/header.php");
    if(!isset($_SESSION['id'])){
        echo "<div class='alert alert-danger text-center'>غير مسموح لك فتح هذه الصفحة</div>";
        header('REFRESH:2;URL=login.php');
    }
    else{
    if(isset($_POST['add'])){
        $cName=$_POST['category'];
        if(empty($cName)){
             echo "<div class='alert alert-danger text-center'>حقل التصنيف فارغ  </div>";
        }elseif($cName>100){
             echo "<div class='alert alert-danger text-center'> اسم التصنيف اكبر من اللازم</div>";
        }else{
            $sql="INSERT INTO `catagories`( `catagoryName`) VALUES ('$cName');";
            $r=mysqli_query($conn,$sql);
            if($r){
                echo "<div class='alert alert-success text-center'>تم إضافة التصنيف بنجاح </div>";
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
                                        <input type="text" name="category" class="form-control">
                                    </div>
                                    <button class=" btn btn-custom form-control" name="add">إضافة</button>
                                </form>
                            </div>
                            <!----------------Display catagories-------------------->
                            <div class="display-cat mt-5">
                            <table class="table ">
                                    <tr style="color:#fff;background-color: var(--first-color)!important;">
                                        <th>رقم الفئة </th>
                                        <th>اسم الفئة</th>
                                        <th>تاريخ الاضافة</th>
                                        <th>تعديل المقال</th>
                                        <th>حذف التصنيف</th>
                                    </tr>
                                    <?php
                                        $sqll="select * from catagories ORDER BY catagoryDate DESC";
                                        $res=mysqli_query($conn,$sqll);
                                        $no=0;
                                        while($row=mysqli_fetch_assoc($res)){
                                            $no++;
                                    ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $row['catagoryName']; ?></td>
                                        <td><?php echo $row['catagoryDate']; ?></td>
                                        <td><a href="editcat.php?id=<?php echo $row['id']; ?>&cata=<?php echo $row['catagoryName']; ?>" class='btn btn-custom' name="edit" >  تعديل </td>
                                        <td><a href="deletcat.php?id=<?php echo $row['id']; ?>" class='btn btn-custom' name="delete" >  حذف </td>
                                    </tr>



                                    <?php
                                        }
                                    ?>

                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!----end content--------->
        <!----jquery and bootstrap.js--------->
    <?php
        include("include/footer.php");
        }
    ?>
    