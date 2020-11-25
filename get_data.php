<?php

    //here use sleep() function because we want to show loading_grif when select any data. Here 1 means 1 second
    sleep(2);

    include('db.php');

    $type=$_POST['type'];

    if($type=='district'){
        $div=$_POST['div'];
        //write sql query for fetch district
        $sql="SELECT DISTINCT district FROM postal WHERE division='$div' ORDER BY district ASC";
        
        $stmt=$con->prepare($sql);
        $stmt->execute();
        $arrDist=$stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $html='';
        foreach($arrDist as $dist){
            $html.='<option value="'.$dist['district'].'">'.$dist['district'].'</option>';
        }
    }



    if($type=='thana'){
        $dist=$_POST['dist'];
        //write sql query for fetch district
        $sql="SELECT DISTINCT thana FROM postal WHERE district='$dist' ORDER BY thana ASC";
        
        $stmt=$con->prepare($sql);
        $stmt->execute();
        $arrThana=$stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $html='';
        foreach($arrThana as $thana){
            $html.='<option value="'.$thana['thana'].'">'.$thana['thana'].'</option>';
        }
    }



    if($type=='suboffice'){
        $thana=$_POST['thana'];
        //write sql query for fetch district
        $sql="SELECT DISTINCT sub_office FROM postal WHERE thana='$thana' ORDER BY sub_office ASC";
        
        $stmt=$con->prepare($sql);
        $stmt->execute();
        $arrSubOffice=$stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $html='';
        foreach($arrSubOffice as $suboffice){
            $html.='<option value="'.$suboffice['sub_office'].'">'.$suboffice['sub_office'].'</option>';
        }
    }


    if($type=='postal'){
        $sub_office=$_POST['sub_office'];
        //write sql query for fetch district
        $sql="SELECT postal_code FROM postal WHERE sub_office='$sub_office'";
        
        $stmt=$con->prepare($sql);
        $stmt->execute();
        $postalCode=$stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $html='<span style="color:blue;font-size:18px;">Postal Code:  </span><span style="color:green;font-size:20px;">'.$postalCode['0']['postal_code'].'</span>';  
        
    }

    


    echo $html;

?>