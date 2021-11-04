<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/admin_login_styles.css')?>">
    <title>BeFit Admin</title>
</head>
<body>
<div class="container">
	<div class="header">
        <h1>Welcome to BeFit Admin!</h1>
	</div>
	<?php
		if(validation_errors()) {
			?>
			<div class="error-msg">
				<?php echo validation_errors(); ?>
			</div>
			<?php
		}
		if($this->session->flashdata('message')) {
			?>
			<div class="correct-msg">
				<?php echo $this->session->flashdata('message'); ?>
			</div>
			<?php
			unset($_SESSION['message']);
		}
	?>
	<div class="forms">
		<form method="POST" action="<?php echo base_url().'admin/login_data'; ?>">
			<div class="form-input">
				<label for="username">Username</label><br>
				<input type="text" id="username" name="username" value="<?php echo set_value('username'); ?>">
			</div>
			<div class="form-input">
				<label for="password">Password</label><br>
				<input type="password" id="password" name="password">
			</div>
			<div class="registerbtn">
				<input type="submit" value="Log In">
			</div>
		</form>
	</div>
</div>
</body>
</html>