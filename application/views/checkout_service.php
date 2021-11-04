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
    <link rel="stylesheet" href="<?php echo base_url('assets/css/checkout_styles.css')?>">
    <title>BeFit | Checkout Summary</title>
</head>


<body>
    <div class="container">
		<div class="market-header">
			<h1 id="header">CHECKOUT SUMMARY</h1>
		</div>
        <p class="infotext">
            <?php 
		foreach($services as $row) {
			echo "<p class='infohead'>".$row->services_title."</p>";
			echo "<div class='service-info'>";
                echo "<div class='info-row'>";
                echo "<p class='infotext'>"."Price: "."</p>";
                echo "<p class='infotext'>".$row->services_price." PHP"."</p>";
                echo "</div>";
                echo "<div class='info-row'>";
                echo "<p class='infotext'>"."Coach: "."</p>";
                echo "<p class='infotext'>".$row->users_name."</p>";
                echo "</div>";
                echo "<div class='info-row'>";
                echo "<p class='infotext'>"."Workout: "."</p>";
                echo "<p class='infotext'>".$row->services_type."</p>";
                echo "</div>";
                echo "<div class='info-row'>";
                echo "<p class='infotext'>"."Time: "."</p>";
                echo "<p class='infotext'>".$row->services_time."</p>";
                echo "</div>";
                echo "<div class='info-row'>";
                echo "<p class='infotext'>"."Day: "."</p>";
                echo "<p class='infotext'>".$row->services_day."</p>";
                echo "</div>";
                echo "<div class='info-row'>";
                echo "<p class='infotext'>"."Duration: "."</p>";
                echo "<p class='infotext'>".$row->services_duration." sessions</p>";
                echo "</div>";
            echo "</div>";
		}
	?>
        </p>
        <form action="<?php echo base_url().'user/avail_service/'.$this->uri->segment(3); ?>">
		<?php
			foreach($services as $row) {
				$serviceprice = $row->services_price;
			}
			foreach ($users as $row) {
				$userbalance = $row->users_wallet;
			}
			if($userbalance < $serviceprice){
				echo "<div class='registerbtn'>";
					echo "<input type='submit' value='CHECKOUT' disabled>";
				echo "</div>";
				echo "<p class='low-bal'>"."Your balance is below the price required to checkout!"."</p>";
				echo "<div class='topup'><a href='".base_url()."user/topup"."'>TOP UP NOW</a></div>";
			}
			else {
				echo "<div class='registerbtn'>";
					echo "<input type='submit' value='CHECKOUT'>";
				echo "</div>";
			}
		?>
        </form>
    </div>
</body>

</html>