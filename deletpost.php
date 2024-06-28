        <?php
            session_start();
            include("include/connect.php");
            $id=$_GET['id'];
            $sqll="DELETE FROM `posts` WHERE idpost='$id' ";
            $r=mysqli_query($conn,$sqll);
            if($r){
                header('location:posts.php');
            }
            
        ?>