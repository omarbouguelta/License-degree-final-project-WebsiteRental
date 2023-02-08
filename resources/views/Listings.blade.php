<?php
      session_start();

      if (isset($_SESSION['user']) && $_SESSION['user'] === "is logged in" ){
        
      }
      else {
        header("Location: auth/login.blade.php");
        exit;
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
    <title>Properties</title>
</head>
<style>
  
  body {
    height: 100vh;
  margin: 0;
  font-family: 'Poppins', sans-serif;
  
  background-repeat: no-repeat;
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
}

.logout-btn {
  color: red;
}



.property-block{
  margin: 10px;
  font-size: 20px;
  overflow: hidden;
  text-overflow: ellipsis;
  color: white;
}
.property-block p{
  height: 50px;
  display: inline;
  margin-right: 5px;
  color: #f33c42;
  
}


.listings {
    display: flex;
    flex-wrap: wrap;
    width: 100%;
    text-align: center;
    
}
.listings img{
    height: 150px;
    box-shadow: 0px 0px 5px #2b2929;
    margin-top: 20px;
    border: solid 5px #f33c42 ;
    border-radius: 5px;
}

.node{
    width: 30% ;
    border: solid 5px white ;
    border-radius: 20px;
    margin: 10px;
    background: #212529;
    box-shadow: 0px 0px 20px #2b2929;
    opacity: 0;
}

@keyframes showup{
  0%{
    opacity: 0;
  }
  100%{
    opacity: 1;
  }
}


#property-filter{
    width: 85%;
    display: flex;
    margin: 20px auto ;
    padding: 10px;
    background: white;
}

#property-filter input{
    border: none ;
    border-bottom: solid 1px #f33c42 ;
}
#property-filter input:valid{
    border: none ;
    border-bottom: solid 1px #f33c42 ;
}


#property-filter input[type=submit]{
    border: solid 1px #f33c42 ;
    border-radius: 5px;
    background: #f33c42;
    color: white;
}

#property-filter button{
    border: solid 1px #f33c42 ;
    border-radius: 5px;
}

#book-save-rate{
  width: 90% ;
  margin: 0px auto;
  height: 15%;
  display: flex;
  
}

.buttons-text{
  color: white;
  margin: 0px auto;
}

.buttons-text p{
  margin: 0px ;
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

#share{
  height: 40px;
  border: none;
  transition: all 0.2s ease-in-out ;
  
}

#share:hover{
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



</style>



<body>
      <div class="top-nav">
        <a href="index.php">Home</a>
        <a href="Listings.blade.php">Available Properties</a>
        <div>
          <a href="Myaccount.blade.php" style="margin-right: 20px;" >My Account</a>
          <a href="" class="logout-btn" onclick="return confirm('Are you sure you want to proceed?') ? logout() : false;">Logout</a>
        </div>
        
      </div>

      <form id="property-filter"  method="POST" action="../php/filter.php">
            <div class="form-elements">
                    <label>Price Range:</label>
                    <label>Smaller than:</label>
                    <input  name="priceSmaller" id="priceSmaller">
                    <label>Bigger than:</label>
                    <input  name="priceBigger" id="priceBigger">
            </div>
  
            <div class="form-elements" >
                <label>Location:</label>
                <select name="location" id="location">
                <option value="">All</option>
                    <option value="Adrar">01-Adrar</option>
                    <option value="Chlef">02-Chlef</option>
                    <option value="Laghouat">03-Laghouat</option>
                    <option value="Oum El Bouaghi">04-Oum El Bouaghi</option>
                    <option value="Batna">05-Batna</option>
                    <option value="Béjaïa">06-Béjaïa</option>
                    <option value="Biskra">07-Biskra</option>
                    <option value="Béchar">08-Béchar</option>
                    <option value="Blida">09-Blida</option>
                    <option value="Bouira">10-Bouira</option>
                    <option value="Tamanrasset">11-Tamanrasset</option>
                    <option value="Tébessa">12-Tébessa</option>
                    <option value="Tlemcen">13-Tlemcen</option>
                    <option value="Tiaret">14-Tiaret</option>
                    <option value="Tizi Ouzou">15-Tizi Ouzou</option>
                    <option value="Alger">16-Alger</option>
                    <option value="Djelfa">17-Djelfa</option>
                    <option value="Jijel">18-Jijel</option>
                    <option value="Sétif">19-Sétif</option>
                    <option value="Saida">20-Saida</option>
                    <option value="Skikda">21-Skikda</option>
                    <option value="Sidi Bel Abbès">22-Sidi Bel Abbès</option>
                    <option value="Annaba">23-Annaba</option>
                    <option value="Guelma">24-Guelma</option>
                    <option value="Constantine">25-Constantine</option>
                    <option value="Médéa">26-Médéa</option>
                    <option value="Mostaganem">27-Mostaganem</option>
                    <option value="M'Sila">28-M'Sila</option>
                    <option value="Mascara">29-Mascara</option>
                    <option value="Ouargla">30-Ouargla</option>
                    <option value="Oran">31-Oran</option>
                    <option value="El Bayadh">32-El Bayadh</option>
                    <option value="Illizi">33-Illizi</option>
                    <option value="Bordj Bou Arréridj">34-Bordj Bou Arréridj</option>
                    <option value="Boumerdès">35-Boumerdès</option>
                    <option value="El Tarf">36-El Tarf</option>
                    <option value="Tindouf">37-Tindouf</option>
                    <option value="Tissemsilt">38-Tissemsilt</option>
                    <option value="El Oued">39-El Oued</option>
                    <option value="Khenchela">40-Khenchela</option>
                    <option value="Souk Ahras">41-Souk Ahras</option>
                    <option value="Tipaza">42-Tipaza</option>
                    <option value="Mila">43-Mila</option>
                    <option value="Aïn Defla">44-Aïn Defla</option>
                    <option value="Naâma">45-Naâma</option>
                    <option value="Aïn Témouchent">46-Aïn Témouchent</option>
                    <option value="Ghardaïa">47-Ghardaïa</option>
                    <option value="Relizane">48-Relizane</option>
                    
              </select>
            </div>
  
                <div class="form-elements" >
                    <label>Type:</label>
                    <select name="type" id="type">
                      <option value="">All</option>
                      <option value="home">home</option>
                      <option value="appartement">appartement</option>
                      <option value="shared room">shared room</option>
                      <option value="private room">private room</option>
                    </select> 
                </div>
 
                <div class="form-elements" >
                    <label>Last Minute:</label>
                    <select name="last_minute" id="last_minute">
                      <option value="">All</option>
                      <option value="yes">yes</option>
                      <option value="no">no</option>
                    </select> 
                </div>
  
  
  <input type="submit" value="Filter" onClick="filterProperties()" >
</form>
        <div class="listings">
            <?php
            
            

        
            // Connect to the database
            $conn = mysqli_connect("localhost", "root", "", "website-rental");
            // Check connection
            if (!$conn) {
               die("Connection failed: " . mysqli_connect_error());
            }

             


            // Query to select data from the database
            $sql ="SELECT *
            FROM properties 
            WHERE property_id NOT IN
            (SELECT property_id FROM bookings WHERE status = 'accepted' )
            ";



            if( isset($_SESSION['filter']) && $_SESSION['filter'] == "true"  ){
                $sql =  $_SESSION['filterdata'] ;
               }
              
            
            $result = $conn->query($sql);
            // Check if query is successful
            if (mysqli_num_rows($result) > 0) {


               // Fetch and output data
               $i = 0 ;
               while($row = mysqli_fetch_assoc($result)) {
                   $i = $i + 1;
                   $property_id = $row["property_id"] ;
                   $image_link = $conn->query("SELECT photo FROM properties WHERE property_id = $property_id")->fetch_object()->photo;
                   
                   if( $row["last_minute"] == "0") {
                      $last_minute = "no" ;
                     }  
                   else { 
                     $last_minute = "yes" ;
                   }



                   





                   echo '
             
                <div class="node">
                <a href="Property.blade.php?property_id='.$property_id.'" style="text-decoration: none;"> <img src="uploads/'.$image_link.'" > 
                   <div class="property-block">
                         
                         <p>Title:</p>'. $row["title"]. 
                         ' / '.
                         '<p>Price:</p> ' . $row["price"]. ' DA' .
                         '<br>'.
                         '<p>Location:</p>' . $row["location"].
                         ' / '.
                         '<p>Type:</p>' . $row["type"].
                         '<br>'.
                         '<p>Last Minute:</p>' . $last_minute .
                         ' / '.
                         '<p>Rating:</p>' . $row["rating"]. '/5'.
                         '<br>'.
                         '<p>Description:</p>' . $row["description"].
                   '</div>
                   </a>
                   ';
                  
                   echo '<div id="book-save-rate" >';
                  
                   $id = $_SESSION['client_id'] ;
                   $type = $_SESSION['type'] ;
                    
                        $booking_query = "SELECT * FROM bookings WHERE client_id = '$id' AND property_id = '$property_id'" ;
                        $booking_result = mysqli_query($conn, $booking_query) ;

                        if(mysqli_num_rows($booking_result) == 0 && $type == "client"){
                  
                        
                         
                   echo '
                            <div class="buttons-text">
                                <img class="book-now-button" id="book" onclick="display('.$i.')" src="../media/book.png"></ing>
                                <p>Book</p>
                            </div>


                            <div id="booking-form-modal'.$i.'" class="modal">
                            <div class="modal-content">
                              <span class="close-button" onclick="hide('.$i.')" >&times;</span>
                              <form method="POST" action="../php/booking.php" >
                                <label style="color: #f33c42" >'. $row["title"].'</label>
                                <label>/Price Offered: <input type="text" id="offer" name="offer"></label>
                                <label>Start Date: <input type="date" id="start_date'.$i.'" name="start_date" onchange="validateDates()" ></label>
                                <label>End Date: <input type="date" id="end_date'.$i.'" name="end_date" onchange="validateDates()" ></label>
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
                                  
                                  <img id="cancelbook" onclick="sendData(\'cancelForm'.$i.'\',\'../php/booking.php\')" src="../media/cancelbook.png">
                                  <p>Cancel</p>
                                
                                      <form method="post" id="cancelForm'.$i.'" action="../php/booking.php" style="display: hidden">
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
                                            <img id="rate-button" class="ratebutton" src="../media/rate.png" onclick="rate('.$i.')" ></img>
                                            <p>Rate</p>
                                          </div>
                                          <form id="rate-form'.$i.'" method="POST" action="../php/submitrating.php" style="display:none; color: white;" >
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
                    if( $type == "client" ){
                      echo '
                            
                          <a class="buttons-text" href="Chat.blade.php?property_id='.$property_id.'" style="text-decoration: none;">
                              <img id="chat-with-seller" href="Chat.blade.php?property_id='.$property_id.'" data-property_id="'.$property_id.'" src="../media/chat.png" >
                              <p>Chat<p>   
                          </a>
                    
  
                      ';
                    }
                    

                    if( $type == "client" ){
                      echo '
                            
                          <div id="share-to-friends'.$i.'" class="buttons-text">
                            <img id="share" src="../media/share.png" onclick="showPopUp('.$i.')">
                            <p>Share</p>
                          </div>

                          <div id="popup'.$i.'" style="display:none; background: white; padding: 10px; border: solid 5px black; border-radius: 10px;">
                            <p>Property.blade.php?property_id='.$property_id.'</p>
                            <button onclick="copyToClipboard(\'http://localhost/project/resources/views/Property.blade.php?property_id='.$property_id.'\')">Copy Link</button>
                            <button onclick="closePopUp('.$i.')">Close</button>
                          </div>
                    
  
                      ';
                    }

                     //end of book-save-rate
                     echo ' </div> ';
                //end of node div
              echo '
                </div> 
                   ';
               
                  
                  }
                    
                } else {
                   echo '<p style="margin: auto;"> No properties at the moment grab a coffe and comeback later </p>';
                }
            
                
                ?>
        </div>
                  

        


</body>

    <script>

function validateDates(i) {
  const startDate = new Date(document.getElementById("start_date"+i).value);
  const endDate = new Date(document.getElementById("end_date"+i).value);
  const today = new Date();

  if (startDate < today) {
    alert("Start date should not be smaller than today");
    document.getElementById("start_date"+i).value = today.toISOString().substring(0, 10);
  }
  if (startDate > endDate) {
    alert("Start date should be smaller than or equal to end date");
    document.getElementById("end_date"+i).value = startDate.toISOString().substring(0, 10);
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

    function filterProperties() {
    // Get the form data
    var priceSmaller = document.getElementById("price-smaller").value;
    var priceBigger = document.getElementById("priceBigger").value;
    var location = document.getElementById("location").value;
    var type = document.getElementById("type").value;
    var lastMinute = document.getElementById("last-minute").checked;

    // Send the form data to the server via an AJAX request
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/filter-property.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Get the filtered properties from the server's response
            var filteredProperties = JSON.parse(xhr.responseText);

            // Update the properties displayed on the page
            var listings = document.getElementsByClassName("listings")[0];
            listings.innerHTML = "";
            for (var i = 0; i < filteredProperties.length; i++) {
                var property =  filteredProperties[i];
                var propertyBlock = document.createElement("div");
              propertyBlock.classList.add("property-block");    
              var title = document.createElement("p");
            title.innerHTML = "Title: " + property.title;
            propertyBlock.appendChild(title);

            var price = document.createElement("p");
            price.innerHTML = "Price: " + property.price;
            propertyBlock.appendChild(price);

            var location = document.createElement("p");
            location.innerHTML = "Location: " + property.location;
            propertyBlock.appendChild(location);

            var type = document.createElement("p");
            type.innerHTML = "Type: " + property.type;
            propertyBlock.appendChild(type);

            var lastMinute = document.createElement("p");
            lastMinute.innerHTML = "Last Minute: " + (property.last_minute ? "Yes" : "No");
            propertyBlock.appendChild(lastMinute);

            var rating = document.createElement("p");
            rating.innerHTML = "Rating: " + property.rating + "/5";
            propertyBlock.appendChild(rating);

            var description = document.createElement("p");
            description.innerHTML = "Description: " + property.description;
            propertyBlock.appendChild(description);

            listings.appendChild(propertyBlock);
        }
    }
};
xhr.send("priceSmaller=" + priceSmaller + "&priceBigger=" + priceBigger + "&location=" + location + "&type=" + type + "&lastMinute=" + lastMinute);

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
        function rate(i){
          if(document.getElementById("rate-form"+i).style.display == "block"){
            document.getElementById("rate-form"+i).style.display = "none" ;
          }
          else {
            document.getElementById("rate-form"+i).style.display = "block";
          }
    
        
        
};





// Get the modal
var modal = document.getElementById("booking-form-modal");

// Get the button that opens the modal
var btn = document.querySelector("button");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close-button")[0];

// When the user clicks the button, open the modal
 function display(i) {

  a = 0;
  while( document.getElementById("booking-form-modal"+a) ){
    console.log("Yeah!") ;
    hide(a);
    a++;
  }
  

  modal = document.getElementById("booking-form-modal"+i);
  modal.style.display = "block";


  
}

// When the user clicks on <span> (x), close the modal
function hide(i) {
  modal = document.getElementById("booking-form-modal"+i);
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

  function chat(i){

  }

function showPopUp(i) {
    document.getElementById("popup"+i).style.display = "block";
    document.getElementById("popup"+i).style.position = "absolute";
  }

  function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(function() {
      alert("Link copied to clipboard");
    }, function(err) {
      console.error("Could not copy text: ", err);
    });
  }

  function closePopUp(i) {
    document.getElementById("popup"+i).style.display = "none";
  }
    </script>
            
</html>