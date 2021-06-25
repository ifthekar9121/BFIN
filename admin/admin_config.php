<?php 
    
    include "inc/connection.php";
    session_start();

    if(isset($_POST['adminsignup'])){

        $name = $_POST['a_name'];  
        $mail = $_POST['a_email'];
        $password=($_POST['a_password']);

        $mailcheck = "SELECT * FROM admins WHERE a_email='$mail'";
        if (mysqli_num_rows(mysqli_query($db, $mailcheck))>0) {
        ?>
            <script type="text/javascript">
                alert('Email is already registered! Try With another Email');
                location="admins.php";
            </script>";
        <?php
        }
        else{

            $sql = "INSERT INTO admins (a_name, a_email, a_password) VALUES ('".$name."','".$mail."','".$password."')";

            if (mysqli_query($db, $sql)) {?>
                <script type="text/javascript">
                    alert('Successful!');
                    location="admins.php";
                </script>";
            <?php
            } 
            else{
                echo "<script type='text/javascript'>alert('Failed!')</script>";
            }
        }
    }

    if(isset($_POST['adminsignin'])){
        $email=$_POST['email'];
        $password = $_POST['pass'];

        $sql = " SELECT COUNT(*) FROM admins WHERE( a_email='".$email."' AND a_password='".$password."') ";

        $qury = mysqli_query($db, $sql);

        $result = mysqli_fetch_array($qury);

        if($result[0]>0)
        {
            $sessionSql = " SELECT a_id FROM admins WHERE ( a_email='".$email."' AND a_password='".$password."') ";
            $sessionQury = mysqli_query($db, $sessionSql);
            while($row = mysqli_fetch_array($sessionQury, MYSQLI_BOTH)){

                $_SESSION['a_id'] = $row['a_id'];
                header("Location: dashboard.php");
                exit();
                
            }               
        }
        else
        {
        ?>
            <script type="text/javascript">
                alert('Does not match Email or Password!');
                location="index.php";
            </script>";
        <?php
        }
    }

    if(isset($_POST['story-unlist'])){
        $p_id = $_POST['p_id'];

        $sql = "UPDATE posts SET p_status = '0' WHERE p_id ='".$p_id."'";

        if (mysqli_query($db, $sql)) {?>
            <script type="text/javascript">
                alert('Unlist Successful!');
                location="dashboard.php";
            </script>";
        <?php
        } 
        else {?>
            <script type="text/javascript">
                alert('Unlist Failed!');
                location="dashboard.php";
            </script>";
        <?php
        }
    }

    if(isset($_POST['story-list'])){
        $p_id = $_POST['p_id'];

        $sql = "UPDATE posts SET p_status = '1' WHERE p_id ='".$p_id."'";

        if (mysqli_query($db, $sql)) {?>
            <script type="text/javascript">
                alert('List Successful!');
                location="dashboard.php";
            </script>";
        <?php
        } 
        else {?>
            <script type="text/javascript">
                alert('List Failed!');
                location="dashboard.php";
            </script>";
        <?php
        }
    }

    if(isset($_POST['del-cmnt'])){
        $cmnt_id = $_POST['cmnt_id'];

        $sql = "DELETE FROM comment WHERE cmnt_id='$cmnt_id'";

        if (mysqli_query($db, $sql)) {?>
            <script type="text/javascript">
                alert('Delete Successful!');
                location="dashboard.php";
            </script>";
        <?php
        } 
        else {?>
            <script type="text/javascript">
                alert('Delete Failed!');
                location="dashboard.php";
            </script>";
        <?php
        }
    }

    if(isset($_POST['admin-del'])){
        $a_id = $_POST['a_id'];

        $sql = "DELETE FROM admins WHERE a_id='$a_id'";

        if (mysqli_query($db, $sql)) {?>
            <script type="text/javascript">
                alert('Delete Successful!');
                location="admins.php";
            </script>";
        <?php
        } 
        else {?>
            <script type="text/javascript">
                alert('Delete Failed!');
                location="admins.php";
            </script>";
        <?php
        }
    }

    if(isset($_POST['user_block'])){
        $u_id = $_POST['u_id'];

        $sql = "UPDATE users SET u_status = '0' WHERE u_id ='".$u_id."'";

        if (mysqli_query($db, $sql)) {?>
            <script type="text/javascript">
                alert('Block Successful!');
                location="users.php";
            </script>";
        <?php
        } 
        else {?>
            <script type="text/javascript">
                alert('Block Failed!');
                location="users.php";
            </script>";
        <?php
        }
    }

    if(isset($_POST['user_unblock'])){
        $u_id = $_POST['u_id'];

        $sql = "UPDATE users SET u_status = '1' WHERE u_id ='".$u_id."'";

        if (mysqli_query($db, $sql)) {?>
            <script type="text/javascript">
                alert('Unblock Successful!');
                location="users.php";
            </script>";
        <?php
        } 
        else {?>
            <script type="text/javascript">
                alert('Unblock Failed!');
                location="users.php";
            </script>";
        <?php
        }
    }

    if(isset($_GET['search'])){
        $searchKey = $_GET['search'];
        // echo $searchKey;
        $searchResult = '';
        // append
        $query6 = "SELECT * FROM posts 
                    WHERE p_title LIKE '%$searchKey%' 
                    OR p_section LIKE '%$searchKey%' 
                    OR p_tag LIKE '%$searchKey%' 
                    OR p_body LIKE '%$searchKey%' ORDER BY p_id";

        $all_posts = mysqli_query($db,$query6);
        while ($row = mysqli_fetch_assoc($all_posts)) {
            $p_id           = $row['p_id'];
            $p_title        = $row['p_title'];
            $p_image        = $row['p_image'];
            $p_caption      = $row['p_caption'];
            $p_author       = $row['p_author'];
            $p_body         = $row['p_body'];
            $p_section      = $row['p_section'];
            $p_tag          = $row['p_tag'];
            $p_status       = $row['p_status'];

        $searchResult = '
        <div class="story-area">
            <div class="title">
                <h4>' .$p_title.'(<i class="float-right">search-result</i>)</h4>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-5 col-xs-5">
                    <div class="story-img">
                        <img src="../' .$p_image.'" alt="" class="img-fluid">
                    </div>
                    <div class="story-cap">
                        <p>' .$p_caption.'</p>
                    </div>
                        <div class="story-info">
                        <div class="story-author">';
                            
                            $query = "SELECT * FROM users WHERE u_id='".$p_author."'";
                            $user = mysqli_query($db,$query);
                            while ($row = mysqli_fetch_assoc($user)) {
                                $u_name = $row['u_name'];
                            
                            
                                $searchResult .= '<h6>Author: ' .$u_name.'</h6>'; }
                        $searchResult .= '</div>
                        <div class="story-section">
                            <h6>Section: ' .$p_section.'</h6>
                        </div>
                        <div class="story-tag">
                            <h6>Tags: ' .$p_tag.'</h6>
                        </div>
                    <div>';
                    if($p_status != 0) {
                        $searchResult .= '<form action="admin_config.php" method="post">
                            <input type="hidden" class="form-control" name="p_id" id="p_id" value="' .$p_id.'">
                            <input type="submit" class="Link" name="story-unlist" value="Unlist Story">
                        </form>'; }
                    else{
                        $searchResult .= '<form action="admin_config.php" method="post">
                            <input type="hidden" class="form-control" name="p_id" id="p_id" value="' .$p_id.'">
                            <input type="submit" class="Link" name="story-list" value="List Story">
                        </form>';
                    }
                    $searchResult .= '</div>
                </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-7 col-xs-7">
                    <div class="">
                        <p>' .$p_body.'</p>
                    </div>
                </div>
            </div>
        </div>';
        echo $searchResult;
        }
        // append
        
    }

    if(isset($_GET['suser'])){
        $searchKey = $_GET['suser'];

        $searchResult = '';
        
        $query = "SELECT * FROM users 
                    WHERE u_name LIKE '%$searchKey%' 
                    OR u_email LIKE '%$searchKey%' 
                    OR u_phone LIKE '%$searchKey%' 
                    OR u_dob LIKE '%$searchKey%'
                    OR u_gender LIKE '%$searchKey%'
                    ORDER BY u_id DESC";
        $count = 0; 
        $user = mysqli_query($db,$query);

        while ($row = mysqli_fetch_assoc($user)) {
            $u_id        = $row['u_id'];
            $name        = $row['u_name'];
            $email       = $row['u_email'];
            $phone       = $row['u_phone'];
            $dob         = $row['u_dob'];
            $gender      = $row['u_gender'];
            $u_status    = $row['u_status']; 
            $count++;


            $searchResult = '
                <tr>
                    <td> '.$count.'</td>
                    <td> '.$name.'</td>
                    <td>'.$email.'</td>
                    <td>'.$phone.'</td>
                    <td>'.$dob.'</td>
                    <td>'.$gender.'</td>
                    <td>';
                    if($u_status!=0){
                    
                        $searchResult .= '<form action="admin_config.php" method="post">
                            <input type="hidden" class="form-control" name="u_id" id="u_id" value="'.$u_id.'">
                            <input type="submit" class="Link" name="user_block" value="Block">
                        </form>'; }
                        else{
                            $searchResult .= '<form action="admin_config.php" method="post">
                            <input type="hidden" class="form-control" name="u_id" id="u_id" value="'.$u_id.'">
                            <input type="submit" class="Link" name="user_unblock" value="Unblock">
                        </form>';
                        }
                    $searchResult .= '</td>  
                </tr>';
            echo $searchResult;
        }
    }
?>