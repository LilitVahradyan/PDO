<?php 
	require_once 'parent.php';
	require_once 'validation.php';
    
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
    
   	    $errMessage = dataValidation($_POST);
    	if( $errMessage === true){
			$pdo ='INSERT INTO users(name, email, phone) VALUES (:name, :email, :phone)';
			$stmt = $connect->prepare($pdo);
			$stmt->bindParam(':name', $name);
			$stmt->bindParam(':email',$email);
			$stmt->bindParam(':phone', $phone);
		    $stmt->execute();
		    $connect=null;
	    
	    	header("Location:read.php") ;
    	}   
	}

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
					<input type="text" name="name"  class="form-control" value="<?= $_POST['name']?>">
						<?php if(isset($errMessage['name'])) {?>
                        	<span class="error" ><?= $errMessage['name'] ?></span>
                    	<?php } ?>
                    	
                    	<?php if(isset($errMessage['onlyletters'])) {?>
                       	 	<span class="error" ><?= $errMessage['onlyletters'] ?></span>
                    	<?php } ?>
				</div>
				<div class="form-group">
					<lable for='email'>Email</lable>
					<input type="email" name="email" class="form-control" value="<?= $_POST['email']?>">
						<?php if(isset($errMessage['email'])) {?>
                      		<span class="error" ><?= $errMessage['email'] ?></span>
                    	<?php } ?> 
                    
                    	<?php if(isset($errMessage['filedemail'])) {?>
                        	<span class="error" ><?= $errMessage['filedemail'] ?></span>
                    	<?php } ?>   
				</div>
				<div class="form-group">
					<lable for='phone'>Phone</lable>
					<input type="text" name="phone"  class="form-control" value="<?= $_POST['phone']?>">
						<?php if(isset($errMessage['phone'])) {?>
                       		<span class="error" ><?= $errMessage['phone'] ?></span>
                    	<?php } ?>

                    	<?php if(isset($errMessage['phonenum'])) {?>
                       		 <span class="error" ><?= $errMessage['phonenum'] ?></span>
                   	    <?php } ?>
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

