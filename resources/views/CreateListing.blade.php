<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <style> @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap'); </style>
    <link rel="icon" href="../media/pfe logo.png">
    <title>Add a Property</title>
</head>

<style>
        body{
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #f33c42;
            color: white;
        }

        .top-nav {
          display: flex;
          justify-content: space-between;
          align-items: center;
          padding: 0.5% 0.5%;
          background-color: black;
          box-shadow: 0px 0px 20px #2b2929;
          width: 99%;
          position:  absolute;
          top: 0%;
        }

        .top-nav a {
          color: #f33c42;
          text-decoration: none;
        }

        .logout-btn {
          color: red;
        }
        button {
            float: right;
        }
        form{
            margin-top: 50px;
        }
        h2{
            text-align: center;
            font-size: 50px;
        }
        label{
            font-size: 30px;
        }
        input {
            margin: 10px 30px ;
            height: 30px;
            width: 80%;
            border: solid 5px black;
            border-radius: 10px;
        }
        

        #file-input{
            border: none;
            border-radius: 0;
            float: right;
        }
        

        #location{
            border: solid 5px black;
            border-radius: 10px;
        }

        #last_minute{
            width: 50px;
            border: solid 5px black;
            border-radius: 10px;
        }

        #type{
            margin: 10px 30px ;
            height: 30px;
            width: 80%;
            border: solid 5px black;
            border-radius: 10px;
        }

        #description{
            margin: 10px 30px ;
            width: 80%;
            border: solid 5px black;
            border-radius: 10px;
        }
        input[type='submit']{
            border: solid 1px white ;
            border-radius: 5px;
            background: white;
            color: #f33c42;
        }
        .form-control{
            display: block;
            border-radius: 5px;
            padding: 2px;
        }

        img {
            height: 50vh;
            object-fit: contain;
            border: solid 5px white;
            border-radius: 10px;
        }

        .property-images{
            display: block;
            margin: auto;
        }

        #images{
            height: 50vh;
            width: 100vh;
           
            
        }
        
        .buttons{
            position: absolute;
            top: 0%;
            float: left
        }

        .image{
            border: solid 5px white;
            border-radius: 10px;
        }

        


</style>
<body>

    <div class="top-nav">
        <a href="index.php">Home</a>
        <a href="">Add a Property</a>
        <div >
          <a href="Myaccount.blade.php" style="margin-right: 20px;" >My Account</a>
          <a href="" class="logout-btn" onclick="return confirm('Are you sure you want to proceed?') ? logout() : false;">Logout</a>
        </div>
        
    </div>
    
    

    <form method="POST" action="../php/addListing.php" enctype="multipart/form-data"   >
        <div class="container">
    <div class="row">
        
        <div id="images">
                <input type="file" id="file-input" name="picture" placeholder="hello" >
                <img class="property-images" id="first-image" src="home-background.jpg" onclick="uploadPicture()">
        </div>
        

        <p style="text-align: center;" >recomended image dimensions 330x660px</p>
        <h2>Add a Property</h2>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter property title">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price" placeholder="Enter property price">
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <select class="form-control" id="location" name="location">
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
                    
            </select>
               
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <select class="form-control" id="type" name="type">
                    <option value="home">Home</option>
                    <option value="apartment">Apartment</option>
                    <option value="private room">Private Room</option>
                    <option value="shared room">Shared Room</option>
                </select>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="last_minute" name="last_minute" value="1">
                <label class="form-check-label" for="last_minute">Last Minute</label>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="10"></textarea>
            </div>
    </div>
</div>
        <input type="submit">
    </form>


</body>

<script>
    
    document.getElementById("file-input").addEventListener("change", uploadPicture);

    document.getElementById("first-image").addEventListener("click", uploadPicture);

    function uploadPicture() {
    // Get the file input element
    var fileInput = document.getElementById("file-input");

    // Check if a file has been selected
    if (fileInput.files && fileInput.files[0]) {
        // Create a new FormData object
        var formData = new FormData();

        // Append the file to the FormData object
        formData.append("file", fileInput.files[0]);

        // Create an XMLHttpRequest object
        var xhr = new XMLHttpRequest();

        // Open the request to the server-side PHP script
        xhr.open("POST", "../php/upload.php", true);

        // Send the FormData object
        xhr.send(formData);

        // Handle the response from the server
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Get the image element
                var image = document.getElementById("first-image");

                // Update the source of the image
                image.src = xhr.responseText;
            }
        }
    }
}


    

</script>

</html>




