<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/login_page.css')?>">
	<title>BeFit | Login</title>
</head>
<body>
<div class="container">
	<div class = "header">
		<a href="<?php echo base_url()?>"><img src="<?php echo base_url('assets/images/befitlogowhite1.png')?>"></a>
	</div>
			<div class="form-container">
			<h1>LOGIN</h1>
				<form method="POST" action="<?php echo base_url().'user/login_data'; ?>">
				<div class="error-msg">	
					<?php if(validation_errors()) {
		    		?>
		    		<div>
		    			<?php echo validation_errors(); ?>
		    		</div>
		    		<?php
		    	}
                if($this->session->flashdata('message')) {
					?>
					<div>
						<?php echo $this->session->flashdata('message'); ?>
					</div>
					<?php
					unset($_SESSION['message']);
				}?>
				</div>
					<div>
						<label for="username">Username</label><br>
						<input type="text" id="username" name="username" value="<?php echo set_value('username'); ?>">
					</div>
					<div>
						<label for="password">Password</label><br>
						<input type="password" id="password" name="password">
					</div>
					<div class="registerbtn">
						<input type="submit" value="Log In">
					</div>
					<div class="registerbtn">
						Create an Account
						<a class="orange"href="<?php echo base_url('User/register')?>">Sign Up</a>
					</div>
					
				</form>
			</div>
		<br><br><br>
</div>
</body>
</html>