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
        <h2 style="color:white;">Number of Users: <?php print_r($users); ?></h2>
    </div>

    <div class="container">
        <canvas id="myChart"></canvas>
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

    <div class="container">
        <canvas id="coachPrices"></canvas>
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

    <script>
    // === include 'setup' then 'config' above ===
    <?php
        $php_array = array();
        foreach($names as $row){
            array_push($php_array, $row->names);
        }
        $js_array = json_encode($php_array);
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
                    $php_array = array();
                    foreach($ratings as $rating){
                        array_push($php_array, $rating->ratings);
                    }
                    $js_array = json_encode($php_array);
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
        <?php
            $array1 = array();
            $array2 = array();
            $array3 = array();
            foreach($prices as $row) {
                if(floatval($row->services_price) >= 0 and floatval($row->services_price) <= 500) {
                    array_push($array1, $row->services_price);
                } elseif(floatval($row->services_price) >= 501 and floatval($row->services_price) <= 1000) {
                    array_push($array2, $row->services_price);
                } elseif(floatval($row->services_price) >= 1001 and floatval($row->services_price) <= 1500) {
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
            '₱501.00 - ₱1000.00',
            '₱1001.00 - ₱1500.00'
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

    
</body>
</html>