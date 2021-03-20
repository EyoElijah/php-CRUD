<?php 
include "config.php";

// if the form's update button is clicked, we need to process the form
	if (isset($_POST['update'])) {
		$firstname = $_POST['firstname'];
		$user_id = $_POST['user_id'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$gender = $_POST['gender'];

		// write the update query
		$sql = "UPDATE `users` SET `firstname`='$firstname',`lastname`='$lastname',`email`='$email',`password`='$password',`gender`='$gender' WHERE `id`='$user_id'";

		// execute the query
		$result = $conn->query($sql);

		if ($result == TRUE) {
			echo "Record updated successfully.";
		}else{
			echo "Error:" . $sql . "<br>" . $conn->error;
		}
		header ("Location: view.php");
	}


// if the 'id' variable is set in the URL, we know that we need to edit a record
if (isset($_GET['id'])) {
	$user_id = $_GET['id'];

	// write SQL to get user data
	$sql = "SELECT * FROM `users` WHERE `id`='$user_id'";

	//Execute the sql
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		
		while ($row = $result->fetch_assoc()) {
			$first_name = $row['firstname'];
			$lastname = $row['lastname'];
			$email = $row['email'];
			$password  = $row['password'];
			$gender = $row['gender'];
			$id = $row['id'];
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
					<form action="" method="post">
					<fieldset>
						<legend><h1>Update Form</h1></legend>
						<div class="form-group">
							<label for="firstname">First name</label>
							<input type="text" class="form-control" name="firstname" value="<?php echo $first_name; ?>">
						    <input type="hidden" name="user_id" value="<?php echo $id; ?>">
						</div>
					    <div class="form-group">
							<label for="lastname">Last name</label>
							<input type="text" name="lastname" class="form-control" value="<?php echo $lastname; ?>">
						</div>
						<div class="form-group">
          				    <label for="email">Email</label>
						    <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
						</div>
						<div class="form-group">
          					<label for="password">Password</label>
							<input type="password" class="form-control" name="password" value="<?php echo $password; ?>">
						</div>
						<div class="form-group">
                            <label for="gender">Gender</label> <br>
							<input type="radio" name="gender" value="Male" <?php if($gender == 'Male'){ echo "checked";} ?> >Male
							<input type="radio" name="gender" value="Female" <?php if($gender == 'Female'){ echo "checked";} ?>>Female
						</div>
						<br><br>
						<input class="btn btn-primary btn-block" type="submit" value="Update" name="update">
					</fieldset>
					</form>
				</div>
			</div>
		</body>
		</html>




	<?php
	} else{
		// If the 'id' value is not valid, redirect the user back to view.php page
		header('Location: view.php');
	}

}
?>