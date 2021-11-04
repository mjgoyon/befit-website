<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/cashout_styles.css') ?>">
    <script defer src="https://widget-js.cometchat.io/v3/cometchatwidget.js"></script>
    <title>BeFit | Cashout</title>
</head>

<body>
    <div class="container">
        <div class="market-header">
            <h1 id="header">CASHOUT</h1>
        </div>
        <div class="sub-container">
            <div class="solo">
                <h2>Order History</h2>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Date and Time</th>
                                <th>Paid By</th>
                                <th>Amount</th>
                                <th>Workout</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($services_coach as $row) {
                            ?>
                                <tr>
                                    <td><?php echo $row->orders_datetime; ?></td>
                                    <td><?php echo $row->orders_from; ?></td>
                                    <td><?php echo $row->services_price; ?> PHP</td>
                                    <td><?php echo $row->services_title; ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="solo">
                <h2>Cashout History</h2>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Date and Time</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($cashout as $row) {
                            ?>
                                <tr>
                                    <td><?php echo $row->cashout_datetime; ?></td>
                                    <td><?php echo $row->cashout_amount; ?></td>
                                    <td>
                                        <?php
                                        if ($row->cashout_remarks == 0) {
                                            echo "Pending";
                                        } else {
                                            echo "Completed";
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <form action="<?php echo base_url() . 'user/create_cashout' ?>" method="post">
            <div class="input-form">
                <label>Enter Phone Number: </label>
                <input type="text" name="phone">
            </div>
            <div class="registerbtn">
                <input type="submit" value="Request Cashout">
            </div>
        </form>

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