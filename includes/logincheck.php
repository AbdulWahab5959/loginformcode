<?php
if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
   // echo "Welcome to the member's area, " . $_SESSION['name'] . "!";
         //echo"<script>window.location.href='index.php'</script>"; 
         
        } else {
            echo"<script>alert('Please log in first to see this Profile page.')</script>"; 
            echo"<script>window.location.href='login.php'</script>"; 
    }
?>