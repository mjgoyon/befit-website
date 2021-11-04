<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script defer src="https://widget-js.cometchat.io/v3/cometchatwidget.js"></script>
    <title>BeFit | Order Successful</title>
    <style>
        * {
            margin: 0;
        }

        html {
            background-color: #222222;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
        }
    </style>
</head>

<body>   
    <div style=" font-family: 'Poppins';line-height: 0;display: flex;flex-direction: row;justify-content: center;padding: 0 3rem;text-align: center;" class="market-header">
        <h1 style="font-weight: 600;font-size: 40px;color: #FA632A;padding-top: 4.5rem;padding-bottom: 4rem;text-align: center;" id="header">BOOKING SUCCESSFUL</h1>
    </div>
    <div style="font-family: 'Poppins';margin: 3rem auto 3rem;padding-left: 3rem;padding-right: 3rem;overflow: hidden;width: 50%;" class="infodiv">
        <div style="font-family: 'Poppins';color: #FFFFFF;text-align: center;background-color: #383838;padding: 3remfont-size: 20px;" class="infotext">
            <br>
            <div style="align-items: center;justify-content: center;margin-left: auto;margin-right: auto;padding: 1rem;" class='service-info'>
                <div style="line-height: 2.5;display: flex;flex-direction: row;justify-content: space-between;padding: 0 3rem 0 3rem;" class="info-row">
                    <p>Payment Type: </p>
                    <p>BeFit Wallet</p>
                </div>
                <div style="line-height: 2.5;display: flex;flex-direction: row;justify-content: space-between;padding: 0 3rem 0 3rem;" class="info-row">
                    <p>Email: </p>
                    <p><?php echo $users[0]->users_email ?></p>
                </div>
                <div style="line-height: 2.5;display: flex;flex-direction: row;justify-content: space-between;padding: 0 3rem 0 3rem;" class="info-row">
                    <p>Amount: </p>
                    <p><?php echo $services[0]->services_price ?></p>
                </div>
                <div style="line-height: 2.5;display: flex;flex-direction: row;justify-content: space-between;padding: 0 3rem 0 3rem;" class="info-row">
                    <p>Transaction ID: </p>
                    <p>BFTWRKT00<?php echo $orders->orders_id ?></p>
                </div>
            </div>
        </div>
</body>

</html>