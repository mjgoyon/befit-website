<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bookings_styles.css') ?>">
    <script defer src="https://widget-js.cometchat.io/v3/cometchatwidget.js"></script>
    <title>BeFit | My Bookings</title>
</head>

<body>
    <div class="container">
        <div class="market-header">
            <h1 id="header">BOOKINGS</h1>
        </div>
        <div class="sub-container">
            <?php
            if ($_SESSION['account'] == "Coach" && $_SESSION['userusername'] == $users[0]->users_username) {
            ?>
                <div class="solo">
                    <h2>Confirm Trainees</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Option</th>
                                <th>Date Ordered</th>
                                <th>Name</th>
                                <th>Workout</th>
                                <th>Day</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($trainees as $row) {
                                echo "<tr>";
                            ?>
                                <?php
                                if ($row->orders_status == 0) {
                                ?>
                                    <td>
                                        <div class="options-btn">
                                            <a href="<?php echo base_url() . 'user/confirm?id=' . $row->orders_id; ?>">CONFIRM</a>
                                            <a href="<?php echo base_url() . 'user/decline?id=' . $row->orders_id; ?>">DECLINE</a>
                                        </div>
                                    </td>
                                    <td><?php echo $row->orders_datetime; ?></td>
                                    <td><a href="<?php echo base_url() . 'user/profile/' . $row->orders_from; ?>"><?php echo $row->orders_from; ?></a></td>
                                    <td><?php echo $row->services_title; ?></td>
                                    <td><?php echo $row->services_day; ?></td>
                                    <td><?php echo $row->services_time; ?></td>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="solo">
                    <h2 id="border"></h2>
                    <h1 id="header">MY WORKOUTS</h1>
                    <h2>Single Session</h2>
                    <?php
                    foreach ($services_of_coach as $row) {
                        $title = $row->services_title;
                    ?>
                        <?php
                        if ($row->services_duration == 1) {
                        ?>
                            <button class="accordion"><?php echo $row->services_title ?> | <?php echo $row->services_type ?></button>
                            <div class="panel">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Date Ordered</th>
                                            <th>Service Name</th>
                                            <th>Trainee</th>
                                            <th>Day</th>
                                            <th>Time</th>
                                            <th>Type of Session</th>
                                            <th>Remarks</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($services_coach as $row) {
                                            if ($row->orders_status == 1 && $title == $row->services_title) {
                                        ?>
                                                <tr>
                                                    <td><?php echo $row->orders_datetime; ?></td>
                                                    <td><?php echo $row->services_title; ?></td>
                                                    <td><?php echo $row->orders_from; ?></td>
                                                    <td><?php echo $row->services_day; ?></td>
                                                    <td><?php echo $row->services_time ?></td>
                                                    <td><?php echo $row->services_session; ?></td>
                                                    <?php
                                                    if ($row->orders_remarks == 0) {
                                                    ?>
                                                        <td><a href="<?php echo base_url() . 'user/complete_orders?id=' . $row->orders_id; ?>">MARK AS COMPLETE</a></td>
                                                    <?php
                                                    } else {
                                                        echo '<td>Completed</td>';
                                                    }
                                                    ?>
                                                </tr>
                                        <?php

                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                    <?php
                        }
                    }
                    ?>
                    <h2>Multi Session</h2>
                    <?php
                    foreach ($services_of_coach as $row) {
                        $title = $row->services_title;
                    ?>
                        <?php
                        if ($row->services_duration > 1) {
                        ?>
                            <button class="accordion"><?php echo $row->services_title ?> | <?php echo $row->services_type ?></button>
                            <div class="panel">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Date Ordered</th>
                                            <th>Service Name</th>
                                            <th>Trainee</th>
                                            <th>Day</th>
                                            <th>Time</th>
                                            <th>Type of Session</th>
                                            <th>Remarks</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($services_coach as $row) {
                                            if ($row->orders_status == 1 && $title == $row->services_title) {
                                        ?>
                                                <tr>
                                                    <td><?php echo $row->orders_datetime; ?></td>
                                                    <td><?php echo $row->services_title; ?></td>
                                                    <td><?php echo $row->orders_from; ?></td>
                                                    <td><?php echo $row->services_day; ?></td>
                                                    <td><?php echo $row->services_time ?></td>
                                                    <td><?php echo $row->services_session; ?></td>
                                                    <?php
                                                    if ($row->orders_remarks == 0 && $row->orders_duration > 1) {
                                                    ?>
                                                        <td>
                                                            <div class="options-btn">
                                                                <a id="round-btn" href="<?php echo base_url() . 'user/minus_session?id=' . $row->orders_id; ?>">-</a>
                                                                <?php echo $row->orders_duration; ?>
                                                                <a id="round-btn" href="<?php echo base_url() . 'user/add_session?id=' . $row->orders_id; ?>">+</a>
                                                            </div>
                                                        </td>
                                                    <?php
                                                    } else if ($row->orders_remarks == 0 && $row->orders_duration == 1) {
                                                    ?>
                                                        <td>
                                                            <div class="options-btn">
                                                                <a id="round-btn" href="<?php echo base_url() . 'user/complete_orders?id=' . $row->orders_id; ?>">-</a>
                                                                <?php echo $row->orders_duration; ?>
                                                                <a id="round-btn" href="<?php echo base_url() . 'user/add_session?id=' . $row->orders_id; ?>">+</a>
                                                            </div>
                                                        </td>
                                                    <?php
                                                    } else {
                                                        echo '<td>Completed</td>';
                                                    }
                                                    ?>
                                                </tr>
                                        <?php

                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                    <?php
                        }
                    }
                    ?>
                <?php
            } else {
                ?>
                    <div class="solo">
                        <h2>Single Sessions</h2>
                        <div class="table-container">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Date Ordered</th>
                                        <th>Service Name</th>
                                        <th>Coach</th>
                                        <th>Day</th>
                                        <th>Time</th>
                                        <th>Payment</th>
                                        <th>Type of Session</th>
                                        <th>Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    foreach ($services as $row) {
                                        if ($row->services_duration < 2) {
                                    ?>
                                            <tr>
                                                <td><?php echo $row->orders_datetime; ?></td>
                                                <td><?php echo $row->services_title; ?></td>
                                                <td><?php echo $row->users_name; ?></td>
                                                <td><?php echo $row->services_day; ?></td>
                                                <td><?php echo $row->services_time ?></td>
                                                <td>
                                                    <?php
                                                    if ($row->orders_status == 1) {
                                                        echo "Paid";
                                                    } else {
                                                        echo "Not Confirmed";
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php echo $row->services_session; ?></td>
                                                <td>
                                                    <?php
                                                    if ($row->orders_remarks == 0) {
                                                        echo "Unperformed";
                                                    } else {
                                                        echo "Completed";
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="group">
                        <h2>Multi Sessions</h2>
                        <div class="table-container">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Date Ordered</th>
                                        <th>Service Name</th>
                                        <th>Coach</th>
                                        <th>Day</th>
                                        <th>Time</th>
                                        <th>Payment</th>
                                        <th>Type of Session</th>
                                        <th>Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    foreach ($services as $row) {
                                        if ($row->services_duration >= 2) {
                                    ?>
                                            <tr>
                                                <td><?php echo $row->orders_datetime; ?></td>
                                                <td><?php echo $row->services_title; ?></td>
                                                <td><?php echo $row->users_name; ?></td>
                                                <td><?php echo $row->services_day; ?></td>
                                                <td><?php echo $row->services_time; ?></td>
                                                <td>
                                                    <?php
                                                    if ($row->orders_status == 1) {
                                                        echo "Paid";
                                                    } else {
                                                        echo "Not Confirmed";
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php echo $row->services_session; ?></td>
                                                <td>
                                                    <?php
                                                    if ($row->orders_remarks == 0) {
                                                        echo $row->orders_duration . " sessions left";
                                                    } else {
                                                        echo "Completed";
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php
            }
                ?>
                </div>
        </div>

        <script>
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

            var acc = document.getElementsByClassName("accordion");
            var i;

            for (i = 0; i < acc.length; i++) {
                acc[i].addEventListener("click", function() {
                    this.classList.toggle("active");
                    var panel = this.nextElementSibling;
                    if (panel.style.maxHeight) {
                        panel.style.maxHeight = null;
                    } else {
                        panel.style.maxHeight = panel.scrollHeight + "px";
                    }
                });
            }
        </script>
</body>

</html>