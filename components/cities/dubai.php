<?php

session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
  integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://fonts.googleapis.com/css?family=IBM Plex Sans Condensed' rel='stylesheet'>
  <link rel="stylesheet" href="../index/index.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="citiess.css?v=<?php echo time(); ?>">
</head>
<body>
    <?php include '../templates/navbar.php'?>
 <div class="heroDubai">
  <div class="overlay">
    <div class="hero-info">
    <span>YYA in</span>
    DUBAI</div>
  </div>
 </div>
 <div class="mainDubai">
  <div class="left-d fstyle">DUBAI</div>
  <div class="right-d">Dubai is a city and emirate in the United Arab Emirates known for luxury shopping, ultramodern architecture and a lively nightlife scene<span id="dots">...</span><span id="more"> Burj Khalifa, an 830m-tall tower, dominates the skyscraper-filled skyline. At its foot lies Dubai Fountain, with jets and lights choreographed to music. On artificial islands just offshore is Atlantis, The Palm, a resort with water and marine-animal parks.</span>
  <span id="myBtn">Read more</span></div>
 </div>
 <section class="ourHotels">
 <span class="title">OUR HOTELS IN DUBAI
  <hr>
</span>
<div class="about-hurghada">
  <div class="left-aboutd1"></div>
  <div class="right-aboutd">
    <div class="rightInfo">
    <span class="right-t">Jumeirah Beach</span>
    <span>This 5-star hotel is modern and contemporary, with exciting dining and recreation options only a few steps from the stunning Arabian Gulf beaches. All of our 297 rooms have balconies and free WIFI, in addition to partial sea views from some rooms and suites. The hotel is only 30 mins drive from Dubai International Airport and also offers a large swimming pool, wellness center, and fitness center. Modern meeting, conference, and banqueting facilities are available for event planners and corporate clients.
</span>
    <button class="availability" onclick="location.href = '../rooms/jumeirahRooms.php'">Book Now</button>
  </div>
  </div>
 </div>
 <div class="about-hurghada">
  <div class="left-aboutd2"></div>
  <div class="right-aboutd">
    <div class="rightInfo">
    <span class="right-t">The Atlantis</span>
    <span>This 5-star hotel is modern and contemporary, with exciting dining and recreation options only a few steps from the stunning Arabian Gulf beaches. All of our 297 rooms have balconies and free WIFI, in addition to partial sea views from some rooms and suites. The hotel is only 30 mins drive from Dubai International Airport and also offers a large swimming pool, wellness center, and fitness center. Modern meeting, conference, and banqueting facilities are available for event planners and corporate clients.
</span>
    <button class="availability" onclick="location.href = '../rooms/atlantisRooms.php'">Book Now</button>
  </div>
  </div>
 </div>
 </section>
 <?php include '../templates/footer.php'; ?>
<script src="cities.js"></script>
</body>
</html>