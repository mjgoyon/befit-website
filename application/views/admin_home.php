<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/admin_home_styles.css')?>">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.js" integrity="sha512-b3xr4frvDIeyC3gqR1/iOi6T+m3pLlQyXNuvn5FiRrrKiMUJK3du2QqZbCywH6JxS5EOfW0DY0M6WwdXFbCBLQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>BeFit Homepage</title>
</head>

<body>
<div class='all'>
<div class='admin-header'>
<div class='header-text'>
<a href="<?php echo base_url('user/marketplace/') ?>"><img class="navlogo"src="<?php echo base_url('assets/images/befitlogo.png') ?>"></a>
<div class='header-greet'>
<!---
<a href='' class='logout-btn'><svg width="14" height="14" viewBox="0 0 24 24"><path fill="#fff" d="M14 12h-4v-12h4v12zm4.213-10.246l-1.213 1.599c2.984 1.732 5 4.955 5 8.647 0 5.514-4.486 10-10 10s-10-4.486-10-10c0-3.692 2.016-6.915 5-8.647l-1.213-1.599c-3.465 2.103-5.787 5.897-5.787 10.246 0 6.627 5.373 12 12 12s12-5.373 12-12c0-4.349-2.322-8.143-5.787-10.246z"/></svg></a>
-->
</div>
</div>
</div>
<div class='admin-sidebar'>
    <li onclick="sidedash()">
        <a>Dashboard</a>
    </li>
    <li onclick="sidetransaction()">
        <a>Transactions</a>
    </li>

    <li onclick="sidechart()">
        <a>Charts</a>
    </li>

    <li onclick="sideservice()">
        <a>Services</a>
    </li>

    <li onclick="sidecashout()">
        <a>Cashouts</a>
    </li>

    <li onclick="sideadmin()">
        <a>Add Admin</a>
    </li>
    

    <!---
    <li class="accordion">
        <a>Blog</a> 
        <svg width="8" height="8" viewBox="0 0 24 24"><path fill="#fff" d="M0 7.33l2.829-2.83 9.175 9.339 9.167-9.339 2.829 2.83-11.996 12.17z"/></svg>
    </li>

    <div class="panel">
        <li class="submenu"><a href='' class="submenutext">Add Blog</a></li>
        <li class="submenu"><a href='' class="submenutext">Delete Blog</a></li>
        <li class="submenu"><a href='' class="submenutext">Update Blog</a></li>
    </div>

   
    <li class="accordion">
        <a>Events</a> 
        <svg width="8" height="8" viewBox="0 0 24 24"><path fill="#fff" d="M0 7.33l2.829-2.83 9.175 9.339 9.167-9.339 2.829 2.83-11.996 12.17z"/></svg>
    </li>


    <div class="panel">
        <li class="submenu"><a href='' class="submenutext">Add Events</a></li>
        <li class="submenu"><a href='' class="submenutext">Delete Events</a></li>
        <li class="submenu"><a href='' class="submenutext">Update Events</a></li>
        <li class="submenu"><a href='' class="submenutext">Office Events</a></li>
        <li class="submenu"><a href='' class="submenutext">User Events</a></li>
        <li class="submenu"><a href='' class="submenutext">Public Events</a></li>
        <li class="submenu"><a href='' class="submenutext">Admin Events</a></li>
    </div>

    <li>
        <a href=''>Server Info</a>
    </li>--->

</div>

<div class='center-content'>
<div class='all-border'>
<div class='shows-location'>
<div class='location-text'>
<span id ='location' class='location'>Dashboard</span>
</div>
</div>
<!---end of sidebar / navbar--->

<!---cards--->
<div id="dashboardcards" class="row">
  <div class="column">
    <div class="card">
      <p class="carduptext">ACTIVE USERS</p>
      <p class="cardmidtext"><?php echo $numusers; ?></p>
      <p class="cardbottomtext">Befit</p>
    </div>
  </div>

  <div class="column" >
    <div class="card bluebg">
      <p class="carduptext">SERVICES AVAILABLE</p>
      <p class="cardmidtext"><?php echo $numservices; ?></p>
      <p class="cardbottomtext">Befit</p>
    </div>
  </div>

  <div class="column">
    <div class="card greenbg">
      <p class="carduptext">PENDING CASHOUTS</p>
      <p class="cardmidtext"><?php echo $numcashout; ?></p>
      <p class="cardbottomtext">Befit</p>
    </div>
  </div>

</div>

<div id="dashboardcards" class="row">
  <div class="columntime">
    <div class="cardtime">
      <p class="timetext"><span class ="clock" id="clock"></span></p>
    </div>
  </div>

</div>

<!--- users --->
<div id ="dashboardshow" class="container">
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
                        <td><a class="deletebutton" href="<?php echo base_url().'admin/delete_data?id='.$row->users_id;?>">Delete</a></td>
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
                        <td><a class="deletebutton" href="<?php echo base_url().'admin/delete_data?id='.$row->users_id;?>">Delete</a></td>
                        <?php
                        echo "</tr>";
                    }
                ?>
           </tbody>
        </table>
        <div id="app" class="page-container">
            <?php echo $this->pagination->create_links(); ?>
        </div>
        
    </div>


    <!---charts--->
    
    <div class="chartshow" id ="chartshow">
        <div class ="containerhead">
            <h1 style="color:white;">COACH RATINGS</h2>
        </div>
        <div class="container">
            <canvas id="myChart"></canvas>
        </div>
        <div class ="containerhead">
            <h1 style="color:white;">COACH PRICES</h2>
        </div>    
        <div class="container">
            <canvas id="coachPrices"></canvas>
        </div>
    </div>


    <!---transactions--->
<div class ="transactionshow" id="transactionshow">
<div class ="containerhead">
    <h1 style="color:white;">PAYMENTS</h2>
 </div>
    <div class="container">
        <h2 style="color:white;">Payment Transactions</h2>
        <table style="color:white;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Trainee</th>
                    <th>Amount</th>
                    <th>Coach</th>
                </tr>
            </thead>
            <tbody>
                <?php 
					foreach($orders as $row) {
				    	echo "<tr>";
				?>
                <?php 
						echo "<td>".$row->orders_id."</td>";
						echo "<td>".$row->orders_from."</td>";
						echo "<td>".$row->orders_amount.".00 PhP</td>";
						echo "<td>".$row->orders_to."</td>";
						echo "</tr>";
					}
				?>
            </tbody>
        </table>
    </div>
    <div class ="containerhead">
    <h1 style="color:white;">TOPUPS</h2>
    </div>
    <div class="container">
        <h2 style="color:white;">Wallet Topups</h2>
        <table style="color:white;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Trainee</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php 
					foreach($payments as $row) {
				    	echo "<tr>";
				?>
                <?php 
						echo "<td>".$row->payments_id."</td>";
						echo "<td>".$row->users_username."</td>";
						echo "<td>".$row->payments_amount." PhP</td>";
						echo "</tr>";
					}
				?>
            </tbody>
        </table>
    </div>
 </div>

 <div id="serviceshow" class="serviceshow">
 <div class ="containerhead">
    <h1 style="color:white;">SERVICES</h2>
 </div>
    <div class="container">
        <h2 style="color:white;">Top Services</h2>
        <table style="color:white;">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Type</th>
                    <th>Session</th>
                    <th>Sale</th>
                </tr>
            </thead>
            <tbody>
                <?php 
					foreach($services as $row) {
				    	echo "<tr>";
				?>
                <?php 
						echo "<td>".$row->services_title."</td>";
						echo "<td>".$row->services_price."</td>";
                        echo "<td>".$row->services_type."</td>";
                        echo "<td>".$row->services_session."</td>";
						echo "<td>".$row->services_sale."</td>";
						echo "</tr>";
					}
				?>
            </tbody>
        </table>
    </div>                 
</div>

</div>


<div id ="cashoutshow" class="container cashoutshow">
        <table class="table-view">
            <thead>
                <tr>
                    <th>Cashout ID</th>
                    <th>User ID</th>
                    <th>Coach</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
           <tbody>
                <?php
                    foreach($cashout as $row) {
                        if ($row->cashout_remarks == "0"){
                            echo "<tr>";
                            echo "<td>".$row->cashout_id."</td>";
                            echo "<td>".$row->users_id."</td>";
                            echo "<td>".$row->cashout_from."</td>";
                            echo "<td>".$row->cashout_amount." PHP"."</td>"; 
                            echo "<td>".$row->cashout_datetime."</td>";?>
                            <td><a class="deletebutton greenbg" href="<?php echo base_url().'admin/confirm_cashout?cashout_id='.$row->cashout_id;?>">Confirm</a></td>
                            <?php
                            echo "</tr>";
                        }
                    }
                ?>
           </tbody>
        </table>
                </div>

</div>
</div>

<div class ="container addadminshow" id ="addadminshow">
    <div class="form-container">
            <form method="POST" action="<?php echo base_url().'Admin/add_admin'; ?>" >
                <div>
					<label for="username">Username</label><br>
					<input type="text" id="username" name="username" value="<?php echo set_value('username'); ?>">
				</div>
				<div>
					<label for="password">Password</label><br>
					<input type="password" id="password" name="password">
				</div>
				<div>
					<label for="password_confirm">Confirm Password</label><br>
					<input type="password" id="password_confirm" name="password_confirm">
				</div>
				<div class="registerbtn">
					<input type="submit" value="Submit">
				</div>
				<br><br><br>
			</form>
    </div>
</div>


<div class="btn-logout">
        <a href="<?php echo base_url();?>admin/logout">LOG OUT</a>
    </div>

</body>

<script>
window.onload=function(){
var acc = document.getElementsByClassName("accordion");
var panel = document.getElementsByClassName('panel');
    for (var i = 0; i < acc.length; i++) {
        acc[i].onclick = function() {
        var setClasses = !this.classList.contains('active');
        setClass(acc, 'active', 'remove');
        setClass(panel, 'show', 'remove');
        if (setClasses) {
            this.classList.toggle("active");
            this.nextElementSibling.classList.toggle("show");
        }
    }
}
function setClass(els, className, fnName) {
    for (var i = 0; i < els.length; i++) {
            els[i].classList[fnName](className);
        }
    }
}
//sidebar js
function sidedash(){
    document.getElementById('dashboardshow').style.display ='block';
    document.getElementById('chartshow').style.display ='none';
    document.getElementById('transactionshow').style.display ='none';
    document.getElementById('serviceshow').style.display ='none';
    document.getElementById('sidecashout').style.display ='none';
    document.getElementById("addadminshow").style.display = "none";
    document.getElementById("location").innerHTML = "Dashboard";

}

function sidetransaction(){
    document.getElementById('dashboardshow').style.display ='none';
    document.getElementById('chartshow').style.display ='none';
    document.getElementById('transactionshow').style.display ='block';
    document.getElementById('serviceshow').style.display ='none';
    document.getElementById('cashoutshow').style.display ='none';
    document.getElementById("addadminshow").style.display = "none";
    document.getElementById("location").innerHTML = "Transactions";

}

function sidechart(){
    document.getElementById('dashboardshow').style.display ='none';
    document.getElementById('chartshow').style.display ='block';
    document.getElementById('transactionshow').style.display ='none';
    document.getElementById('serviceshow').style.display ='none';
    document.getElementById("cashoutshow").style.display = "none";
    document.getElementById("addadminshow").style.display = "none";
    document.getElementById("location").innerHTML = "Charts";

}

function sideservice(){
    document.getElementById('dashboardshow').style.display ='none';
    document.getElementById('chartshow').style.display ='none';
    document.getElementById('transactionshow').style.display ='none';
    document.getElementById('serviceshow').style.display ='block';
    document.getElementById("cashoutshow").style.display = "none";
    document.getElementById("addadminshow").style.display = "none";
    document.getElementById("location").innerHTML = "Services";
}

function sidecashout(){
    document.getElementById('dashboardshow').style.display ='none';
    document.getElementById('chartshow').style.display ='none';
    document.getElementById('transactionshow').style.display ='none';
    document.getElementById('serviceshow').style.display ='none';
    document.getElementById('cashoutshow').style.display ='block';
    document.getElementById("addadminshow").style.display = "none";
    document.getElementById("location").innerHTML = "Cashouts";
}

function sideadmin(){
    document.getElementById('dashboardshow').style.display ='none';
    document.getElementById('chartshow').style.display ='none';
    document.getElementById('transactionshow').style.display ='none';
    document.getElementById('serviceshow').style.display ='none';
    document.getElementById('cashoutshow').style.display ='none';
    document.getElementById("addadminshow").style.display = "block";
    document.getElementById("location").innerHTML = "Add Admin";
}

</script>


<script>
    //chart js
    // === include 'setup' then 'config' above ===
    <?php
        $php_array1 = array();
        $i = 0;
        /*for($i = 0; $i < $names as $row){
            array_push($php_array1, $row[$i]);
            $i++;
        }*/
        $js_array = json_encode($names);
        echo "const labels1 = ". $js_array . ";";
    ?>
        const data = {
            labels: labels1,
            datasets: [{
                label: 'Ratings',
                backgroundColor: ['rgba(255, 0, 0, 0.4)',
                'rgba(0, 255, 0, 0.4)',
                'rgba(0, 0, 255, 0.4)'
                ],
                borderColor: [
                'rgb(255, 0, 0)',
                'rgb(0, 255, 0)',
                'rgb(0, 0, 255)'
                ],
                borderWidth: 1,
                <?php
                    //$php_array2 = array();
                    //$j = 0;
                    /*foreach($ratings as $rating){
                        array_push($php_array2, $rating[$j]);
                    }*/
                    $js_array = json_encode($ratings);
                    echo "data: ". $js_array . ",";
                ?>
            }]
        };
        const config = {
        type: 'bar',
        data: data,
        options: {}
        };
        var myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>

<script>
    //chart js
        <?php
            $array1 = array();
            $array2 = array();
            $array3 = array();
            foreach($prices as $row) {
                if(floatval($row->services_price) >= 0 and floatval($row->services_price) <= 500) {
                    array_push($array1, $row->services_price);
                } elseif(floatval($row->services_price) >= 501 and floatval($row->services_price) <= 2000) {
                    array_push($array2, $row->services_price);
                } elseif(floatval($row->services_price) > 2001) {
                    array_push($array3, $row->services_price);
                }
            }
        ?>
        var count1 = <?php echo count($array1);?>;
        var count2 = <?php echo count($array2);?>;
        var count3 = <?php echo count($array3);?>;
        const dataPrice = {
        labels: [
            '₱0.00 - ₱500.00',
            '₱501.00 - ₱2000.00',
            '₱2001.00 and above'
        ],
        datasets: [{
            label: 'My First Dataset',
            data: [count1, count2, count3],
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)'
                ],
            hoverOffset: 4
            }]
        };
        const configPrice = {
        type: 'pie',
        data: dataPrice,
        };
        var coachPrices = new Chart(
            document.getElementById('coachPrices'),
            configPrice
        );
    </script>

<script type="text/javascript">
    //date js
    var clockElement = document.getElementById('clock');

    function clock() {
        clockElement.textContent = new Date().toString();
    }

    setInterval(clock, 1000);
</script>

    
</html>