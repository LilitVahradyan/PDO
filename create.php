<?php 
	require_once 'parent.php';
    header("Location:read.php") ;
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];

	$pdo ='INSERT INTO users(name, email, phone) VALUES (:name, :email, :phone)';
	$stmt = $connect->prepare($pdo);
	$stmt->bindparam(':name', $name);
	$stmt->bindparam(':email',$email);
	$stmt->bindparam(':phone', $phone);
    $stmt->execute();

	$connect=null;

?>

<?php 
	require_once 'header.php';
?>

<div class = 'container'>
	<div class ='card mt-5'>
		<div class='crad-header'>
			<h2>Create  Person</h2>
		
		</div>
		<div class='card-body'>
		
			<form action="create.php"  method="post">
				<div class="form-group">
					<lable for='name'>Name</lable>
					<input type="text" name="name"  class="form-control">
				</div>
				<div class="form-group">
					<lable for='email'>Email</lable>
					<input type="email" name="email" class="form-control">
				</div>
				<div class="form-group">
					<lable for='phone'>Phone</lable>
					<input type="text" name="phone"  class="form-control">
				</div>
				<div class="form-group">
					<button type='submit' class='btn btn-info' > Create person</button>
				</div>
			</form>
		</div>
	</div>

</div>

<?php
	require_once 'footer.php';
?>