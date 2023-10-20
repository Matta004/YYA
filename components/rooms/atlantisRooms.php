<?php 
$conn =  mysqli_connect("localhost", "root", "", "hotelbooking", 3306);

$room = $guests = $arrivalDate = $leavingDate = $session = $number =  '';
$errorRoom = $errorGuests = $errorArrival = $errorLeaving = $errorNumber = '';
$validRoom = $validGuests = $validArrival = $validLeaving = $validNumber =  false;

session_start();

if (isset($_SESSION['admin_name'])){
  $session = $_SESSION['admin_name'];
}elseif (isset($_SESSION['user_name'])) {
    $session = $_SESSION['user_name'];
} else {
  $session = '';
}


  if (isset($_POST['submit'])) {
    if(empty($_POST['rooms'])) {
      $errorRoom = "This field should not be left empty!";
    } else {
      $room = $_POST['rooms'];
      $validRoom = true;
    }
    if(empty($_POST['guests'])) {
      $errorGuests = "This field should not be left empty!";
    } else {
      $guests = $_POST['guests'];
      $validGuests = true;
    }
    if(empty($_POST['arrivals'])) {
      $errorArrival = "This field should not be left empty!";
    } else {
      $arrivalDate = $_POST['arrivals'];
      $validArrival = true;
    }
    if(empty($_POST['leaving'])) {
      $errorLeaving = "This field should not be left empty!";
    } else {
      $leavingDate = $_POST['leaving'];
      $validLeaving = true;
    }
    if(empty($_POST['number'])) {
      $errorNumber = "This field should not be left empty!";
    } else {
      $number = $_POST['number'];
      $validNumber = true;
    }
    


    if ($validRoom && $validGuests && $validArrival && $validLeaving && $validNumber ) {
      $successMessage3 = 'Thank you for booking your stay with YYA Hotels, We wish you a wonderful stay';
      $request = "INSERT INTO atlantis_booking (room, guests, arrivals, leaving, user, number) VALUES ('$room', '$guests', '$arrivalDate', '$leavingDate', '$session', '$number')";
      if (mysqli_query($conn,$request)) {
        $successMessage3 = 'Thank you for booking your stay with YYA Hotels, We wish you a wonderful stay';
      }else {
        echo 'something went wrong'; 
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
 <title>Rooms in Dubai</title>
  <link rel="stylesheet" href="../index/index.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="rooms.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="../cities/citiess.css?v=<?php echo time(); ?>">
  <link href='https://fonts.googleapis.com/css?family=IBM Plex Sans Condensed' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
  crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<?php include '../templates/navbar.php';?>
 <div class="heroAtlantis">
  <div class="overlay">
    <div class="hero-info">
    <span>Rooms In</span>
    Atlantis</div>
  </div>
 </div>
<section class="mainRooms">
  <div class="leftRooms">
    <div class="leftsRooms"></div>
      <div class="rightsRooms">
        <span class="right-t">Super Deluxe Room</span>
        Furnished with twin beds or a double bed, a mini bar, LCD TV, shower or bathtub, bathrobe and slippers, hair dryer, A/C, safe deposit box and tile flooring, the deluxe rooms come with a balcony or terrace with a sea view. 1 & 2 Floor
    </div>
  </div>
  <div class="rightRooms">
    <div class="rightsRooms2">
      <span class="right-t">Deluxe Twin</span>
        Tastefully decorated and designed for a fabulous experience, offering exceptional comfort and tranquility to every guest to enjoy their stay in Dubai. With 38 sqms of space all look out onto Dubai city . The unit can accommodate 2 adult and 1 child
    </div>
    <div class="leftsRooms2"></div>
  </div>
    <?php if($_SESSION['user_name'] || $_SESSION['admin_name']) {?>
   <form action="<?php $location = $_SERVER['PATH_INFO']; echo ''.$location.'#successMessage';?>" method="post" class="bookingForm">
    <div>
    <select name="rooms" id="type">
        <option value="Super_Deluxe_Room" >Super Deluxe Room</option>
        <option value="Deluxe_Twin" >Deluxe Twin</option>
      </select>
          <div>
          <label for="guests">Number of Guests: </label>
          <input type="number" name="guests" id="" placeholder="Number Of Guests" required>
            <div class = "danger"> <p><?php echo $errorGuests?></p></div>


</div>
<div>
          <label for="arrivals">Date of Arrival: </label>
          <input type="date" name="arrivals" id="" required>
            <div class = "danger"> <p><?php echo $errorArrival?></p></div>

</div>
<div>
          <label for="leaving">Date of Leaving: </label>
          <input type="date" name="leaving" required>
            <div class = "danger"> <p><?php echo $errorLeaving?></p></div>

</div>
<div>
          <label for="number">Phone Number </label>
          <input type="tel" name="number" placeholder="Enter Your Phone Number" required >
            <div class = "danger"> <p><?php echo $errorNumber?></p></div>

</div>
</div>
          <input type="submit" value="Book Now" class="availability" name="submit">
        </form>
<div class="success" id="successMessage"><?php echo $successMessage3; ?></div>
<?php } else {?>
  <span class="right-t loginH">Please Login to be able to book rooms</span>
  <?php }?>
</section>
<?php include '../templates/footer.php';?>
<script src="rooms.js"></script>
</body>
</html>