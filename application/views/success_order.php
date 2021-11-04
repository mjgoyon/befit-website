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
    <link rel="stylesheet" href="<?php echo base_url('assets/css/success_styles.css')?>">
    <script defer src="https://widget-js.cometchat.io/v3/cometchatwidget.js"></script>
    <title>BeFit | Order Successful</title>
</head>

<body>
    <div class="market-header">
		<h1 id="header">BOOKING SUCCESSFUL</h1>
    </div>
    <div class="infodiv">
        <div class="infoheader">
            <div class="success-img">
                <img src="<?php echo base_url('assets/images/success.png') ?>">
            </div>
            <div class="infohead"><h1>SUCCESS!</h1></div>
        </div>
        <div class="infotext">
            <p>An order receipt has been sent to your email!</p>
            <br>
            <?php 
                echo "<div class='service-info'>";
                    echo "<div class='info-row'>";
                    echo "<p>"."Payment Type "."</p>";
                    echo "<p>BeFit Wallet</p>";
                    echo "</div>";
                    echo "<div class='info-row'>";
                    echo "<p>"."Email "."</p>";
                    echo "<p>".$users[0]->users_email."</p>";
                    echo "</div>";
                    echo "<div class='info-row'>";
                    echo "<p>"."Amount Paid "."</p>";
                    echo "<p>".$services[0]->services_price." PHP"."</p>";
                    echo "</div>";
                    echo "<div class='info-row'>";
                    echo "<p>"."Transaction ID "."</p>";
                    echo "<p>BFTWRKT00".$orders->orders_id."</p>";
                    echo "</div>";
                echo "</div>";
            ?>
            <p>Your workout subcription is now ordered! You can check your bookings by clicking the button below.</p>
            <div class="btn-choices">
                <div class="btn-1">
                    <div class='topup'><a href="<?php echo base_url()."user/bookings"?>">CHECK MY BOOKINGS</a></div>
                </div>
                <div class="btn-2">
                    <div class='topup'><a href="<?php echo base_url()."user/bookings"?>">BACK TO MARKETPLACE</a></div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>