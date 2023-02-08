
<?php
      session_start();

      if (isset($_SESSION['user']) && $_SESSION['user'] === "is logged in" ){
        header("Location: ../Myaccount.blade.php");
        exit;
      }
      

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Design by foolishdeveloper.com -->
  <link rel="icon" href="../../media/pfe logo.png">
    <title>Holiday Hub Sign Up</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.css">
    <!--Stylesheet-->
    <style media="screen">
    

    </style>

<script>





function validateForm() {
    var email = document.getElementById("email").value;
    var name = document.getElementById("name").value;
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirm-password").value;
    var type = document.getElementsByName("type");

    // Check if the type is selected
    var selectedType;
    for (var i = 0; i < type.length; i++) {
        if (type[i].checked) {
            selectedType = type[i].value;
            break;
        }
    }
    if (!selectedType) {
        alert("Please select a type");
        return false;
    }
    // Check if email is not empty and is a valid email format
    if (!email || !/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
        alert("Please enter a valid email");
        return false;
    }

    // Check if name is not empty and contains only letters
    if (!name || !/^[a-zA-Z\s]+$/.test(name)) {
                    alert("Please enter a valid name");
                    return false;
                }

    // Check if password is not empty, has at least 8 characters, starts with a capital letter,
    // has at least 1 number, and contains at least 1 symbol
    if (!password || !/^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+])[A-Za-z\d!@#$%^&*()_+]{8,}$/.test(password)) {
              alert("Please enter a valid password that has at least 8 characters, starts with a capital letter, has at least 1 number, and contains at least 1 symbol");
                    return false;
                }

   // Check if confirm password is not empty and matches password
    if (!confirmPassword || confirmPassword !== password) {
                    alert("Password does not match");
                    return false;
                }

    
}


</script>


</head>
<body>

    <a href="../" style="position: absolute; top: 5%; left: 5%; padding: 5px; border: solid 2px #f33c42; border-radius: 5px;"><img src="../../media/pfe logo.png" class="logo"></a>

    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form onsubmit="return validateForm()"  method="POST" action="../../php/signup.php">
        <h3>Sign Up Here</h3>
        
        <div style="height: 10px; width:200px; display: flex; float: right ; margin-top: 25px;" >
              <input type="radio" id="clients"  name="type" value="clients" style="height: 15px; ">
             <label for="clients" style="display: flex; margin: 1px;" >Client</label><br>
            <input type="radio" id="host"  name="type" value="hosts" style="height: 15px; ">
            <label for="hosts"  style="display: flex; margin: 1px;">Host</label><br>
        </div>

        <label style="display: inline-block;"  for="email">Email</label>
        <?php

            

            if (isset($_SESSION['message'])){
                echo '<p  style=" color: red ;font-size: 15px;">email already exists</p>';
            }
            unset($_SESSION['message']);
        ?>
         <input type="email" id="email" name="email" placeholder="Enter your email">

        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Enter your name">


        <label for="password">Password</label>
        <input type="password" placeholder="Password" id="password"  name="password">

        <label for="confirm-password">Confirm Password</label>
        <input type="password" id="confirm-password"  name="confirm-password" placeholder="Confirm your password">

        
        <button type="submit" >Sign-up</button>
        <a href="login.blade.php" style="margin-left: 60px;">Already have an account?</a>


        <div class="social">
           <div class="go"><i class="fab fa-google"></i>  Google</div>
            <div class="fb"><i class="fab fa-facebook"></i>  Facebook</div> 
        </div>
        
        
    </form>

    
</body>
</html>
