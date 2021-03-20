<?php 
include "config.php";

// if the form's submit button is clicked, we need to process the form
	if (isset($_POST['submit'])) {
		// get variables from the form
		$first_name = $_POST['firstname'];
		$last_name = $_POST['lastname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$gender = $_POST['gender'];

		//write sql query

		$sql = "INSERT INTO `users`(`firstname`, `lastname`, `email`, `password`, `gender`) VALUES ('$first_name','$last_name','$email','$password','$gender')";

		// execute the query

		$result = $conn->query($sql);

		if ($result == TRUE) {
			echo "New record created successfully.";
		}else{
			echo "Error:". $sql . "<br>". $conn->error;
		}

		$conn->close();
    header ("Location: view.php");

	}



?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  </head>
<body>
<div class="container">
  <div class="row justify-content-center">
    <form action="" method="POST">
      <fieldset>
        <legend><h1> Signup Form</h1></legend>
        <div class="form-group">
          <label for="firstname">First name</label>
          <input type="text" name="firstname" class="form-control" placeholder="First Name" required>
        </div>
        <div class="form-group">
          <label for="lastname">Last name</label>
          <input type="text" name="lastname" class="form-control" placeholder="Last Name" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" class="form-control" placeholder="Email Address" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" class="form-control" placeholder="Password" required> 
        </div>
        <div class="form-group">
          <label for="gender">Gender</label> <br>
          <input type="radio" name="gender"  value="Male">Male
          <input type="radio" name="gender" value="Female">Female
        </div>
        <input type="submit" name="submit" value="submit" class="btn btn-primary btn-block">
      </fieldset>
</form>
  </div>
</div>
</body>
</html>