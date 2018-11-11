<?php
	require_once 'parent.php';
	
	if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
        $id = $_POST['id'];

		$pdo =$connect->prepare('UPDATE  users SET name=:name, email=:email, phone=:phone WHERE id=:id');
		$pdo->bindParam(':name', $name);
		$pdo->bindParam(':email',$email);
		$pdo->bindParam(':phone', $phone);
        $pdo->bindParam(':id', $id);

        $pdo->execute();

        header("Location: read.php");
    }else{
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $pdo = $connect->prepare('SELECT * FROM users WHERE id=:id');
            $pdo->bindParam(":id", $id);
            $pdo->execute();
            $users = $pdo->fetch(PDO::FETCH_ASSOC);
        }
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
			<form action="update.php" method="post">
				<input value="<?= $id; ?>" type="hidden" name="id"  class="form-control">
				<div class="form-group">
					<lable for='name'>Name</lable>
					<input value="<?= $users['name']; ?>" type="text" name="name"  class="form-control">
				</div>
				<div class="form-group">
					<lable for='email'>Email</lable>
					<input value="<?= $users['email']; ?>"  type="email" name="email" class="form-control">
				</div>
				<div class="form-group">
					<lable for='phone'>Phone</lable>
					<input value="<?= $users['phone']; ?>"  type="text" name="phone"  class="form-control">
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