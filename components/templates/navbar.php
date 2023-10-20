    <?php 
    if($_SESSION['admin_name']){
    ?>
    <section class="header">
    <div class="flex">
      <a href="../../">
      <img src="../../assets/YYA-M.png" alt="" class="nav-img">
      </a>
      <div id="menu-btn" class="fas fa-bars"></div>
      </div>
    <div class="right-nav">
    <nav class="nav-bar">
      <a href="../../">Home</a>
      <a href="../../components/index/dashboard.php">Bookings Dashboard</a>
      <div class="dropdown">
  <a class="dropbtn">Destinations <div class="fa fa-angle-down"></div></a>
  <div class="dropdown-content">
    <a href="../../components/cities/dubai.php">Dubai</a>
    <a href="../../components/cities/alamein.php">New Alamein</a>
    <a href="../../components/cities/hurghada.php">Hurghada</a>
  </div>
</div>
      <div class="dropdown">
  <a class="dropbtn">Rooms <div class="fa fa-angle-down"></div></a>
  <div class="dropdown-content">
    <a href="../../components/rooms/jumeirahRooms.php">Jumeirah</a>
    <a href="../../components/rooms/atlantisRooms.php">Atlantis</a>
    <a href="../../components/rooms/alameinRooms.php">New Alamein</a>
    <a href="../../components/rooms/hurghadaRooms.php">Hurghada</a>
  </div>
</div>  

 <div class="dropdown">
  <a class="dropbtn"><?php echo ucfirst($_SESSION['admin_name'])?><div class="fa fa-angle-down"></div></a>
  <div class="dropdown-content">
    <a href="../../components/index/logout.php">Logout</a>
  </div>
</div>
    </nav>
    
    </div>
  </section>  
    <?php } elseif($_SESSION['user_name']){?>
        <section class="header">
    <div class="flex">
      <a href="../../">
      <img src="../../assets/YYA-M.png" alt="" class="nav-img">
      </a>
      <div id="menu-btn" class="fas fa-bars"></div>
      </div>
    <div class="right-nav">
    <nav class="nav-bar">
      <a href="../../">Home</a>
      <a href="../../components/booking/booking.php">My Bookings</a>
      <div class="dropdown">
  <a class="dropbtn">Destinations <div class="fa fa-angle-down"></div></a>
  <div class="dropdown-content">
    <a href="../../components/cities/dubai.php">Dubai</a>
    <a href="../../components/cities/alamein.php">New Alamein</a>
    <a href="../../components/cities/hurghada.php">Hurghada</a>
  </div>
</div>
      <div class="dropdown">
  <a class="dropbtn">Rooms <div class="fa fa-angle-down"></div></a>
  <div class="dropdown-content">
    <a href="../../components/rooms/jumeirahRooms.php">Jumeirah</a>
    <a href="../../components/rooms/atlantisRooms.php">Atlantis</a>
    <a href="../../components/rooms/alameinRooms.php">New Alamein</a>
    <a href="../../components/rooms/hurghadaRooms.php">Hurghada</a>
  </div>
</div>  

 <div class="dropdown">
  <a class="dropbtn"><?php echo ucfirst($_SESSION['user_name'])?><div class="fa fa-angle-down"></div></a>
  <div class="dropdown-content">
    <a href="../../components/index/logout.php">Logout</a>
  </div>
</div>
    </nav>
    
    </div>
  </section>
  <?php } else{?>
        <section class="header">
    <div class="flex">
      <a href="../../">
      <img src="../../assets/YYA-M.png" alt="" class="nav-img">
      </a>
      <div id="menu-btn" class="fas fa-bars"></div>
      </div>
    <div class="right-nav">
    <nav class="nav-bar">
      <a href="../../">Home</a>
      <div class="dropdown">
  <a class="dropbtn">Destinations <div class="fa fa-angle-down"></div></a>
  <div class="dropdown-content">
    <a href="../../components/cities/dubai.php">Dubai</a>
    <a href="../../components/cities/alamein.php">New Alamein</a>
    <a href="../../components/cities/hurghada.php">Hurghada</a>
  </div>
</div>
      <div class="dropdown">
  <a class="dropbtn">Rooms <div class="fa fa-angle-down"></div></a>
  <div class="dropdown-content">
    <a href="../../components/rooms/jumeirahRooms.php">Jumeirah</a>
    <a href="../../components/rooms/atlantisRooms.php">Atlantis</a>
    <a href="../../components/rooms/alameinRooms.php">New Alamein</a>
    <a href="../../components/rooms/hurghadaRooms.php">Hurghada</a>
  </div>
</div>  

 <div class="dropdown">
  <a class="dropbtn">My Account<div class="fa fa-angle-down"></div></a>
  <div class="dropdown-content">
    <a href="../../components/index/signup.php">Register</a>
    <a href="../../components/index/login.php">Login</a>
  </div>
</div>
    </nav>
    
    </div>
  </section>
    <?php }?>