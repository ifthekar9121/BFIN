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
    
    <!-- Design fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700" rel="stylesheet"> 
    
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
                                            <a class="nav-link active" href="index.php">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="story.php">Post Story</a>
                                        </li>
                                        <li class="nav-item profile-div">
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
                <?php if (!isset($_SESSION['u_id'])) { ?>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <?php }
                else{ ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?php } ?>
                    <div class="page-wrapper">
                        <div class="blog-custom-build">

                        <?php 
                            $query6 = "SELECT * FROM posts ORDER BY p_id DESC";
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

                                if ($p_status != 0) {
                            ?>

                            <div class="story-area">
                                <div class="title">
                                    <h4><?php echo $p_title;?></h4>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="story-img">
                                            <img src="<?php echo $p_image;?>" alt="" class="img-fluid">
                                        </div>
                                        <div class="story-cap">
                                            <p><?php echo $p_caption;?></p>
                                        </div>
                                        <div class="story-author">
                                            <?php
                                                $query = "SELECT * FROM users WHERE u_id='".$p_author."'";
                                                $user = mysqli_query($db,$query);
                                                while ($row = mysqli_fetch_assoc($user)) {
                                                    $p_name = $row['u_name'];
                                                }
                                            ?>
                                            <h6>Author: <?php echo $p_name;?></h6>
                                        </div>
                                        <div class="story-section">
                                            <h6>Section: <?php echo $p_section;?></h6>
                                        </div>
                                        <div class="story-tag">
                                            <h6>Tags: <?php echo $p_tag;?></h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                        <div class="">
                                            <p><?php echo $p_body;?></p>
                                            <?php if (isset($_SESSION['u_id'])) { ?>
                                            <div class="post-sharing">
                                                <form class="" action="config.php" method="post">
                                                    <input type="hidden" class="form-control" name="u_id" id="u_id" value="<?php echo $_SESSION['u_id'] ?>">

                                                    <input type="hidden" class="form-control" name="p_id" id="p_id" value="<?php echo $p_id ?>">
                                                    
                                                    <input type="submit" class="btn btn-primary" name="share" value="Share">
                                                </form>
                                            </div>
                                                
                                            <div class="post-cmnt" id="w-cmnt-form">
                                                <form action="config.php" method="post">
                                                    <input type="hidden" class="form-control" name="u_id" id="u_id" value="<?php echo $_SESSION['u_id'] ?>">

                                                    <input type="hidden" class="form-control" name="p_id" id="p_id" value="<?php echo $p_id ?>">

                                                    <div class="mb-3">
                                                        <textarea type="text" class="form-control" name="cmnt" id="cmnt" placeholder="Write Comment..." rows="2"></textarea>
                                                    </div>
                                                    <input type="submit" class="btn btn-primary" name="submit_cmnt" value="Submit Comment">
                                                </form>
                                            </div>

                                            <div class="view-cmnt">
                                            <?php 

                                            $cmnt = "SELECT * FROM comment WHERE cmnt_post = '$p_id'";

                                            $u_res = mysqli_query($db,$cmnt);
                                            if(mysqli_fetch_assoc($u_res)>0){?>
                                                <h5>Comments</h5> <?php
                                            }
                                            else{?>
                                                <h5>No Comments For This Story</h5> <?php 
                                            }

                                            $u_res = mysqli_query($db,$cmnt);
                                            while($row = mysqli_fetch_assoc($u_res)){
                                                $cmnt_desc = $row['cmnt_desc']; ?>
                                                <p><?php echo $cmnt_desc;?> </p>
                                                <?php }
                                                ?>
                                            </div>
                                    <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                            }?>
                        </div>
                    </div>
                </div><!-- end col -->
                <?php if (!isset($_SESSION['u_id'])) { ?>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div id="login" style="display: initial;"><?php include "loginform.php"; ?>
                            <div class="row">
                                <div class="col-6">
                                    <h4>Not Member?</h4>
                                </div>
                                <div class="col-6 div-change-btn">
                                    <a class="btn btn-primary" onclick="login()"> Click Here</a>
                                </div>
                            </div>
                        </div>
                        <div id="signup" style="display: none;"><?php include "signup.php"; ?>
                            <div class="row not-member">
                                <div class="col-6">
                                    <h4>Not Member?</h4>
                                </div>
                                <div class="col-6 div-change-btn">
                                    <a class="btn btn-primary" onclick="signup()"> Click Here</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function login() {
            document.getElementById("login").style.display = "none";
            document.getElementById("signup").style.display = "initial";
        }
        function signup() {
            document.getElementById("signup").style.display = "none";
            document.getElementById("login").style.display = "initial";
        }
        function cmnt() {
            document.getElementById("w-cmnt-form").style.display = "initial";
            document.getElementById("w-cmnt").style.display = "none";
        }
    </script>
</body>