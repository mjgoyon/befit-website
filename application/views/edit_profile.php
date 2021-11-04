<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/edit_profile_styles.css') ?>">
	<script defer src="https://widget-js.cometchat.io/v3/cometchatwidget.js"></script>
	<title>My Profile</title>
</head>

<body>
<div class="container">
	<div class="form-container">
		<?php 
			$username = $this->uri->segment(3);
			if($_SESSION['userusername'] == $username) {
			echo '<h1 id="header">UPDATE YOUR PASSWORD</h1>';
		?>
			<form method="post" action="<?php echo base_url();?>user/update_data">
			<div class="error-msg"><?php echo validation_errors();?></div>
			<div class="input-form">
			<label>Enter Current Password: </label>
			<input type="password" name="c_pass">
			</div>
			<div class="input-form">
			<label>Enter New Password: </label>
			<input type="password" name="n_pass">
			</div>
			<div class="input-form">
			<label>Re-Enter New Password: </label>
			<input type="password" name="r_pass">
			</div>
			<div class="registerbtn">
			<input type="submit" value="Submit"/>
			</div>
			<?php
				if($this->session->flashdata('message')) {
			?>
				<div>
					<?php echo $this->session->flashdata('message'); ?>
				</div>
					<?php
					unset($_SESSION['message']);
				}
					echo '</form>';
			}
					?>
	</div>
	<h2 id="border"></h2>		
	<div class="form-container">
		<?php 
			if($_SESSION['userusername'] == $username) {
			if($this->session->userdata('account') == 'Trainee'){
			echo '<h1 id="header"	>UPDATE YOUR PROFILE</h1>';

		?>
				<form method="post" action="<?php echo base_url();?>user/update_profile">
				<div class="input-form">
				<label>Enter Age: </label>
				<input type="text" name="new_age" onkeypress="isInputNumber(event)">
				</div>
				<div class="input-form">
				<label>Enter Height: </label>
				<input type="text" id="new_height" name="new_height"  placeholder="Height in centimers">
				</div>
				<div class="input-form">
				<label>Enter Weight: </label>
				<input type="text" id="new_weight" name="new_weight"  placeholder="Height in kilograms">
				</div>
				<div id ="bmidiv">
                <label for="bmi">BMI</label><br>
				<input type="text" id="new_bmi" name="new_bmi" readonly>
				</div>
				<button class="computebutton" type="button" id="computediv" onclick="compute_bmi()">Compute</button>
				<div class="input-form">
				<label>Enter Health Problem: </label>
				<select class="select" name="new_health" required>
					<option disabled selected>Select Health Condition</option>
					<option value ="None">None</option>
					<option value ="Heart Problem">Heart Problem</option>
					<option value ="Asthma">Asthma</option>
					<option value ="Diabetic">Diabetic</option>
					<option value ="Diabetic">Obesity</option>
				</select>
				<br><br><br>
				</div>
				<div class="registerbtn">
				<input type="submit" value="Submit"/>
				</div>
			<?php
				if($this->session->flashdata('message')) {
			?>
				<div>
					<?php echo $this->session->flashdata('message'); ?>
				</div>
					<?php
					unset($_SESSION['message']);
				}
					echo '</form>';
			}
			}
					?>
	</div>

	<div class="form-container">
		<?php 
			if($_SESSION['userusername'] == $username) {
			if($this->session->userdata('account') == 'Coach'){
			echo '<h1>UPDATE YOUR PROFILE</h1>';
		?>
				<form method="post" action="<?php echo base_url();?>user/update_profile" enctype="multipart/form-data">
				<div class="input-form">
				<label>Enter Age:</label>
				<input type="text" name="new_age" onkeypress="isInputNumber(event)">
				</div>
				<div class="input-form">
				<label><h1>Valid ID</h1></label><br>
				<input type="file" name="new_req" id="new_req">
				</div>
				<div class="registerbtn">
				<input type="submit" value="Submit"/>
				</div>
			<?php
				if($this->session->flashdata('message')) {
			?>
				<div>
					<?php echo $this->session->flashdata('message'); ?>
				</div>
					<?php
					unset($_SESSION['message']);
				}
					echo '</form>';
			}
			}
					?>	
	</div>
</div>
    <script>
		function isInputNumber(evt) {
			var ch = String.fromCharCode(evt.which);
			if (!(/[0-9]/.test(ch))) {
				evt.preventDefault();
			}
		}
	</script>
</body>

<script>
	function compute_bmi(){
		var h = parseInt(document.getElementById("new_height").value);
		var w = parseInt(document.getElementById("new_weight").value);
		var bmiresult = (w/((h/100)*(h/100)));
		bmiresult = parseFloat(bmiresult).toFixed(2);
		document.getElementById("new_bmi").value = bmiresult;
	}
</script>

</html>