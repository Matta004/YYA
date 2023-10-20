<?php

$name = $subject = $email = $message = ''; 
$error_name = $error_subject = $error_email = $error_message = '';
$valid_name = $valid_subject = $valid_email = $valid_message = false ;

$conn =  mysqli_connect("localhost", "root", "", "hotelbooking", 3306);

session_start();

if (isset($_POST['submit'])){
  if (empty($_POST['name'])){
      $error_name = 'This field should not be left empty!';
  }
  else{
      $name = htmlspecialchars($_POST['name']);
      if(strpbrk($name, '0123456789')){
          $error_name = "Only letters are allowed!";
      }
      else{
          $valid_name = true;
      }
  }

  if (empty($_POST['email'])){ 
      $error_email = "This field should not be left empty!";
      
    } 
    else{
      $email = htmlspecialchars($_POST['email']); //prevent xss attack
  
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error_email = "INVALID EMAIL!";
      }
      else{
        $q = "SELECT * FROM account WHERE email = '$email'";
        $result = mysqli_query($conn, $q);
  
        if(mysqli_num_rows($result)>0){
          $error_email = "This email is already registered!";
        }
        else{
          $valid_email = true;
        }
        
      } 
  }
  if (empty($_POST['subject'])){ 
    $error_subject = "This field should not be left empty!";
    
  } 
  else{
    $subject = $_POST['subject'];
    $valid_subject = true;
  }

  if (empty($_POST['message'])){ 
    $error_message = "This field should not be left empty!";
    
  } 
  else{
    $message = $_POST['message'];
    $valid_message = true;

  if($valid_name && $valid_subject && $valid_email){
  $sql = "INSERT INTO contactus (name,email,subject,message) VALUES ('$name','$email','$subject','$message')";
      if (mysqli_query($conn,$sql)){
        $successMessage = "Thank you for your interest in YYA Hotels, Our team will contact you as soon as possible with all the details";
      }
      else{
        echo "ERROR: " . mysqli_error($conn) . "<br>";
      }
    }
 }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Document</title>
 <link rel="stylesheet" href="components/index/index.css?v=<?php echo time(); ?>">
  <link href='https://fonts.googleapis.com/css?family=IBM Plex Sans Condensed' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
  crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="components/cities/citiess.css?v=<?php echo time(); ?>">
</head>
<body>
<?php 
if($_SESSION['admin_name']) {
?>
<section class="header">
    <div class="flex">
      <a href="">
      <img src="assets/YYA-M.png" alt="" class="nav-img">
      </a>
      <div id="menu-btn" class="fas fa-bars"></div>
      </div>
    <div class="right-nav">
    <nav class="nav-bar">
      <a href="">Home</a>
      <a href="components/index/dashboard.php">Bookings Dashboard</a>
      <div class="dropdown">
  <a class="dropbtn">Destinations <div class="fa fa-angle-down"></div></a>
  <div class="dropdown-content">
    <a href="components/cities/dubai.php">Dubai</a>
    <a href="components/cities/alamein.php">New Alamein</a>
    <a href="components/cities/hurghada.php">Hurghada</a>
  </div>
</div>
      <div class="dropdown">
  <a class="dropbtn">Rooms <div class="fa fa-angle-down"></div></a>
  <div class="dropdown-content">
    <a href="components/rooms/jumeirahRooms.php">Jumeirah</a>
    <a href="components/rooms/atlantisRooms.php">Atlantis</a>
    <a href="components/rooms/alameinRooms.php">New Alamein</a>
    <a href="components/rooms/hurghadaRooms.php">Hurghada</a>
  </div>
</div>

       <div class="dropdown">
  <a class="dropbtn"><?php echo ucfirst($_SESSION['admin_name'])?></a><div class="fa fa-angle-down"></div></a>
  <div class="dropdown-content">
    <a href="components/index/logout.php">Logout</a>
  </div>
</div>
    </nav>
    
    </div>

  </section>
  <?php } elseif($_SESSION['user_name']){?>
        <section class="header">
    <div class="flex">
      <a href="../../">
      <img src="assets/YLogo.png" alt="" class="nav-img">
      </a>
      <div id="menu-btn" class="fas fa-bars"></div>
      </div>
    <div class="right-nav">
    <nav class="nav-bar">
      <a href="">Home</a>
      <a href="components/booking/booking.php">My Bookings</a>
      <div class="dropdown">
  <a class="dropbtn">Destinations <div class="fa fa-angle-down"></div></a>
  <div class="dropdown-content">
    <a href="components/cities/dubai.php">Dubai</a>
    <a href="components/cities/alamein.php">New Alamein</a>
    <a href="components/cities/hurghada.php">Hurghada</a>
  </div>
</div>
      <div class="dropdown">
  <a class="dropbtn">Rooms <div class="fa fa-angle-down"></div></a>
  <div class="dropdown-content">
    <a href="components/rooms/jumeirahRooms.php">Jumeirah</a>
    <a href="components/rooms/atlantisRooms.php">Atlantis</a>
    <a href="components/rooms/alameinRooms.php">New Alamein</a>
    <a href="components/rooms/hurghadaRooms.php">Hurghada</a>
  </div>
</div>  

 <div class="dropdown">
  <a class="dropbtn"><?php echo ucfirst($_SESSION['user_name'])?><div class="fa fa-angle-down"></div></a>
  <div class="dropdown-content">
    <a href="components/index/logout.php">Logout</a>
  </div>
</div>
    </nav>
    
    </div>
  </section>
  <?php } else{?>
        <section class="header">
    <div class="flex">
      <a href="">
      <img src="assets/YYA-M.png" alt="" class="nav-img">
      </a>
      <div id="menu-btn" class="fas fa-bars"></div>
      </div>
    <div class="right-nav">
    <nav class="nav-bar">
      <a href="">Home</a>
      <div class="dropdown">
  <a class="dropbtn">Destinations <div class="fa fa-angle-down"></div></a>
  <div class="dropdown-content">
    <a href="components/cities/dubai.php">Dubai</a>
    <a href="components/cities/alamein.php">New Alamein</a>
    <a href="components/cities/hurghada.php">Hurghada</a>
  </div>
</div>
      <div class="dropdown">
  <a class="dropbtn">Rooms <div class="fa fa-angle-down"></div></a>
  <div class="dropdown-content">
    <a href="components/rooms/jumeirahRooms.php">Jumeirah</a>
    <a href="components/rooms/atlantisRooms.php">Atlantis</a>
    <a href="components/rooms/alameinRooms.php">New Alamein</a>
    <a href="components/rooms/hurghadaRooms.php">Hurghada</a>
  </div>
</div>  

 <div class="dropdown">
  <a class="dropbtn">My Account<div class="fa fa-angle-down"></div></a>
  <div class="dropdown-content">
    <a href="components/index/signup.php">Register</a>
    <a href="components/index/login.php">Login</a>
  </div>
</div>
    </nav>
    
    </div>
  </section>
    <?php }?>
 <div class="home">
<div class="slideshow-container">
 <div class="mySlides fade">
  <div class="mySlides1"></div>
 </div>

 <div class="mySlides fade">
  <div class="mySlides2"></div>
 </div>

  <div class="mySlides fade">
    <div class="mySlides3"></div>
  </div>
</div>
   <div class="search">
    <div class="search-h">
   Find The Perfect Stay
    </div>
      <button type="submit" class="searchBTN" onclick="location.href = '#location'"><i class="fa fa-search"></i>Search</button>

   </div>
</div>
<section class="who">
  <div class="who2">
    <div class="who-h">
      <span class="stroke-text1">Who We Are
        <hr>
    </div>
    <div class="who-s">
      <div class="left-who fstyle">
        <span class="ls">
          YYA Hotels
        </span>
        YYA Hotels was founded in 2016, and is now operating in Dubai, New Alamein, and Hurghada.
        Our Goal at YYA Hotels is to always deliever comfort and top teir service to our visitors.
      </div>
      <div class="right-who">
        <img src="assets/yacht.jpg" alt="">
      </div>
    </div>
  </div>
</section>
<section class="loc1"  id="location">
<span class="stroke-text1">OUR LOCATIONS
  <hr>
</span>
<div class="locations">
  <a href="components/cities/alamein.php" class="location">
  <div><img src="assets/New_Alamein.jpg" alt="" width="100%" height="30%">
    </div>
    <div class="locs">
      New Alamein
    </div>
  </a>
  <a href="components/cities/dubai.php" class="location">
    <div><img src="assets/Dubai.jpeg" alt="" width="100%" height="30%">
    </div>
    <div class="locs">
      Dubai
    </div>
  </a>
  <a href="components/cities/hurghada.php" class="location">
    <div><img src="assets/hurghada.jpeg" alt="" width="100%" height="30%">
    </div>
    <div class="locs">
      Hurghada
    </div>
  </a>
</div>
</section>

 <section class="Services">
      <span class="title">Services</span>

 <div class="about-hurghada">
  <div class="left-services"></div>
  <div class="right-aboutd">
    <div class="rightInfo">
    <span class="right-t">Top Tier Restaurants</span>
    <span>Here at YYA, We take pride in the delicious meals we serve at our hotel. From hearty breakfasts to savory dinners, our culinary team puts their heart and soul into every dish. Come indulge in our mouthwatering cuisine and experience the ultimate in dining satisfaction.
</span>
    <button class="availability" onclick="window.location.href='#contact'">More Details</button>
  </div>
  </div>
 </div>
 <div class="about-hurghada">
  <div class="right-aboutd">
    <div class="rightInfo">
    <span class="right-t">All-Year Festivals</span>
    <span>We take pride in hosting some of the most memorable festivals in the area. Our guests consistently compliment us on the high-quality entertainment, delicious food, and welcoming atmosphere at each event. We are thrilled to offer our guests an experience they will never forget.
</span>
    <button class="availability" onclick="window.location.href='#contact'">More Details</button>
  </div>
  </div>
  <div class="right-services"></div>
 </div>
 </section>

   <div class="contactHero">
  <div class="overlay">
    <span class="title">Contact Us</span>
  </div>
 </div>
 <section class="contactus">
  <div class="contactForm" id="contact">
    <div class="leftContact">
    <form class="cnForm" method="post" action="<?php $location = $_SERVER['PATH_INFO']; echo ''.$location.'#successMessage';?>">
      <label for="name">Name: </label>
      <input type="text" name="name" id="name" required>
      <?php echo $error_name?>
      <label for="email">Email: </label>
      <input type="email" name="email" id="email" required>
      <?php echo $error_email?>
      <label for="subject">Subject: </label>
      <input type="text" name="subject" id="subject" required>
      <?php echo $error_subject?>
      <label for="message">Message: </label>
      <textarea name="message" cols="30" rows="10"></textarea>
      <input type="submit" value="Submit" name="submit" class="availability">
      <?php echo $error_message?>
    </form>
    </div>
    <div class="rightContact"></div>
  </div>
  <div class="success" id="successMessage"><?php echo $successMessage ?></div>
 </section>

<footer class="footer">
<div class="mainFooter">
 <div class="leftF">
  <a href="">
      <img src="assets/YYA-M.png" alt="" class="nav-img">
      </a>
<div class="subscribe">
 <span>Thank you for your interest in YYA Hotels, For more details, Don't hesitate to leave us your contact info, and our team will contact you as soon as possible with all the details.</span>
<button class="subscribeBTN" onclick="location.href = '#contact'">
Contact US
</button> 
</div>
</div>
 <div class="rightF">
  <nav class="footerNav">
   <a href="">Home</a>
      <a href="components/booking/booking.php">My Bookings</a>
      <div class="dropdown">
  <a class="dropbtn">Destinations <div class="fa fa-angle-down"></div></a>
  <div class="dropdown-content">
    <a href="components/cities/dubai.php">Dubai</a>
    <a href="components/cities/alamein.php">New Alamein</a>
    <a href="components/cities/hurghada.php">Hurghada</a>
  </div>
</div>
      <div class="dropdown">
  <a class="dropbtn">Rooms <div class="fa fa-angle-down"></div></a>
  <div class="dropdown-content">
    <a href="components/rooms/jumeirahRooms.php">Jumeirah</a>
    <a href="components/rooms/atlantisRooms.php">Atlantis</a>
    <a href="components/rooms/alameinRooms.php">New Alamein</a>
    <a href="components/rooms/hurghadaRooms.php">Hurghada</a>
  </div>
</div>
  </nav>
</div>
</div>
</footer>
 <script src="components/index/index.js"></script>
</body>
</html>