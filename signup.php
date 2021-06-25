
<div class="login-area">
	<form action="config.php" method="post" enctype="multipart/form-data">
		<h4>Sign Up Here...</h4>
		<div class="mb-3">
		    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Name" required="required" autocomplete="off">
		</div>
		<div class="mb-3">
		    <input type="email" class="form-control" name="email" id="email" placeholder="Enter Your E-mail" required="required" autocomplete="off">
		</div>
		<div class="mb-3">
		    <input type="date" class="form-control" name="dob" id="dob" placeholder="Enter Your Date Of Birth" required="required" autocomplete="off">
		</div>
		<div class="mb-3">
		    <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Your Phone Number" required="required" autocomplete="off">
		</div>
		<div class="row">
			<div class="col-4">
				<label>Select Gender:</label>
			</div>
			<div class="form-check col-4">
			  	<input class="form-check-input" type="radio" name="gender" id="male" value="Male" checked>
			  	<label  class="form-check-label">Male</label>
			</div>
			<div class="form-check col-4"> 
			  	<input class="form-check-input" type="radio" name="gender" id="female" value="Female">
			  	<label class="form-check-label">Femele</label>
			</div>
		</div>
		<div class="mb-3">
			<label for="myphoto">Select Your Profile Picture:</label>
		    <input type="file" class="form-control"  name="photo" id="myphoto">
		</div>
		<div class="mb-3">
		    <input type="password" class="form-control" name="password" id="password" placeholder="Enter Your Password" required="required">
		</div>
		<input type="submit" class="btn btn-primary" name="signup" value="Sign Up">
	</form>
</div>