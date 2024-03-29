<<!DOCTYPE html>
<html>
<style type="text/css">
    * {
        margin: 0;
        padding: 0;
    }
    body {
        background-color: #1D201F; /* Dunkler Hintergrund */
 
    }
    .container {
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      display: flex;
 
    }
    .button {
        background-color: red;
        border: none;
        color: #fff; /* Button Schriftfarbe */
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 20px;
        margin: 4px 2px;
        cursor: pointer;
    }
 
    .fas, .far {
        font-size: 20px;
        color: #fff;
    }
</style>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>YT API Mini-Dashboard</title>
</head>
<body>
	<?php
		$api_key = "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";
		$channel_id = "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";
		$api_response = file_get_contents('https://www.googleapis.com/youtube/v3/channels?part=statistics&id='.$channel_id.'&key='.$api_key);
		$api_response_decoded = json_decode($api_response, true);

		$subscriberCount = $api_response_decoded['items'][0]['statistics']['subscriberCount'];
		$videoCount = $api_response_decoded['items'][0]['statistics']['videoCount'];
		$viewCount = $api_response_decoded['items'][0]['statistics']['viewCount'];
	?>

    <div class="container">
        <div class="button"><i class="fas fa-users"></i> <?php echo $subscriberCount; ?> Abonnenten</div> 
        <div class="button"><i class="far fa-eye"></i> <?php echo $viewCount; ?> Views</div>
        <div class="button"><i class="fas fa-video"></i> <?php echo $videoCount; ?> Videos</div>   
    </div>
</body>
</html>

