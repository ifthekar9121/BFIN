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
?>

<!DOCTYPE html>
<html lang="en">

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

    <section class="section profile">
        <div class="container">
            <div class="area">
                <div class="row">
                    <h3>Profile</h3>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="profile-img">
                            <div class="row">
                                <div class="col-8 offset-col-1">
                                    <img src="<?php echo ($u_image) ?>" class="img-fluid">

                                    <form id="up-img-form" style="display: none;" action="config.php" method="post" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="myphoto">Upgate Profile Picture:</label>
                                            <input type="file" class="form-control"  name="photo" id="myphoto">
                                        </div>
                                        <input type="submit" class="btn btn-primary" name="up-img-btn" value="Update Photo">
                                    </form>
                                </div>
                                <div class="col-2">
                                    <a class="link" id="up-img-edit" style="display: initial;" onclick="photo()">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="profile-info">
                            <div class="row">
                                <div class="col-10">

                                    <h4>Name : <?php echo ($u_name)?></h4>
                                    
                                    <form id="up-name-form" style="display: none;" action="config.php" method="post">
                                        <div class="mb-3">
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Update Name" required="required" autocomplete="off">
                                        </div>
                                
                                        <input type="submit" id="up-name-form" class="btn btn-primary" name="up-name-btn" value="Update Name">
                                    </form>
                                </div>
                                <div class="col-2">
                                    <a class="link" id="up-name-edit" style="display: initial;" onclick="nam()">Edit</a>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-10">

                                    <h4>E-mail : <?php echo ($u_email)?></h4>
                                    
                                    <form id="up-email-form" style="display: none;" action="config.php" method="post">
                                        <div class="mb-3">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Update Email" required="required" autocomplete="off">
                                        </div>
                                
                                        <input type="submit" id="up-img-form" class="btn btn-primary" name="up-email-btn" value="Update Email">
                                    </form>
                                </div>
                                <div class="col-2">
                                    <a class="link" id="up-email-edit" style="display: initial;" onclick="email()">Edit</a>
                                </div>
                            </div>

                            <div class="row"> 
                                <div class="col-10">

                                    <h4>Phone : <?php echo ($u_phone)?></h4>
                                    
                                    <form id="up-phone-form" style="display: none;" action="config.php" method="post">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Update Phone" required="required" autocomplete="off">
                                    </div>
                                
                                    <input type="submit" id="up-phone-form" class="btn btn-primary" name="up-phone-btn" value="Update Phone">
                                </form>
                                </div>
                                <div class="col-2">
                                    <a class="link" id="up-phone-edit" style="display: initial;" onclick="phone()">Edit</a>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-10">

                                    <h4>Date of Birth :<?php echo ($u_dob)?></h4>
                                        
                                    <form id="up-dob-form" style="display: none;" action="config.php" method="post">
                                        <div class="mb-3">
                                            <input type="date" class="form-control" name="dob" id="dob" placeholder="Update DOB" required="required" autocomplete="off">
                                        </div>
                                
                                        <input type="submit" id="up-dob-form" class="btn btn-primary" name="up-dob-btn" value="Update DOB">
                                    </form>
                                </div>
                                <div class="col-2">
                                    <a class="link" id="up-dob-edit" style="display: initial;" onclick="dob()">Edit</a>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-10">

                                    <h4>Gender :<?php echo ($u_gender)?></h4>
                                        
                                    <form id="up-sex-form" style="display: none;" action="config.php" method="post">
                                        <div class="row">
                                            <div class="col-4">
                                                <label>Select Gender:</label>
                                            </div>
                                            <div class="form-check col-4">
                                                <input class="form-check-input" type="radio" name="sex" id="male" value="Male" checked>
                                                <label  class="form-check-label">Male</label>
                                            </div>
                                            <div class="form-check col-4"> 
                                                <input class="form-check-input" type="radio" name="sex" id="female" value="Female">
                                                <label class="form-check-label">Femele</label>
                                            </div>
                                        </div>
                                    
                                        <input type="submit" id="up-sex-form" class="btn btn-primary" name="up-sex-btn" value="Update Gender">
                                    </form>
                                </div>
                                <div class="col-2">
                                    <a class="link" id="up-sex-edit" style="display: initial;" onclick="sex()">Edit</a>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-10">

                                    <h4>Password : ********</h4>
                                        
                                    <form id="up-pass-form" style="display: none;" action="config.php" method="post">
                                        <div class="mb-3">
                                            <input type="password" class="form-control" name="pass" id="pass" placeholder="Update Password" required="required" autocomplete="off">
                                        </div>
                                        <input type="submit" id="up-pass-form" class="btn btn-primary" name="up-pass-btn" value="Update Password">
                                    </form>
                                </div>
                                <div class="col-2">
                                    <a class="link" id="up-pass-edit" style="display: initial;" onclick="pass()">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section lb">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="page-wrapper">
                        <div class="area">
                            <div class="blog-custom-build">
                                <?php 
                                    $query6 = "SELECT * FROM posts WHERE p_author='".$_SESSION['u_id']."' ORDER BY p_id DESC";
                                    $all_posts = mysqli_query($db,$query6);

                                    if(mysqli_fetch_assoc($all_posts) != 0){ ?>
                                        <h3>Your Posted Story</h3>
                                    <?php }
                                    else{ ?>
                                        <h3>You Have No Story</h3>
                                    <?php } 
                                    $count = 0; ?>
                                    <table>
                                        <tr>
                                            <th>No</th>
                                            <th>Story Title</th>
                                            <th>Status</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    <?php
                                    $all_posts = mysqli_query($db,$query6);
                                    while ($row = mysqli_fetch_assoc($all_posts)) {
                                        $p_id           = $row['p_id'];
                                        $p_title        = $row['p_title'];
                                        $p_status       = $row['p_status'];
                                        $count++; ?>

                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo $p_title; ?></td>
                                            <td><?php
                                                if($p_status!=0){
                                                    echo "Listed";
                                                }
                                                else{
                                                    echo "Unlisted";
                                                }
                                            ?></td>
                                            <td>
                                                <form action="storyup.php" method="post">
                                                    <input type="hidden" class="form-control" name="p_id" id="p_id" value="<?php echo $p_id; ?>">
                                                    <input type="submit" class="Link" name="story-up" value="Update">
                                                </form>
                                            </td>
                                            <td>
                                                <form action="config.php" method="post">
                                                    <input type="hidden" class="form-control" name="p_id" id="p_id" value="<?php echo $p_id; ?>">
                                                    <input type="submit" class="Link" name="story-del" value="Delete">
                                                </form>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>

                </div><!-- end col -->
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="share-sidebar">
                    <?php
                        $sql= "SELECT * FROM share WHERE s_author='".$_SESSION['u_id']."' ORDER BY s_id DESC";

                        $share = mysqli_query($db,$sql);

                        if(mysqli_fetch_assoc($share) != 0){ ?>
                            <h3>Recently Shared Story</h3>
                        <?php }
                        else{ ?>
                            <h3>No Shared Story</h3>
                        <?php } ?>
                        
                        <div class="blog-meta big-meta">
                            <ul>
                                <?php 
                                $share = mysqli_query($db,$sql);
                                while ($row = mysqli_fetch_assoc($share)) {
                                    $s_post = $row['s_post'];

                                    $post = "SELECT * FROM posts WHERE p_id = '".$s_post."'";

                                    $p_desc = mysqli_query($db,$post);

                                    while ($row = mysqli_fetch_assoc($p_desc)) { ?>

                                        <li> <?php echo $row['p_title']; ?> </li> <?php
                                    }
                                } ?>
                            </ul>
                        </div>
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function photo() {
            document.getElementById("up-img-form").style.display = "initial";
            document.getElementById("up-img-edit").style.display = "none";
        }
        function nam() {
            document.getElementById("up-name-form").style.display = "initial";
            document.getElementById("up-name-edit").style.display = "none";
        }
        function email() {
            document.getElementById("up-email-form").style.display = "initial";
            document.getElementById("up-email-edit").style.display = "none";
        }
        function phone() {
            document.getElementById("up-phone-form").style.display = "initial";
            document.getElementById("up-phone-edit").style.display = "none";
        }
        function dob() {
            document.getElementById("up-dob-form").style.display = "initial";
            document.getElementById("up-dob-edit").style.display = "none";
        }
        function sex() {
            document.getElementById("up-sex-form").style.display = "initial";
            document.getElementById("up-sex-edit").style.display = "none";
        }
        function pass() {
            document.getElementById("up-pass-form").style.display = "initial";
            document.getElementById("up-pass-edit").style.display = "none";
        }
    </script>
</body>
</html>