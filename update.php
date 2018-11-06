<?php
	require_once 'parent.php';
	//header("Location:read.php") ;
	$id = $_GET['id'];
	$pdo = $connect->prepare('SELECT * FROM users WHERE id=$id');
	$pdo->execute();
	$users = $pdo->fetchAll(PDO::FETCH_ASSOC);
	
	if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];

		$pdo =$connect->prepare('UPDATE  users SET (name=:name, email=:email, phone=:phone WHERE id=$id)');
		$pdo->bindparam(':name', $name);
		$pdo->bindparam(':email',$email);
		$pdo->bindparam(':phone', $phone);
   		$pdo->execute();
}
      $connect=null;
?>
<?php 
require_once 'header.php';

?>
<div class = 'container'>
	<div class ='card mt-5'>
		<div class='crad-header'>
			<h2>Update Person</h2>
			
		</div>
		<div class='card-body'>
		
			<form action="read.php" method="post">
				<div class="form-group">
					<lable for='name'>Name</lable>
					<input value="<?= $user->name; ?>" type="text" name="name"  class="form-control">
				</div>
				<div class="form-group">
					<lable for='email'>Email</lable>
					<input value="<?= $user->email; ?>"  type="email" name="email" class="form-control">
				</div>
				<div class="form-group">
					<lable for='phone'>Phone</lable>
					<input value="<?= $user->phone; ?>"  type="text" name="phone"  class="form-control">
				</div>
				<div class="form-group">
					<button type='submit' class='btn btn-info'> Update  person</button>
				</div>
			</form>
		</div>
	</div>

</div>
<?php
require_once 'footer.php';

?>