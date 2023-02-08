<?php

// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "website-rental");
// Check connection
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}

//Getting clients contacts
$client_messages_query = "SELECT DISTINCT client_id, property_id FROM conversation WHERE host_id = ".$_GET['host_id']."" ;
$client_messages_result = $conn->query($client_messages_query);


//listing contacts one by one
$i=0;
while($row = mysqli_fetch_assoc($client_messages_result)){
 
     $contacts[0][$i] = $row['client_id'];
     $contacts[1][$i] = $row['property_id'];
     $i = $i + 1 ;

}



//contacts
if( count($contacts[0]) == 1){
    $client_id = $contacts[0][0] ;
    $contacts_info_query = "SELECT * FROM clients WHERE client_id = '$client_id' " ;
    $contacts_info_result = $conn->query($contacts_info_query);
    $row2 =  mysqli_fetch_assoc($contacts_info_result);

    $property_id = $contacts[1][0]  ;           
    echo '
    <a href="hostChat.blade.php?property_id='.$property_id.'client_id='.$client_id.'" style="text-decoration: none;">
        <div id="'.$row2['client_id'].'" class="contacts">
              '.$row2['name'].'
                <br>
              '.$row2['email'].'
        </div>
    </a>
  ';
}
elseif( count($contacts[0]) > 1){
    //listing contacts one by one
      for($a = 0; $a < count($contacts[0])-1; $a++){

        $client_id = $contacts[0][$a] ;
        $contacts_info_query = "SELECT * FROM clients WHERE client_id = '$client_id' " ;
        $contacts_info_result = $conn->query($contacts_info_query);
        $row2 =  mysqli_fetch_assoc($contacts_info_result);
      
        $property_id = $contacts[1][$a]  ;           
        echo '
        <a href="hostChat.blade.php?property_id='.$property_id.'client_id='.$client_id.'" style="text-decoration: none;">
            <div id="'.$row2['client_id'].'" class="contacts">
                  '.$row2['name'].'
                    <br>
                  '.$row2['email'].'
            </div>
        </a>
      ';
      }
}


?>