<?php



$name = $number = $email = $password = $user_type = ''; 
$error_name = $error_username = $error_email = $error_password = $error_password2 = '';
$valid_name = $valid_username = $valid_email = $valid_password = false;

$conn =  mysqli_connect("localhost", "root", "", "hotelbooking", 3306);

session_start();

if(isset($_SESSION['admin_name']) || isset($_SESSION['user_name'])) {
 header('location:../../index.php');
}

  if(isset($_POST['submit'])){
    if (empty($_POST['email'])){ 
      $error_email = "This field should not be left empty!";
      
    } else{
      $email = htmlspecialchars($_POST['email']); //prevent xss attack
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error_email = "INVALID EMAIL!";
      }
      else {
        $valid_email = true;
      }
  }
    if (empty($_POST['password'])){ 
      $error_password = "This field should not be left empty!";
    
  } else{
    //md5 
    $password = md5(htmlspecialchars($_POST['password']));
    $valid_password = true;

    if($valid_email && $valid_password){
      $sql = "SELECT * FROM account WHERE email = '$email' && password = '$password'";

      $result = mysqli_query($conn,$sql);
      if (mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        if($row['user_type'] == 'admin'){
          $_SESSION['admin_name'] = $row['username'];
          header('location:dashboard.php');
        } elseif ($row['user_type'] == 'user'){
          $_SESSION['user_name'] = $row['username'];
          header('location:../../index.php');
        }
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
    <title>Sign Up | YYA Hotels</title>
  <link rel="stylesheet" href="index.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="rooms.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="../cities/citiess.css?v=<?php echo time(); ?>">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
  crossorigin="anonymous" referrerpolicy="no-referrer" />


  </head>

<body>
    <?php include "../templates/navbar.php" ?>
    <section class="signupS">
        <div class="title"><h2>Login</h2></div>
        <div class= "page">
        <form action="" method="post" id="visitorForm" class="signup">
            <input type="email" name="email" value="" placeholder="E-mail" class="inputArea">
            <div class = "danger"> <p><?php echo $error_email?></p></div>
            <input type="password" name="password" value="" placeholder="Password" class="inputArea">
            <div class = "danger"> <p><?php echo $error_password?></p></div>
            <div class="btn">
                <button type="submit" name="submit" value="Submit" class="submitButton">Login</button>
            </div>
        </form>
    </div>
    </section>   
    <?php include '../templates/footer.php'?>
    <script src="../rooms/rooms.js"></script>

  </body>
</html>