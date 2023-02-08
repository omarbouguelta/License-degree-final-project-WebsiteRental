<?php
    
        
        session_start();
        $_SESSION['user']="is logged out";
        header("Location: index.php");
    
?>
