<?php 
    
    include "admin/inc/connection.php";
    session_start();

	if(isset($_POST['signup'])){

		$status= 1;
		$name = $_POST['name'];  
	    $mail = $_POST['email'];
	    $dob = $_POST['dob'];               
	    $phone = $_POST['phone'];
	    $sex = $_POST['gender'];
	    $password=($_POST['password']);

	    $pic = $_FILES['photo'];
	    $filename = $pic['name'];
		$fileerror = $pic['error'];
		$filetmp = $pic['tmp_name'];

		$fileext = explode('.', $filename);

		$filecheck = strtolower(end($fileext));
		

		$fileextstore = array('png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG');

		$mailcheck = "SELECT * FROM users WHERE u_email='$mail'";
		if (mysqli_num_rows(mysqli_query($db, $mailcheck))>0) {
		?>
			<script type="text/javascript">
				alert('Email is already registered! Try With another Email');
				location="index.php";
			</script>";
		<?php
		}
		else{
			if (in_array($filecheck, $fileextstore)) {
				$tmpemail = $mail;
				$tmpemail .= $filename;;
				$target = './images/'.$tmpemail;


				move_uploaded_file($filetmp, $target);
		    
				$sql = "INSERT INTO users (u_name, u_image, u_email, u_password, u_phone, u_dob, u_gender, u_status) VALUES ('".$name."','".$target."','".$mail."','".$password."','".$phone."','".$dob."','".$sex."','".$status."')";

				if (mysqli_query($db, $sql)) {

						$sql = "SELECT * FROM users WHERE u_email='$mail'";
					    $result = mysqli_query($db, $sql);

					    while($row = mysqli_fetch_array($result)) {
					        $u_id=$row["u_id"];
					    }
					    $_SESSION["u_id"] =$u_id;
				    	header("Location: index.php");
				    	exit();
				} 
				else{
					echo "<script type='text/javascript'>alert('Failed!')</script>";
				}
			}
			else{
				echo "Please select jpg/ png/ jpeg format file";
			}
		}
	}


	if(isset($_POST['signin'])){
        $email=$_POST['email'];
        $password = $_POST['password'];

      	$sql = " SELECT COUNT(*) FROM users WHERE( u_email='".$email."' AND u_password='".$password."') ";

		$qury = mysqli_query($db, $sql);

		$result = mysqli_fetch_array($qury);
			
		if($result[0]>0)
        {
            $sessionSql = " SELECT u_id, u_email, u_password, u_status FROM users WHERE ( u_email='".$email."' AND u_password='".$password."') ";
			$sessionQury = mysqli_query($db, $sessionSql);
			while($row = mysqli_fetch_array($sessionQury, MYSQLI_BOTH)){
				if($row['u_status'] != 1){
					?>
						<script type="text/javascript">
							alert('User Blocked by Admin');
							location="index.php";

						</script>";
						
					<?php
					exit();
				}
				else{
					$_SESSION['u_id'] = $row['u_id'];
					header("Location: index.php");
			    	exit();
				}
				
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


    if(isset($_POST['post_story'])){
		$p_status= 1;
		$p_title = $_POST['title'];  
	    $p_section = $_POST['section'];
	    $p_tag = $_POST['tag'];               
	    $p_caption = $_POST['caption'];
	    $p_body = mysqli_real_escape_string($db, $_POST['body']);

	    $p_pic = $_FILES['story_pic'];
	    $p_filename = $p_pic['name'];
		$p_fileerror = $p_pic['error'];
		$p_filetmp = $p_pic['tmp_name'];

		$p_fileext = explode('.', $p_filename);

		$p_filecheck = strtolower(end($p_fileext));
		

		$p_fileextstore = array('png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG');

		if (in_array($p_filecheck, $p_fileextstore)) {

			$p_target = './images/'.$p_filename;


			move_uploaded_file($p_filetmp, $p_target);
	    
			$sql = "INSERT INTO posts (p_title, p_image, p_caption, p_tag, p_author, p_body, p_section, p_status) VALUES ('".$p_title."','".$p_target."','".$p_caption."','".$p_tag."','".$_SESSION['u_id']."','".$p_body."','".$p_section."','".$p_status."')";

			if (mysqli_query($db, $sql)) { ?>
				<script type="text/javascript">
					alert('Story Post Successful!');
					location="story.php";
				</script>";
			<?php } 
			else{?>
				<script type="text/javascript">
					alert('Story Post Failed!');
					location="story.php";
				</script>";
			<?php
			}
		}
		else{?>
				<script type="text/javascript">
					alert('Please select jpg/ png/ jpeg format file');
					location="story.php";
				</script>";
			<?php
		}
    }


    if(isset($_POST['submit_cmnt'])){
		$u_id = $_POST['u_id'];
		$cmnt = $_POST['cmnt']; 
	    $p_id = $_POST['p_id'];
	    
	    
		$sql = "INSERT INTO comment (cmnt_author, cmnt_desc, cmnt_post) VALUES ('".$u_id."','".$cmnt."','".$p_id."')";

		if (mysqli_query($db, $sql)) { ?>
			<script type="text/javascript">
				alert('Comment Successful!');
				location="index.php";
			</script>";
		<?php } 
		else{?>
			<script type="text/javascript">
				alert('Comment Failed!');
				location="index.php";
			</script>";
		<?php
		}
    }


    if(isset($_POST['share'])){
		$u_id = $_POST['u_id'];  
	    $p_id = $_POST['p_id'];
	    
	    
		$sql = "INSERT INTO share (s_author, s_post) VALUES ('".$u_id."','".$p_id."')";

		if (mysqli_query($db, $sql)) { ?>
			<script type="text/javascript">
				alert('Story Share Successful!');
				location="index.php";
			</script>";
		<?php } 
		else{?>
			<script type="text/javascript">
				alert('Story Share Failed!');
				location="index.php";
			</script>";
		<?php
		}
    }


    if(isset($_POST['up-img-btn'])){
        $p_pic = $_FILES['photo'];
	    $p_filename = $p_pic['name'];
		$p_fileerror = $p_pic['error'];
		$p_filetmp = $p_pic['tmp_name'];

		$p_fileext = explode('.', $p_filename);

		$p_filecheck = strtolower(end($p_fileext));
		

		$p_fileextstore = array('png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG');

		if (in_array($p_filecheck, $p_fileextstore)) {

			$p_target = './images/'.$p_filename;


			move_uploaded_file($p_filetmp, $p_target);

			$sql = "UPDATE users SET u_image = '".$p_target."' WHERE u_id ='".$_SESSION['u_id']."'";

			if (mysqli_query($db, $sql)) {?>
				<script type="text/javascript">
					alert('Update Successful!');
					location="user_profile.php";
				</script>";
			<?php
			} 
			else {?>
				<script type="text/javascript">
					alert('Update Failed!');
					location="user_profile.php";
				</script>";
			<?php
			}
        }
        else{?>
				<script type="text/javascript">
					alert('Please select jpg/ png/ jpeg format file');
					location="story.php";
				</script>";
			<?php
		}
	}


	if(isset($_POST['up-name-btn'])){
        $name = $_POST['name'];

		$sql = "UPDATE users SET u_name = '".$name."' WHERE u_id ='".$_SESSION['u_id']."'";

		if (mysqli_query($db, $sql)) {?>
			<script type="text/javascript">
				alert('Update Successful!');
				location="user_profile.php";
			</script>";
		<?php
		} 
		else {?>
			<script type="text/javascript">
				alert('Update Failed!');
				location="user_profile.php";
			</script>";
		<?php
        }
	}


	if(isset($_POST['up-email-btn'])){
        $email = $_POST['email'];

		$sql = "UPDATE users SET u_email = '".$email."' WHERE u_id ='".$_SESSION['u_id']."'";

		if (mysqli_query($db, $sql)) {?>
			<script type="text/javascript">
				alert('Update Successful!');
				location="user_profile.php";
			</script>";
		<?php
		} 
		else {?>
			<script type="text/javascript">
				alert('Update Failed!');
				location="user_profile.php";
			</script>";
		<?php
        }
	}


	if(isset($_POST['up-phone-btn'])){
        $phone = $_POST['phone'];

		$sql = "UPDATE users SET u_phone = '".$phone."' WHERE u_id ='".$_SESSION['u_id']."'";

		if (mysqli_query($db, $sql)) {?>
			<script type="text/javascript">
				alert('Update Successful!');
				location="user_profile.php";
			</script>";
		<?php
		} 
		else {?>
			<script type="text/javascript">
				alert('Update Failed!');
				location="user_profile.php";
			</script>";
		<?php
        }
	}


	if(isset($_POST['up-dob-btn'])){
        $dob = $_POST['dob'];

		$sql = "UPDATE users SET u_dob = '".$dob."' WHERE u_id ='".$_SESSION['u_id']."'";

		if (mysqli_query($db, $sql)) {?>
			<script type="text/javascript">
				alert('Update Successful!');
				location="user_profile.php";
			</script>";
		<?php
		} 
		else {?>
			<script type="text/javascript">
				alert('Update Failed!');
				location="user_profile.php";
			</script>";
		<?php
        }
	}


	if(isset($_POST['up-sex-btn'])){
        $sex = $_POST['sex'];

		$sql = "UPDATE users SET u_gender = '".$sex."' WHERE u_id ='".$_SESSION['u_id']."'";

		if (mysqli_query($db, $sql)) {?>
			<script type="text/javascript">
				alert('Update Successful!');
				location="user_profile.php";
			</script>";
		<?php
		} 
		else {?>
			<script type="text/javascript">
				alert('Update Failed!');
				location="user_profile.php";
			</script>";
		<?php
        }
	}


	if(isset($_POST['up-pass-btn'])){
        $pass = $_POST['pass'];

		$sql = "UPDATE users SET u_password = '".$pass."' WHERE u_id ='".$_SESSION['u_id']."'";

		if (mysqli_query($db, $sql)) {?>
			<script type="text/javascript">
				alert('Update Successful!');
				location="user_profile.php";
			</script>";
		<?php
		} 
		else {?>
			<script type="text/javascript">
				alert('Update Failed!');
				location="user_profile.php";
			</script>";
		<?php
        }
	}


	if(isset($_POST['story-del'])){
        $p_id = $_POST['p_id'];

		$sql = "DELETE FROM posts WHERE p_id='$p_id'";

		if (mysqli_query($db, $sql)) {?>
			<script type="text/javascript">
				alert('Delete Successful!');
				location="user_profile.php";
			</script>";
		<?php
		} 
		else {?>
			<script type="text/javascript">
				alert('Delete Failed!');
				location="user_profile.php";
			</script>";
		<?php
        }
	}
?>