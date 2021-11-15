<?php
    $conn = mysqli_connect('localhost', 'username', 'password', 'default schema');

    if(!$conn){
        echo 'Connection error: ' . mysqli_connect_error();
    }
?>