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
  <div class="heroHurghada">
  <div class="overlay">
    <div class="hero-info">
    <span>YYA in</span>
    Hurghada</div>
  </div>
 </div>
 <div class="mainDubai">
  <div class="left-d fstyle">Hurghada</div>
  <div class="right-d">Located between the dry desert of Egypt to the west and the warm sapphire waters of the Red Sea to the east, Hurghada is one of Egypt's most famous resorts. The city is a narrow coastal strip, nearly 40 km long<span id="dots">...</span><span id="more"> For the most part, it is a mosaic of shiny and welcoming hotel complexes with large swimming pools and beautiful gardens with countless date palms. The majority of the population lives in Hurghada's downtown.</span>
  <span id="myBtn">Read more</span></div>
 </div>
<section class="ourHotels">
 <span class="title">OUR HOTEL IN 
  <span>HURGHADA</span>
  <hr>
</span>
 <div class="about-hurghada">
  <div class="left-abouth"></div>
  <div class="right-aboutd">
    <div class="rightInfo">
    <span class="right-t">YYA Hurghada</span>
    <span>Located in the heart of New Alamein - a vibrant business district, our 5-star hotel is perfect for business, entertainment or leisure travellers seeking to realize opportunity. Inspired by Middle-Eastern culture, the 5-Star property boasts 235 sophisticated and spacious rooms and suites, a state-of-the-art convention centre with 9 flexible meeting rooms & 600 sqm ballroom, an outdoor pool, and five intimate restaurants, lounges & bars.
</span>
    <button class="availability" onclick="location.href = '../rooms/hurghadaRooms.php'">Book Now</button>
  </div>
  </div>
 </div>
 </section>
 <?php include '../templates/footer.php';?>
<script src="cities.js"></script>
</body>
</html>