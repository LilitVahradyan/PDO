<?php 
	require_once 'parent.php';
	try{
		$pdo = $connect->prepare('SELECT * FROM users');
		$pdo->execute();
		$users = $pdo->fetchAll(PDO::FETCH_ASSOC);
	}catch(PDOException $e) {
   		 echo "Error: " . $e->getMessage();
	}
	$connect = null;
?>

<?php 
	require_once 'header.php';
?>
<div class="container">
	<div class="card mt-5">
		<div class='crad-header'>
			<h2>Users List</h2>
			
		</div>
		<div class='card-body'>
			<table class="table table-bordered">
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Action</th>
					
				</tr>
				<?php foreach($users as $user){ ?>
				<tr>
					<td><?= $user->id; ?></td>
					<td><?= $user->name; ?></td>
					<td><?= $user->email; ?></td>
					<td><?= $user->phone; ?></td>
					<td>
						<a href="update.php?id=<?= $user->id ?>" class='btn btn-info'>Update</a>
						<a href="delete.php?id=<?=$user->id ?>" class='btn btn-danger'>Delete</a>
					</td>
					
				</tr>
				<?php } ?>
			</table>
		</div>
	</div>
	
</div>

<?php
	require_once 'footer.php';
?>