<?php

$name = $number = $email = $password = ''; 
$error_name = $error_username = $error_email = $error_password = $error_password2 = '';
$valid_name = $valid_username = $valid_email = $valid_password = false;

$conn =  mysqli_connect("localhost", "root", "", "hotelbooking", 3306);


  if(isset($_POST['submit'])){
    if (empty($_POST['username'])){ 
      $error_username = "This field should not be left empty!";
      
    } else{
      //htmlspecialchars is used for preventing xss attacks by converting special characters to HTML entities
      //mysqli_real_escape_string is used for preventing SQL injection
      $username = 
        htmlspecialchars(mysqli_real_escape_string($conn, $_POST['username']));//prevent xss attack
      $q = "SELECT * FROM account WHERE username = '$username'";
      $result = mysqli_query($conn, $q);
      
  
        if(mysqli_num_rows($result)>0){
          $error_username = "This username is already registered!";
        }
        else{
          $valid_username = true;
        } 
      } 

    if (empty($_POST['email'])){ 
      $error_email = "This field should not be left empty!";
      
    } else{
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
    if (empty($_POST['password'])){ 
      $error_password = "This field should not be left empty!";
    
  } else{
    //md5 
    $password = htmlspecialchars($_POST['password']);
    // Validate password strength
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[*,!,/,.,]@', $password);


    if($_POST['password'] != $_POST['password2']) {
      $error_password2 = $error_password = 'Passwords do not match';
    }
    else if(!$uppercase || !$lowercase || !$number || !strlen($password) > 8 || !$specialChars) {
      $error_password =  'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
    } else {
      $valid_password = true;
      $password = md5(htmlspecialchars($_POST['password']));
    }

    if($valid_username && $valid_email && $valid_password){
      $sql = "INSERT INTO account (username,email,password) VALUES ('$username','$email','$password')";
      if (mysqli_query($conn,$sql)){
        $successMessage2 = 'You Have Successfuly Signed Up, Thank You!';
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
  <link rel="stylesheet" href="../index/index.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="rooms.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="../cities/citiess.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
  crossorigin="anonymous" referrerpolicy="no-referrer" />

  </head>

<body>
    <?php include "../templates/navbar.php" ?>
    <section class="signupS">
        <div class="title"><h2>Sign Up</h2></div>
        <div class= "page">
        <form action="<?php $location = $_SERVER['PATH_INFO']; echo ''.$location.'#successMessage2';?>" method="post" id="visitorForm" class="signup">
            <input type="text" name="username" value="" placeholder="Username..." class="inputArea">
            <div class = "danger"> <p><?php echo $error_username?></p></div>

            <input type="email" name="email" value="" placeholder="E-mail" class="inputArea">
            <div class = "danger"> <p><?php echo $error_email?></p></div>
            <input type="password" name="password" value="" placeholder="Password" class="inputArea">
            <div class = "danger"> <p><?php echo $error_password?></p></div>
            <input type="password" name="password2" value="" placeholder="Repeat Your Password" class="inputArea">
            <div class = "danger"> <p><?php echo $error_password2;?></p></div>
            <div class="btn">
                <button type="submit" name="submit" value="Submit" class="submitButton">Sign Up Now! </button>
            </div>
        </form>
    </div>
    <div class="success" id="successMessage2"><?php echo $successMessage2 ?></div>
  </section>   
    <?php include '../templates/footer.php'?>
    <script src="../rooms/rooms.js"></script>
  </body>
</html>