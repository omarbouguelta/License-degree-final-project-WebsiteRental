
<?php
      session_start();

      if (isset($_SESSION['user']) && $_SESSION['user'] === "is logged in" ){
        header("Location: ../Myaccount.blade.php");
        exit;
      }

      require_once '../../../vendor/autoload.php';



      // init configuration
      $clientID = '1074084558413-cu90j25ah3b5c3pt321kcs8ljd829hc4.apps.googleusercontent.com';
      $clientSecret = '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';
      $redirectUri = "http://localhost/project/resources/php/googleadd.php";


      // create Client Request to access Google API
      $google_client = new Google_Client();
      $google_client->setClientId($clientID);
      $google_client->setClientSecret($clientSecret);
      $google_client->setRedirectUri($redirectUri);
      $google_client->addScope("email");
      $google_client->addScope("profile");


?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <link rel="icon" href="../../media/pfe logo.png">
  <title>Holiday Hub Login </title>
  

</head>
<body>
<!-- partial:index.partial.html -->
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Design by foolishdeveloper.com -->
    <title>Glassmorphism login Form Tutorial in html css</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.css">
    <style media="screen">
    

    </style>

    <script>
      
     
      function validateForm() {
  var email = document.getElementById("email").value;
  
  var password = document.getElementById("Password").value;
  

  // Check if email is not empty and is a valid email format
  if (!email || !/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
    alert("Please enter a valid email");
    return false;
  }

  

  // Check if password is not empty, has at least 8 characters, starts with a capital letter,
  // has at least 1 number, and contains at least 1 symbol
  if (!password || !/^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+])[A-Za-z\d!@#$%^&*()_+]{8,}$/.test(password)) {
    alert("Please enter a valid password that has at least 8 characters, starts with a capital letter, has at least 1 number, and contains at least 1 symbol");
    return false;
  }

  

  return true;
}
    </script>

</head>
<body>

<a href="../index.php" style="position: absolute; top: 5%; left: 5%; padding: 5px; border: solid 2px #f33c42; border-radius: 5px;"><img src="../../media/pfe logo.png" class="logo"></a>


    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    

    <form onsubmit="return validateForm()"  method="POST" action="../../php/login.php">
        <h3>Login Here</h3>

        <label for="email">Email:</label>
        <?php
            

            if (isset($_SESSION['message']) ){
              echo '<p  style=" color: red ;font-size: 15px;">Email does not exists!</p>';
          }
          unset($_SESSION['message']);
            
        ?>
        <input type="email" id="email" name="email" placeholder="Enter your email">
        <br>
        <label for="password">Password:</label>
        <?php
            
            if (isset($_SESSION['password'])){
              echo '<p  style=" color: red ;font-size: 15px;">Password is wrong!</p>';
          }
          unset($_SESSION['password']);
        ?>
        <input type="password" id="Password" name="Password" placeholder="Enter your password">
        <br>
        <button >Log In</button>
        <a href="register.blade.php" style="margin-left: 80px;">New here? Sign-up</a>
        <div class="social">
           
           <a style="margin: 0px auto;" href="../../php/google-signup.php" class="go"><i class="fab fa-google"></i>  Google</a>
        </div>
    </form>
    
</body>

</html>
<!-- partial -->
  

