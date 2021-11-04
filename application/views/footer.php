<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/footer_styles.css') ?>">
    <script src="https://unpkg.com/paymaya-js-sdk@2.0.0/dist/bundle.js"></script>
</head>

<body>

</body>
<footer class="footer">
    <div class="footer__addr">
        <div class="footer-logo"><a href=""><img src="<?php echo base_url('assets/images/befitlogo.png') ?>" /></a></div>
        <h2>Contact Us</h2>
        <address>
            Hotline: 8880-1234 <br>
            (Weekdays 7:00 AM to 7:00 PM, Weekends 9:00 AM to 6:00 PM)<br>
            Chat: 24/7 (in-app only)<br><br>
            <a class="footer__btn" href="mailto:example@gmail.com">Email Us</a>
        </address>
    </div>

    <ul class="footer__nav">
        <li class="nav__item">
            <a href="<?php echo base_url('user/marketplace/') ?>"><p class="nav__title">Marketplace</p></a>
            <ul class="nav__ul">
                <li>
                    <a href="#">Cardio</a>
                </li>
                <li>
                    <a href="#">Yoga</a>
                </li>
                <li>
                    <a href="#">Strength Training</a>
                </li>
            </ul>
        </li>

        <li class="nav__item">
        <a href="<?php echo base_url('user/nutrition/') ?>"><p class="nav__title">Nutrition</p></a>
            <ul class="nav__ul">
                <li>
                    <a href="#">Foods</a>
                </li>
                <li>
                    <a href="#">Macros</a>
                </li>
                <li>
                    <a href="#">Exercise</a>
                </li>
            </ul>
        </li>
        <li class="nav__item">
            <a href="<?php echo base_url('user/faq/') ?>"><p class="nav__title">FAQ</p></a>
            <ul class="nav__ul">
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Payment</a>
                </li>
                <li>
                    <a href="#">Refund</a>
                </li>
            </ul>
        </li>
        <li class="nav__item">
            <a href="<?php echo base_url('user/aboutus/') ?>"><p class="nav__title">About</p></a>
            <ul class="nav__ul">
                <li>
                    <a href="#">Team</a>
                </li>
                <li>
                    <a href="#">Coaches</a>
                </li>
                <li>
                    <a href="#">Trainees</a>
                </li>
            </ul>
        </li>
        <li class="nav__item">
            <a href="<?php echo base_url('user/aboutus/') ?>"><p class="nav__title">Payment</p></a>
            <ul class="nav__ul">
                <li>
                    <a href="#">PayMaya</a>
                </li>
                <li>
                    <a href="#">PayPal</a>
                </li>
                <li>
                    <a href="#">Visa | Mastercard</a>
                </li>
            </ul>
        </li>
        
    </ul>
    <div class="legal">
        <p>&copy; 2021 BeFit Marketplace Corporation. All rights reserved.</p>
    </div>
</footer>
</html>