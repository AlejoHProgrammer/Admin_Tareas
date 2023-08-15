<?php 
    function conn(){
        $dbhost="localhost";
        $dbuser="root";
        $dbpassword="";
        $dbname="task";
    
        $conectar = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
        return $conectar;
    }
