<?php
      session_start();

      if (isset($_SESSION['user']) && $_SESSION['user'] === "is logged in" ){
        
      }
      else {
        header("Location: auth/login.blade.php");
        exit;
      }

      
      if($_SESSION['type'] == "client"){
            $client_id= $_SESSION['client_id'] ;
      }
      elseif($_SESSION['type'] == "host"){
            $host_id= $_SESSION['host_id'] ;
      }
     $name = $_SESSION['name']  ;
     $email = $_SESSION['email']  ;
     $property_id = $_GET['property_id'];
    

     //Getting property info

     // Connect to the database
     $conn = mysqli_connect("localhost", "root", "", "website-rental");
     // Check connection
     if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
     }

    $sql = "SELECT * FROM properties WHERE property_id = '$property_id'";
    $property_data = $conn->query($sql);


     //Getting property info
    if (mysqli_num_rows($property_data) > 0) {
        $row = mysqli_fetch_assoc($property_data);
        $image_link = $conn->query("SELECT photo FROM properties WHERE property_id = $property_id")->fetch_object()->photo;
        $title = $row["title"] ;
        $price = $row["price"] ;
        $location = $row["location"] ;
        $type = $row["type"] ;
        if( $row["last_minute"] == "0") {
            $last_minute = "no" ;
           }  
         else { 
           $last_minute = "yes" ;
         }
        $rating = $row["rating"] ;
        $description = $row["description"] ;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <style> @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap'); </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="icon" href="../media/pfe logo.png">
    <title><?php echo  $title; ?></title>
</head>
<style>
    body{
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
        background: #212529;
    }
    .top-nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 10px 20px;
  background-color: black;
  box-shadow: 0px 0px 20px #2b2929
}

.top-nav a {
  color: #f33c42;
  text-decoration: none;
  margin-right: 20px;
}

.logout-btn {
  color: red;
}
#image-div{
    margin: 0px auto 20px;
    height: 50vh;
    width: 100%;
    text-align: center;
    background: white;
}
#image-div img{
    height: 90%;
    margin: 10px;
    border: 5px solid #f33c42 ;
    border-radius: 20px;
    box-shadow: 0px 0px 20px #2b2929;
}

#info-buttons{
    background: #212529;
    display: flex;
    width: 50%;
    margin: auto;
    padding: 1% 25%;
    color: white;
}

#info{
    background: transparent;
    width: 50%;
    display: flex;
}



#info h2{
    margin: 0;
    padding: 0;
}
#buttons{
    background: transparent;
    width: 50%;
}

#book-save-rate{
  width: 90% ;
  margin-left: 10%;
  height: 15%;
  display: flex;
  justify-content: space-between;
  
}

.buttons-text{
  margin: 0px auto;
}

.buttons-text p{
  margin: 0;
  padding: 0;
}



#save-to-wishlist{
  height: 40px;
  border: none;
  transition: all 0.2s ease-in-out ;
}
#save-to-wishlist:hover{
  transform: translate(0px,-5px);
}

#save-to-wishlist:active{
  height: 30px;
  margin-bottom: 10px;
  transform: translate(0px,5px);
}

#saved{
  
  height: 40px;
  border: none;
  transition: all 0.2s ease-in-out ;
}

#rate-button{
  height: 40px;
  border: none;
  transition: all 0.2s ease-in-out ;
}

#rate-button:hover{
  transform: translate(0px,-5px);
}

#book{
  height: 40px;
  border: none;
  transition: all 0.2s ease-in-out ;
  
}

#book:hover{
 transform: translate(0px,-5px);
}

#cancelbook{
  height: 40px;
  border: none;
  transition: all 0.2s ease-in-out ;
  
}

#cancelbook:hover{
 transform: translate(0px,-5px);
}


#chat-with-seller{
  height: 40px;
  border: none;
  transition: all 0.2s ease-in-out ;
  
}

#chat-with-seller:hover{
 transform: translate(0px,-5px);
}

#comment{
  height: 40px;
  border: none;
  transition: all 0.2s ease-in-out ;
  
}

#comment:hover{
 transform: translate(0px,-5px);
}




button{
    border: solid 1px #f33c42 ;
    border-radius: 5px;
    background: #f33c42;
    color: white;
    margin: 10px 0px;

}

.form-elements{
    margin-right: 5px;
}



.modal {
    display: none; /* Hide the modal by default */
    position: absolute;
    z-index: 9999; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
   
  }

  .modal-content {
    width: 85%; 
    background-color: #fefefe;
    margin: 3% auto; /* 15% from the top and centered */
    padding: 20px;
    border: 1px solid #888;
    border-radius:  0 0 20px 20px;
    box-shadow: 0px 0px 20px #2b2929;
  }

  .close-button {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
  }

  .close-button:hover,
  .close-button:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
  }

#comments{
  width: 85%;
  border-radius: 2px;
  border: solid 2px #f33c42;
  margin:  20px  auto 50px auto;
  padding: 20px;
  background: white;
}

#comment-text{
  
  border-radius: 10px;
  background: #DADDE1;
  padding: 20px;
}
#comment-form{
    position: absolute;
    left: 20%;
    display: none;
}
#comment-form textarea{
    padding: 10px;
    border: solid 5px #f33c42;
    border-radius: 20px 0px 20px 20px;
    display: block;
}
#comment-form input{
    float: right;
    margin: 5px;
    border: solid 1px #f33c42 ;
    border-radius: 5px;
    background: #f33c42;
    color: white;
}


</style>
<body>
<div class="top-nav">
        <a href="index.php">Home</a>
        <a href="Porperty.blade.php">Properties</a>
        <a href="" class="logout-btn" onclick="return confirm('Are you sure you want to proceed?') ? logout() : false;">Logout</a>
      </div>
    <div id="image-div">
                        <?php
                            echo '
                                    <img src="uploads/'.$image_link.' ">
                            ' ;

                        ?>
    </div>
    <div id="info-buttons">
                <div id="info">
                        
                        
                        <?php
                            echo '
                                    <h2>'. $rating.'</h2>
                                    <img src="../media/star.png" style="height: 25px; margin-top: 4.5px;">
                                    <h2 style=" margin: 0 20px;">'. $title.'</h2>
                            ' ;

                        ?>

                </div>
                <div id="buttons">
                    <?php

            

                        
                            echo '<div id="book-save-rate" >';
                            
                            $id = $_SESSION['client_id'] ;
                            $type = $_SESSION['type'] ;

                                 $booking_query = "SELECT * FROM bookings WHERE client_id = '$id' AND property_id = '$property_id'" ;
                                 $booking_result = mysqli_query($conn, $booking_query) ;

                                 if(mysqli_num_rows($booking_result) == 0 && $type == "client"){
                                
                                
                                
                            echo '
                                     <div class="buttons-text">
                                         <img class="book-now-button" id="book" onclick="display()" src="../media/book.png"></ing>
                                         <p>Book</p>
                                     </div>
                                
                                
                                     <div id="booking-form-modal" class="modal">
                                     <div class="modal-content">
                                       <span class="close-button" onclick="hide()" >&times;</span>
                                       <form method="POST" action="../php/booking.php" >
                                         <label style="color: #f33c42" >'. $row["title"].'</label>
                                         <label>/Price Offered: <input type="text" id="offer" name="offer"></label>
                                         <label>Start Date: <input type="date" id="start_date" name="start_date" onchange="validateDates()" ></label>
                                         <label>End Date: <input type="date" id="end_date" name="end_date" onchange="validateDates()" ></label>
                                         <input type="hidden" id="property_id" name="property_id" value="'.$property_id.'">
                                         <input type="hidden" id="client_id" name="client_id" value="'.$id.'">
                                         <input type="submit" style="color: white; padding: 5px; background: #f33c42; border: none; border-radius: 5px;" value="Submit">
                                       </form>
                                     </div>
                                   </div>
                                
                                 ';
                                
                                 }
                                 elseif( $type == "client" ) {
                                       echo ' 
                                           <div class="buttons-text">

                                           <img id="cancelbook" onclick="sendData(\'cancelForm\',\'../php/booking.php\')" src="../media/cancelbook.png">
                                           <p>Cancel</p>

                                               <form method="post" id="cancelForm" action="../php/booking.php" style="display: hidden">
                                               <input type="hidden" id="property_id" name="property_id" value="'.$property_id.'">
                                               <input type="hidden" id="client_id" name="client_id" value="'.$id.'">
                                               </form>


                                           </div>
                                    ';
                                
                                 }
                             
                                 if( $type == "client" ){
                                    //  Rate button
                                
                                     $rate_query = "SELECT * FROM rating WHERE client_id = $id AND property_id = $property_id" ;
                                     $rate_result = mysqli_query($conn, $rate_query) ;


                                     if( mysqli_num_rows($rate_result) == 0 ){
                                           echo '
                                                   <div class="buttons-text">
                                                     <img id="rate-button" class="ratebutton" src="../media/rate.png" onclick="rate()" ></img>
                                                     <p>Rate</p>
                                                   </div>
                                                   <form id="rate-form" method="POST" action="../php/submitrating.php?property=1" style="display:none; color: white;" >
                                                     <label for="property-rating">Property Rating:</label>
                                                     <input type="number" id="property_rating" name="property_rating" min="0" max="5">
                                                     <input type="hidden" id="property_id" name="property_id" value="'.$property_id.'">
                                                     <input type="submit" id="submitrating" value="Submit Rating"  style = "color: white; background: #f33c42; padding: 5px; border: none; border-radius: 5px; margin-top: 5px;">
                                                   </form>
                                    
                                           ';
                                     }
                                 
                                 }

                             
                             
                             //wishlist verification
                             //Save 
                             $sql = "SELECT client_id FROM wishlist WHERE client_id = $id AND property_id = $property_id";
                             $result2 =mysqli_query($conn, $sql) ;
                             if($result2->num_rows > 0 && $type == "client"){
                                     echo '
                                             <div class="buttons-text">
                                               <img id="save-to-wishlist" data-property_id="'.$property_id.'" src="../media/saved.png" id="saved" >
                                               <p>Saved<p>
                                             </div>
                            
                                         ';

                                  }
                              elseif( $type == "client" ) {

                                   echo '
                                         <div class="buttons-text">
                                             <img id="save-to-wishlist"  data-property_id="'.$property_id.'" src="../media/save.png" >
                                             <p>Save<p>
                                         </div>
                                      '; 

                              }
                          
                            //message seller icon
                            if( $type == "client" ) {
                               echo '

                                   <a class="buttons-text" href="Chat.blade.php?property_id='.$property_id.'" style="text-decoration: none; color: white;">
                                       <img id="chat-with-seller" href="Chat.blade.php?property_id='.$property_id.'" data-property_id="'.$property_id.'" src="../media/chat.png" >
                                       <p>Chat<p>   
                                   </a>
                          
                          
                               ';
                            }

                            if( $type == "client" ) {
                                echo '
 
                                <div class="buttons-text" >
                                        <img id="comment"  src="../media/comment.png" onclick="opencomment()">
                                        <p>Comment<p>
                                </div>
                           
                           
                                ';
                             }
                              //end of book-save-rate
                              echo ' </div> ';


           
                    ?>
                </div>
       </div>
       <?php

        echo '
        
             <form method="POST" action="../php/comment.php" id="comment-form">
                 <textarea name="comment_text" id="comment_text" cols="100" rows="10" placeholder="Write a comment"></textarea>
                 <input type="submit" value="confrim">
                 <input type="hidden" id="property_id" name="property_id" value="'.$property_id.'">
                 <input type="hidden" id="name" name="name" value="'.$name.'">
                 <input type="hidden" id="email" name="email" value="'.$email.'">
                 <span class="close-button" onclick="closecomment()" >&times;</span>

             </form>

        ';
 

        ?>
   
    <div id="comments" >
            <h1>Comments: </h1>
            <?php

                // Select data from comments table
                $sql = "SELECT comment_id, property_id, name, email, comment_text FROM comments WHERE property_id = '$property_id'";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    // Output data for each row
                    while($row = mysqli_fetch_assoc($result)) {
                        echo '
                            <div id="comment-text" >
                                 <h3>' . $row["name"]. ' * '. $row["email"].'</h3>
                                 <p>'. $row["comment_text"].' </p>
                            </div>
                    
                         ';
                    }
                } else {
                    echo "No comments yet, be the fist to share something";
                }
                    


            ?>
            
    </div>
</body>

<script>

function validateDates() {
  const startDate = new Date(document.getElementById("start_date").value);
  const endDate = new Date(document.getElementById("end_date").value);
  const today = new Date();

  if (startDate < today) {
    alert("Start date should not be smaller than today");
    document.getElementById("start_date").value = today.toISOString().substring(0, 10);
  }
  if (startDate > endDate) {
    alert("Start date should be smaller than or equal to end date");
    document.getElementById("end_date").value = startDate.toISOString().substring(0, 10);
  }
}

var nodes = document.querySelectorAll('.node');
for (var i = 0; i < nodes.length; i++) {
    nodes[i].style.animation = "showup 1s forwards";
    nodes[i].style.animationDelay = i/3 + "s";
}



    function logout(){
        // Call the PHP function here
        // For example, using an XMLHttpRequest:
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "../php/functions.php", true);
        xhttp.send();
    }

    

    $(document).on('click', '#save-to-wishlist', function(e) {
    e.preventDefault();

    var property_id = $(this).data('property_id');
    var client_id = <?php echo json_encode($_SESSION['client_id']); ?>;
    $.ajax({
        type: 'POST',
        url: '../php/wishlist.php',
        data: {property_id: property_id, client_id: client_id},
        success: function(response) {
            console.log(response);
            location.reload(true);
        }
    });
});





        //Rate
        function rate(){
          if(document.getElementById("rate-form").style.display == "block"){
            document.getElementById("rate-form").style.display = "none" ;
          }
          else {
            document.getElementById("rate-form").style.display = "block";
          }
    
        
        
};





// Get the modal
var modal = document.getElementById("booking-form-modal");

// Get the button that opens the modal
var btn = document.querySelector("button");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close-button");

// When the user clicks the button, open the modal
 function display() {

  modal = document.getElementById("booking-form-modal");
  modal.style.display = "block";
    return;
  if( document.getElementById("booking-form-modal").display != "hidden" ){
    console.log("Yeah!") ;
    hide();
  }
  

  


  
}

// When the user clicks on <span> (x), close the modal
function hide() {
  modal = document.getElementById("booking-form-modal");
  modal.style.display = "none";
}




  function sendData(formId, url) {
    console.log(formId) ;
    const form = document.getElementById(formId);
    const XHR = new XMLHttpRequest();
    
    // Bind the FormData object and the form element
    const FD = new FormData(form);

    

    // Define what happens in case of error
    XHR.addEventListener("error", (event) => {
      alert('Oops! Something went wrong.');
    });

    // Set up our request
    XHR.open("POST", url);

    // The data sent is what the user provided in the form
    XHR.send(FD);
    location.reload(true);
  }

  function chat(){

  }

  function opencomment(){

     document.getElementById("comment-form").style.display = "block" ;
  }
  function closecomment(){
    document.getElementById("comment-form").style.display = "none" ;
  }

    </script>
</html>