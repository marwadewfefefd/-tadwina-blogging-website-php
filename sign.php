<?php
    session_start();
    include("include/connect.php");
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>إنشاء جساب</title>
    <!---------  font--------------------->
    <link rel="stylesheet" href="css/font/Janna_LT_Regular.ttf">
    <link rel="stylesheet" href="css/all.min.css">
    <!-----------Bootstrap---------------->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-rtl.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <style>
        .sign{
            width:500px;
            margin:80px auto;
            background-color: #eaeaea;
            padding: 20px;
            border-radius: 25px;
            border:1px solid #eaeaea;
        }
        .sign h5{
            color: #5b4834;
            margin-bottom: 20px;
            text-align:center;
            
        }
        .sign button{
            margin-right:150px;
            width:120px;
        }
        body{
            background-color:#f1f2f6;
        }
    </style>
    </head>
    <body>
        <div class="sign">
            <?php
                if(isset($_POST['sign'])){
                    $username=$_POST['name'];
                    $usermail=$_POST['mail'];
                    $userpass=$_POST['password'];
                    if(empty($username)||empty($usermail)||empty($userpass)){
                        echo "<div class='alert alert-danger text-center'>الرجاء ملء الحقل ادناه </div>";
                    }
                    else{
                        $sql="INSERT INTO `users`(`uname`, `uemail`, `upassword`) VALUES ('$username','$usermail','$userpass')";
                        $result=mysqli_query($conn,$sql);
                        if($result){
                            header('location:index.php');
                        }
                    }
                }
                ?>

            <form method="POST" action="">
                <h5>إنشاء جساب  </h5>
                    <div class="form-group">
                    <label for="name">اسم المستخدم </label>
                    <input type="text" class="form-control" id="name/" name="name">
               </div>
                <div class="form-group">
                    <label for="mail">البريد الالكتروني</label>
                    <input type="text" class="form-control" id="mail/" name="mail">
                </div>

                <div class="form-group">
                    <label for="pass">كلمة السر</label>
                    <input type="password" class="form-control" id="pass/"  name="password">
                </div>
                <button class="btn btn-custom" name="sign">إرسال </button>
            </form>
        </div>
    
    <!----jquery and bootstrap.js--------->
    <?php
    include("include/footer.php");
?>