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
                                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.php">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="story.php">Post Story</a>
                                    </li>
                                    <li class="nav-item profile-div">
                                        <a class="profile-name" href="user_profile.php"><img src="<?php echo ($u_image) ?>" class="img-fluid profile-image"><?php echo ($u_name) ?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="logout.php">Log Out</a>
                                    </li>
                                </ul>
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
                    <div class="post-area">
                        <form action="config.php" method="post" enctype="multipart/form-data">
                            <h4>Post Your Story...</h4>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="title" id="title" placeholder="Give a Story Title..." required="required" autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="section" id="section" placeholder="Story Section..." required="required" autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="tag" id="tag" placeholder="Enter Tags(Separate by comma)..." required="required" autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label for="story_pic">Select Your Story Picture:</label>
                                <input type="file" class="form-control"  name="story_pic" id="story_pic">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="caption" id="caption" placeholder="Write Image Caption..." required="required" autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <textarea type="text" class="form-control" name="body" id="body" placeholder="Write Your Story..." required="required" row="100"></textarea>
                            </div>
                            <input type="submit" class="btn btn-primary" name="post_story" value="Post Story">
                        </form>
                    </div>
                </div>
            </div><!-- end row -->
        </div><!-- end container -->
    </section>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>