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
    <link rel="icon" href="../media/pfe logo.png">
    <title>Myaccount</title>
</head>

<style>
    body {
  margin: 0;
  font-family: 'Poppins', sans-serif;
  
}

.top-nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 10px 20px;
  background-color: black;
}

.top-nav a {
  color: #f33c42;
  text-decoration: none;
  margin-right: 20px;
}

.logout-btn {
  color: red;
}

.main-content {
  display: flex;
  justify-content: center;
  align-items: center;
  height: calc(100vh - 50px);
}

.block {
  color: #f33c42;
  width: 300px;
  height: 300px;
  border-radius: 10px;
  border: solid 2px #f33c42;
  text-align: center;
  margin: 0 20px;
  transition: all 0.2s ease-in-out;
  
}

.block:hover {
  width: 320px;
  height: 320px;
  box-shadow: 0 0 10px #ccc;
  transform: scale(1.1);
}

.block:active {
  width: 300px;
  height: 300px;
  box-shadow: 0 0 10px #ccc;
  transform: scale(1.1);
}

.block img {
  height: 200px;
  margin-bottom: 20px;
}

.block h2 {
  font-size: 1.5em;
  margin-bottom: 0;
}




#Personalinfo {
  width: 95%;
  height: 90vh;
  border-radius: 10px;
  border: solid 2px #f33c42;
  margin:  0px  auto 50px auto;
}
#MyListings {
  width: 95%;
  border-radius: 10px;
  border: solid 2px #f33c42;
  margin:  0px  auto 50px auto;
}
#Mybookings{
  width: 95%;
  border-radius: 10px;
  border: solid 2px #f33c42;
  margin:  0px  auto 50px auto;
}
#clients-offers{
  width: 95%;
  border-radius: 10px;
  border: solid 2px #f33c42;
  margin:  0px  auto 50px auto;
}
#upload-button-container button{
  background: #f33c42; 
  color: white; 
  padding: 10px;
  border: none;
  border-radius: 5px;
  transition: all 1s ease-in-out;
}
#upload-button-container button:active{
  height: 25px;
  width: 100px;
}

.property-block{
  height: 150px;
  width: 80%;
  font-size: 30px;
  overflow: hidden;
  text-overflow: ellipsis;
}
.property-block p{
  height: 50px;
  width: 80%;
  display: inline;
  margin-right: 5px;
  color: #f33c42;
  
}

.booking-block{
    color: white ;
    border: solid 5px white ;
    border-radius: 20px;
    margin: 10px;
    padding: 20px;
    background: #212529;
    box-shadow: 0px 0px 20px #2b2929;
}


</style>

<body>
    <div class="top-nav">
        <a href="index.php">Home</a>
        <a href="#">My Account</a>
        <?php
            if($_SESSION['type'] == "host"){
              echo '
                <div>
                  <a href="hostChat.blade.php">Messages</a>
                  <a href="" class="logout-btn" onclick="return confirm(\'Are you sure you want to proceed?\') ? logout() : false;">Logout</a>
                </div>
              ';
              
            }
            else {
              echo '
                  <a href="" class="logout-btn" onclick="return confirm(\'Are you sure you want to proceed?\') ? logout() : false;">Logout</a>
              ';
              
            }
        ?>
        
      </div>
      
      <div class="main-content">
        
    
        <a href="#Personalinfo" style="text-decoration: none;">
          <div class="block personal-info">
          <img src="../media/info.png" alt="">
          <h2>Personal Informations</h2>
        </div>
        </a>
        
        <?php
                $type = $_SESSION['type'] ;
              if( $type === "client"){

                      echo "
                      <a href='#MyListings' style='text-decoration: none;'>
                          <div class='block booking-history'>
                                <img src='../media/history.png' >
                                <h2>Booking History</h2>
                          </div>
                          </a> 
                        <a href='Listings.blade.php'  style='text-decoration: none;'>
                          <div class='block property-listing'>
                                    <img src='../media/home.png' >
                                    <h2>Properties Listing</h2>
                          </div>
                        </a>
                      ";
            }
            else {
                       echo "
                       <a href='#MyListings' style='text-decoration: none;'>
                          <div class='block My-listings'>
                                <img src='../media/list.png' >
                                <h2>My listings</h2>
                          </div>
                        </a> 
                        <a href='CreateListing.blade.php' style='text-decoration: none;'>
                          <div class='block add-listing'>
                                <img src='../media/add.png'>
                                <h2>Add a property</h2>
                          </div>
                        </a>  
                      ";
            }
?>
        
      
        
       
        <a href="index.php" style="text-decoration: none;">
            <div id="Logout" class="block logout" onclick="return confirm('Are you sure you want to proceed?') ? logout() : false;" >
                <img src="../media/exit.png" alt="">
                <h2>Logout</h2>
            </div>
        </a>
        
      </div>
      
      
      
      <div id="Personalinfo"  >
            <?php
              

              $name = $_SESSION['name'] ;
              $email = $_SESSION['email'] ;
              $proflie_img = $_SESSION['profile_img'] ;
              $type = $_SESSION['type'] ;
              if($type == "client"){
                $profile_pic = "buyer.png" ;
              }
                  
              else {
                  $profile_pic = "seller.png" ;
              }
              
              echo "
                    <div style='margin: 50px; font-size: 20px;' >
                      <div style='float: left; width: 50vh;  '>
                            
                      
                            <img style=' display: block; margin: auto; margin-bottom: 5px; height: 300px; width: 300px; background: #f33c42; border: solid 5px #f33c42; border-radius: 50%;' src='uploads/$profile_pic' alt='profile' '>
                           
                      </div>
                     
                     
                      
                          <h1>Name:</h1>
                          <h1 style='color: #f33c42'>$name</h1>
                          <h1>Email:</h1>
                          <h1 style='color: #f33c42'>$email</h1>

                      
                      
                    </div>
              " ;
              
              


            ?>
      </div>

      
              
      <div id="MyListings">
                      <div style="margin: 50px; font-size: 20px; padding: 0px; 20px" >
                      
                      <?php

                        // Connect to the database
                          $conn = mysqli_connect("localhost", "root", "", "website-rental");
                          // Check connection
                          if (!$conn) {
                              die("Connection failed: " . mysqli_connect_error());
                          }


                        if( $type === "host"){
                          
                          // Query to select data from the database
                          $host_id = $_SESSION['host_id'] ;
                          $sql = "SELECT * FROM properties WHERE host_id = '$host_id'";
                          $result = mysqli_query($conn, $sql);
                          // Check if query is successful
                          if (mysqli_num_rows($result) > 0) {
                            echo '<h1>My Listings</h1>' ;
                              // Fetch and output data
                              while($row = mysqli_fetch_assoc($result)) {
                                  $property_id = $row["property_id"] ;
                                  $image_link = $conn->query("SELECT photo FROM properties WHERE property_id = $property_id")->fetch_object()->photo;
                                  echo "<img src='uploads/$image_link' style='float: left; margin-right: 20px; height: 100px; width 200px; border: solid 5px #f33c42; border-radius: 10px;' >";
                                  if( $row["last_minute"] == "0") {
                                     $last_minute = "no" ;
                                    }  
                                  else { 
                                    $last_minute = "yes" ;
                                  }
                                  echo '
                                  
                                  
                                  <div class="property-block">
                                        <p>Title:</p>'. $row["title"]. 
                                        ' * '.
                                        '<p>Price:</p> ' . $row["price"]. 
                                        ' * '.
                                        '<p>Location:</p>' . $row["location"].
                                        ' * '.
                                        '<p>Type:</p>' . $row["type"].
                                        ' * '.
                                        '<p>Last Minute:</p>' . $last_minute .
                                        ' * '.
                                        '<p>Rating:</p>' . $row["rating"]. '/5'.
                                        ' * '.
                                        '<p>Description:</p>' . $row["description"].
                                  '</div>
                               
                              
                                  ';
                                  

                              }
                          } else {
                              echo "No properties added";
                          }



                        }
                        elseif($type === "client"){
                            $client_id = $_SESSION['client_id'] ;
                            $booking_query = " SELECT properties.*, bookings.*
                            FROM properties 
                            JOIN bookings ON properties.property_id = bookings.property_id
                            WHERE bookings.client_id = '$client_id'" ;
                            $booking_result = mysqli_query($conn, $booking_query);

                            if( mysqli_num_rows($booking_result) > 0 ) {
                              echo '<h1>My Bookings</h1>';
                               while( $row = mysqli_fetch_assoc($booking_result)) {
                                $property_id = $row["property_id"] ;
                                $image_link = $conn->query("SELECT photo FROM properties WHERE property_id = $property_id")->fetch_object()->photo;
                                //echo "<img src='uploads/$image_link' style='float: left; margin-right: 20px; height: 100px; width 200px; border: solid 5px #f33c42; border-radius: 10px;' >";
                                if( $row["last_minute"] == "0") {
                                   $last_minute = "no" ;
                                  }  
                                else { 
                                  $last_minute = "yes" ;
                                }
                                echo '

                            <div class="booking-block">
                                <img src="uploads/'. $image_link .'" style="float: left; margin-right: 20px; height: 100px; width 200px; border: solid 5px #f33c42; border-radius: 10px;" >
                                <div class="property-block" style="font-size: 50px; margin-top: 20px;" > 
                                    Price offered: '. $row["offer"]. 
                                    ' da  '.
                                    'Satus: ' . $row["status"]. '
                                </div>
                                
                                <div class="property-block">
                                      <p>Title:</p>'. $row["title"]. 
                                      ' * '.
                                      '<p>Price:</p> ' . $row["price"]. 
                                      ' * '.
                                      '<p>Location:</p>' . $row["location"].
                                      ' * '.
                                      '<p>Type:</p>' . $row["type"].
                                      ' * '.
                                      '<p>Last Minute:</p>' . $last_minute .
                                      ' * '.
                                      '<p>Rating:</p>' . $row["rating"]. '/5'.
                                      ' * '.
                                      '<p>Description:</p>' . $row["description"].
                                '</div>
                             
                            </div>
                                ';
                               }
                            }
                        }
                           

                        
                      ?>
                  </div>      
             </div>             
        <div id="clients-offers">   
                    <div style="margin: 50px; font-size: 20px; padding: 0px; 20px" >
          <?php

                
                        // Connect to the database
                        $conn = mysqli_connect("localhost", "root", "", "website-rental");
                        // Check connection
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                if($type === "host"){
                    
                
                      $client_offres_query = "SELECT properties.*, bookings.*
                      FROM properties 
                      JOIN bookings ON properties.property_id = bookings.property_id
                      WHERE properties.host_id = '$host_id'";
                      $client_offres_result = mysqli_query($conn, $client_offres_query);
                      if( mysqli_num_rows( $client_offres_result) > 0 ){
                        echo '<h1>Clients offers: ' ;
                        while( $row = mysqli_fetch_assoc($client_offres_result)) {
                          $property_id = $row["property_id"] ;
                          $image_link = $conn->query("SELECT photo FROM properties WHERE property_id = $property_id")->fetch_object()->photo;
                          //echo "<img src='uploads/$image_link' style='float: left; margin-right: 20px; height: 100px; width 200px; border: solid 5px #f33c42; border-radius: 10px;' >";
                          if( $row["last_minute"] == "0") {
                             $last_minute = "no" ;
                            }  
                          else { 
                            $last_minute = "yes" ;
                          }
                          echo '
                      
                          <hr style="width: 90%; color: #f33c42; margin: 20px auto;">
                          <img src="uploads/'. $image_link .'" style="float: left; margin-right: 20px; height: 100px; width 200px; border: solid 5px #f33c42; border-radius: 10px;" >
                          <div class="property-block">
                                <p>Price offered:</p>'. $row["offer"]. 
                                '<p>da</p>'.
                                ' * '.
                                '<p>Satus:</p>' . $row["status"]. 
                               '
                               <form method="post" action="../php/offer.php" style="font-size: 20px;">
                                    <input type="hidden" id="booking_id" name="booking_id" value="' . $row["booking_id"] . '">
                                    <input type="radio" id="accept" name="offer" value="accepted">
                                    <label for="accepted">Accept</label>
                                    <input type="radio" id="decline" name="offer" value="declined">
                                    <label for="decline">Decline</label>
                                    <input type="submit" value="Confirm" style="color: white; padding: 5px; background: #f33c42; border: none; border-radius: 5px;">
                              </form>

                          </div>

                          
                          
                          <div class="property-block">
                                <p>Price offered:</p>'. $row["offer"]. 
                                '<p>da</p>'.
                                ' * '.
                                '<p>Satus:</p>' . $row["status"]. '
                                <p>Title:</p>'. $row["title"]. 
                                ' * '.
                                '<p>Price:</p> ' . $row["price"]. 
                                ' * '.
                                '<p>Location:</p>' . $row["location"].
                                ' * '.
                                '<p>Type:</p>' . $row["type"].
                                ' * '.
                                '<p>Last Minute:</p>' . $last_minute .
                                ' * '.
                                '<p>Rating:</p>' . $row["rating"]. '/5'.
                                ' * '.
                                '<p>Description:</p>' . $row["description"].
                          '</div>
                       
                     
                          ';
                         }
                      }
                
                  
            }
                
                        


            ?>
            </div>
           
     </div>
      
</body>
  <script>

    

    function logout(){
        // Call the PHP function here
        // For example, using an XMLHttpRequest:
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "../php/functions.php", true);
        xhttp.send();
    }

    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
          e.preventDefault();

          document.querySelector(this.getAttribute('href')).scrollIntoView({
              behavior: 'smooth'
         });
      });
  });



    function uploadProfilePic() {
        // Create a file input element
        var fileInput = document.createElement("input");
        fileInput.type = "file";
        fileInput.style.display = "none";

        // Append the file input element to the document
        document.body.appendChild(fileInput);

        // Trigger a click event on the file input element
        fileInput.click();

        // Listen for changes to the file input element
        fileInput.addEventListener("change", function() {
            // Get the selected file
            var file = fileInput.files[0];

            // Do something with the selected file (e.g. upload it to a server)
            // ...

            // Remove the file input element from the document
            document.body.removeChild(fileInput);
        });
      
    }
    
    // Create a button element
    var uploadButton = document.createElement("button");
    // Set the button text
    uploadButton.innerHTML = "Upload Profile Pic";
    // Append the button to the upload button container
    document.getElementById("upload-button-container").appendChild(uploadButton);
    // Listen for button clicks
    uploadButton.addEventListener("click", uploadProfilePic);



  </script>

</html>