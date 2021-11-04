<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.js" integrity="sha512-b3xr4frvDIeyC3gqR1/iOi6T+m3pLlQyXNuvn5FiRrrKiMUJK3du2QqZbCywH6JxS5EOfW0DY0M6WwdXFbCBLQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/admin_dashboard_styles.css')?>">
    <title>Admin Dashboard</title>
</head>
<body>
    <div class="container">
        <table class="table-view">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User Account</th>
                    <th>User Avatar</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Birthdate</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>
            </thead>
           <tbody>
                <?php
                    foreach($trainees as $row) {
                        echo "<tr>";
                        echo "<td>".$row->users_id."</td>";
                        echo "<td>".$row->users_account."</td>";
                        echo "<td>"."<img src='".base_url().'uploads/'.$row->users_avatar."' width='80' height='80'>"."</td>";
                        echo "<td>".$row->users_name."</td>";
                        echo "<td>".$row->users_username."</td>"; 
                        echo "<td>".$row->users_birthdate."</td>";
                        echo "<td>".$row->users_email."</td>";
                        echo "<td>".$row->users_password."</td>"; ?>
                        <td><a href="<?php echo base_url().'admin/delete_data?id='.$row->users_id;?>">Delete</a></td>
                        <?php
                        echo "</tr>";
                    }
                ?>
           </tbody>
        </table>
        <div id="app" class="page-container">
            <?php echo $this->pagination->create_links(); ?>
        </div>
        
        <table class="table-view">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User Account</th>
                    <th>User Avatar</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Birthdate</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>
            </thead>
           <tbody>
                <?php
                    foreach($coaches as $row) {
                        echo "<tr>";
                        echo "<td>".$row->users_id."</td>";
                        echo "<td>".$row->users_account."</td>";
                        echo "<td>"."<img src='".base_url().'uploads/'.$row->users_avatar."' width='80' height='80'>"."</td>";
                        echo "<td>".$row->users_name."</td>";
                        echo "<td>".$row->users_username."</td>"; 
                        echo "<td>".$row->users_birthdate."</td>";
                        echo "<td>".$row->users_email."</td>";
                        echo "<td>".$row->users_password."</td>"; ?>
                        <td><a href="<?php echo base_url().'admin/delete_data?id='.$row->users_id;?>">Delete</a></td>
                        <?php
                        echo "</tr>";
                    }
                ?>
           </tbody>
        </table>
        <div id="app" class="page-container">
            <?php echo $this->pagination->create_links(); ?>
        </div>
        
        <div class="btn-logout">
			<a href="<?php echo base_url();?>admin/logout">LOG OUT</a>
		</div>
    </div>

</body>
</html>