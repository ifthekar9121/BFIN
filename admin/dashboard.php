<?php 
    
    include "inc/connection.php";
    
    session_start();
    if(!isset($_SESSION['a_id'])){
        header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    
    <!-- Site Title -->
    <title>News Today</title>
    
    <!-- Design fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700" rel="stylesheet"> 
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome Icons core CSS -->
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/style.css" rel="stylesheet">

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
                                        <a class="nav-link active" href="dashboard.php">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="users.php">Users</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="admins.php">Admins</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="admin_logout.php">Log Out</a>
                                    </li>
                                </ul>
                                <form class="d-flex">
                                    <input class="form-control me-2" type="text" placeholder="Search Content" aria-label="Search" id="search">
                                </form>
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
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                    <div class="page-wrapper">
                        <div class="sarea">
                            <h3>Search Result</h3>
                            <div class="search-result" id="search-result"></div>
                        </div>
                        <h3>Shared Stories</h3>

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

                                
                            ?>
                            <div class="story-area">
                                <div class="title">
                                    <h4><?php echo $p_title;?></h4>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-5 col-xs-5">
                                        <div class="story-img">
                                            <img src="../<?php echo $p_image;?>" alt="" class="img-fluid">
                                        </div>
                                        <div class="story-cap">
                                            <p><?php echo $p_caption;?></p>
                                        </div>
                                            <div class="story-info">
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
                                        <div> <?php 
                                        if ($p_status != 0) { ?>
                                            <form action="admin_config.php" method="post">
                                                <input type="hidden" class="form-control" name="p_id" id="p_id" value="<?php echo $p_id; ?>">
                                                <input type="submit" class="Link" name="story-unlist" value="Unlist Story">
                                            </form> <?php }
                                            else { ?>
                                                <form action="admin_config.php" method="post">
                                                <input type="hidden" class="form-control" name="p_id" id="p_id" value="<?php echo $p_id; ?>">
                                                <input type="submit" class="Link" name="story-list" value="List Story">
                                            </form>
                                           <?php } ?>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-7 col-xs-7">
                                        <div class="">
                                            <p><?php echo $p_body;?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            }?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="page-wrapper">
                        <div class="area">
                            <h3>Shared Comments</h3>
                            <?php 
                            $query = "SELECT * FROM comment ORDER BY cmnt_id DESC";
                            $cmnt = mysqli_query($db,$query);
                            while ($row = mysqli_fetch_assoc($cmnt)) { 
                                $cmnt_id = $row["cmnt_id"];
                                $cmnt_desc = $row["cmnt_desc"];
                                ?>
                                <div class="cmnt-desc">
                                    <p><?php echo $cmnt_desc; ?></p>
                                    <div>
                                        <form action="admin_config.php" method="post">
                                            <input type="hidden" class="form-control" name="cmnt_id" id="cmnt_id" value="<?php echo $cmnt_id; ?>">
                                            <input type="submit" class="Link" name="del-cmnt" value="Delete Comment">
                                        </form>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    

    <script>
        $(function() {
                
          $('#search').keyup(function() {
              let searchKey = $('#search').val();
              let searchLength = searchKey.length;
              let i= 0;
              if(searchLength > 0) {
               
                  $.ajax({
                    // 'url' : `admin_config.php?search=${searchKey}`,
                    'url' : `admin_config.php`,
                    'type' : 'GET',
                    'data' : 
                            {
                                'search' : searchKey
                            },
                    'success' : function(data) {              
                        // alert('Data: '+data);
                        $('#search-result').empty().append(data);
                    },
                    'error' : function(request,error)
                    {
                        alert("Request: "+JSON.stringify(request));
                    }
                });
                } else {
                    $('#search-result').empty();
                }
            });
        });
    </script>
</body>
</html>