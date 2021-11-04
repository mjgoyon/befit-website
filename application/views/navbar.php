<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/navbar_styles.css') ?>">
    <script src="https://unpkg.com/paymaya-js-sdk@2.0.0/dist/bundle.js"></script>
</head>
<div class="navbar">
    <div class="nav">
        <ul class="items">
            <li><a href="<?php echo base_url('user/marketplace/') ?>"><img class="navlogo" src="<?php echo base_url('assets/images/befitlogo.png') ?>"></a></li>
            <li class="navitems"><a href="<?php echo base_url('user/marketplace/') ?>">Marketplace</a></li>
            <li class="navitems"><a href="<?php echo base_url('user/podcast/') ?>">Podcast</a></li>
            <li class="navitems"><a href="<?php echo base_url('user/nutrition/') ?>">Nutrition</a></li>
            <li class="navitems"><a href="<?php echo base_url('user/aboutus/') ?>">About</a></li>
            <li class="navitems"><a href="<?php echo base_url('user/faq/') ?>">FAQ</a></li>
        </ul>
        <ul class="items2">
            <div class="wallet">
                <?php
                foreach ($users as $row) {
                ?>
                    <p><?php echo $row->users_wallet; ?> PHP</p>
                <?php
                }
                ?>
            </div>
            <li class="with-submenu">
                <?php
                foreach ($users as $row) {
                ?>
                    <img src='<?php echo base_url() . 'uploads/' . $row->users_avatar; ?>'>
                <?php
                }
                ?>
                <ul class="submenu">
                    <?php
                    if ($_SESSION['account'] == "Coach" && $_SESSION['userusername'] == $users[0]->users_username) {
                    ?>
                        <li><a href="<?php echo base_url('user/profile/' . $this->session->userdata('userusername')) ?>">Profile</a>
                        </li>
                        <li><a href="<?php echo base_url(); ?>user/topup">Wallet</a></li>
                        <li><a href="<?php echo base_url(); ?>user/bookings">Trainees</a></li>
                        <li><a href="<?php echo base_url(). 'user/cashout?userid='.$row->users_id; ?>">Cashout</a></li>
                        <li><a href="<?php echo base_url(); ?>user/logout">Log Out</a></li>
                    <?php
                    } else {
                    ?>
                        <li><a href="<?php echo base_url('user/profile/' . $this->session->userdata('userusername')) ?>">Profile</a>
                        </li>
                        <li><a href="<?php echo base_url(); ?>user/topup">Wallet</a></li>
                        <li><a href="<?php echo base_url(); ?>user/bookings">Bookings</a></li>
                        <li><a href="<?php echo base_url(); ?>user/logout">Log Out</a></li>
                    <?php
                    }
                    ?>
                </ul>
            </li>
        </ul>
    </div>
</div>


<body>

</body>

</html>