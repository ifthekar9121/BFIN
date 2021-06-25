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
                                        <a class="nav-link" href="dashboard.php">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="users.php">Users</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="admins.php">Admins</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="admin_logout.php">Log Out</a>
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
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="page-wrapper">
                        <h3>List Of Admins</h3>
                        <div class="blog-custom-build"> 
                            <table>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>Delete</th>
                                </tr>

                                <?php
                                $count = 0; 
                                $query = "SELECT * FROM admins";
                                $admin = mysqli_query($db,$query);

                                while ($row = mysqli_fetch_assoc($admin)) {
                                    $a_id           = $row['a_id'];
                                    $name        = $row['a_name'];
                                    $email       = $row['a_email'];
                                    $count++; ?>

                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td><?php echo $name; ?></td>
                                        <td><?php echo $email; ?></td>
                                        <td><?php if($a_id != $_SESSION['a_id']){?>
                                            <form action="admin_config.php" method="post">
                                                <input type="hidden" class="form-control" name="a_id" id="a_id" value="<?php echo $a_id; ?>">
                                                <input type="submit" class="Link" name="admin-del" value="Delete">
                                            </form>
                                        <?php } ?>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>

                </div><!-- end col -->
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="sidebar">
                        <div class="login-area">
                            <form action="admin_config.php" method="post">
                                <h4>Create Admin Here...</h4>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="a_name" id="a_name" placeholder="Enter Admin Name" required="required" autocomplete="off">
                                </div>
                                <div class="mb-3">
                                    <input type="email" class="form-control" name="a_email" id="a_email" placeholder="Enter Admin E-mail" required="required" autocomplete="off">
                                </div>
                                <div class="mb-3">
                                    <input type="password" class="form-control" name="a_password" id="a_password" placeholder="Enter Admin Password" required="required">
                                </div>
                                <input type="submit" class="btn btn-primary" name="adminsignup" value="Sign Up">
                            </form>
                        </div>
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>