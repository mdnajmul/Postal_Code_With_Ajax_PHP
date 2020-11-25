<?php


    $con1=mysqli_connect('localhost','root','','bangladesh');

    mysqli_query($con1,"TRUNCATE TABLE postal");

    $url="https://en.wikipedia.org/wiki/List_of_postal_codes_in_Bangladesh";

    $html = file_get_contents($url);

    //create dom object
    $dom=new domDocument();

    @$dom->loadHTML($html);

    $tables=$dom->getElementsByTagName('table');

    $table1_rows=$tables->item(0)->getElementsByTagName('tr');
    $table2_rows=$tables->item(1)->getElementsByTagName('tr');
    $table3_rows=$tables->item(2)->getElementsByTagName('tr');
    $table4_rows=$tables->item(3)->getElementsByTagName('tr');
    $table5_rows=$tables->item(4)->getElementsByTagName('tr');
    $table6_rows=$tables->item(5)->getElementsByTagName('tr');
    $table7_rows=$tables->item(6)->getElementsByTagName('tr');
    $table8_rows=$tables->item(7)->getElementsByTagName('tr');




    foreach($table1_rows as $row1){
        $table1_cols=$row1->getElementsByTagName('td');
        
        if(isset($table1_cols->item(0)->nodeValue)){ 
                $division_1='Dhaka';
                $district_1=$table1_cols->item(0)->nodeValue;
                $thana_1=$table1_cols->item(1)->nodeValue;
                $subOffice_1=$table1_cols->item(2)->nodeValue;
                $postCode_1=$table1_cols->item(3)->nodeValue;
                
                if($thana_1!=''){
                  $sql_1="INSERT INTO postal(division,district,thana,sub_office,postal_code) VALUES('$division_1','$district_1','$thana_1','$subOffice_1','$postCode_1')";
                  mysqli_query($con1,$sql_1);  
                }
                
                
        }
    }


    foreach($table2_rows as $row2){
        $table2_cols=$row2->getElementsByTagName('td');
        
        if(isset($table2_cols->item(0)->nodeValue)){ 
                $division_2='Mymensingh';
                $district_2=$table2_cols->item(0)->nodeValue;
                $thana_2=$table2_cols->item(1)->nodeValue;
                $subOffice_2=$table2_cols->item(2)->nodeValue;
                $postCode_2=$table2_cols->item(3)->nodeValue;
            
                if($thana_2!=''){
                   $sql_2="INSERT INTO postal(division,district,thana,sub_office,postal_code) VALUES('$division_2','$district_2','$thana_2','$subOffice_2','$postCode_2')";
                   mysqli_query($con1,$sql_2); 
                }
                
        }
    }



    foreach($table3_rows as $row3){
        $table3_cols=$row3->getElementsByTagName('td');
        
        if(isset($table3_cols->item(0)->nodeValue)){ 
                $division_3='Sylhet';
                $district_3=$table3_cols->item(0)->nodeValue;
                $thana_3=$table3_cols->item(1)->nodeValue;
                $subOffice_3=$table3_cols->item(2)->nodeValue;
                $postCode_3=$table3_cols->item(3)->nodeValue;
            
                if($thana_3!=''){
                    $sql_3="INSERT INTO postal(division,district,thana,sub_office,postal_code) VALUES('$division_3','$district_3','$thana_3','$subOffice_3','$postCode_3')";
                    mysqli_query($con1,$sql_3);
                }
                
        }
    }



    foreach($table4_rows as $row4){
        $table4_cols=$row4->getElementsByTagName('td');
        
        if(isset($table4_cols->item(0)->nodeValue)){ 
                $division_4='Chattogram';
                $thana_4=$table4_cols->item(1)->nodeValue;
                $subOffice_4=$table4_cols->item(3)->nodeValue;
                $postCode_4=$table4_cols->item(4)->nodeValue;
                
                if($thana_4!=''){
                   if(trim($table4_cols->item(0)->nodeValue)=="Cox's Bazar"){
                        $sql_4="INSERT INTO postal(division,district,thana,sub_office,postal_code) VALUES('$division_4',concat('Cox',char(39),'s Bazar'),'$thana_4','$subOffice_4','$postCode_4')";
                        mysqli_query($con1,$sql_4);
                    }else{
                        $district_4=$table4_cols->item(0)->nodeValue;
                        $sql_4="INSERT INTO postal(division,district,thana,sub_office,postal_code) VALUES('$division_4','$district_4','$thana_4','$subOffice_4','$postCode_4')";
                        mysqli_query($con1,$sql_4);
                    } 
                }       
                
        }
    }


    foreach($table5_rows as $row5){
        $table5_cols=$row5->getElementsByTagName('td');
        
        if(isset($table5_cols->item(0)->nodeValue)){ 
                $division_5='Rangpur';
                $district_5=$table5_cols->item(0)->nodeValue;
                $thana_5=$table5_cols->item(1)->nodeValue;
                $subOffice_5=$table5_cols->item(2)->nodeValue;
                $postCode_5=$table5_cols->item(3)->nodeValue;
            
                if($thana_5!=''){
                    $sql_5="INSERT INTO postal(division,district,thana,sub_office,postal_code) VALUES('$division_5','$district_5','$thana_5','$subOffice_5','$postCode_5')";
                    mysqli_query($con1,$sql_5);
                }
                
        }
    }



    foreach($table6_rows as $row6){
        $table6_cols=$row6->getElementsByTagName('td');
        
        if(isset($table6_cols->item(0)->nodeValue)){ 
                $division_6='Rajshahi';
                $district_6=$table6_cols->item(0)->nodeValue;
                $thana_6=$table6_cols->item(1)->nodeValue;
                $subOffice_6=$table6_cols->item(2)->nodeValue;
                //if dash found inside $subOffice, Then it replace by $than value
                $subOffice_6 = str_replace("-",$thana_6,$subOffice_6);
            
                $postCode_6=$table6_cols->item(3)->nodeValue;
            
                if($thana_6!=''){
                   $sql_6="INSERT INTO postal(division,district,thana,sub_office,postal_code) VALUES('$division_6','$district_6','$thana_6','$subOffice_6','$postCode_6')";
                   mysqli_query($con1,$sql_6); 
                }
                
        }
    }



    foreach($table7_rows as $row7){
        $table7_cols=$row7->getElementsByTagName('td');
        
        if(isset($table7_cols->item(0)->nodeValue)){ 
                $division='Barishal';
                $district=$table7_cols->item(0)->nodeValue;
                $thana=$table7_cols->item(1)->nodeValue;
                $subOffice=$table7_cols->item(2)->nodeValue;
                $postCode=$table7_cols->item(3)->nodeValue;
            
                if($thana!=''){
                    $sql="INSERT INTO postal(division,district,thana,sub_office,postal_code) VALUES('$division','$district','$thana','$subOffice','$postCode')";
                    mysqli_query($con1,$sql);
                }
                
        }
    }


    foreach($table8_rows as $row8){
        $table8_cols=$row8->getElementsByTagName('td');
        
        if(isset($table8_cols->item(0)->nodeValue)){ 
                $division_8='Khulna';
                $district_8=$table8_cols->item(0)->nodeValue;
                $thana_8=$table8_cols->item(1)->nodeValue;
                $subOffice_8=$table8_cols->item(2)->nodeValue;
                $postCode_8=$table8_cols->item(3)->nodeValue;
            
                if($thana_8!=''){
                   $sql_8="INSERT INTO postal(division,district,thana,sub_office,postal_code) VALUES('$division_8','$district_8','$thana_8','$subOffice_8','$postCode_8')";
                   mysqli_query($con1,$sql_8); 
                }
                
        }
    }


    

?>