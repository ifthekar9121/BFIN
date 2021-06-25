<?php 
    
    include "admin/inc/connection.php";
    
    session_start();
    if(isset($_SESSION['u_id'])){
        $u_id=$_SESSION['u_id'];
        $sql = "SELECT * FROM users WHERE u_id='$u_id'";
        $result = mysqli_query($db, $sql);

        while($row = mysqli_fetch_array($result)) {
            $u_name=$row["u_name"];
            $u_image=$row["u_image"];
            $u_email=$row["u_email"];
            $u_phone=$row["u_phone"];
            $u_dob=$row["u_dob"];
            $u_gender=$row["u_gender"];
        }
    }

    if(isset($_POST['up-photo-btn'])){
        $p_id = $_POST['p_id'];

        $p_pic = $_FILES['str_photo'];
        $p_filename = $p_pic['name'];
        $p_fileerror = $p_pic['error'];
        $p_filetmp = $p_pic['tmp_name'];

        $p_fileext = explode('.', $p_filename);

        $p_filecheck = strtolower(end($p_fileext));
        

        $p_fileextstore = array('png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG');

        if (in_array($p_filecheck, $p_fileextstore)) {

            $p_target = './images/'.$p_filename;


            move_uploaded_file($p_filetmp, $p_target);

            $sql = "UPDATE posts SET p_image = '".$p_target."' WHERE p_id ='".$p_id."'";

            if (mysqli_query($db, $sql)) {?>
                <script type="text/javascript">
                    alert('Update Successful!');
                </script>";
            <?php
            } 
            else {?>
                <script type="text/javascript">
                    alert('Update Failed!');
                </script>";
            <?php
            }
        }
        else{?>
                <script type="text/javascript">
                    alert('Please select jpg/ png/ jpeg format file');
                </script>";
            <?php
        }
    }

    if(isset($_POST['story-up'])){
        $p_id = $_POST['p_id'];
    }
    
    if(isset($_POST['up-title-btn'])){
        $title = $_POST['title'];
        $p_id = $_POST['p_id'];

        $sql = "UPDATE posts SET p_title = '".$title."' WHERE p_id ='".$p_id."'";

        if (mysqli_query($db, $sql)) {?>
            <script type="text/javascript">
                alert('Update Successful!');
            </script>
        <?php
        } 
        else {?>
            <script type="text/javascript">
                alert('Update Failed!')
            </script>";
        <?php
        }
    }

    if(isset($_POST['up-caption-btn'])){
        $caption = $_POST['caption'];
        $p_id = $_POST['p_id'];

        $sql = "UPDATE posts SET p_caption = '".$caption."' WHERE p_id ='".$p_id."'";

        if (mysqli_query($db, $sql)) {?>
            <script type="text/javascript">
                alert('Update Successful!');
            </script>";
        <?php
        } 
        else {?>
            <script type="text/javascript">
                alert('Update Failed!');
            </script>";
        <?php
        }
    }

    if(isset($_POST['up-body-btn'])){
        $body = $_POST['body'];
        $p_id = $_POST['p_id'];

        $sql = "UPDATE posts SET p_body = '".$body."' WHERE p_id ='".$p_id."'";

        if (mysqli_query($db, $sql)) {?>
            <script type="text/javascript">
                alert('Update Successful!');
            </script>";
        <?php
        } 
        else {?>
            <script type="text/javascript">
                alert('Update Failed!');
            </script>";
        <?php
        }
    }

    if(isset($_POST['up-section-btn'])){
        $section = $_POST['section'];
        $p_id = $_POST['p_id'];

        $sql = "UPDATE posts SET p_section = '".$section."' WHERE p_id ='".$p_id."'";

        if (mysqli_query($db, $sql)) {?>
            <script type="text/javascript">
                alert('Update Successful!');
            </script>";
        <?php
        } 
        else {?>
            <script type="text/javascript">
                alert('Update Failed!');
            </script>";
        <?php
        }
    }

    if(isset($_POST['up-tag-btn'])){
        $tag = $_POST['tag'];
        $p_id = $_POST['p_id'];

        $sql = "UPDATE posts SET p_tag = '".$tag."' WHERE p_id ='".$p_id."'";

        if (mysqli_query($db, $sql)) {?>
            <script type="text/javascript">
                alert('Update Successful!');
            </script>"; <?php
        } 
        else {?>
            <script type="text/javascript">
                alert('Update Failed!');    
            </script>"; <?php
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic -->
    <meta charset="utf-8">
    
    <!-- Site Title -->
    <title>News Today</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

</head>
<body>
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="container">
                            <a class="navbar-brand" href="#">News Today</a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <?php if (isset($_SESSION['u_id'])) { ?>
                                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                        <li class="nav-item">
                                            <a class="nav-link" href="index.php">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="story.php">Post Story</a>
                                        </li>
                                        <li class="nav-item profile-div active">
                                            <a class="profile-name" href="user_profile.php"><img src="<?php echo ($u_image) ?>" class="img-fluid profile-image"><?php echo ($u_name) ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="logout.php">Log Out</a>
                                        </li>
                                    </ul>
                                <?php } ?>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <section class="section lb">
        <div class="container">
            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-wrapper">
                        <div class="blog-custom-build">

                        <?php 
                            $query = "SELECT * FROM posts WHERE  p_id='$p_id'";
                            $post = mysqli_query($db,$query);
                            while ($row = mysqli_fetch_assoc($post)) {
                                $p_id           = $row['p_id'];
                                $p_title        = $row['p_title'];
                                $p_image        = $row['p_image'];
                                $p_caption      = $row['p_caption'];
                                $p_author       = $row['p_author'];
                                $p_body         = $row['p_body'];
                                $p_section      = $row['p_section'];
                                $p_tag          = $row['p_tag'];
                                $p_status       = $row['p_status'];
                            ?>

                            <div class="story-area">
                                <div class="title">
                                    <div class="row">
                                        <div class="col-10">
                                            <h2><?php echo $p_title;?></h2>
                                            
                                            <form id="up-title-form" style="display: none;" action="" method="post">
                                                <input type="hidden" class="form-control" name="p_id" id="p_id" value="<?php echo $p_id; ?>">
                                                <div class="mb-3">
                                                    <input type="text" class="form-control" name="title" id="name" placeholder="Update Title" required="required" autocomplete="off">
                                                </div>
                                        
                                                <input type="submit" id="up-name-form" class="btn btn-primary" name="up-title-btn" value="Update Title">
                                            </form>
                                        </div>
                                        <div class="col-2">
                                            <a class="link" id="up-title-edit" style="display: initial;" onclick="titl()">Edit</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="story-img">
                                                    <img src="<?php echo $p_image;?>" alt="" class="img-fluid">
                                                </div>
                                                <form id="up-photo-form" style="display: none;" action="" method="post" enctype="multipart/form-data">
                                                    <input type="hidden" class="form-control" name="p_id" id="p_id" value="<?php echo $p_id; ?>">
                                                    <div class="mb-3">
                                                        <label for="myphoto">Upgate Picture:</label>
                                                        <input type="file" class="form-control"  name="str_photo" id="myphoto">
                                                    </div>
                                                    <input type="submit" class="btn btn-primary" name="up-photo-btn" value="Update Photo">
                                                </form>
                                            </div>
                                            <div class="col-12">
                                                <a class="link" id="up-photo-edit" style="display: initial;" onclick="img()">Edit</a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="story-cap">
                                                    <p><?php echo $p_caption;?></p>
                                                </div>
                                            
                                                <form id="up-caption-form" style="display: none;" action="" method="post">
                                                    <input type="hidden" class="form-control" name="p_id" id="p_id" value="<?php echo $p_id; ?>">
                                                    <div class="mb-3">
                                                        <input type="text" class="form-control" name="caption" id="caption" placeholder="Update caption" required="required" autocomplete="off">
                                                    </div>
                                            
                                                    <input type="submit" id="up-caption-form" class="btn btn-primary" name="up-caption-btn" value="Update caption">
                                                </form>
                                            </div>
                                            <div class="col-12">
                                                <a class="link" id="up-caption-edit" style="display: initial;" onclick="caption()">Edit</a>
                                            </div>
                                        </div>  
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="story-body">
                                                    <p><?php echo $p_body;?></p>
                                                </div>
                                            
                                                <form id="up-body-form" style="display: none;" action="" method="post">
                                                    <input type="hidden" class="form-control" name="p_id" id="p_id" value="<?php echo $p_id; ?>">
                                                    <div class="mb-3">
                                                        <textarea type="text" class="form-control" name="body" id="body" placeholder="Update body" required="required" row="100"></textarea>
                                                    </div>
                                            
                                                    <input type="submit" id="up-body-form" class="btn btn-primary" name="up-body-btn" value="Update body">
                                                </form>
                                            </div>
                                            <div class="col-2">
                                                <a class="link" id="up-body-edit" style="display: initial;" onclick="body_text()">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="story-section">
                                                    <h6>Section: <?php echo $p_section;?></h6>
                                                </div>
                                            
                                                <form id="up-section-form" style="display: none;" action="" method="post">
                                                    <input type="hidden" class="form-control" name="p_id" id="p_id" value="<?php echo $p_id; ?>">
                                                    <div class="mb-3">
                                                        <input type="text" class="form-control" name="section" id="section" placeholder="Update section" required="required" autocomplete="off">
                                                    </div>
                                            
                                                    <input type="submit" id="up-section-form" class="btn btn-primary" name="up-section-btn" value="Update section">
                                                </form>
                                            </div>
                                            <div class="col-2">
                                                <a class="link" id="up-section-edit" style="display: initial;" onclick="section()">Edit</a>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="story-tag">
                                                    <h6>Tags: <?php echo $p_tag;?></h6>
                                                </div>
                                            
                                                <form id="up-tag-form" style="display: none;" action="" method="post">
                                                    <input type="hidden" class="form-control" name="p_id" id="p_id" value="<?php echo $p_id; ?>">
                                                    <div class="mb-3">
                                                        <input type="text" class="form-control" name="tag" id="tag" placeholder="Update tag" required="required" autocomplete="off">
                                                    </div>
                                            
                                                    <input type="submit" id="up-tag-form" class="btn btn-primary" name="up-tag-btn" value="Update tag">
                                                </form>
                                            </div>
                                            <div class="col-2">
                                                <a class="link" id="up-tag-edit" style="display: initial;" onclick="tag()">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            }?>
                        </div>
                    </div>
                </div><!-- end col -->
            </div>
        </div>
    </section>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function titl() {
            document.getElementById("up-title-form").style.display = "initial";
            document.getElementById("up-title-edit").style.display = "none";
        }
        function img() {
            document.getElementById("up-photo-form").style.display = "initial";
            document.getElementById("up-photo-edit").style.display = "none";
        }
        function caption() {
            document.getElementById("up-caption-form").style.display = "initial";
            document.getElementById("up-caption-edit").style.display = "none";
        }
        function body_text() {
            document.getElementById("up-body-form").style.display = "initial";
            document.getElementById("up-body-edit").style.display = "none";
        }
        function section() {
            document.getElementById("up-section-form").style.display = "initial";
            document.getElementById("up-section-edit").style.display = "none";
        }
        function tag() {
            document.getElementById("up-tag-form").style.display = "initial";
            document.getElementById("up-tag-edit").style.display = "none";
        }
    </script>
</body>