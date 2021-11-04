<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/podcast_styles.css')?>">
	<script defer src="https://widget-js.cometchat.io/v3/cometchatwidget.js"></script>
    <title>My Profile</title>
</head>
 
<body>
<div class="header">
    <img class="img-fluid" width="360" src="<?php echo base_url('assets/images/podcast-header.jpg')?>">
    <div class="centered">
        <h1>BeFit Podcast: </h1>
        <h1>Fitness and Wellness</h1>
    </div>
</div>
<div class="container">
	<div class="quote-container">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <p>-Alexander the Great</p>
    </div>
    <div class="soundcloud-container">
        <h1 id="title">Podcast 1: Suzanne Somers | Sexy Forever</h1>
        <iframe width="100%" height="166" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/132321675&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true"></iframe><div style="font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;"><a href="https://soundcloud.com/anytimefitness" title="Anytime Fitness Podcast" target="_blank" style="color: #cccccc; text-decoration: none;">Anytime Fitness Podcast</a> · <a href="https://soundcloud.com/anytimefitness/suzanne-somers-sexy-forever" title="Suzanne Somers | Sexy Forever" target="_blank" style="color: #cccccc; text-decoration: none;">Suzanne Somers | Sexy Forever</a></div>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>            
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
</script>
</body>
</html>