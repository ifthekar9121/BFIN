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
                                        <a class="nav-link active" href="users.php">Users</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="admins.php">Admins</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="admin_logout.php">Log Out</a>
                                    </li>
                                </ul>
                                <form class="d-flex">
                                <input class="form-control me-2" type="text" placeholder="Search Users" aria-label="Search" id="suser">
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
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sarea">
                        <h3>Search Result</h3>
                        <div class="search-result" id="search-result">
                        </div>
                    </div>
                    <div class="area">
                        <div class="page-wrapper">
                            <h3>List Of User</h3>
                            <div class="blog-custom-build">
                                <table>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>E-mail</th>
                                        <th>Phone</th>
                                        <th>DOB</th>
                                        <th>Gender</th>
                                        <th>Block</th>
                                    </tr>

                                    <?php
                                    $count = 0; 
                                    $query = "SELECT * FROM users";
                                    $user = mysqli_query($db,$query);

                                    while ($row = mysqli_fetch_assoc($user)) {
                                        $u_id        = $row['u_id'];
                                        $name        = $row['u_name'];
                                        $email       = $row['u_email'];
                                        $phone       = $row['u_phone'];
                                        $dob         = $row['u_dob'];
                                        $gender      = $row['u_gender'];
                                        $u_status      = $row['u_status']; 

                                        $count++;?>

                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo $name; ?></td>
                                            <td><?php echo $email; ?></td>
                                            <td><?php echo $phone; ?></td>
                                            <td><?php echo $dob; ?></td>
                                            <td><?php echo $gender; ?></td>
                                            <td><?php if($u_status!=0){ ?>
                                                <form action="admin_config.php" method="post">
                                                    <input type="hidden" class="form-control" name="u_id" id="u_id" value="<?php echo $u_id; ?>">
                                                    <input type="submit" class="Link" name="user_block" value="Block">
                                                </form> <?php }
                                                else{ ?>
                                                    <form action="admin_config.php" method="post">
                                                    <input type="hidden" class="form-control" name="u_id" id="u_id" value="<?php echo $u_id; ?>">
                                                    <input type="submit" class="Link" name="user_unblock" value="Unblock">
                                                </form> <?php } ?>
                                            </td>
                                        </tr>
                                    <?php
                                }?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    

    <script>
        $(function() {
                
          $('#suser').keyup(function() {
              let searchKey = $('#suser').val();
              let searchLength = searchKey.length;
              if(searchLength > 0) {
              // console.log(searchKey);
                  $.ajax({
                    // 'url' : `admin_config.php?search=${searchKey}`,
                    'url' : `admin_config.php`,
                    'type' : 'GET',
                    'data' : 
                            {
                                'suser' : searchKey
                            },
                    'success' : function(data) {              
                        // alert('Data: '+data)
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