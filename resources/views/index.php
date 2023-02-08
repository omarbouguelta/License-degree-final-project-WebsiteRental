<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <style> @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap'); </style>
    <link rel="stylesheet" href="chatbot/style.css" />
    <script src="chatbot/response.js" defer ></script>
    <script type="module" src="chatbot/app.js" defer></script>
    <link rel="icon" href="../media/pfe logo.png">
    <title>Holiday hub</title>
    <style>
    
    *{
      margin : 0px;
      padding : 0px;
      box-sizing: border-box ;
    }

    body{
      font-family: 'Poppins', sans-serif;
      height: 100vh;
      overflow: hidden;
    }



    .sticky {
   
    top: 0;
    left: 0;
    right: 0;
    z-index: 1;
}


    .navbar{
      
      width: 100%;
      
      background-color: black;
      top: 0px;
      left : 0px;
    }

    .logo {
      
      margin: 30px;
    }


    .right{
      float : right ;
      margin: 30px ;
      text-decoration : none ;
      color: white ;
      font-size: 25px ;
    }
    .right:hover, .right:active {
    text-decoration: underline;
    color: #FF5A5F;
    }


    
    
    .background-image {
      left: 0px;
      width : 100%;
      height : 100px ;
      

    }

    .bg-img{
      width : 100%;
      position : fixed;
    }
    

    .image-elements{
      position: absolute;
      margin : 120px  200px;
      text-align : center ;
      color : white ;
    }

    .image-elements h1{
      font-size : 70px;
      margin: 0px;
    }


    .welcome-buttons{
      margin-top: 40px ;
    }

    .welcome-buttons button{
      border: none ;
      border-radius: 5px ;
      padding: 10px ;
      width: 400px ;
      height: 50px;
      font-size: 20px ;
      margin-right: 10px;
      transition: all 0.2s ease-in-out;
    }
    

    .welcome-buttons button:hover {
      width: 410px;
      height: 55px;
    }
    </style>

    <script>
        const navbar = document.querySelector('.navbar');

window.addEventListener('scroll', () => {
  if (window.pageYOffset > 0) {
    navbar.classList.add('sticky');
  } else {
    navbar.classList.remove('sticky');
  }
});

    </script>
</head>
<body>
  
<div class="navbar">
  <img src="../media/pfe logo.png" class="logo">
  <a href="#" class="right">Contact Us</a>
  <a href="#" class="right">About Us</a>
  <a href="Myaccount.blade.php" class="right">My Account</a>
</div>



<div class="background-image">
      
      <img src="home-background.jpg" class="bg-img">
      <div class="image-elements">
      <h1 style="text-shadow:  2px 2px 8px black;" >Find your desired place with us</h1>
      <h2 style="text-shadow:  2px 2px 8px black;">Get your vacation ready in no time</h2>
      
      
      <div class="welcome-buttons">
        <a href="tutorial.html"><button style="background: #f33c42 ; color: white;">TUTORIAL</button></a>
        <a href="auth/register.blade.php"><button style="background: white ; color: black;">SIGNUP</button></a>
      </div>


      <div class="container collapse">
        <div class="chat-header">
         <div class="logo">
          <img src="chatbot/images/chatbotlogo.png" alt="chatbot" />
        </div>
        <div class="title">Let's Chat</div>
      </div>
      <div class="chat-body">
        <div class="loading hide">
          <div class="circle circle-1"></div>
          <div class="circle circle-2"></div>
          <div class="circle circle-3"></div>
        </div>
      </div>
      <div class="chat-input">
        <div class="input-sec">
          <input type="text" id="txtInput" placeholder="Type here" autofocus />
        </div>
        <div class="send">
          <img src="chatbot/images/send.png" alt="send" />
        </div>
      </div>
    </div>
      </div>
      


    </div>


 


</body>
</html>
