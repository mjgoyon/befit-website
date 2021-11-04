<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/profile_styles.css')?>">
	<script defer src="https://widget-js.cometchat.io/v3/cometchatwidget.js"></script>
    <title>BeFit | My Profile</title>
</head>

	  
<body>
<div class="container">
	<div class="body-container">
		<div class="dtls-container">
			<?php
				foreach($users as $row){
			?>
			<div class="info-row">
				<img class="fixed-img" src='<?php echo base_url().'uploads/'.$row->users_avatar; ?>'>
			</div>
			<div class="info-row">
				<p class="name"><?php echo $row->users_name; ?></p>
			</div>
			<div class="info-row">
				<p><?php echo $row->users_account; ?></p>
			</div>
			<div class="btn-edit">
				<a href="<?php echo base_url('user/editprofile/' . $this->session->userdata('userusername')) ?>">Edit Profile</a>
			</div>
			<div class="info-row">
				<h1 id="header">ABOUT</h1>
			</div>
			<div class="info-row2">
				<p>Username:</p>
				<p><?php echo $row->users_username; ?></p>
			</div>
			<div class="info-row2">
				<p>Birthdate:</p>
				<p><?php echo $row->users_birthdate; ?></p>
			</div>
			<div class="info-row2">
				<p>Email:</p>
				<p><?php echo $row->users_email; ?></p>
			</div>
			<?php
				}
			?>
			<?php
				foreach($details as $row){	
			?>
				<div class="info-row2">
					<p>Age:</p>
					<p><?php echo $row->Age; ?></p>
				</div>
				<div class="info-row2">
					<p>Height:</p>
					<p><?php echo $row->Height; ?></p>
				</div>
				<div class="info-row2">
					<p>Weight:</p>
					<p><?php echo $row->Weight; ?></p>
				</div>
				<div class="info-row2">
					<p>BMI:</p>
					<p><?php echo $row->BMI; ?></p>
				</div>
				<div class="info-row2">
					<p>Health:</p>
					<p><?php echo $row->Health; ?></p>
				</div>

			<?php
				}
			?>

</div>
		<?php
		$username = $this->uri->segment(3);
		if($users[0]->users_account == "Coach" && $_SESSION['userusername'] == $username) {
		?>
		<h2 id="border"></h2>
		<h1>CREATE WORKOUT OFFERS</h1>
			<div class="workout-container">

				<form method="post" action="<?php echo base_url();?>user/add_service">
					<div class="input-form2">
						<label>Workout Title</label>
						<input type="text" name="workout_title">
						<div></div>
					</div>
					<div class="input-form2">
						<label>Workout Price</label>
						<input type="text" name="workout_price">
						<div></div>
					</div>
					<div class="input-form2">
						<label>Workout Description</label>
						<textarea type="text" name="workout_description" rows="10" cols="70"></textarea>
						<div></div>
					</div>
					<div class="input-form2">
						<label>Workout Type</label>
						<select class="select" name="workout_type">
						    <option disabled selected>Select Workout Type</option>
							<option value ="Cardio">Cardio</option>
							<option value ="Strength">Strength</option>
							<option value ="Endurance">Endurance</option>
							<option value ="Flexibility">Flexibility</option>
						</select>
						<div></div>
					</div>
					<div class="input-form2">
						<label>Workout Day</label>
						<select class="select" name="workout_day">
							<option disabled selected>Select Workout Day</option>
							<option value ="Monday">Monday</option>
							<option value ="Tuesday">Tuesday</option>
							<option value ="Wednesday">Wedneday</option>
							<option value ="Thursday">Thursday</option>
							<option value ="Friday">Friday</option>
							<option value ="Saturday">Saturday</option>
							<option value ="Sunday">Sunday</option>
						</select>
						<div></div>
					</div>
					<div class="input-form2">
						<label>Workout Time</label>
						<input type="text" name="workout_time">
						<div></div>
					</div>
					<div class="input-form2">
						<label>Workout Session</label>
						<select class="select" name="workout_session">
							<option disabled selected>Select Type of Session</option>
							<option value ="Solo">Solo</option>
							<option value ="Group">Group</option>
						</select>
						<div></div>
					</div>
					<div class="input-form2">
						<label>Workout Duration (Number of sessions)</label>
						<input type="text" name="workout_duration" onkeypress="isInputNumber(event)">
						<div></div>
					</div>
					<div class="registerbtn2">
						<input type="submit" value="Add"/>
					</div>
				</form>
			</div>
			<div>
				<div class="info-row">
					<h1 id="header">YOUR SCHEDULE</h1>
				</div>
				<table>
					<thead>
						<tr>
							<th>Option</th>
							<th>Type of Workout</th>
							<th>Availability</th>
							<th>Day</th>
							<th>Time</th>
							<th>Session</th>
							<th>Duration</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							foreach($services as $row) {
								echo "<tr>";
						?>
								<td><a href="<?php echo base_url().'user/delete_services?id='.$row->services_id;?>">REMOVE</a></td>
						<?php 
								echo "<td>".$row->services_type."</td>";
								echo "<td>".($row->services_availability == 1 ? "Available" : "Unavailable")."</td>";
								echo "<td>".$row->services_day."</td>";
								echo "<td>".$row->services_time."</td>";
								echo "<td>".$row->services_session."</td>";
								echo "<td>".$row->services_duration." sessions</td>";
								echo "</tr>";
							}
						?>
					</tbody>
				</table>
			</div>
		<?php 
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
    window.addEventListener('DOMContentLoaded', (event) => {
        CometChatWidget.init({
            "appID": "192441c86ab4e6a7",
            "appRegion": "us",
            "authKey": "bd9d02296028b3c8ce6791864495cdee3f43007a"
        }).then(response => {
            console.log("Initialization completed successfully");
            CometChatWidget.login({
                "uid": "<?php echo $this->session->userdata('userusername'); ?>"
            }).then(response => {
                CometChatWidget.launch({
                    "widgetID": "8116fe55-3361-44c1-bb27-c0e5e54d7954",
                    "docked": "true",
					"alignment": "right", //left or right
                    "roundedCorners": "true",
                    "height": "600px",
                    "width": "800px",
                    "defaultID": '<?php echo $this->session->userdata('userusername'); ?>', //default UID (user) or GUID (group) to show,
                    "defaultType": 'user' //user or group
                });
            }, error => {
                console.log("User login failed with error:", error);
                //Check the reason for error and take appropriate action.
            });
        }, error => {
            console.log("Initialization failed with error:", error);
            //Check the reason for error and take appropriate action.
        });
    });
</script>
</body>
</html>