<?php

if (isset($_GET['user_id'])) {
	$edit_user_id = $_GET['user_id'];
}

$query = "SELECT *  FROM  users WHERE user_id=$edit_user_id";
$select_posts = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($select_posts)) {
    $user_id = $row['user_id'];
    $username = $row['user_name'];
    $user_email = $row['user_email'];
    $user_mobile = $row['user_mobile'];
    $user_address = $row['user_address'];
    $user_role = $row['user_role'];
}

if (isset($_POST['update-user'])) {
	
	$username = $_POST['user_name'];
	$user_email = $_POST['user_email'];
    $user_mobile = $_POST['user_mobile'];
    $user_address = $_POST['user_address'];

	
	

	$query = "UPDATE users SET user_name = '$username', user_email = '$user_email' , user_mobile = '$user_mobile' , user_address = '$user_address' WHERE user_id=$edit_user_id ";
	
	//echo $title . " " . $admin;
	
	$update_user_detail = mysqli_query($connection,$query);

	if (!$update_user_detail) {
		die("Query Failed" . mysqli_error($connection));
	}
	else {
		echo ("<script LANGUAGE='JavaScript'>
		window.alert('Succesfully Updated');
		window.location.href='../admin/admin.php';
		</script>");
	}

}

?>

<form action="" method="post" enctype="multipart/form-data">
	
	<div class="form-group">
		<label class="fw-bold" for="admin">Name</label>
		<input type="text" class="form-control" name="user_name" >
	</div>

	<div class="form-group">
		<label class="fw-bold" for="category">Email</label>
		<input type="email" class="form-control" name="user_email" >
	</div>

    <div class="form-group">
		<label class="fw-bold" for="category">Mobile</label>
		<input type="number" class="form-control" name="user_mobile" >
	</div>

    <div class="form-group">
		<label class="fw-bold" for="category">Address</label>
		<input type="text" class="form-control" name="user_address" >
	</div>

	<br>

	<div class="form-group">
		<input type="submit" class="btn btn-outline-secondary bg-dark" name="update-user" value="Update" >
	</div>
</form>
