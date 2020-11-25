<?php

    
    try{
        $con=new PDO('mysql:host=localhost;dbname=bangladesh','root','');
        
    }catch(PDOException $e){
        echo $e->getMessage();
    }

?>