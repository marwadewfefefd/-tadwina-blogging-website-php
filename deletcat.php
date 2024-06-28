    <?php
        session_start();
        include("include/connect.php");
        $id=$_GET['id'];
        $sqll="DELETE FROM `catagories` WHERE id='$id' ";
        $r=mysqli_query($conn,$sqll);
        if($r){
            header('location:catagories.php');
        }
     ?>