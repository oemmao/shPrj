<?php
session_start();
session_destroy();
header('Location: ./loginForm.html');
//echo "<script>document.location.href='loginForm.html';</script>";	
?>
