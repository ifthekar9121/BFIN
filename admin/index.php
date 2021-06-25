<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Today</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    

    <!-- Main css -->
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <section class="sign-in">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <div class="signin-image">
                            <img src="../images/signin-image.jpg" alt="sing up image">
                        </div>
                    </div>
                    
                    <div class="col-6">
                        <div class="signin-form">
                            <h2 class="form-title">Sign In</h2>
                            <form method="POST" class="register-form" id="login-form" action="admin_config.php">
                                <div class="form-group">
                                    <input type="email" name="email" id="email" placeholder="Your Email"/>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="pass" id="pass" placeholder="Your Password"/>
                                </div>
                                <div class="form-group form-button">
                                    <input type="submit" name="adminsignin" id="adminsignin" class="form-submit" value="Sign in"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>