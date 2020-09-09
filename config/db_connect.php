<?php 

    //Connect to the database
    $conn = mysqli_connect('localhost', 'collinsduzzy', '1234', 'ninja_pizza');

    //Check connection 
    if(!$conn){
        echo 'connection error' . mysqli_connect_error();
    }

?>